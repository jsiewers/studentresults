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

/* signin.html */
class __TwigTemplate_dcf53f618949de8b03aabfd2da78018c29bd9d1784ae10b46b005954aa08ea88 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layout.html", "signin.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    <div class=\"row\">
    \t<div class=\"col-md-6 col-md-offset-3\">
    \t\t<div class=\"panel panel-default\">
    \t\t\t<div class=\"panel-heading\">Sign In</div>
    \t\t\t<div class=\"panel-body\">
    \t\t\t\t<form action=\"/signin\" method=\"post\">
\t\t\t\t\t\t";
        // line 10
        echo twig_get_attribute($this->env, $this->source, ($context["csrf"] ?? null), "field", [], "any", false, false, false, 10);
        echo "
\t\t\t\t\t\t<div class=\"form-group";
        // line 11
        echo ((twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "email", [], "any", false, false, false, 11)) ? (" has-error") : (""));
        echo "\">
    \t\t\t\t\t\t<label for=\"email\">Email</label>
    \t\t\t\t\t\t<input type=\"email\" name=\"email\" id=\"email\" placeholder=\"you@domain.com\" class=\"form-control\" value=\"";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["old"] ?? null), "email", [], "any", false, false, false, 13), "html", null, true);
        echo "\">
                            ";
        // line 14
        if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "email", [], "any", false, false, false, 14)) {
            // line 15
            echo "                            <span class=\"hel-block\">";
            echo twig_escape_filter($this->env, twig_first($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "email", [], "any", false, false, false, 15)), "html", null, true);
            echo "</span>
                            ";
        }
        // line 17
        echo "    \t\t\t\t\t</div>

    \t\t\t\t\t<div class=\"form-group";
        // line 19
        echo ((twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", false, false, false, 19)) ? (" has-error") : (""));
        echo "\">
    \t\t\t\t\t\t<label for=\"password\">Password</label>
    \t\t\t\t\t\t<input type=\"password\" name=\"password\" id=\"password\" class=\"form-control\">
                            ";
        // line 22
        if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", false, false, false, 22)) {
            // line 23
            echo "                            <span class=\"hel-block\">";
            echo twig_escape_filter($this->env, twig_first($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", false, false, false, 23)), "html", null, true);
            echo "</span>
                            ";
        }
        // line 25
        echo "    \t\t\t\t\t</div>
\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-default\">Sign In</button>

    \t\t\t\t</form>
    \t\t\t</div>
    \t\t</div>
    \t</div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "signin.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 25,  91 => 23,  89 => 22,  83 => 19,  79 => 17,  73 => 15,  71 => 14,  67 => 13,  62 => 11,  58 => 10,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layout.html' %}

{% block content %}
    <div class=\"row\">
    \t<div class=\"col-md-6 col-md-offset-3\">
    \t\t<div class=\"panel panel-default\">
    \t\t\t<div class=\"panel-heading\">Sign In</div>
    \t\t\t<div class=\"panel-body\">
    \t\t\t\t<form action=\"/signin\" method=\"post\">
\t\t\t\t\t\t{{ csrf.field | raw }}
\t\t\t\t\t\t<div class=\"form-group{{ errors.email ? ' has-error' : '' }}\">
    \t\t\t\t\t\t<label for=\"email\">Email</label>
    \t\t\t\t\t\t<input type=\"email\" name=\"email\" id=\"email\" placeholder=\"you@domain.com\" class=\"form-control\" value=\"{{ old.email }}\">
                            {% if errors.email %}
                            <span class=\"hel-block\">{{ errors.email | first }}</span>
                            {% endif %}
    \t\t\t\t\t</div>

    \t\t\t\t\t<div class=\"form-group{{ errors.password ? ' has-error' : '' }}\">
    \t\t\t\t\t\t<label for=\"password\">Password</label>
    \t\t\t\t\t\t<input type=\"password\" name=\"password\" id=\"password\" class=\"form-control\">
                            {% if errors.password %}
                            <span class=\"hel-block\">{{ errors.password | first }}</span>
                            {% endif %}
    \t\t\t\t\t</div>
\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-default\">Sign In</button>

    \t\t\t\t</form>
    \t\t\t</div>
    \t\t</div>
    \t</div>
    </div>
{% endblock %}", "signin.html", "/Users/janjaap/git/studentresults/templates/signin.html");
    }
}
