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
class __TwigTemplate_851c91158e6f42f2f42c23898cc72368ec6f2ef084609c9cb8c5c23d6c1f9a0a extends Template
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
        return "layoutv2.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layoutv2.html", "results_exam.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "<title>";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, twig_first($this->env, ($context["results"] ?? null))), "examcode", [], "any", false, false, false, 3), "html", null, true);
        echo "-results</title>

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
        ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["results"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["result"]) {
            // line 18
            echo "        <h3>Aanwezigheid en resultaten Examen / Proces verbaal</h3>
        <table style=\"width:100%;\">
            <tr>
                <td>Examencode</td>
                <td>";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, $context["result"]), "examcode", [], "any", false, false, false, 22), "html", null, true);
            echo "</td>
            </tr>
            <tr>
                <td>Examennaam</td>
                <td>";
            // line 26
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, $context["result"]), "exam_description", [], "any", false, false, false, 26), "html", null, true);
            echo "</td>
            </tr>
            <tr>
                <td>Crebo</td>
                <td>25187</td>
            </tr>
            <tr>
                <td>Datum</td>
                <td>";
            // line 34
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, $context["result"]), "exam_date", [], "any", false, false, false, 34), "d-m-Y"), "html", null, true);
            echo "</td>
            </tr>
        </table>

        <table style=\"width:100%;\">
            <tr>
                <td>Studentnummer</td>
                <td>Naam</td>
                <td>Groep</td>
                <td>Cohort</td>
                <td>Opleidingscode</td>
                <!--<td>Aanwezig</td>-->
                <td>1e poging</td>
                <td>2e poging</td>
                <td>3e poging</td>

                <!--<td>O/V/G</td>-->
            </tr>
            ";
            // line 52
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["result"]);
            foreach ($context['_seq'] as $context["_key"] => $context["student"]) {
                // line 53
                echo "            <tr>
                <td>";
                // line 54
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "student_idstudent", [], "any", false, false, false, 54), "html", null, true);
                echo "</td>
                <td>";
                // line 55
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "fullname", [], "any", false, false, false, 55), "html", null, true);
                echo "</td>
                <td>";
                // line 56
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "idgroup", [], "any", false, false, false, 56), "html", null, true);
                echo "</td>
                <td>";
                // line 57
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "cohort", [], "any", false, false, false, 57), "html", null, true);
                echo "</td>
                <td>25187</td>
                <!--<td></td>-->
                <td style=\"text-align: right\">";
                // line 60
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["student"], "attempt", [], "any", false, false, false, 60), "count", [], "any", false, false, false, 60) == 1)) {
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "grade", [], "any", false, false, false, 60), "html", null, true);
                    echo " (";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "letter_grade", [], "any", false, false, false, 60), "html", null, true);
                    echo ")";
                }
                echo "</td>
                <td style=\"text-align: right\">";
                // line 61
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["student"], "attempt", [], "any", false, false, false, 61), "count", [], "any", false, false, false, 61) == 2)) {
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "grade", [], "any", false, false, false, 61), "html", null, true);
                    echo " (";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "letter_grade", [], "any", false, false, false, 61), "html", null, true);
                    echo ")";
                }
                echo "</td>
                <td style=\"text-align: right\">";
                // line 62
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["student"], "attempt", [], "any", false, false, false, 62), "count", [], "any", false, false, false, 62) == 3)) {
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "grade", [], "any", false, false, false, 62), "html", null, true);
                    echo " (";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "letter_grade", [], "any", false, false, false, 62), "html", null, true);
                    echo ")";
                }
                echo "</td>
                <!--<td>";
                // line 63
                if ((twig_get_attribute($this->env, $this->source, $context["student"], "grade", [], "any", false, false, false, 63) >= 8)) {
                    echo " G ";
                } elseif ((twig_get_attribute($this->env, $this->source, $context["student"], "grade", [], "any", false, false, false, 63) >= 5.5)) {
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
            // line 66
            echo "        </table>
        Opmerkingen n.a.v. examensessie
        <table style=\"width:100%;\">
            <tr>
                <td><p style=\"padding:20px;\"></p></td>
            </tr>
        </table>
        <p>Naam surveillanten: ";
            // line 73
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, $context["result"]), "assessor1_fullname", [], "any", false, false, false, 73), "html", null, true);
            echo ",  ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, $context["result"]), "assessor2_fullname", [], "any", false, false, false, 73), "html", null, true);
            echo "</p>
        <p>Paraaf surveillanten ...............................</p>
        <!--<img class=\"handtekening_klein\" src=\"";
            // line 75
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
        <p>Datum: ";
            // line 83
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_date_modify_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, $context["result"]), "exam_date", [], "any", false, false, false, 83), "+10 days"), "d-m-Y"), "html", null, true);
            echo "</p>
        <p>Naam correctoren: ";
            // line 84
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, $context["result"]), "assessor1_fullname", [], "any", false, false, false, 84), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, $context["result"]), "assessor2_fullname", [], "any", false, false, false, 84), "html", null, true);
            echo "</p>
        <p>Paraaf correctoren: ...............................</p>
        <!--<img class=\"handtekening_klein\" src=\"";
            // line 86
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

        <p class=\"pagebreak\"></p>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['result'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 106
        echo "    </div>
