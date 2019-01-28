<?php

require_once '../vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader, []);

$context = array(
    'active_menu_item' => 'home'
);

echo $twig->render('index.html', $context);

?>
