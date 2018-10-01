<?php
$document = JFactory::getDocument();
$document->setGenerator('GBU online');

// Unset defaults
JHtml::_('bootstrap.framework',false);
JHtml::_('jquery.framework',false);
unset($document->_scripts[JURI::root(true) . '/media/jui/js/bootstrap.min.js']);
unset($document->_scripts[JURI::root(true) . '/media/jui/js/jquery-migrate.min.js']);
unset($document->_scripts[JURI::root(true) . '/media/jui/js/jquery-noconflict.js']);
unset($document->_scripts[JURI::root(true) . '/media/jui/js/jquery.min.js']);
unset($document->_scripts[JURI::root(true) . '/media/system/js/caption.js']);
if (array_key_exists('text/javascript', $this->_script))
    $this->_script['text/javascript'] = preg_replace('%jQuery\(window\).on\(\'load\',\s*function\(\)\s*\{\s*new\s*JCaption\(\'img.caption\'\)\;\s*\}\)\;\s*%', '', $this->_script['text/javascript']);

$itemid = JRequest::getVar('Itemid');

$app = JFactory::getApplication();
$path = JURI::base(true).'/templates/'.$app->getTemplate();
$menu = $app->getMenu();

$lang = JFactory::getLanguage();
$lang = explode("-", $lang->getTag())[0];
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="<?= $path ?>/dist/js/bundle.js"></script>
<!--     <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet"> -->
    <jdoc:include type="head" />
    <link href="<?= $path ?>/dist/css/master.css" rel="stylesheet">
    <link href="<?= $path ?>/dist/images/favicon.png" rel="shortcut icon">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <h1>Hello, world!</h1>
<!--     <script>
        AOS.init();
    </script> -->

  </body>
</html>
