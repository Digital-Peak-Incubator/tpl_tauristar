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

	<?php // begin header section / add conditionals for layout options ?>
		<header id="header">
			<div class="container">

			<?php // header modules ?>
				<?php if ($this->countModules('header')) :?>
				<div class="container">
					<div class="row">
						<jdoc:include type="modules" name="header" style="xhtml" />
					</div>
				<?php endif; ?>
			<?php // end navigation ?>
	
			<?php // logo position ?>
				<?php if ($this->countModules('logo')) :?>
				<div class="container">
					<div class="row">
						<jdoc:include type="modules" name="logo" style="xhtml" />
					</div>
				<?php endif; ?>
			<?php // end navigation ?>
	
			<?php // navigation ?>
				<?php if ($this->countModules('navigation')) : ?>
	
					<nav class="navigation" role="navigation">
						<jdoc:include type="modules" name="navigation" style="none" />
					</nav>
	
				<?php endif; ?>
			<?php // end navigation ?>

			</div><?php // end container ?>
		</header>
	<?php // end header & conditionals ?>	
	
	<?php // top section ?>	
		<?php if ($this->countModules('top')) :?>
			<section id="top">
				<div class="container">
					<div class="row">
						<jdoc:include type="modules" name="top" style="xhtml" />				
					</div>
				</div>
			</section>
		<?php endif; ?>
	<?php // end top section ?>	
		
	<?php // feature section ?>	
		<?php if ($this->countModules('feature')) :?>
			<section id="feature">
				<div class="container">
					<div class="row">
						<jdoc:include type="modules" name="feature" style="xhtml" />				
					</div>
				</div>
			</section>
		<?php endif; ?>
	<?php // end feature section ?>	
	
	<?php // main article & component area ?>
		<section id="main-section">
			<div class="container">
			
			<?php // if (message) : ?>
				<div id="system-messages">
					<jdoc:include type="message" />
				</div>
			<?php // end system-message ?>
				
			<?php // breadcrumbs ?>
				<?php if ($this->countModules('breadcrumbs')) : ?>
					<div id="breadcrumbs">
						<div class="container">
							<jdoc:include type="modules" name="breadcrumbs" />
						</div>
					</div>
				<?php endif; ?>
			<?php // end breadcrumbs ?>
	
			<?php // sidebar-left ?>
				<?php if ($this->countModules('sidebar-left')) : ?>
					<aside id="sidebar-left">
						<div class="container">
							<jdoc:include type="modules" name="sidebar-left" />
						</div>
					</aside>
				<?php endif; ?>
			<?php // end sidebar-left ?>
	
			<?php // above-content ?>
				<?php if ($this->countModules('above-content')) :?>
					<section id="above-content">
						<div class="container">
							<div class="row">
								<jdoc:include type="modules" name="above-content" style="xhtml" />				
							</div>
						</div>
					</section>
				<?php endif; ?>
			<?php // end above-content ?>
				
			<?php // Begin Content / Component : add main layout conditionals ?>
				<main id="content" role="main" class="">
					<article>
						<jdoc:include type="component" />
					</article>
				</main>
			<?php // End Content : endif ?>
				
			<?php // below-content ?>
				<?php if ($this->countModules('below-content')) :?>
					<section id="below-content">
						<div class="container">
							<div class="row">
								<jdoc:include type="modules" name="below-content" style="xhtml" />				
							</div>
						</div>
					</section>
				<?php endif; ?>
			<?php // end below-content ?>
	
			<?php // sidebar-right ?>
				<?php if ($this->countModules('sidebar-right')) : ?>
					<aside id="sidebar-right">
						<div class="container">
							<jdoc:include type="modules" name="sidebar-right" />
						</div>
					</aside>
				<?php endif; ?>
			<?php // end sidebar-right ?>
	
			</div>
		</section>
	<?php // end main-section ?>
	
	<?php // sub-feature section ?>	
		<?php if ($this->countModules('sub-feature')) : ?>
			<section id="sub-feature">
				<div class="container">
					<div class="row">
						<jdoc:include type="modules" name="sub-feature" style="xhtml" />
					</div>
				</div>
			</section>
		<?php endif; ?>
	<?php // end sub-feature section ?>	
	
	<?php // bottom section ?>		
		<?php if ($this->countModules('bottom')) : ?>
			<section id="bottom">
				<div class="container">
					<div class="row">
						<jdoc:include type="modules" name="bottom" style="xhtml" />
					</div>
				</div>
			</section>
		<?php endif; ?>
	<?php // end bottom section ?>
	
	<?php // begin footer section : add layout conditionals ?>
		<footer id="footer">
			<div class="container">
				
			<?php // footer modules ?>
				<?php if ($this->countModules('footer')) : ?>
					<jdoc:include type="modules" name="footer" style="xhtml" />
				<?php endif; ?>
			<?php // end footer modules ?>
			
			<?php // copyright position / if: copyright ?>
				<div id="copyright">
					&copy; <?php echo date('Y'); ?> <?php echo JFactory::getApplication()->get('sitename'); ?>
					<i class="fa fa-joomla" aria-hidden="true"></i>
				</div>
			<?php // endif & copyright?>
				
			</div>
		</footer>
		<?php // end footer section ?>
	
	</body>
	
</html>
