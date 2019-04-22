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

/* new_exam.html */
class __TwigTemplate_37a69be7d5ece2e94420f078652aee75b7211766d8c83b986014411b4d22e7d4 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "new_exam.html", 1);
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

    // line 2
    public function block_content($context, array $blocks = [])
    {
        // line 3
        echo "<h1>New Exam</h1>
<form action=\"/exam/new\" method=\"post\">
    ";
        // line 5
        echo twig_get_attribute($this->env, $this->source, ($context["csrf"] ?? null), "field", []);
        echo "
    <label for=\"idexam\">Exam Id</label>
    <input type=\"text\" id=\"idexam\" name=\"idexam\">
    <label for=\"examcode\">Examcode</label>
    <input type=\"text\" id=\"examcode\" name=\"examcode\">
    <label for=\"description\">Description</label>
    <input type=\"text\" id=\"description\" name=\"description\">
    <label for=\"description\">Caesura</label>
    <input type=\"text\" id=\"caesura\" name=\"caesura\"><br>
    (kommagescheiden cijfer per punt bijv. 1,0 1,2 1,4 1,6 etc.)<br>

    <input type=\"submit\" name=\"submit\">
</form>
<table>
    ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["new_exams"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
            // line 20
            echo "    <tr>
        <td><a href=\"/proces/";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["e"], "idexam", []), "html", null, true);
            echo "/new\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["e"], "description", []), "html", null, true);
            echo "</a></td>
    </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "</table>

<h1>Results</h1>

<table>
";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["exams"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["exam"]) {
            // line 30
            echo "<tr>
    <td>";
            // line 31
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "</td>
    <td><a href=\"/proces/";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["exam"], "examid", []), "html", null, true);
            echo "/new\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["exam"], "description", []), "html", null, true);
            echo "</a></td><td><a href=\"/results/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["exam"], "examid", []), "html", null, true);
            echo "/all\">All</a></td>
    ";
            // line 33
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["exam"], "dates", []));
            foreach ($context['_seq'] as $context["_key"] => $context["date"]) {
                // line 34
                echo "    ";
                $context["counter"] = (((isset($context["counter"]) || array_key_exists("counter", $context))) ? (_twig_default_filter(($context["counter"] ?? null), 0)) : (0));
                // line 35
                echo "    ";
                if ((($context["counter"] ?? null) == 8)) {
                    echo "</tr><tr><td colspan=\"2\"></td>";
                    $context["counter"] = 0;
                }
                // line 36
                echo "    ";
                $context["counter"] = (($context["counter"] ?? null) + 1);
                // line 37
                echo "
    <p></p>
    <td><a href=\"/result/";
                // line 39
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["exam"], "examid", []), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $context["date"], "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $context["date"], "d-m-Y"), "html", null, true);
                echo "</a></td>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['date'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            echo "
</tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['exam'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        echo "</table>

";
    }

    public function getTemplateName()
    {
        return "new_exam.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  152 => 44,  144 => 41,  132 => 39,  128 => 37,  125 => 36,  119 => 35,  116 => 34,  112 => 33,  104 => 32,  100 => 31,  97 => 30,  93 => 29,  86 => 24,  75 => 21,  72 => 20,  68 => 19,  51 => 5,  47 => 3,  44 => 2,  27 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layout.html\" %}
{% block content %}
<h1>New Exam</h1>
<form action=\"/exam/new\" method=\"post\">
    {{ csrf.field | raw }}
    <label for=\"idexam\">Exam Id</label>
    <input type=\"text\" id=\"idexam\" name=\"idexam\">
    <label for=\"examcode\">Examcode</label>
    <input type=\"text\" id=\"examcode\" name=\"examcode\">
    <label for=\"description\">Description</label>
    <input type=\"text\" id=\"description\" name=\"description\">
    <label for=\"description\">Caesura</label>
    <input type=\"text\" id=\"caesura\" name=\"caesura\"><br>
    (kommagescheiden cijfer per punt bijv. 1,0 1,2 1,4 1,6 etc.)<br>

    <input type=\"submit\" name=\"submit\">
</form>
<table>
    {% for e in new_exams %}
    <tr>
        <td><a href=\"/proces/{{ e.idexam }}/new\">{{ e.description }}</a></td>
    </tr>
    {% endfor %}
</table>

<h1>Results</h1>

<table>
{% for key, exam in exams %}
<tr>
    <td>{{ key }}</td>
    <td><a href=\"/proces/{{ exam.examid }}/new\">{{ exam.description }}</a></td><td><a href=\"/results/{{ exam.examid }}/all\">All</a></td>
    {% for date in exam.dates %}
    {% set counter = (counter | default(0) ) %}
    {% if counter == 8 %}</tr><tr><td colspan=\"2\"></td>{% set counter = 0 %}{% endif %}
    {% set counter = counter + 1 %}

    <p></p>
    <td><a href=\"/result/{{ exam.examid }}/{{ date }}\">{{ date | date('d-m-Y') }}</a></td>
    {% endfor %}

</tr>
{% endfor %}
</table>

{% endblock %}", "new_exam.html", "/Users/janjaap/PhpstormProjects/studentresults/templates/new_exam.html");
    }
}
