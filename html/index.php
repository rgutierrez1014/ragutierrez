<?php

require_once '../includes/_twig_load.php';

$context = array_merge($default_context, array(
    'active_menu_item' => 'home'
));

echo $twig->render('index.html', $context);

?>
