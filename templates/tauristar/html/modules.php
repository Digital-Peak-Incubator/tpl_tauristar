<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.tauristar
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/*
 * Module chrome for rendering the module as a grid cell
 */
function modChrome_cell($module, &$params, &$attribs)
{
	if (!$module->content)
	{
		return;
	}

	echo '<div class="col-md-' . (12 / $attribs['columns']) . '">';
	echo modChrome_html5($module, $params, $attribs);
	echo '</div>';
}
