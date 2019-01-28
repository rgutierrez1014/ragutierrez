<?php

require_once "../../includes/_twig_load.php";

$desc = <<<DESC
<p>Wordpress is not fun to work with. The more plugins you add, the more your website becomes Frankenstein's monster. All it takes is one plugin to crash your whole site. But Wordpress is a great CMS, so we decided to use it for a few of our sites. Because all our other applications use Google App Engine, we decided to host Wordpress within a Google App Engine application. Turns out that this comes with a whole host of issues. Our entire dev team had to modify the PHP build and the plugins we used to even get it to work. I, along with the rest of the team, were feeling burned out. "Joy in the work" is one of the core values of the Carnegie Foundation. For one afternoon in May, I found joy in the work by writing a shortcode that could generate a hipster logo in posts and pages.</p>
<p>Apparently, other developers had a similar idea to mine. I was able to find a full CSS implementation of the hipster logo. All I needed to do was copy it into a shortcode in our Wordpress instance. I added it to one of custom plugins. If one ever wanted to use it in a post or page, all they had to do was type </p>
<p><pre>
[hipster_logo left='R' top='&lt;span class="fa fa-coffee fa-fw"&gt;'
    right='G' bottom='&lt;span class="fa fa-laptop fa-fw"&gt;']
</pre></p>
<p>You can use letters as well as FontAwesome or Glyphicon icons.</p>
DESC;

$backend = <<<BACKEND
<p>Because this was a Wordpress shortcode, it was written in PHP.</p>
BACKEND;

$frontend = <<<FRONTEND
<p>A somewhat complex implementation of HTML and CSS.</p>
FRONTEND;

$design_decisions = <<<DESIGN_DECISIONS
<p>The ubiquitous hipster logo will always be the X with letters or icons around it.</p>
DESIGN_DECISIONS;

$context = array_merge($default_context, array(
    'project' => array(
        'title' => 'Hipster Logo shortcode',
        'images' => array(
            array(
                'name' => 'hipster-logo-shortcode1.jpg',
                'description' => 'Hipster logo'
            )
        ),
        'info' => "A Wordpress shortcode created as a joke for one of our Wordpress sites.",
        'backend' => array(
            'WordPress',
            'PHP'
        ),
        'frontend' => array(
            'CSS',
            'FontAwesome'
        ),
        'client' => null,
        'skills' => array(
            'Web Development'
        ),
        'date' => 'May 2017',
        'demo' => 'https://codepen.io/rgutierrez1014/pen/dvmdGW',
        'source' => 'https://gist.github.com/rgutierrez1014/b0932b67d7ba2181ccf82e456c7974d5',
        'description' => array(
            'desc' => $desc,
            'backend' => $backend,
            'frontend' => $frontend,
            'design_decisions' => $design_decisions
        ),
        'previous' => 'carnegie-labs.php',
        'next' => 'simple-recipes.php',
    )
));

echo $twig->render('project.html', $context);

?>
