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
class __TwigTemplate_44c3271f369d81e103c2a1b8310e79943631a435e2669e71caf6b5e994925b69 extends Template
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
        $this->parent = $this->loadTemplate("layout.html", "new_exam.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "<h1>New Exam</h1>
<form action=\"/exam/new\" method=\"post\">
    ";
        // line 5
        echo twig_get_attribute($this->env, $this->source, ($context["csrf"] ?? null), "field", [], "any", false, false, false, 5);
        echo "
    <label for=\"idexam\">Exam Id</label>
    <input type=\"text\" id=\"idexam\" name=\"idexam\">
    <label for=\"examcode\">Examcode</label>
    <input type=\"text\" id=\"examcode\" name=\"examcode\">
    <label for=\"description\">Description</label>
    <input type=\"text\" id=\"description\" name=\"description\">
    <label for=\"soort\">Type</label>
    <select name=\"soort\" id=\"soort\">
        <option>beroepsexamen</option>
        <option>keuzedeel</option>
        <option>generiek</option>
        <option>bpv</option>
        <option>anders</option>
    </select>
    <label for=\"description\">Caesura</label>
    <input type=\"text\" id=\"caesura\" name=\"caesura\"><br>
    (kommagescheiden cijfer per punt bijv. 1,0 1,2 1,4 1,6 etc.)<br>

    <input type=\"submit\" name=\"submit\">
</form>
<table>
    ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["new_exams"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
            // line 28
            echo "    <tr>
        <td><a href=\"/proces/";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["e"], "idexam", [], "any", false, false, false, 29), "html", null, true);
            echo "/new\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["e"], "description", [], "any", false, false, false, 29), "html", null, true);
            echo "</a></td>
    </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "</table>

<h1>Results</h1>

<table>
";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["exams"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["exam"]) {
            // line 38
            echo "<tr>
    <td>";
            // line 39
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "</td>
    <td><a href=\"/proces/";
            // line 40
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["exam"], "examid", [], "any", false, false, false, 40), "html", null, true);
            echo "/new\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["exam"], "description", [], "any", false, false, false, 40), "html", null, true);
            echo "</a></td><td><a href=\"/results/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["exam"], "examid", [], "any", false, false, false, 40), "html", null, true);
            echo "/all\">All</a></td>
    ";
            // line 41
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["exam"], "dates", [], "any", false, false, false, 41));
            foreach ($context['_seq'] as $context["_key"] => $context["date"]) {
                // line 42
                echo "    ";
                $context["counter"] = ((array_key_exists("counter", $context)) ? (_twig_default_filter(($context["counter"] ?? null), 0)) : (0));
                // line 43
                echo "    ";
                if ((($context["counter"] ?? null) == 8)) {
                    echo "</tr><tr><td colspan=\"2\"></td>";
                    $context["counter"] = 0;
                }
                // line 44
                echo "    ";
                $context["counter"] = (($context["counter"] ?? null) + 1);
                // line 45
                echo "
    <p></p>
    <td><a href=\"/result/";
                // line 47
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["exam"], "examid", [], "any", false, false, false, 47), "html", null, true);
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
            // line 49
            echo "
</tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['exam'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
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
        return array (  163 => 52,  155 => 49,  143 => 47,  139 => 45,  136 => 44,  130 => 43,  127 => 42,  123 => 41,  115 => 40,  111 => 39,  108 => 38,  104 => 37,  97 => 32,  86 => 29,  83 => 28,  79 => 27,  54 => 5,  50 => 3,  46 => 2,  35 => 1,);
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
    <label for=\"soort\">Type</label>
    <select name=\"soort\" id=\"soort\">
        <option>beroepsexamen</option>
        <option>keuzedeel</option>
        <option>generiek</option>
        <option>bpv</option>
        <option>anders</option>
    </select>
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

{% endblock %}", "new_exam.html", "/Users/janjaap/git/studentresults/templates/new_exam.html");
    }
}
