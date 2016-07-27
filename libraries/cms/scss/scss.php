<?php

/**
 * @package     Joomla.Libraries
 * @subpackage  Scss
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

use Leafo\ScssPhp\Compiler;
use Leafo\ScssPhp\Formatter\Expanded;
use Leafo\ScssPhp\Formatter\Crunched;

/**
 * Scss compiler
 *
 * @package     Joomla.Libraries
 * @subpackage  Scss
 * @since       3.8
 */
class JScss
{

	/**
	 * Compiles the given Scss string into CSS.
	 *
	 * @param   string   $string       Scss string to parse.
	 * @param   array    $importPaths  The paths to use for import
	 * @param   integer  $mode         The mode: 1 = compressed, 2 = expanded
	 *
	 * @return  string   $out          The compiled css output.
	 */
	public function compile($string, array $importPaths, $mode = 1)
	{
		$scss = new Compiler;
		$scss->setImportPaths($importPaths);
		$scss->setFormatter($mode == 1 ? Crunched::class : Expanded::class);

		return $scss->compile($string);
	}

	/**
	 * Creates form fields for on the given form for the scss variable file.
	 *
	 * @param   JForm   $form           The form
	 * @param   string  $variablesFile  The path to the scss variable file
	 * @param   string  $overrideFile   The path to the scss override variable file
	 *
	 * @return  void
	 */
	public function loadVariablesIntoForm(JForm $form, $variablesFile, $overrideFile)
	{
		// Creating the dom
		$xml = new DOMDocument('1.0', 'UTF-8');
		$fieldsNode = $xml->appendChild(new DOMElement('form'))->appendChild(new DOMElement('fields'));
		$fieldsNode->setAttribute('name', 'params');

		foreach ($this->parseVariables($variablesFile) as $groupName => $variables)
		{
			if (!$variables)
			{
				continue;
			}

			// Defining the field set
			$fieldset = $fieldsNode->appendChild(new DOMElement('fieldset'));
			$fieldset->setAttribute('name', htmlentities(ucfirst($groupName)));
			$fieldset->setAttribute('label', $groupName);

			foreach ($variables as $name => $value)
			{
				$node = $fieldset->appendChild(new DOMElement('field'));
				$node->setAttribute('name', $name);
				$node->setAttribute('type', 'text');
				$node->setAttribute('default', trim($value));
				$node->setAttribute('label', JText::_(ucfirst(str_replace('-', ' ', substr($name, 1)))));
				$node->setAttribute('class', 'input-xxlarge');
			}
		}

		// Inject the variable fields into the form
		$form->load($xml->saveXML());

		// Set the variable values on the fields
		foreach ($this->parseVariables($overrideFile) as $groupName => $variables)
		{
			foreach ($variables as $name => $value)
			{
				$form->setValue($name, 'params', $value);
			}
		}
	}

	/**
	 * Replaces the variable values in the scss file with the ones from data.
	 *
	 * @param   array   $data           The data to dump
	 * @param   string  $variablesFile  The path to the scss variable file
	 * @param   string  $overrideFile   The path to the scss override variable file
	 *
	 * @return  array   $scssVariables  The variables of the variables file
	 */
	public function dumpVariablesIntoFile(array $data, $variablesFile, $overrideFile)
	{
		$data = key_exists('params', $data) ? $data['params'] : $data;

		$scssVariables = array();
		$buffer = '';
		foreach ($this->parseVariables($variablesFile) as $groupName => $variables)
		{
			if (!$variables)
			{
				continue;
			}

			$groupBuffer = '';

			foreach ($variables as $name => $value)
			{
				$scssVariables[] = $name;
				if (!key_exists($name, $data) || $value == $data[$name] || !$data[$name])
				{
					// Ignore not existing, empty or equal values
					continue;
				}

				if (!$groupBuffer)
				{
					// Create the group header, only when there are variables
					$groupBuffer = PHP_EOL . '//== ' . $groupName . PHP_EOL;
				}

				$groupBuffer .= $name . ': ' . $data[$name] . ';' . PHP_EOL;
			}

			if ($groupBuffer)
			{
				$buffer .= $groupBuffer;
			}
		}

		if ($buffer)
		{
			// Write the override file
			echo JFile::write($overrideFile, trim($buffer));
		}
		else
		{
			// Delete the override file as no content is available
			JFile::delete($overrideFile);
		}
		return $scssVariables;
	}

	/**
	 * Parses the variables from the given file path. Lines starting
	 * with //== are group names, where the following variables belong
	 * to the group.
	 *
	 * @param   string  $variablesFile  The path to the scss variable file
	 *
	 * @return  array   $groups         The variable groups
	 */
	private function parseVariables($variablesFile)
	{
		if (!file_exists($variablesFile))
		{
			return array();
		}

		$content = explode(PHP_EOL, JFile::read($variablesFile));

		$groups = array();
		$group = array();
		$groupName = 'default';
		foreach ($content as $index => $line)
		{
			$line = trim($line);
			if (strpos($line, '//== ') === 0)
			{
				// New group start found
				$groups[$groupName] = $group;

				$groupName = trim(str_replace('//== ', '', $line));
				$group = key_exists($groupName, $groups) ? $groups[$groupName] : array();
			}

			// We process only variables
			if (strpos($line, '$') !== 0)
			{
				continue;
			}

			list($name, $value) = explode(':', $line, 2);
			$value = trim($value);
			if ($pos = strrpos($value, ';'))
			{
				// Stripp stuff like comments after ;
				$value = substr($value, 0, $pos);
			}

			$group[$name] = $value;
		}
		$groups[$groupName] = $group;

		return $groups;
	}
}
