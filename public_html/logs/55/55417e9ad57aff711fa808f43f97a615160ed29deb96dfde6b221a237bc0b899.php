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

/* new_proces.html */
class __TwigTemplate_f2e513e3f98dc587d165640c3708224a775ff3e950075d051c3638c7e3efc60e extends \Twig\Template
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
        $this->parent = $this->loadTemplate("layout.html", "new_proces.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        // line 3
        echo "<h1>New Proces</h1>
<form id=\"procesform\" action=\"/proces/";
        // line 4
        echo twig_escape_filter($this->env, ($context["idexam"] ?? null), "html", null, true);
        if ( !($context["idexam"] ?? null)) {
            echo "0";
        }
        echo "/new\" method=\"post\">
";
        // line 5
        echo twig_get_attribute($this->env, $this->source, ($context["csrf"] ?? null), "field", []);
        echo "
    <label for=\"idexam\">Exam Id</label>
    <select id=\"idexam\" name=\"idexam\" onchange=\"procesform.submit()\">
";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["exams"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["exam"]) {
            // line 9
            echo "        <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["exam"], "idexam", []), "html", null, true);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["exam"], "idexam", []) == ($context["idexam"] ?? null))) {
                echo "SELECTED";
            }
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["exam"], "description", []), "html", null, true);
            echo "</option>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['exam'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "    </select>
    <label for=\"description\">Description</label>
    <input type=\"text\" id=\"description\" name=\"description\"><br>

    <input type=\"submit\" name=\"btnsubmit\">
</form>
<table>
";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["processes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["proces"]) {
            // line 19
            echo "<tr>
    <td>";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["proces"], "idproces", []), "html", null, true);
            echo "</td>
    <td>";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["proces"], "description", []), "html", null, true);
            echo "</td>
    <td><a href=\"/assignment/";
            // line 22
            echo twig_escape_filter($this->env, ($context["idexam"] ?? null), "html", null, true);
            if ( !($context["idexam"] ?? null)) {
                echo "0";
            }
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["proces"], "idproces", []), "html", null, true);
            echo "/new\">add assignments</a></td>
</tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['proces'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "</table>
";
    }

    public function getTemplateName()
    {
        return "new_proces.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 25,  106 => 22,  102 => 21,  98 => 20,  95 => 19,  91 => 18,  82 => 11,  67 => 9,  63 => 8,  57 => 5,  50 => 4,  47 => 3,  44 => 2,  34 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layout.html\" %}
{% block content %}
<h1>New Proces</h1>
<form id=\"procesform\" action=\"/proces/{{ idexam }}{% if not idexam %}0{% endif %}/new\" method=\"post\">
    {{ csrf.field | raw }}
    <label for=\"idexam\">Exam Id</label>
    <select id=\"idexam\" name=\"idexam\" onchange=\"procesform.submit()\">
        {% for exam in exams %}
        <option value=\"{{ exam.idexam }}\" {% if exam.idexam == idexam %}SELECTED{% endif %}>{{ exam.description }}</option>
        {% endfor %}
    </select>
    <label for=\"description\">Description</label>
    <input type=\"text\" id=\"description\" name=\"description\"><br>

    <input type=\"submit\" name=\"btnsubmit\">
</form>
<table>
{% for proces in processes %}
<tr>
    <td>{{ proces.idproces }}</td>
    <td>{{ proces.description }}</td>
    <td><a href=\"/assignment/{{ idexam }}{% if not idexam %}0{% endif %}/{{ proces.idproces }}/new\">add assignments</a></td>
</tr>
{% endfor %}
</table>
{% endblock %}", "new_proces.html", "/Users/janjaap/git/studentresults/templates/new_proces.html");
    }
}
