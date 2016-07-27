<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.tauristar
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die();

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
	 * @param   integer  $mode  The mode: 1 = production, 2 = developer
	 *
	 * @return   void
	 */
	public static function addCSS($mode)
	{
		$document = JFactory::getDocument();
		$cssFile  = '/templates/tauristar/css/template.css';

		switch ($mode)
		{
			case 1:
				if (!JFile::exists(JPATH_BASE . $cssFile))
				{
					self::compile($mode);
				}

				$document->addStyleSheet(JUri::base() . $cssFile);
				break;
			case 2:
				self::compile($mode);
				$document->addStyleSheet(JUri::base() . $cssFile);
				break;
		}
	}
	/**
	 * Compiles the template.scss file.
	 *
	 * @param   integer  $mode  The mode: 1 = compressed, 2 = expanded
	 *
	 * @return   void
	 */
	public static function compile($mode)
	{
		try
		{
			$content = '@import "' . 'template.scss";';
			if (JFile::exists(JPATH_THEMES . '/tauristar/scss/custom.scs'))
			{
				$content = PHP_EOL . '@import "' . 'custom.scss";';
			}
			$scss = new JScss;
			$css = $scss->compile(
					$content,
					array(
						JPATH_THEMES . '/tauristar/scss',
						JPATH_ROOT . '/media/jui/scss',
						JPATH_ROOT . '/media/jui/bs3/scss',
						JPATH_ROOT . '/media/jui/fa4/scss'
					),
					$mode
			);

			// Writting the css content to the cache file
			JFile::write(JPATH_THEMES . '/tauristar/css/template.css', $css);
		}
		catch (Exception $e)
		{
			JFactory::getApplication()->enqueueMessage($e->getMessage());
		}
	}
}
