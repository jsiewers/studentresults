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
class __TwigTemplate_58a7d5f7cd595cf9e075a34e296857d4235d9df46a9c31a58635117a894e251f extends Template
{
    private $source;
    private $macros = [];

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
        $macros = $this->macros;
        // line 1
        echo "<!doctype html>
<html lang=\"nl\">
<head>
    <!-- Required meta tags -->
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
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
        $macros = $this->macros;
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
        return array (  68 => 23,  51 => 9,  47 => 8,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!doctype html>
<html lang=\"nl\">
<head>
    <!-- Required meta tags -->
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
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
</html>", "layout.html", "/Users/janjaap/git/studentresults/templates/layout.html");
    }
}
