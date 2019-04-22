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

/* result_detail.html */
class __TwigTemplate_5e77f4f1419e0abedde430b863858f22ae60cc3dcde9614f1fd37917da2e7dd7 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "result_detail.html", 1);
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
        echo "
<a class=\"hide\" style=\"float:right;color:red;margin-bottom:10px;\"href=\"/result/";
        // line 4
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["student"] ?? null), "idstudent", []), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["result"] ?? null), "idexam", []), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["result"] ?? null), "exam_date", []), "html", null, true);
        echo "/detail/delete\"><b>!!! DELETE !!!</b></a>
<table style=\"width:100%;\">
    <tr>
        <td colspan=\"6\"><b>";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["exam"] ?? null), "description", []), "html", null, true);
        echo "</b></td>
    </tr>
    <tr>
        <td>Naam student:</td>
        <td>";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["student"] ?? null), "fullName", [], "method"), "html", null, true);
        echo "</td>
        <td>Studentnummer:</td>
        <td>";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["student"] ?? null), "idstudent", []), "html", null, true);
        echo "</td>
        <td>Groep:</td>
        <td>";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["student"] ?? null), "idgroup", []), "html", null, true);
        echo "</td>
    </tr>
    <tr>
        <td>Plaats:</td>
        <td colspan=\"3\">Almere</td>
        <td>Datum:</td>
        <td>";
        // line 21
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["result"] ?? null), "exam_date", []), "d/m/Y"), "html", null, true);
        echo "</td>
    </tr>
    <tr>
        <td>Beoordelaar 1:</td>
        <td>Jan Jaap Siewers</td>
        <td>Beoordelaar 2:</td>
        <td>Piet de Vries</td>
    </tr>
</table>

";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["results"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["proces"]) {
            // line 32
            echo "<table style=\"width:100%;\">
    <tr>
        <td colspan=\"2\"><b>";
            // line 34
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["proces"], "description", []), "html", null, true);
            echo "</b></td>
    </tr>
    ";
            // line 36
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["proces"], "assignments", []));
            foreach ($context['_seq'] as $context["_key"] => $context["assignment"]) {
                // line 37
                echo "    <tr>
        <td colspan=\"2\"> <i>";
                // line 38
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["assignment"], "description", []), "html", null, true);
                echo "</i></td>
    </tr>
    <tr>
        <td style=\"vertical-align: top; width:95%; padding-left:20px;\">";
                // line 41
                echo nl2br(twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["assignment"], "aspect_description", []), "html", null, true));
                echo "</td>
        <td style=\"vertical-align: top; width:5%; text-align:right;\">";
                // line 42
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["assignment"], "aspect_score", []), "html", null, true);
                echo "</td>
    </tr>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['assignment'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 45
            echo "    <tr>
        <td style=\"text-align: right;\">
            Score voor dit proces:
        </td>
        <td style=\"text-align: right;\">
            ";
            // line 50
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["proces"], "proces_score", []), "html", null, true);
            echo "
        </td>
    </tr>
    ";
            // line 53
            $context["counter"] = (((isset($context["counter"]) || array_key_exists("counter", $context))) ? (_twig_default_filter(($context["counter"] ?? null), 0)) : (0));
            // line 54
            echo "    ";
            if ((($context["counter"] ?? null) == 3)) {
                echo "<p class=\"pagebreak\"></p>";
                $context["counter"] = 0;
            }
            // line 55
            echo "    ";
            $context["counter"] = (($context["counter"] ?? null) + 1);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['proces'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "    <tr>
        <td style=\"text-align:right;\">
            Totaal score examen:
        </td>
        <td style=\"text-align:right;\">
            ";
        // line 62
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["result"] ?? null), "exam_score", []), "html", null, true);
        echo "
        </td>
    </tr>
</table>
<table style=\"width:100%;\">
    <tr>
        <td style=\"text-align:right;width:80%;\">
            Eindbeoordeling:
        </td>
        <td style=\"text-align:center; font-size:2em\">
            <b>";
        // line 72
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["result"] ?? null), "exam_grade", []), "html", null, true);
        echo " (";
        if ((twig_get_attribute($this->env, $this->source, ($context["result"] ?? null), "exam_grade", []) >= 8)) {
            echo "G";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["result"] ?? null), "exam_grade", []) >= 5.5)) {
            echo "V";
        } else {
            echo "O";
        }
        echo ")</b>
        </td>
