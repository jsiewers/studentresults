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
class __TwigTemplate_28c2e111d05525af22f5008bdb972e31c14c057a69cdbadbd4ca6e42b9605f7c extends \Twig\Template
{
    private $source;

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
        $this->parent = $this->loadTemplate("layout.html", "signin.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        // line 4
        echo "    <div class=\"row\">
    \t<div class=\"col-md-6 col-md-offset-3\">
    \t\t<div class=\"panel panel-default\">
    \t\t\t<div class=\"panel-heading\">Sign In</div>
    \t\t\t<div class=\"panel-body\">
    \t\t\t\t<form action=\"/signin\" method=\"post\">
";
        // line 10
        echo twig_get_attribute($this->env, $this->source, ($context["csrf"] ?? null), "field", []);
        echo "
\t\t\t\t\t\t<div class=\"form-group";
        // line 11
        echo ((twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "email", [])) ? (" has-error") : (""));
        echo "\">
    \t\t\t\t\t\t<label for=\"email\">Email</label>
    \t\t\t\t\t\t<input type=\"email\" name=\"email\" id=\"email\" placeholder=\"you@domain.com\" class=\"form-control\" value=\"";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["old"] ?? null), "email", []), "html", null, true);
        echo "\">
";
        // line 14
        if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "email", [])) {
            // line 15
            echo "                            <span class=\"hel-block\">";
            echo twig_escape_filter($this->env, twig_first($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "email", [])), "html", null, true);
            echo "</span>
";
        }
        // line 17
        echo "    \t\t\t\t\t</div>

    \t\t\t\t\t<div class=\"form-group";
        // line 19
        echo ((twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [])) ? (" has-error") : (""));
        echo "\">
    \t\t\t\t\t\t<label for=\"password\">Password</label>
    \t\t\t\t\t\t<input type=\"password\" name=\"password\" id=\"password\" class=\"form-control\">
";
        // line 22
        if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [])) {
            // line 23
            echo "                            <span class=\"hel-block\">";
            echo twig_escape_filter($this->env, twig_first($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [])), "html", null, true);
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
        return array (  94 => 25,  88 => 23,  86 => 22,  80 => 19,  76 => 17,  70 => 15,  68 => 14,  64 => 13,  59 => 11,  55 => 10,  47 => 4,  44 => 3,  34 => 1,);
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
