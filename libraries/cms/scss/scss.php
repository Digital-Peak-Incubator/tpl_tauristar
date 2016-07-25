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
	 * @param   string   $string  Scss string to parse.
	 * @param   integer  $mode    The mode: 1 = compressed, 2 = expanded
	 *
	 * @return  string   $out     The compiled css output.
	 */
	public function compile($string, array $importPaths, $mode = 1)
	{
		$scss = new Compiler();
		$scss->setImportPaths($importPaths);
		$scss->setFormatter($mode == 1 ? Crunched::class : Expanded::class);

		return $scss->compile($string);
	}
}
