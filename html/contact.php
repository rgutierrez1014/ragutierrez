<?php

require_once '../includes/_twig_load.php';

$context = array_merge($default_context, array(
    'active_menu_item' => 'contact'
));

echo $twig->render('contact.html', $context);

?>
