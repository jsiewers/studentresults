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

/* signup.html */
class __TwigTemplate_503490056bad56f11f5d63f424fb8b4efc6aa1e07783d87c9b624c2220b7e614 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "signup.html", 1);
        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        // line 4
        echo "<div class=\"row\">
    <div class=\"col-md-6 col-md-offset-3\">
        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">Sign Up</div>
            <div class=\"panel-body\">
                <form action=\"/signup\" method=\"post\">
                    ";
        // line 10
        echo twig_get_attribute($this->env, $this->source, ($context["csrf"] ?? null), "field", []);
        echo "
                    <div class=\"form-group";
        // line 11
        echo ((twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "email", [])) ? (" has-error") : (""));
        echo "\">
                        <label for=\"email\">Email</label>
                        <input type=\"email\" name=\"email\" id=\"email\" placeholder=\"you@domain.com\" class=\"form-control\" value=\"";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["old"] ?? null), "email", []), "html", null, true);
        echo "\">
                        ";
        // line 14
        if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "email", [])) {
            // line 15
            echo "                        <span class=\"hel-block\">";
            echo twig_escape_filter($this->env, twig_first($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "email", [])), "html", null, true);
            echo "</span>
                        ";
        }
        // line 17
        echo "                    </div>

                    <div class=\"form-group";
        // line 19
        echo ((twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "name", [])) ? (" has-error") : (""));
        echo "\">
                        <label for=\"first_name\">First Name</label>
                        <input type=\"text\" name=\"first_name\" id=\"first_name\" class=\"form-control\" value=\"";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["old"] ?? null), "first_name", []), "html", null, true);
        echo "\" >
                        ";
        // line 22
        if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "name", [])) {
            // line 23
            echo "                        <span class=\"hel-block\">";
            echo twig_escape_filter($this->env, twig_first($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "first_name", [])), "html", null, true);
            echo "</span>
                        ";
        }
        // line 25
        echo "                    </div>
                    <div class=\"form-group";
        // line 26
        echo ((twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "name", [])) ? (" has-error") : (""));
        echo "\">
                        <label for=\"last_name\">Last Name</label>
                        <input type=\"text\" name=\"last_name\" id=\"last_name\" class=\"form-control\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["old"] ?? null), "last_name", []), "html", null, true);
        echo "\" >
                        ";
        // line 29
        if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "last_name", [])) {
            // line 30
            echo "                        <span class=\"hel-block\">";
            echo twig_escape_filter($this->env, twig_first($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "last_name", [])), "html", null, true);
            echo "</span>
                        ";
        }
        // line 32
        echo "                    </div>

                    <div class=\"form-group";
        // line 34
        echo ((twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [])) ? (" has-error") : (""));
        echo "\">
                        <label for=\"password\">Password</label>
                        <input type=\"password\" name=\"password\" id=\"password\" class=\"form-control\">
                        ";
        // line 37
        if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [])) {
            // line 38
            echo "                        <span class=\"hel-block\">";
            echo twig_escape_filter($this->env, twig_first($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [])), "html", null, true);
            echo "</span>
                        ";
        }
        // line 40
        echo "                    </div>
                    <button type=\"submit\" class=\"btn btn-default\">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "signup.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 40,  129 => 38,  127 => 37,  121 => 34,  117 => 32,  111 => 30,  109 => 29,  105 => 28,  100 => 26,  97 => 25,  91 => 23,  89 => 22,  85 => 21,  80 => 19,  76 => 17,  70 => 15,  68 => 14,  64 => 13,  59 => 11,  55 => 10,  47 => 4,  44 => 3,  27 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layout.html' %}

{% block content %}
<div class=\"row\">
    <div class=\"col-md-6 col-md-offset-3\">
        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">Sign Up</div>
            <div class=\"panel-body\">
                <form action=\"/signup\" method=\"post\">
                    {{ csrf.field | raw }}
                    <div class=\"form-group{{ errors.email ? ' has-error' : '' }}\">
                        <label for=\"email\">Email</label>
                        <input type=\"email\" name=\"email\" id=\"email\" placeholder=\"you@domain.com\" class=\"form-control\" value=\"{{ old.email }}\">
                        {% if errors.email %}
                        <span class=\"hel-block\">{{ errors.email | first }}</span>
                        {% endif %}
                    </div>

                    <div class=\"form-group{{ errors.name ? ' has-error' : '' }}\">
                        <label for=\"first_name\">First Name</label>
                        <input type=\"text\" name=\"first_name\" id=\"first_name\" class=\"form-control\" value=\"{{ old.first_name }}\" >
                        {% if errors.name %}
                        <span class=\"hel-block\">{{ errors.first_name | first }}</span>
                        {% endif %}
                    </div>
                    <div class=\"form-group{{ errors.name ? ' has-error' : '' }}\">
                        <label for=\"last_name\">Last Name</label>
                        <input type=\"text\" name=\"last_name\" id=\"last_name\" class=\"form-control\" value=\"{{ old.last_name }}\" >
                        {% if errors.last_name %}
                        <span class=\"hel-block\">{{ errors.last_name | first }}</span>
                        {% endif %}
                    </div>

                    <div class=\"form-group{{ errors.password ? ' has-error' : '' }}\">
                        <label for=\"password\">Password</label>
                        <input type=\"password\" name=\"password\" id=\"password\" class=\"form-control\">
                        {% if errors.password %}
                        <span class=\"hel-block\">{{ errors.password | first }}</span>
                        {% endif %}
                    </div>
                    <button type=\"submit\" class=\"btn btn-default\">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "signup.html", "/Users/janjaap/PhpstormProjects/studentresults/templates/signup.html");
    }
}
