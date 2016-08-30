<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.tauristar
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JLoader::import('tauristar.helpers.tauristar', JPATH_THEMES);

JHtml::_('jquery.framework');
JHtml::_('bootstrap.framework');

$params = JFactory::getApplication()->getTemplate(true)->params;
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
	
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
		<?php TauristarHelper::addCSS($params); ?>
		<jdoc:include type="head" />
	</head>

	<body>

		<?php if ($this->countModules('header')) :?>
			<header>
				<jdoc:include type="modules" name="header" />			
			</header>
		<?php endif; ?>


		<?php if ($this->countModules('navigation')) : ?>
			<nav class="navigation" role="navigation">
				<jdoc:include type="modules" name="navigation" />
			</nav>
		<?php endif; ?>
	
		<section>
			<jdoc:include type="message" />
			<jdoc:include type="component" />				
		</section>

		<?php if ($this->countModules('footer')) : ?>		
			<footer>
				<jdoc:include type="modules" name="footer" />	
			</footer>
		<?php endif; ?>
	
	</body>
	
</html>