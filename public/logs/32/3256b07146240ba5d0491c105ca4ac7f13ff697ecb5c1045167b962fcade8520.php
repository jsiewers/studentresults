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

/* results_exam.html */
class __TwigTemplate_95a86a5164406523f6912cfe4f3f61b510700279eb2aaaf8e2a5e380598c7e6c extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "results_exam.html", 1);
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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["results"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["result"]) {
            // line 4
            echo "<h3>Aanwezigheid en resultaten Examen / Proces verbaal</h3>
<table style=\"width:100%;\">
    <tr>
        <td>Examencode</td>
        <td>";
            // line 8
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, $context["result"]), "examcode", []), "html", null, true);
            echo "</td>
    </tr>
    <tr>
        <td>Examennaam</td>
        <td>";
            // line 12
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, $context["result"]), "exam_description", []), "html", null, true);
            echo "</td>
    </tr>
     <tr>
        <td>Crebo</td>
        <td>25187</td>
    </tr>
    <tr>
        <td>Datum</td>
        <td>";
            // line 20
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, $context["result"]), "exam_date", []), "d-m-Y"), "html", null, true);
            echo "</td>
    </tr>
</table>

<table style=\"width:100%;\">
    <tr>
        <td>Studentnummer</td>
        <td>Naam</td>
        <td>Groep</td>
        <td>Opleidingscode</td>
        <!--<td>Aanwezig</td>-->
        <td>1e poging</td>
        <td>2e poging</td>
        <td>3e poging</td>

        <!--<td>O/V/G</td>-->
    </tr>
    ";
            // line 37
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["result"]);
            foreach ($context['_seq'] as $context["_key"] => $context["student"]) {
                // line 38
                echo "     <tr>
         <td>";
                // line 39
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "student_idstudent", []), "html", null, true);
                echo "</td>
         <td>";
                // line 40
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "fullname", []), "html", null, true);
                echo "</td>
         <td>";
                // line 41
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "idgroup", []), "html", null, true);
                echo "</td>
         <td>25187</td>
         <!--<td></td>-->
         <td>";
                // line 44
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["student"], "attempt", []), "count", []) == 1)) {
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "grade", []), "html", null, true);
                    echo " (";
                    if ((twig_get_attribute($this->env, $this->source, $context["student"], "grade", []) >= 8)) {
                        echo " G ";
                    } elseif ((twig_get_attribute($this->env, $this->source, $context["student"], "grade", []) >= 5.5)) {
                        echo " V ";
                    } else {
                        echo " O ";
                    }
                    echo ")";
                }
                echo "</td>
         <td>";
                // line 45
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["student"], "attempt", []), "count", []) == 2)) {
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "grade", []), "html", null, true);
                    echo " (";
                    if ((twig_get_attribute($this->env, $this->source, $context["student"], "grade", []) >= 8)) {
                        echo " G ";
                    } elseif ((twig_get_attribute($this->env, $this->source, $context["student"], "grade", []) >= 5.5)) {
                        echo " V ";
                    } else {
                        echo " O ";
                    }
                    echo ")";
                }
                echo "</td>
         <td>";
                // line 46
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["student"], "attempt", []), "count", []) == 3)) {
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "grade", []), "html", null, true);
                    echo " (";
                    if ((twig_get_attribute($this->env, $this->source, $context["student"], "grade", []) >= 8)) {
                        echo " G ";
                    } elseif ((twig_get_attribute($this->env, $this->source, $context["student"], "grade", []) >= 5.5)) {
                        echo " V ";
                    } else {
                        echo " O ";
                    }
                    echo ")";
                }
                echo "</td>
         <!--<td>";
                // line 47
                if ((twig_get_attribute($this->env, $this->source, $context["student"], "grade", []) >= 8)) {
                    echo " G ";
                } elseif ((twig_get_attribute($this->env, $this->source, $context["student"], "grade", []) >= 5.5)) {
                    echo " V ";
                } else {
                    echo " O ";
                }
                echo "</td>-->
    </tr>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['student'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 50
            echo "</table>
Opmerkingen n.a.v. examensessie
<table style=\"width:100%;\">
    <tr>
        <td><p style=\"padding:20px;\"></p></td>
    </tr>
</table>
<p>Naam surveillanten Piet de Vries, Jan Jaap Siewers</p>
<p>Paraaf surveillanten:</p> <!--<img class=\"handtekening_klein\" src=\"";
            // line 58
            echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
            echo "/assets/img/handtekening_jan_jaap.png\"><img class=\"handtekening_klein\"  src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
            echo "/assets/img/handtekening_piet.png\"></p>-->

Opmerkingen n.a.v. correctie
<table style=\"width:100%;\">
    <tr>
        <td><p style=\"padding:20px;\"></p></td>
    </tr>
</table>
<p>Datum:";
            // line 66
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, $context["result"]), "exam_date", []), "d-m-Y"), "html", null, true);
            echo "</p>
