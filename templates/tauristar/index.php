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
		<div id="header">
			<div class="container">
				<a class="pull-left" href="<?php echo JFactory::getUri()->base()?>">
					<jdoc:include type="modules" name="logo" style="none" />
				</a>
				<nav class="navbar navbar-default">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
								<span class="sr-only"><?php JText::_('TPL_TAURISTAR_TOGGLE_NAVIGATION'); ?></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="#"><?php echo JFactory::getApplication()->get('sitename'); ?></a>
						</div>
						<div id="navbar-menu" class="navbar-collapse collapse">
							<jdoc:include type="modules" name="menu" style="none" />
						</div>
					</div>
				</nav>
			</div>
		</div>
		<?php foreach ($params->get('modules', array()) as $module) : ?>
			<?php if ($this->countModules($module->position)) : ?>
				<div class="container container-<?php echo $module->position; ?>'">
					<div class="row row-<?php echo $module->position; ?>">
						<div class="col-md-12 col-<?php echo $module->position; ?>">
							<jdoc:include type="modules" name="<?php echo $module->position; ?>" style="xhtml" />
						</div>
					</div>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
		<?php if ($this->countModules('top')) : ?>
			<div id="top">
				<div class="container">
					<div class="row">
						<jdoc:include type="modules" name="top" style="xhtml" />
					</div>
				</div>
			</div>
			<hr class="soften">
		<?php endif; ?>
		<div id="bodysection">
			<div class="container">
				<div class="row">
					<?php $left  = $this->countModules('sidebar-left'); ?>
					<?php $right = $this->countModules('sidebar-right'); ?>
					<?php $sidebarWidth = $params->get('sidebar-width', 2); ?>
					<?php $contentSpan  = $right ? 12 - $sidebarWidth : 12; ?>
					<?php $contentSpan  = $left ? $contentSpan - $sidebarWidth : $contentSpan; ?>
					<?php if ($left) : ?>
						<div class="col-md-<?php echo $sidebarWidth; ?>">
							<jdoc:include type="modules" name="sidebar-left" style="xhtml" />
						</div>
					<?php endif; ?>
					<div class="content col-md-<?php echo $contentSpan; ?>">
						<jdoc:include type="message" />
						<jdoc:include type="component" />
					</div>
					<?php if ($right) : ?>
						<div class="col-md-<?php echo $sidebarWidth; ?>">
							<jdoc:include type="modules" name="sidebar-right" style="xhtml" />
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php if ($this->countModules('breadcrumbs')) : ?>
			<div id="breadcrumbs">
				<div class="container">
					<jdoc:include type="modules" name="breadcrumbs" />
				</div>
			</div>
		<?php endif; ?>
		<?php if ($this->countModules('bottom')) : ?>
			<div id="bottom">
				<div class="container">
					<jdoc:include type="modules" name="bottom" style="html5"/>
				</div>
			</div>
		<?php endif; ?>
		<footer id="footer">
			<div class="container">
				<?php if ($this->countModules('footer')) : ?>
					<jdoc:include type="modules" name="footer" style="xhtml" />
				<?php endif; ?>
				<p>
					&copy; <?php echo date('Y'); ?> <?php echo JFactory::getApplication()->get('sitename'); ?>
					<i class="fa fa-joomla" aria-hidden="true"></i>
				</p>
			</div>
		</footer>
		<jdoc:include type="modules" name="debug" style="none" />
	</body>
</html>
