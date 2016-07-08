<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.tauristar
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$params = JFactory::getApplication()->getTemplate(true)->params;

JLoader::import('tauristar.helpers.tauristar', JPATH_THEMES);
$user = JFactory::getUser();

JHtml::_('jquery.framework');
JHtml::_('bootstrap.framework');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php
$document = JFactory::getDocument();
$cssFile = '/templates/'.$this->template.'/css/template.css';
switch ($params->get('mode', 2))
{
	case 1:
		if (!JFile::exists(JPATH_BASE . $cssFile))
		{
			TauristarHelper::compile();
		}
		$document->addStyleSheet(JUri::base() . $cssFile);
		break;
	case 2:
		TauristarHelper::compile();
		$document->addStyleSheet(JUri::base() . $cssFile);
		break;
	case 3:
		$document->addScript(JUri::base().'/templates/'.$this->template.'/js/less.js');
		echo '<link rel="stylesheet/less" type="text/css" href="' . JUri::base() . '/templates/' . $this->template . '/less/template.less" />';
		echo '<script type="text/javascript">less = { env: "development"};</script>';
		break;
}
?>
	<jdoc:include type="head" />
</head>
<body class="contentpane">
	<jdoc:include type="message" />
	<jdoc:include type="component" />
</body>
</html>