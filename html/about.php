<?php

require_once '../includes/_twig_load.php';

$context = array_merge($default_context, array(
    'active_menu_item' => 'about'
));

echo $twig->render('about.html', $context);

?>
