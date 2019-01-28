<?php

require_once '_twig_load.php';

$context = array_merge($default_context, array(
    'active_menu_item' => 'portfolio'
));

echo $twig->render('portfolio.html', $context);

?>