</table>
<table class=\"noborder\" style=\"width:70%;\">
    <tr>
        <td>Handtekening beoordelaar 1</td>
        <td>Handtekening beoordelaar 2</td>
    </tr>
    <tr>
        <td>
            <!--<img class=\"handtekening\" src=\"";
        // line 82
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/assets/img/handtekening_jan_jaap.png\">-->
        </td>
        <td>
            <!--<img class=\"handtekening\"  src=\"";
        // line 85
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/assets/img/handtekening_piet.png\">-->
        </td>
    </tr>
    <tr>
        <td>
            Jan Jaap Siewers
        </td>
        <td>
            Piet de Vries
        </td>
    </tr>
</table>
<p class=\"pagebreak\"></p>
";
    }

    public function getTemplateName()
    {
        return "result_detail.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  213 => 85,  207 => 82,  186 => 72,  173 => 62,  166 => 57,  159 => 55,  153 => 54,  151 => 53,  145 => 50,  138 => 45,  129 => 42,  125 => 41,  119 => 38,  116 => 37,  112 => 36,  107 => 34,  103 => 32,  99 => 31,  86 => 21,  77 => 15,  72 => 13,  67 => 11,  60 => 7,  50 => 4,  47 => 3,  44 => 2,  27 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layout.html\" %}
{% block content %}

<a class=\"hide\" style=\"float:right;color:red;margin-bottom:10px;\"href=\"/result/{{ student.idstudent }}/{{result.idexam}}/{{ result.exam_date }}/detail/delete\"><b>!!! DELETE !!!</b></a>
<table style=\"width:100%;\">
    <tr>
        <td colspan=\"6\"><b>{{ exam.description }}</b></td>
    </tr>
    <tr>
        <td>Naam student:</td>
        <td>{{ student.fullName() }}</td>
        <td>Studentnummer:</td>
        <td>{{ student.idstudent }}</td>
        <td>Groep:</td>
        <td>{{ student.idgroup }}</td>
    </tr>
    <tr>
        <td>Plaats:</td>
        <td colspan=\"3\">Almere</td>
        <td>Datum:</td>
        <td>{{ result.exam_date |date(\"d/m/Y\") }}</td>
    </tr>
    <tr>
        <td>Beoordelaar 1:</td>
        <td>Jan Jaap Siewers</td>
        <td>Beoordelaar 2:</td>
        <td>Piet de Vries</td>
    </tr>
</table>

{% for proces in results %}
<table style=\"width:100%;\">
    <tr>
        <td colspan=\"2\"><b>{{ proces.description }}</b></td>
    </tr>
    {% for assignment in proces.assignments %}
    <tr>
        <td colspan=\"2\"> <i>{{ assignment.description}}</i></td>
    </tr>
    <tr>
        <td style=\"vertical-align: top; width:95%; padding-left:20px;\">{{ assignment.aspect_description | nl2br }}</td>
        <td style=\"vertical-align: top; width:5%; text-align:right;\">{{ assignment.aspect_score }}</td>
    </tr>
    {% endfor %}
    <tr>
        <td style=\"text-align: right;\">
            Score voor dit proces:
        </td>
        <td style=\"text-align: right;\">
            {{proces.proces_score }}
        </td>
    </tr>
    {% set counter = (counter | default(0) ) %}
    {% if counter == 3 %}<p class=\"pagebreak\"></p>{% set counter = 0 %}{% endif %}
    {% set counter = counter + 1 %}
{% endfor %}
    <tr>
        <td style=\"text-align:right;\">
            Totaal score examen:
        </td>
        <td style=\"text-align:right;\">
            {{ result.exam_score }}
        </td>
    </tr>
</table>
<table style=\"width:100%;\">
    <tr>
        <td style=\"text-align:right;width:80%;\">
            Eindbeoordeling:
        </td>
        <td style=\"text-align:center; font-size:2em\">
            <b>{{ result.exam_grade }} ({% if result.exam_grade >= 8 %}G{% elseif result.exam_grade >= 5.5 %}V{% else %}O{% endif %})</b>
        </td>
</table>
<table class=\"noborder\" style=\"width:70%;\">
    <tr>
        <td>Handtekening beoordelaar 1</td>
        <td>Handtekening beoordelaar 2</td>
    </tr>
    <tr>
        <td>
            <!--<img class=\"handtekening\" src=\"{{ base_url() }}/assets/img/handtekening_jan_jaap.png\">-->
        </td>
        <td>
            <!--<img class=\"handtekening\"  src=\"{{ base_url() }}/assets/img/handtekening_piet.png\">-->
        </td>
    </tr>
    <tr>
        <td>
            Jan Jaap Siewers
        </td>
        <td>
            Piet de Vries
        </td>
    </tr>
</table>
<p class=\"pagebreak\"></p>
{% endblock %}", "result_detail.html", "/Users/janjaap/PhpstormProjects/studentresults/templates/result_detail.html");
    }
}
