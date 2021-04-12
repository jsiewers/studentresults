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
class __TwigTemplate_f907c09d07eab61b15c64f436315cefc9060962ac30882e46ecd09dfe2f0489f extends Template
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
        return "layoutv2.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layoutv2.html", "results.html", 2);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<title>";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["student"] ?? null), "idstudent", [], "any", false, false, false, 4), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["student"] ?? null), "fullName", [], "method", false, false, false, 4), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["student"] ?? null), "idgroup", [], "any", false, false, false, 4), "html", null, true);
        echo "</title>

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
    <div id=\"content\">
<h1 class=\"noprint\">Results</h1>
<h3>";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["student"] ?? null), "idstudent", [], "any", false, false, false, 19), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["student"] ?? null), "fullName", [], "method", false, false, false, 19), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["student"] ?? null), "idgroup", [], "any", false, false, false, 19), "html", null, true);
        echo "</h3>
<p class=\"noprint\">Beschikbare examens</p>
<table class=\"noprint\">
    ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["exams"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["exam"]) {
            // line 23
            echo "    <tr>
        <td>";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["exam"], "examcode", [], "any", false, false, false, 24), "html", null, true);
            echo "</td>
        <td>";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["exam"], "description", [], "any", false, false, false, 25), "html", null, true);
            echo "</td>
        <td><a href=\"/attempt/";
            // line 26
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["student"] ?? null), "idstudent", [], "any", false, false, false, 26), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["exam"], "idexam", [], "any", false, false, false, 26), "html", null, true);
            echo "\">New Attempt</a></td>
    </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['exam'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "</table>
<p>Tot nu toe behaalde resultaten</p>
<table>
    ";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["examresults"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["result"]) {
            // line 33
            echo "    <tr>
        <td>";
            // line 34
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "</td>
        <td>";
            // line 35
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["result"], "description", [], "any", false, false, false, 35), "html", null, true);
            echo "</td>
        ";
            // line 36
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["result"], "attempt", [], "any", false, false, false, 36));
            foreach ($context['_seq'] as $context["date"] => $context["attempt"]) {
                // line 37
                echo "        <td><a href=\"/result/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["student"] ?? null), "idstudent", [], "any", false, false, false, 37), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $context["date"], "html", null, true);
                echo "/detail\">";
                echo twig_escape_filter($this->env, $context["date"], "html", null, true);
                echo "</a></td>
        <td><a href=\"/newresult/";
                // line 38
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["student"] ?? null), "idstudent", [], "any", false, false, false, 38), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $context["date"], "html", null, true);
                echo "\">V2</a></td>
        <td><b>";
                // line 39
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["attempt"], "grade", [], "any", false, false, false, 39), "html", null, true);
                echo "</b></td>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['date'], $context['attempt'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            echo "    </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['result'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "</table>
<a class=\"noprint\" href=\"/all_newresults/";
        // line 44
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["student"] ?? null), "idstudent", [], "any", false, false, false, 44), "html", null, true);
        echo "\">Alle resultaten voor deze student</a>
<a class=\"noprint\" href=\"/nomination/";
        // line 45
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["student"] ?? null), "idstudent", [], "any", false, false, false, 45), "html", null, true);
        echo "\">Voordrachtformulier</a>
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
        return array (  174 => 45,  170 => 44,  167 => 43,  160 => 41,  152 => 39,  144 => 38,  133 => 37,  129 => 36,  125 => 35,  121 => 34,  118 => 33,  114 => 32,  109 => 29,  98 => 26,  94 => 25,  90 => 24,  87 => 23,  83 => 22,  73 => 19,  50 => 4,  46 => 3,  35 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("
{% extends \"layoutv2.html\" %}
{% block content %}
<title>{{ student.idstudent }}-{{ student.fullName() }}-{{ student.idgroup }}</title>

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
    <div id=\"content\">
<h1 class=\"noprint\">Results</h1>
<h3>{{ student.idstudent }} {{ student.fullName() }} {{ student.idgroup }}</h3>
<p class=\"noprint\">Beschikbare examens</p>
<table class=\"noprint\">
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
        <td><a href=\"/result/{{ student.idstudent }}/{{ key }}/{{ date }}/detail\">{{ date }}</a></td>
        <td><a href=\"/newresult/{{ student.idstudent }}/{{ key }}/{{ date }}\">V2</a></td>
        <td><b>{{ attempt.grade }}</b></td>
        {% endfor %}
    </tr>
    {% endfor %}
</table>
<a class=\"noprint\" href=\"/all_newresults/{{student.idstudent}}\">Alle resultaten voor deze student</a>
<a class=\"noprint\" href=\"/nomination/{{student.idstudent}}\">Voordrachtformulier</a>
{% endblock %}", "results.html", "/Users/janjaap/git/studentresults/templates/results.html");
    }
}
