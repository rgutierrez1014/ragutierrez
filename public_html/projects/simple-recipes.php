<?php

require_once "../../includes/_twig_load.php";

$info = <<<INFO
A collaborative project that manifested from a colleague's simple iced coffee recipe. We created a set of recipes, using one or two ingredients, that can be prepared by using ingredients from the Carnegie Foundation's kitchens.
INFO;

$desc = <<<DESC
<p>Carnegie's employees are graced with a multitude of free drinks and free food. As the days go on, this can turn from a blessing to a curse. There's only so many days that you can drink Vitamin Water Power-C before you get sick of it. Same goes for our coffee and tea. A number of us took to adding some jazz to our daily food and drink rituals. One day, my colleague Hai Hoang came downstairs with what looked like iced coffee. I asked how he made it. His reply: "Coffee and ice." Like it was that simple.</p>
<p>It <em>was</em> that simple. When I asked more of my colleagues for similar food and drink hacks, I got a lot more than iced coffee: tea with a lemon slice, "Farewell Cookies a-la-mode" (employees receive chocolate chip cookies on their last day at the Carnegie Foundation). My contribution was an Arnold Palmer: lemonade-flavored Vitamin Water combined with iced tea.</p>
<p>My colleague <a href="http://kennethdesigns.com" target="_blank">Kenneth Fernandez</a> and I decided to make these into recipe cards, with a short description and a visual instruction guide. I wrote most of the descriptions, while Kenny handled the design and layout of the recipe cards. We distributed one recipe per week in our weekly internal newsletter.</p>
DESC;

$backend = <<<BACKEND
<p>N/A</p>
BACKEND;

$frontend = <<<FRONTEND
<p>Graphics, layout, and design done in Photoshop and Illustrator.</p>
FRONTEND;

$design_decisions = <<<DESIGN_DECISIONS
<p>Kenny handled the design on this one, but the idea of having two ingredients as a maximum was a collaborative decision. As far as the descriptions, I decided to write flowery, dramatic text to juxtapose with the simplicity of the two-item recipes.</p>
DESIGN_DECISIONS;

$context = array_merge($default_context, array(
    'project' => array(
        'title' => 'Simple Recipes',
        'images' => array(
            array(
                'name' => 'simple-recipes1.jpg',
                'description' => 'Simple Recipes logo. Credit: Kenneth Fernandez'
            ),
            array(
                'name' => 'simple-recipes2.jpg',
                'description' => 'Simple Recipes'
            )
        ),
        'info' => $info,
        'backend' => null,
        'frontend' => array(
            'Photoshop',
            'Illustrator'
        ),
        'client' => null,
        'skills' => array(
            'Graphic Design',
            'Creative Writing'
        ),
        'date' => 'December 2015',
        'demo' => 'http://kennethdesigns.com/images/simple_recipes.pdf',
        'source' => null,
        'description' => array(
            'desc' => $desc,
            'backend' => $backend,
            'frontend' => $frontend,
            'design_decisions' => $design_decisions
        ),
        'previous' => 'hipster-logo.php',
        'next' => null,
    )
));

echo $twig->render('project.html', $context);

?>
