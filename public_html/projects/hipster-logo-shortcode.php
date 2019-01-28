<?php

require_once "../../includes/_twig_load.php";

$desc = <<<DESC
<p>As is the custom for a number of development teams, we needed a good April Fool's prank. During my first year at Carnegie, I found that the only April Fool's custom was an alternate version of our weekly internal newsletter, where we would write various short satirical articles. For April Fool's 2015, I contributed something related to our transition between Learning Management Systems. It was a hit, and I had a personal visit by the Carnegie president to praise the article. For April Fool's 2016, I wanted to raise the bar, and that's how Carnegie Labs was born.</p>
<p>Carnegie Labs was both a real and fake concept. My team, Collaborative Technology, worked on the basement floor of the building, along with our Analytics and IT teams. Although we are a part of Carnegie, we've always considered ourselves separate in terms of culture and quirkiness. I wanted to highlight this in a website for April Fool's. In my opinion, quirkiness and innovativeness are praised and highlighted by many companies, especially with startups. So for the website, I pitched Carnegie Labs as a vague consulting startup that not only helped the Carnegie Foundation but also helped design iconic bridges and buildings in major cities. I made the language as generically "startup" as I could, and even picked a template that had a lot of the stereotypical startup website features, like parallax scrolling.</p>
<p>With a little help from my colleague <a href="http://kennethdesigns.com">Kenneth Fernandez</a>, who handled the new logo and helped with some of the design, I wrote the code and the content over the course of 2-3 months. This was an extracurricular project, so my only time to work on it was after work and weekends. On the day of, I sent a company-wide email saying that Carnegie Labs was breaking away from the rest of the foundation. We also made a banner with the Carnegie Labs logo, which we hung at the entrance to our floor. I bought inflatable dinosaurs and placed them around our space. I also bought an assortment of retro sodas and snacks to offer those who ventured down to our floor. Carnegie Labs was an even bigger hit, and I had another personal visit by the president to praise the site and concept.</p>
DESC;

$backend = <<<BACKEND
<p>I purchased the domain name "carnegielabs.org" in order to make it as official-sounding as possible (and in case Carnegie Labs became a real thing). I set up a simple hosting environment. This was a quick project, so I kept it as a static site with no server-side code.</p>
BACKEND;

$frontend = <<<FRONTEND
<p>To develop the site as quickly as possible, I chose a generic Bootstrap template that already had many of the components I needed. I had to add parallax scrolling and some modals.</p>
FRONTEND;

$design_decisions = <<<DESIGN_DECISIONS
<p>A few colleagues and I sat down and brainstormed what design stereotypes came to mind when we thought about startups, and these morphed into the content featured on the site.</p>
DESIGN_DECISIONS;

$context = array_merge($default_context, array(
    'project' => array(
        'title' => 'Carnegie Labs',
        'images' => array(
            array(
                'name' => 'carnegie-labs1.jpg',
                'description' => 'Carnegie Labs'
            )
        ),
        'info' => "A personal project done as an April Fool's joke at Carnegie.",
        'backend' => null,
        'frontend' => array(
            'Bootstrap',
            'Photoshop',
            'FontAwesome'
        ),
        'client' => null,
        'skills' => array(
            'Web Development'
        ),
        'date' => 'April 2016',
        'demo' => 'https://carnegielabs.ragutierrez.com',
        'description' => array(
            'desc' => $desc,
            'backend' => $backend,
            'frontend' => $frontend,
            'design_decisions' => $design_decisions
        ),
        'previous' => 'projects/saic-portal.php',
        'next' => 'projects/hipster-logo.php',
    )
));

echo $twig->render('project.html', $context);

?>
