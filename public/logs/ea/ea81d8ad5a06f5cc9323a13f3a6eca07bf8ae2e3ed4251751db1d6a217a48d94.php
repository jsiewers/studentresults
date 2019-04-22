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

/* results.html */
class __TwigTemplate_acb6d826ffb08c04c60ee958815050ac099b4434e74032d4f16c2fc8b3117308 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 2
        $this->parent = $this->loadTemplate("layout.html", "results.html", 2);
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
        echo "<h1>Results</h1>
<h3>";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["student"] ?? null), "fullName", [], "method"), "html", null, true);
        echo "</h3>
<p>Beschikbare examens</p>
<table>
    ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["exams"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["exam"]) {
            // line 9
            echo "    <tr>
        <td>";
            // line 10
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["exam"], "examcode", []), "html", null, true);
            echo "</td>
        <td>";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["exam"], "description", []), "html", null, true);
            echo "</td>
        <td><a href=\"/attempt/";
            // line 12
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["student"] ?? null), "idstudent", []), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["exam"], "idexam", []), "html", null, true);
            echo "\">New Attempt</a></td>
    </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['exam'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "</table>
<p>Tot nu toe behaalde resultaten</p>
<table>
    ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["examresults"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["result"]) {
            // line 19
            echo "    <tr>
        <td>";
            // line 20
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "</td>
        <td>";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["result"], "description", []), "html", null, true);
            echo "</td>
        ";
            // line 22
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["result"], "attempt", []));
            foreach ($context['_seq'] as $context["date"] => $context["attempt"]) {
                // line 23
                echo "        <td>";
                echo twig_escape_filter($this->env, $context["date"], "html", null, true);
                echo "</td>
        <td><b>";
                // line 24
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["attempt"], "grade", []), "html", null, true);
                echo "</b></td>
        <td><a href=\"/result/";
                // line 25
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["student"] ?? null), "idstudent", []), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $context["date"], "html", null, true);
                echo "/detail\">v1</a></td>
        <td><a href=\"/result/";
                // line 26
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["student"] ?? null), "idstudent", []), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $context["date"], "html", null, true);
                echo "/proces\">v2</a></td>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['date'], $context['attempt'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 28
            echo "    </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['result'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "</table>
<a href=\"/studentresults/";
        // line 31
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["student"] ?? null), "idstudent", []), "html", null, true);
        echo "/all\">Alle resultaten voor deze student</a>
";
    }

    public function getTemplateName()
    {
        return "results.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 31,  142 => 30,  135 => 28,  123 => 26,  115 => 25,  111 => 24,  106 => 23,  102 => 22,  98 => 21,  94 => 20,  91 => 19,  87 => 18,  82 => 15,  71 => 12,  67 => 11,  63 => 10,  60 => 9,  56 => 8,  50 => 5,  47 => 4,  44 => 3,  27 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("
{% extends \"layout.html\" %}
{% block content %}
<h1>Results</h1>
<h3>{{ student.fullName() }}</h3>
<p>Beschikbare examens</p>
<table>
    {% for exam in exams %}
    <tr>
        <td>{{ exam.examcode }}</td>
        <td>{{ exam.description }}</td>
        <td><a href=\"/attempt/{{ student.idstudent }}/{{ exam.idexam }}\">New Attempt</a></td>
    </tr>
    {% endfor %}
</table>
<p>Tot nu toe behaalde resultaten</p>
<table>
    {% for key, result in examresults %}
    <tr>
        <td>{{ key }}</td>
        <td>{{ result.description }}</td>
        {% for date, attempt in result.attempt%}
        <td>{{ date }}</td>
        <td><b>{{ attempt.grade }}</b></td>
        <td><a href=\"/result/{{ student.idstudent }}/{{ key }}/{{ date }}/detail\">v1</a></td>
        <td><a href=\"/result/{{ student.idstudent }}/{{ key }}/{{ date }}/proces\">v2</a></td>
        {% endfor %}
    </tr>
    {% endfor %}
</table>
<a href=\"/studentresults/{{student.idstudent}}/all\">Alle resultaten voor deze student</a>
{% endblock %}", "results.html", "/Users/janjaap/PhpstormProjects/studentresults/templates/results.html");
    }
}
