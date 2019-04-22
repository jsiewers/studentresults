<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* layout.html */
class __TwigTemplate_8ea8d4e6f1c1393095abe29dd540ea03f84dd4731f5aa82d606fe9cf52b2fc28 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!doctype html>
<html lang=\"en\">
<head>
    <!-- Required meta tags -->
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <link href=\"https://fonts.googleapis.com/css?family=Roboto:400,700\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/assets/normalize.css\">
    <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/assets/examresults.css\">
    <title>Examresults</title>

</head>
<body>
<div class=\"wrapper\">
    <nav>
        <ul>
            <li><a href=\"/exam/new\">Examens</a></li>
            <li><a href=\"/students\">Studenten</a></li>
            <li><a href=\"/signout\">Uitloggen</a></li>
            <li><a href=\"/signup\">Gebruiker toevoegen</a></li>
        </ul>
    </nav>
    <div id=\"content\">";
        // line 23
        $this->displayBlock('content', $context, $blocks);
        echo "</div>
</div>
</body>
</html>";
    }

    public function block_content($context, array $blocks = [])
    {
        echo "<h1>Hello, world!</h1>";
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 23,  49 => 9,  45 => 8,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!doctype html>
<html lang=\"en\">
<head>
    <!-- Required meta tags -->
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <link href=\"https://fonts.googleapis.com/css?family=Roboto:400,700\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"{{ base_url() }}/assets/normalize.css\">
    <link rel=\"stylesheet\" href=\"{{ base_url() }}/assets/examresults.css\">
    <title>Examresults</title>

</head>
<body>
<div class=\"wrapper\">
    <nav>
        <ul>
            <li><a href=\"/exam/new\">Examens</a></li>
            <li><a href=\"/students\">Studenten</a></li>
            <li><a href=\"/signout\">Uitloggen</a></li>
            <li><a href=\"/signup\">Gebruiker toevoegen</a></li>
        </ul>
    </nav>
    <div id=\"content\">{% block content %}<h1>Hello, world!</h1>{% endblock %}</div>
</div>
</body>
</html>", "layout.html", "/Users/janjaap/PhpstormProjects/studentresults/templates/layout.html");
    }
}
