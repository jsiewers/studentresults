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
class __TwigTemplate_e6c209fb9632f1f97e9d6173e59dfbfac7d0bc1e2e23eef212a1e6ebac8d27b8 extends \Twig\Template
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
        // line 2
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("layout.html", "students.html", 2);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        // line 4
        echo "<h1>Students</h1>
<form id=\"groupform\" action=\"/students\" method=\"post\" onchange=\"this.submit()\">
";
        // line 6
        echo twig_get_attribute($this->env, $this->source, ($context["csrf"] ?? null), "field", []);
        echo "
    <select name=\"idgroup\">
";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 9
            echo "        <option";
            if ((($context["selected_group"] ?? null) == twig_get_attribute($this->env, $this->source, $context["group"], "idgroup", []))) {
                echo "selected";
            }
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["group"], "idgroup", []), "html", null, true);
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
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "idstudent", []), "html", null, true);
            echo "</td>
        <td>";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "fullName", [], "method"), "html", null, true);
            echo "</td>
        <td>";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "idgroup", []), "html", null, true);
            echo "</td>
        <td><a href=\"mailto:";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "email", []), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "email", []), "html", null, true);
            echo "</a></td>
        <td><a href=\"results/";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "idstudent", []), "html", null, true);
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
        echo twig_get_attribute($this->env, $this->source, ($context["csrf"] ?? null), "field", []);
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
        return array (  117 => 26,  112 => 23,  103 => 20,  97 => 19,  93 => 18,  89 => 17,  85 => 16,  82 => 15,  78 => 14,  73 => 11,  60 => 9,  56 => 8,  51 => 6,  47 => 4,  44 => 3,  34 => 2,);
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
        <option {% if selected_group == group.idgroup%}selected{% endif %}>{{ group.idgroup }}</option>
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
