<?php

require_once "../../includes/_twig_load.php";

$info = <<<INFO
An in-house custom survey application. Built with the Google App Engine framework, written in Python.
INFO;

$desc = <<<DESC
<p>At the time, the Carnegie Math Pathways (CMP) program at Carnegie was using Qualtrics to administer surveys to students. Qualtrics was expensive and a little too feature-heavy for what we were using it for. So I was asked to write a survey application. Having our own survey application meant we had control over how the data was formed, stored, and exported. It meant we could implement our own API and support the Learning Tool Interoperability (LTI) protocol. LTI is a protocol used often in education to support having external assignments that can pass back grades or outcomes. For example, a course hosted on a Learning Management System (like Blackboard, Canvas, Moodle, etc.) could have an assignment, like a math quiz, that is actually hosted elsewhere. Upon viewing the assignment, the Learning Management System does a POST request to the LTI provider. The LTI provider presents the assignment to the student, and the student completes it. Upon completion, the LTI provider passes the grade back to the Learning Management System where it gets recorded in the gradebook.</p>
<p>The first iteration of the application was completed in January 2015. It underwent multiple bug fixes and enhancements, and it now serves other programs at Carnegie.</p>
DESC;

$backend = <<<BACKEND
<p>Surveys are crafted by first writing multiple YAML files, collectively called a survey package. There's one file for the general configuration of the survey, and one file for each section of questions. This gets uploaded to the application and stored in Google Cloud Storage, along with a corresponding record in the MySQL database. A user can then request a survey from a survey package and pick one or more of the sections. They can then request an offering of the survey, with a start date and an end date. A URL for the offering is generated, and this is what's given to students. Students can access the survey directly through the URL or through an LTI request from their course.</p>
BACKEND;

$frontend = <<<FRONTEND
<p>The frontend of the application is a simple Bootstrap interface with some extra jQuery code that drives some of the more complex question types, such as branching questions, where selecting a specific answer in one question reveals a follow-up question. For some of our math questions, we use MathJax to render formulas and fractions. A small bit of d3 is used to generate a number line for a few of the questions.</p>
FRONTEND;

$design_decisions = <<<DESIGN_DECISIONS
<p>For the survey packages, I chose to make them in YAML because the language is very English-like, easy to understand, and comes without all the extra punctuation that something like JSON needs. When our analytics team, or other folks within the Pathways program, needed to know how the survey questions and the response options are coded, I simply share the YAML file with them and they're able to get the information they need without having to learn new jargon.</p>
<p>For the frontend, I chose Bootstrap instead of making a layout from scratch because the design needs were minimal and Bootstrap allowed me to focus more on application development and less on the design of the templates. The grid system, responsiveness, and all the built-in components helped make template design a breeze.</p>
DESIGN_DECISIONS;

$context = array_merge($default_context, array(
    'project' => array(
        'title' => 'Survey Tool',
        'images' => array(
            array(
                'name' => 'survey-tool1.jpg',
                'description' => 'Identify page'
            ),
            array(
                'name' => 'survey-tool2.jpg',
                'description' => 'Survey page'
            ),
            array(
                'name' => 'survey-tool3.jpg',
                'description' => 'Creating a survey package'
            ),
            array(
                'name' => 'survey-tool4.jpg',
                'description' => 'Creating a survey from a survey package'
            ),
            array(
                'name' => 'survey-tool5.jpg',
                'description' => 'Creating an offering from a survey'
            ),
            array(
                'name' => 'survey-tool6.jpg',
                'description' => 'An example of a survey configuration YAML file'
            ),
            array(
                'name' => 'survey-tool7.jpg',
                'description' => 'An example of a survey section YAML file'
            ),
        ),
        'info' => $info,
        'backend' => array(
            'Google App Engine',
            'Python',
            'webapp2',
            'jinja2',
            'Google Cloud SQL'
        ),
        'frontend' => array(
            'Bootstrap',
            'MathJax',
            'd3',
            'FontAwesome'
        ),
        'client' => array(
            'name' => 'Carnegie Foundation',
            'url' => 'https://www.carnegiefoundation.org'
        ),
        'skills' => array(
            'Web Development'
        ),
        'date' => 'January 2015',
        'demo' => null,
        'source' => null,
        'description' => array(
            'desc' => $desc,
            'backend' => $backend,
            'frontend' => $frontend,
            'design_decisions' => $design_decisions
        ),
        'previous' => null,
        'next' => 'institutional-reports.php',
    )
));

echo $twig->render('project.html', $context);

?>
