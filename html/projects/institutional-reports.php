<?php

require_once "../../includes/_twig_load.php";

$info = <<<INFO
An annual report generated for each college involved in the Carnegie Math Pathways program. Pulls data from Google Datastore, our <a href="$base_dir/projects/survey-tool.php">survey tool</a> via API, Salesforce, and Google Bigquery. Graphs generated with d3.
INFO;

$desc = <<<DESC
<p>The Carnegie Math Pathways program at Carnegie is a set of developmental math courses, combined with teaching resources for faculty and professional development through improvement science. Faculty teach these developmental math courses, and data is collected on the students who participate in them (grades, survey responses, etc.). In order for faculty members to improve their teaching, we use some of the student data to create reports for them. Faculty use these reports to find out what went well and what they can improve on for their next class. In addition to this, deans and other administrators want to know how their faculty are doing collectively; they want to see an institutional-level report. So every year, we would create these institutional reports for the administrators, usually through some combination of Excel, Word, and Powerpoint. That, combined with the extensive "data wrangling" that needed to happen, meant these reports would take months to make. Eventually we decided we needed an automated solution, so that's where I came in.</p>
<p>First, I analyzed the old reports and interviewed our analytics team on what sorts of data/graphs/diagrams we wanted to present. Once I had that in mind, I designed a layout for the report, which took advantage of Bootstrap tabs to save on vertical space. Then I had to determine the sources of data and how to transform the data into a structure that I could feed into d3 and make graphs. Once the graphs were done, we QA'd the reports and I made various small design updates, like colors, font size, typos, etc.</p>
<p>The first iteration of the new institutional reports went live in July 2015. They've since undergone updates to increase the automation, add and remove graphs, and change wording.</p>
DESC;

$backend = <<<BACKEND
<p>Reports exist within our Pathways Portal application, which serves the students and faculty involved in Pathways. Like most of the other applications we made at Carnegie, the Pathways Portal is written in Python using the Google App Engine framework. The code for the institutional reports was added to the Pathways Portal as it already contained a reporting system.</p>
<p>In the first iteration, data was pulled from static CSVs placed in the project itself. This was because the data wrangling process took longer than expected and I ran out of time. On the next iteration, the data was uploaded to Google Bigquery by our analytics team. The code was then modified to pull from Bigquery instead. This greatly improved the process because it allowed our analytics team to upload new data at their own pace; my work was no longer blocked by the data wrangling.</p>
BACKEND;

$frontend = <<<FRONTEND
<p>The frontend of the application is a simple Bootstrap interface with lots of d3 and some extra jQuery code. d3 is used to generate all the graphs. Extra jQuery code was written to handle extra data visualization functions, such as showing/hiding certain data from graphs.</p>
FRONTEND;

$design_decisions = <<<DESIGN_DECISIONS
<p>Because these reports are built into the Pathways Portal application, it utilizes Bootstrap by default. Bootstrap has lot of built-in components that helped with the design of this, such as tabs, button groups, and popovers. I chose d3 as the data visualization library because it is one of the most popular, has extensive documentation, and has the capability to render many types of visualizations.</p>
DESIGN_DECISIONS;

$context = array_merge($default_context, array(
    'project' => array(
        'title' => 'CMP Institutional Reports',
        'images' => array(
            array(
                'name' => 'institutional-reports1.jpg',
                'description' => 'Success data'
            ),
            array(
                'name' => 'institutional-reports2.jpg',
                'description' => 'Math Conceptual Knowledge data'
            ),
            array(
                'name' => 'institutional-reports3.jpg',
                'description' => 'At-a-glance data'
            ),
        ),
        'info' => $info,
        'backend' => array(
            'Google App Engine',
            'Python',
            'webapp2',
            'jinja2',
            'Google Datastore',
            'Google Bigquery',
            'Salesforce'
        ),
        'frontend' => array(
            'Bootstrap',
            'd3',
            'FontAwesome',
            'Photoshop'
        ),
        'client' => array(
            'name' => 'Carnegie Foundation',
            'url' => 'https://www.carnegiefoundation.org'
        ),
        'skills' => array(
            'Web Development',
            'Graphic Design'
        ),
        'date' => 'July 2015',
        'demo' => 'https://codepen.io/rgutierrez1014/pen/OVWgZM/',
        'source' => null,
        'description' => array(
            'desc' => $desc,
            'backend' => $backend,
            'frontend' => $frontend,
            'design_decisions' => $design_decisions
        ),
        'previous' => 'survey-tool.php',
        'next' => 'saic-portal.php',
    )
));

echo $twig->render('project.html', $context);

?>
