<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.tauristar
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die();

use Joomla\Registry\Registry;

/**
 * Helper class for Tauristar template.
 *
 * @since  3.8
 */
class TauristarHelper
{

	/**
	 * Adds the correct script to the document.
	 *
	 * @param   Registry  $params  The parameters form the template
	 *
	 * @return  void
	 */
	public static function addCSS(Registry $params)
	{
		$document = JFactory::getDocument();
		$cssFile  = '/templates/tauristar/css/template.css';

		// The mode: 1 = production, 2 = developer
		switch ($params->get('mode', 1))
		{
			case 1:
				if (!JFile::exists(JPATH_BASE . $cssFile))
				{
					self::compile($params);
				}

				$document->addStyleSheet(JUri::base() . $cssFile);
				break;
			case 2:
				self::compile($params);
				$document->addStyleSheet(JUri::base() . $cssFile);
				break;
		}
	}

	/**
	 * Compiles the template.scss file.
	 *
	 * @param   Registry  $params  The parameters form the template
	 *
	 * @return  void
	 */
	public static function compile(Registry $params)
	{
		try
		{
			$content = '';
			if (JFile::exists(JPATH_THEMES . '/tauristar/scss/custom.scs'))
			{
				$content .= PHP_EOL . '@import "' . 'custom.scss";';
			}
			$scss = new JScss();
			$content .= PHP_EOL . $scss->getVariablesFromParams($params) . PHP_EOL;
			$content .= '@import "' . 'template.scss";';
			$css = $scss->compile($content,
					array(
							JPATH_THEMES . '/tauristar/scss',
							JPATH_ROOT . '/media/jui/scss',
							JPATH_ROOT . '/media/jui/bs3/scss',
							JPATH_ROOT . '/media/jui/fa4/scss'
					), $params->get('mode', 1));

			// Writting the css content to the cache file
			JFile::write(JPATH_THEMES . '/tauristar/css/template.css', $css);
		}
		catch (Exception $e)
		{
			JFactory::getApplication()->enqueueMessage($e->getMessage());
		}
	}
}