</div>
";
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
        return array (  252 => 106,  224 => 86,  217 => 84,  213 => 83,  200 => 75,  193 => 73,  184 => 66,  169 => 63,  160 => 62,  151 => 61,  142 => 60,  136 => 57,  132 => 56,  128 => 55,  124 => 54,  121 => 53,  117 => 52,  96 => 34,  85 => 26,  78 => 22,  72 => 18,  68 => 17,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layoutv2.html\" %}
{% block content %}
<title>{{ results | first | first.examcode }}-results</title>

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
                <td>Cohort</td>
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
                <td>{{ student.cohort }}</td>
                <td>25187</td>
                <!--<td></td>-->
                <td style=\"text-align: right\">{% if student.attempt.count == 1 %}{{ student.grade }} ({{student.letter_grade}}){% endif %}</td>
                <td style=\"text-align: right\">{% if student.attempt.count == 2 %}{{ student.grade }} ({{student.letter_grade}}){% endif %}</td>
                <td style=\"text-align: right\">{% if student.attempt.count == 3 %}{{ student.grade }} ({{student.letter_grade}}){% endif %}</td>
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
        <p>Naam surveillanten: {{ result | first.assessor1_fullname }},  {{ result | first.assessor2_fullname }}</p>
        <p>Paraaf surveillanten ...............................</p>
        <!--<img class=\"handtekening_klein\" src=\"{{ base_url() }}/assets/img/handtekening_jan_jaap.png\"><img class=\"handtekening_klein\"  src=\"{{ base_url() }}/assets/img/handtekening_piet.png\"></p>-->

        Opmerkingen n.a.v. correctie
        <table style=\"width:100%;\">
            <tr>
                <td><p style=\"padding:20px;\"></p></td>
            </tr>
        </table>
        <p>Datum: {{ result | first.exam_date | date_modify(\"+10 days\") | date('d-m-Y') }}</p>
        <p>Naam correctoren: {{ result | first.assessor1_fullname }}, {{ result | first.assessor2_fullname }}</p>
        <p>Paraaf correctoren: ...............................</p>
        <!--<img class=\"handtekening_klein\" src=\"{{ base_url() }}/assets/img/handtekening_jan_jaap.png\"><img class=\"handtekening_klein\"  src=\"{{ base_url() }}/assets/img/handtekening_piet.png\"></p>-->

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

        <p class=\"pagebreak\"></p>
        {% endfor %}
    </div>
</div>
{% endblock %}
", "results_exam.html", "/Users/janjaap/git/studentresults/templates/results_exam.html");
    }
}