<p>Naam correctoren Piet de Vries, Jan Jaap Siewers</p>
<p>Paraaf corrector</p> <!--<img class=\"handtekening_klein\" src=\"";
            // line 68
            echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
            echo "/assets/img/handtekening_jan_jaap.png\"><img class=\"handtekening_klein\"  src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
            echo "/assets/img/handtekening_piet.png\"></p>-->

<table style=\"width:100%;\">
    <tr>
        <td>Vastgesteld door TEC</td>
        <td>
            <p>Datum ....................</p>
            <p>Naam  ....................</p>
        </td>
        <td>Invoer in Eduarte</td>
        <td>
            <p>Datum ....................</p>
            <p>Naam  ....................</p>
        </td>
    </tr>
</table>
</table>

<p class=\"pagebreak\" p>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['result'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "results_exam.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  204 => 68,  199 => 66,  186 => 58,  176 => 50,  161 => 47,  146 => 46,  131 => 45,  116 => 44,  110 => 41,  106 => 40,  102 => 39,  99 => 38,  95 => 37,  75 => 20,  64 => 12,  57 => 8,  51 => 4,  47 => 3,  44 => 2,  27 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layout.html\" %}
{% block content %}
{% for result in results %}
<h3>Aanwezigheid en resultaten Examen / Proces verbaal</h3>
<table style=\"width:100%;\">
    <tr>
        <td>Examencode</td>
        <td>{{ result | first.examcode }}</td>
    </tr>
    <tr>
        <td>Examennaam</td>
        <td>{{ result | first.exam_description }}</td>
    </tr>
     <tr>
        <td>Crebo</td>
        <td>25187</td>
    </tr>
    <tr>
        <td>Datum</td>
        <td>{{ result | first.exam_date | date('d-m-Y') }}</td>
    </tr>
</table>

<table style=\"width:100%;\">
    <tr>
        <td>Studentnummer</td>
        <td>Naam</td>
        <td>Groep</td>
        <td>Opleidingscode</td>
        <!--<td>Aanwezig</td>-->
        <td>1e poging</td>
        <td>2e poging</td>
        <td>3e poging</td>

        <!--<td>O/V/G</td>-->
    </tr>
    {% for student in result %}
     <tr>
         <td>{{ student.student_idstudent }}</td>
         <td>{{ student.fullname }}</td>
         <td>{{ student.idgroup }}</td>
         <td>25187</td>
         <!--<td></td>-->
         <td>{% if student.attempt.count == 1 %}{{ student.grade }} ({%if student.grade >= 8 %} G {% elseif student.grade >= 5.5 %} V {% else %} O {% endif %}){% endif %}</td>
         <td>{% if student.attempt.count == 2 %}{{ student.grade }} ({%if student.grade >= 8 %} G {% elseif student.grade >= 5.5 %} V {% else %} O {% endif %}){% endif %}</td>
         <td>{% if student.attempt.count == 3 %}{{ student.grade }} ({%if student.grade >= 8 %} G {% elseif student.grade >= 5.5 %} V {% else %} O {% endif %}){% endif %}</td>
         <!--<td>{%if student.grade >= 8 %} G {% elseif student.grade >= 5.5 %} V {% else %} O {% endif %}</td>-->
    </tr>
    {% endfor %}
</table>
Opmerkingen n.a.v. examensessie
<table style=\"width:100%;\">
    <tr>
        <td><p style=\"padding:20px;\"></p></td>
    </tr>
</table>
<p>Naam surveillanten Piet de Vries, Jan Jaap Siewers</p>
<p>Paraaf surveillanten:</p> <!--<img class=\"handtekening_klein\" src=\"{{ base_url() }}/assets/img/handtekening_jan_jaap.png\"><img class=\"handtekening_klein\"  src=\"{{ base_url() }}/assets/img/handtekening_piet.png\"></p>-->

Opmerkingen n.a.v. correctie
<table style=\"width:100%;\">
    <tr>
        <td><p style=\"padding:20px;\"></p></td>
    </tr>
</table>
<p>Datum:{{ result | first.exam_date | date('d-m-Y') }}</p>
<p>Naam correctoren Piet de Vries, Jan Jaap Siewers</p>
<p>Paraaf corrector</p> <!--<img class=\"handtekening_klein\" src=\"{{ base_url() }}/assets/img/handtekening_jan_jaap.png\"><img class=\"handtekening_klein\"  src=\"{{ base_url() }}/assets/img/handtekening_piet.png\"></p>-->

<table style=\"width:100%;\">
    <tr>
        <td>Vastgesteld door TEC</td>
        <td>
            <p>Datum ....................</p>
            <p>Naam  ....................</p>
        </td>
        <td>Invoer in Eduarte</td>
        <td>
            <p>Datum ....................</p>
            <p>Naam  ....................</p>
        </td>
    </tr>
</table>
</table>

<p class=\"pagebreak\" p>
    {% endfor %}
{% endblock %}", "results_exam.html", "/Users/janjaap/PhpstormProjects/studentresults/templates/results_exam.html");
    }
}
