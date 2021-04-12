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

/* students.html */
class __TwigTemplate_7429b858626f9ac5e39d64664fa7d86cfa384df604534d69cc30cca87158852e extends Template
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
        // line 2
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layout.html", "students.html", 2);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<h1>Students</h1>
<form id=\"groupform\" action=\"/students\" method=\"post\" onchange=\"this.submit()\">
    ";
        // line 6
        echo twig_get_attribute($this->env, $this->source, ($context["csrf"] ?? null), "field", [], "any", false, false, false, 6);
        echo "
    <select name=\"idgroup\">
        ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 9
            echo "        <option ";
            if ((($context["selected_group"] ?? null) == twig_get_attribute($this->env, $this->source, $context["group"], "idgroup", [], "any", false, false, false, 9))) {
                echo "selected";
            }
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["group"], "idgroup", [], "any", false, false, false, 9), "html", null, true);
            echo "</option>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "    </select>
</form>
<table>
    ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["students"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["student"]) {
            // line 15
            echo "    <tr>
        <td>";
            // line 16
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "idstudent", [], "any", false, false, false, 16), "html", null, true);
            echo "</td>
        <td> ";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "fullName", [], "method", false, false, false, 17), "html", null, true);
            echo "</td>
        <td>";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "idgroup", [], "any", false, false, false, 18), "html", null, true);
            echo "</td>
        <td><a href=\"mailto:";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "email", [], "any", false, false, false, 19), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "email", [], "any", false, false, false, 19), "html", null, true);
            echo "</a></td>
        <td><a href=\"results/";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "idstudent", [], "any", false, false, false, 20), "html", null, true);
            echo "\">results</a></td>
    </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['student'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "</table>
<p>Format of csv-file: ovnummer;first_name;prefix;last_name;email;idgroup</p>
<form action=\"/students/import\" method=\"post\" enctype=\"multipart/form-data\">
    ";
        // line 26
        echo twig_get_attribute($this->env, $this->source, ($context["csrf"] ?? null), "field", [], "any", false, false, false, 26);
        echo "
    Select csv file:
    <input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\">
    <input type=\"submit\" value=\"Upload Image\" name=\"submit\">

</form>
";
    }

    public function getTemplateName()
    {
        return "students.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 26,  115 => 23,  106 => 20,  100 => 19,  96 => 18,  92 => 17,  88 => 16,  85 => 15,  81 => 14,  76 => 11,  63 => 9,  59 => 8,  54 => 6,  50 => 4,  46 => 3,  35 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("
{% extends \"layout.html\" %}
{% block content %}
<h1>Students</h1>
<form id=\"groupform\" action=\"/students\" method=\"post\" onchange=\"this.submit()\">
    {{ csrf.field | raw }}
    <select name=\"idgroup\">
        {% for group in groups %}
        <option {% if selected_group == group.idgroup %}selected{% endif %}>{{ group.idgroup }}</option>
        {% endfor %}
    </select>
</form>
<table>
    {% for student in students %}
    <tr>
        <td>{{ student.idstudent }}</td>
        <td> {{ student.fullName() }}</td>
        <td>{{ student.idgroup }}</td>
        <td><a href=\"mailto:{{ student.email }}\">{{ student.email }}</a></td>
        <td><a href=\"results/{{ student.idstudent }}\">results</a></td>
    </tr>
    {% endfor %}
</table>
<p>Format of csv-file: ovnummer;first_name;prefix;last_name;email;idgroup</p>
<form action=\"/students/import\" method=\"post\" enctype=\"multipart/form-data\">
    {{ csrf.field | raw }}
    Select csv file:
    <input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\">
    <input type=\"submit\" value=\"Upload Image\" name=\"submit\">

</form>
{% endblock %}", "students.html", "/Users/janjaap/git/studentresults/templates/students.html");
    }
}
