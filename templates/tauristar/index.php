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

$params = $this->params;
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
	
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
		<?php TauristarHelper::addCSS($params); ?>
		<jdoc:include type="head" />
	</head>

	<body>

		<header id="header">
			<div class="container">

				<?php if ($this->countModules('header')) :?>
				<div class="container">
					<div class="row">
						<jdoc:include type="modules" name="header" style="xhtml" />
					</div>
				<?php endif; ?>
	
				<?php if ($this->countModules('logo')) :?>
				<div class="container">
					<div class="row">
						<jdoc:include type="modules" name="logo" style="xhtml" />
					</div>
				<?php endif; ?>
	
				<?php if ($this->countModules('navigation')) : ?>
	
					<nav class="navigation" role="navigation">
						<jdoc:include type="modules" name="navigation" style="none" />
					</nav>
	
				<?php endif; ?>

			</div>
		</header>
	
		<?php if ($this->countModules('top')) :?>
			<section id="top">
				<div class="container">
					<div class="row">
						<jdoc:include type="modules" name="top" style="xhtml" />				
					</div>
				</div>
			</section>
		<?php endif; ?>
		
		<?php if ($this->countModules('feature')) :?>
			<section id="feature">
				<div class="container">
					<div class="row">
						<jdoc:include type="modules" name="feature" style="xhtml" />				
					</div>
				</div>
			</section>
		<?php endif; ?>
	
		<section id="main-section">
			<div class="container">
			
				<div id="system-messages">
					<jdoc:include type="message" />
				</div>
				
				<?php if ($this->countModules('breadcrumbs')) : ?>
					<div id="breadcrumbs">
						<div class="container">
							<jdoc:include type="modules" name="breadcrumbs" />
						</div>
					</div>
				<?php endif; ?>
	
				<?php if ($this->countModules('sidebar-left')) : ?>
					<aside id="sidebar-left">
						<div class="container">
							<jdoc:include type="modules" name="sidebar-left" />
						</div>
					</aside>
				<?php endif; ?>
	
				<?php if ($this->countModules('above-content')) :?>
					<section id="above-content">
						<div class="container">
							<div class="row">
								<jdoc:include type="modules" name="above-content" style="xhtml" />				
							</div>
						</div>
					</section>
				<?php endif; ?>
				
				<main id="content" role="main" class="">
					<article>
						<jdoc:include type="component" />
					</article>
				</main>
				
				<?php if ($this->countModules('below-content')) :?>
					<section id="below-content">
						<div class="container">
							<div class="row">
								<jdoc:include type="modules" name="below-content" style="xhtml" />				
							</div>
						</div>
					</section>
				<?php endif; ?>
	
				<?php if ($this->countModules('sidebar-right')) : ?>
					<aside id="sidebar-right">
						<div class="container">
							<jdoc:include type="modules" name="sidebar-right" />
						</div>
					</aside>
				<?php endif; ?>
	
			</div>
		</section>
	
		<?php if ($this->countModules('sub-feature')) : ?>
			<section id="sub-feature">
				<div class="container">
					<div class="row">
						<jdoc:include type="modules" name="sub-feature" style="xhtml" />
					</div>
				</div>
			</section>
		<?php endif; ?>
	
		<?php if ($this->countModules('bottom')) : ?>
			<section id="bottom">
				<div class="container">
					<div class="row">
						<jdoc:include type="modules" name="bottom" style="xhtml" />
					</div>
				</div>
			</section>
		<?php endif; ?>
	
		<footer id="footer">
			<div class="container">
				
				<?php if ($this->countModules('footer')) : ?>
					<jdoc:include type="modules" name="footer" style="xhtml" />
				<?php endif; ?>
			
				<div id="copyright">
					&copy; <?php echo date('Y'); ?> <?php echo JFactory::getApplication()->get('sitename'); ?>
					<i class="fa fa-joomla" aria-hidden="true"></i>
				</div>
				
			</div>
		</footer>
	
	</body>
	
</html>
