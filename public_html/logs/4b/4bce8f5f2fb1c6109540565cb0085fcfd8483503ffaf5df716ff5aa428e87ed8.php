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

/* result_detail_with_aspects.html */
class __TwigTemplate_9d43e56b65155ddb7306b660e1123ebfd13341a0980b3b482c3d0aa8deb66ca2 extends Template
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
        $this->parent = $this->loadTemplate("layoutv2.html", "result_detail_with_aspects.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "<title>";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["student"] ?? null), "idstudent", [], "any", false, false, false, 3), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["student"] ?? null), "fullName", [], "method", false, false, false, 3), "html", null, true);
        echo "-[";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["exam"] ?? null), "examcode", [], "any", false, false, false, 3), "html", null, true);
        echo "]-";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["results"] ?? null), "exam_date", [], "any", false, false, false, 3), "Ymd"), "html", null, true);
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
<table style=\"width:100%;\">
    <tr>
        <td colspan=\"6\"><b>";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["exam"] ?? null), "description", [], "any", false, false, false, 19), "html", null, true);
        echo "</b></td>
    </tr>
    <tr>
        <td>Naam student:</td>
        <td>";
        // line 23
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["student"] ?? null), "fullName", [], "method", false, false, false, 23), "html", null, true);
        echo "</td>
        <td>Studentnummer:</td>
        <td>";
        // line 25
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["student"] ?? null), "idstudent", [], "any", false, false, false, 25), "html", null, true);
        echo "</td>
        <td>Groep:</td>
        <td>";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["student"] ?? null), "idgroup", [], "any", false, false, false, 27), "html", null, true);
        echo "</td>
    </tr>
    <tr>
        <td>Plaats:</td>
        <td colspan=\"3\">Almere</td>
        <td>Datum:</td>
        <td>";
        // line 33
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["results"] ?? null), "exam_date", [], "any", false, false, false, 33), "d/m/Y"), "html", null, true);
        echo "</td>
    </tr>
    <tr>
        ";
        // line 36
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["assessors"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["assessor"]) {
            // line 37
            echo "        <td>Beoordelaar ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 37), "html", null, true);
            echo ":</td>
        <td>";
            // line 38
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["assessor"], "fullname", [], "any", false, false, false, 38), "html", null, true);
            echo "</td>
        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['assessor'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "    </tr>
</table>

<table style=\"width:100%;\">
    ";
        // line 44
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["results"] ?? null), "processes", [], "any", false, false, false, 44));
        foreach ($context['_seq'] as $context["_key"] => $context["proces"]) {
            // line 45
            echo "    <tr>
        <td colspan=\"5\"><b>";
            // line 46
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["proces"], "proces_description", [], "any", false, false, false, 46), "html", null, true);
            echo "</b></td>
    </tr>
    ";
            // line 48
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["proces"], "assignments", [], "any", false, false, false, 48));
            foreach ($context['_seq'] as $context["_key"] => $context["assignment"]) {
                // line 49
                echo "    <tr>
        <td colspan=\"5\"> <i>";
                // line 50
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["assignment"], "assignment_description", [], "any", false, false, false, 50), "html", null, true);
                echo "</i></td>
    </tr>
    <tr>
        <td>0</td>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>resultaat</td>
    </tr>
    <tr>
        ";
                // line 60
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["assignment"], "aspects", [], "any", false, false, false, 60));
                foreach ($context['_seq'] as $context["_key"] => $context["aspect"]) {
                    // line 61
                    echo "        <td style=\"vertical-align: top; width:22%;";
                    if ((twig_get_attribute($this->env, $this->source, $context["aspect"], "result", [], "any", false, false, false, 61) !=  -1)) {
                        echo "font-weight:700;";
                    }
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["aspect"], "aspect_description", [], "any", false, false, false, 61), "html", null, true);
                    echo "</td>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['aspect'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 63
                echo "        ";
                if ((twig_get_attribute($this->env, $this->source, $context["assignment"], "aspectcount", [], "any", false, false, false, 63) < 4)) {
                    // line 64
                    echo "        ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(range(4, (twig_get_attribute($this->env, $this->source, $context["assignment"], "aspectcount", [], "any", false, false, false, 64) + 1)));
                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                        // line 65
                        echo "        <td></td>
        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 67
                    echo "        ";
                }
                // line 68
                echo "        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["assignment"], "aspects", [], "any", false, false, false, 68));
                foreach ($context['_seq'] as $context["_key"] => $context["aspect"]) {
                    // line 69
                    echo "        ";
                    if ((twig_get_attribute($this->env, $this->source, $context["aspect"], "result", [], "any", false, false, false, 69) !=  -1)) {
                        // line 70
                        echo "        <td style=\"vertical-align: top; width:5%;\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["aspect"], "result", [], "any", false, false, false, 70), "html", null, true);
                        echo "</td>
        ";
                    }
                    // line 72
                    echo "        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['aspect'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 73
                echo "    </tr>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['assignment'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 75
            echo "    ";
            if (twig_get_attribute($this->env, $this->source, $context["proces"], "proces_score", [], "any", false, false, false, 75)) {
                // line 76
                echo "    <tr>
        <td colspan=\"4\" style=\"text-align: right;\">
            Score voor dit proces:
        </td>
        <td style=\"text-align: right;\">
            ";
                // line 81
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["proces"], "proces_score", [], "any", false, false, false, 81), "html", null, true);
                echo "
        </td>
    </tr>
    ";
            }
            // line 85
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['proces'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 86
        echo "    <tr>
        <td colspan=\"4\" style=\"text-align:right;\">
            Totaal score examen:
        </td>
        <td style=\"text-align:right;\">
            ";
        // line 91
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["results"] ?? null), "total_score", [], "any", false, false, false, 91), "html", null, true);
        echo "
        </td>
    </tr>
</table>
<table style=\"width:100%;\">
    <tr>
        <td>
            Motivatie
        </td>
    </tr>
    <tr>
        <td>";
        // line 102
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["results"] ?? null), "comment", [], "any", false, false, false, 102), "html", null, true);
        echo "</td>
    </tr>
</table>

<table style=\"width:100%;\">
    <tr>
        <td style=\"text-align:right;width:80%;\">
            Eindbeoordeling:
        </td>
        <td style=\"text-align:center; font-size:2em\">
            <b>";
        // line 112
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["results"] ?? null), "grade", [], "any", false, false, false, 112), "html", null, true);
        echo " (";
        if ((twig_get_attribute($this->env, $this->source, ($context["results"] ?? null), "grade", [], "any", false, false, false, 112) >= 8)) {
            echo "G";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["results"] ?? null), "grade", [], "any", false, false, false, 112) >= 5.5)) {
            echo "V";
        } else {
            echo "O";
        }
        echo ")</b>
        </td>
</table>
<table>
    <tr>
        <td colspan=\"2\">Cruciaal criterium</td>
    </tr>
    </tr>
    ";
        // line 120
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["results"] ?? null), "critical_assignments", [], "any", false, false, false, 120));
        foreach ($context['_seq'] as $context["_key"] => $context["ass"]) {
            // line 121
            echo "    <tr>
        <td>";
            // line 122
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["ass"], "description", [], "any", false, false, false, 122), "html", null, true);
            echo "</td>
        <td>";
            // line 123
            if ((twig_get_attribute($this->env, $this->source, $context["ass"], "passed", [], "any", false, false, false, 123) != 1)) {
                echo "Niet behaald";
            } else {
                echo "Behaald";
            }
            echo "</td>
    </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ass'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 126
        echo "</table>
<table>
    <tr>
        <td colspan=\"";
        // line 129
        echo twig_escape_filter($this->env, twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["results"] ?? null), "caesura", [], "any", false, false, false, 129)), "html", null, true);
        echo "\">Cesuur</td>
    </tr>
    <tr>
        ";
        // line 132
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["results"] ?? null), "caesura", [], "any", false, false, false, 132));
        foreach ($context['_seq'] as $context["key"] => $context["grade"]) {
            // line 133
            echo "        <td>";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "</td>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['grade'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 135
        echo "    </tr>
    <tr>
        ";
        // line 137
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["results"] ?? null), "caesura", [], "any", false, false, false, 137));
        foreach ($context['_seq'] as $context["key"] => $context["grade"]) {
            // line 138
            echo "       <td>";
            echo twig_escape_filter($this->env, $context["grade"], "html", null, true);
            echo "</td>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['grade'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 140
        echo "    </tr>
</table>
    <table class=\"noborder\" style=\"width:70%;\">
        <tr>
            <td>Handtekening beoordelaar 1:</td>
            <td>Handtekening beoordelaar 2:</td>
        </tr>
        <tr>
            <td>
                <img class=\"handtekening\" src=\"";
        // line 149
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/assets/img/handtekening_";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["results"] ?? null), "assessor1", [], "any", false, false, false, 149), "html", null, true);
        echo ".png\">
            </td>
            <td>
                <img class=\"handtekening\"  src=\"";
        // line 152
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/assets/img/handtekening_";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["results"] ?? null), "assessor2", [], "any", false, false, false, 152), "html", null, true);
        echo ".png\">
            </td>
        </tr>
        <tr>
            <td>";
        // line 156
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["results"] ?? null), "assessor1_fullname", [], "any", false, false, false, 156), "html", null, true);
        echo "</td>
            <td>";
        // line 157
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["results"] ?? null), "assessor2_fullname", [], "any", false, false, false, 157), "html", null, true);
        echo "</td>
        </tr>
    </table>
        <p class=\"pagebreak\"></p>

<h3>Aanwezigheid en resultaten Examen / Proces verbaal</h3>
<table style=\"width:100%;\">
    <tr>
        <td>Examencode</td>
        <td>";
        // line 166
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, ($context["report"] ?? null)), "examcode", [], "any", false, false, false, 166), "html", null, true);
        echo "</td>
    </tr>
    <tr>
        <td>Examennaam</td>
        <td>";
        // line 170
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, ($context["report"] ?? null)), "exam_description", [], "any", false, false, false, 170), "html", null, true);
        echo "</td>
    </tr>
    <tr>
        <td>Onderwijsproduct</td>
        <td>";
        // line 174
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, ($context["report"] ?? null)), "exam_description", [], "any", false, false, false, 174), "html", null, true);
        echo "</td>
    </tr>
    <tr>
        <td>Crebo</td>
        <td>25187</td>
    </tr>
    <tr>
        <td>Datum</td>
        <td>";
        // line 182
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, ($context["report"] ?? null)), "exam_date", [], "any", false, false, false, 182), "d-m-Y"), "html", null, true);
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
        <td>1e beoordeling</td>
        <td>2e beoordeling</td>
        <td>3e beoordeling</td>

        <!--<td>O/V/G</td>-->
    </tr>
    ";
        // line 199
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["report"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["student"]) {
            // line 200
            echo "    <tr>
        <td>";
            // line 201
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "student_idstudent", [], "any", false, false, false, 201), "html", null, true);
            echo "</td>
        <td>";
            // line 202
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "fullname", [], "any", false, false, false, 202), "html", null, true);
            echo "</td>
        <td>";
            // line 203
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "idgroup", [], "any", false, false, false, 203), "html", null, true);
            echo "</td>
        <td>";
            // line 204
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "cohort", [], "any", false, false, false, 204), "html", null, true);
            echo "</td>
        <td>25187</td>
        <td style=\"text-align: right\">";
            // line 206
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["student"], "attempt", [], "any", false, false, false, 206), "count", [], "any", false, false, false, 206) == 1)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "grade", [], "any", false, false, false, 206), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "letter_grade", [], "any", false, false, false, 206), "html", null, true);
                echo ")";
            }
            echo "</td>
        <td style=\"text-align: right\">";
            // line 207
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["student"], "attempt", [], "any", false, false, false, 207), "count", [], "any", false, false, false, 207) == 2)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "grade", [], "any", false, false, false, 207), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "letter_grade", [], "any", false, false, false, 207), "html", null, true);
                echo ")";
            }
            echo "</td>
        <td style=\"text-align: right\">";
            // line 208
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["student"], "attempt", [], "any", false, false, false, 208), "count", [], "any", false, false, false, 208) == 3)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "grade", [], "any", false, false, false, 208), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["student"], "letter_grade", [], "any", false, false, false, 208), "html", null, true);
                echo ")";
            }
            echo "</td>
    </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['student'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 211
        echo "</table>
Opmerkingen n.a.v. examensessie
<table style=\"width:100%;\">
    <tr>
        <td><p style=\"padding:20px;\"></p></td>
    </tr>
</table>
<p>Naam surveillanten: ";
        // line 218
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, ($context["report"] ?? null)), "assessor1_fullname", [], "any", false, false, false, 218), "html", null, true);
        echo ",  ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, ($context["report"] ?? null)), "assessor2_fullname", [], "any", false, false, false, 218), "html", null, true);
        echo "</p>

<div style=\"position: relative;  height:100px;\">
    <div class=\"handtekening\">
        <img src=\"";
        // line 222
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/assets/img/handtekening_";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, ($context["report"] ?? null)), "assessor1", [], "any", false, false, false, 222), "html", null, true);
        echo ".png\">
        <img src=\"";
        // line 223
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/assets/img/handtekening_";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, ($context["report"] ?? null)), "assessor2", [], "any", false, false, false, 223), "html", null, true);
        echo ".png\">
    </div>
    <div style=\"position: absolute; top:30px;\">
        <p>Paraaf surveillanten ......................................................................................................................</p>
    </div>
</div>

Opmerkingen n.a.v. correctie
<table style=\"width:100%;\">
    <tr>
        <td><p style=\"padding:20px;\"></p></td>
    </tr>
</table>
<p>Datum: ";
        // line 236
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_date_modify_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, ($context["report"] ?? null)), "exam_date", [], "any", false, false, false, 236), "+10 days"), "d-m-Y"), "html", null, true);
        echo "</p>
<p>Naam correctoren: ";
        // line 237
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, ($context["report"] ?? null)), "assessor1_fullname", [], "any", false, false, false, 237), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, ($context["report"] ?? null)), "assessor2_fullname", [], "any", false, false, false, 237), "html", null, true);
        echo "</p>
<div style=\"position: relative;  height:100px;\">
     <div class=\"handtekening\">
         <img src=\"";
        // line 240
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/assets/img/handtekening_";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, ($context["report"] ?? null)), "assessor1", [], "any", false, false, false, 240), "html", null, true);
        echo ".png\">
         <img src=\"";
        // line 241
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/assets/img/handtekening_";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, ($context["report"] ?? null)), "assessor2", [], "any", false, false, false, 241), "html", null, true);
        echo ".png\">
     </div>
     <div style=\"position: absolute; top:30px;\">
         <p>Paraaf correctoren ......................................................................................................................</p>
     </div>
</div>
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
<p class=\"pagebreak\" p>
    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "result_detail_with_aspects.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  592 => 241,  586 => 240,  578 => 237,  574 => 236,  556 => 223,  550 => 222,  541 => 218,  532 => 211,  518 => 208,  509 => 207,  500 => 206,  495 => 204,  491 => 203,  487 => 202,  483 => 201,  480 => 200,  476 => 199,  456 => 182,  445 => 174,  438 => 170,  431 => 166,  419 => 157,  415 => 156,  406 => 152,  398 => 149,  387 => 140,  378 => 138,  374 => 137,  370 => 135,  361 => 133,  357 => 132,  351 => 129,  346 => 126,  333 => 123,  329 => 122,  326 => 121,  322 => 120,  303 => 112,  290 => 102,  276 => 91,  269 => 86,  263 => 85,  256 => 81,  249 => 76,  246 => 75,  239 => 73,  233 => 72,  227 => 70,  224 => 69,  219 => 68,  216 => 67,  209 => 65,  204 => 64,  201 => 63,  188 => 61,  184 => 60,  171 => 50,  168 => 49,  164 => 48,  159 => 46,  156 => 45,  152 => 44,  146 => 40,  130 => 38,  125 => 37,  108 => 36,  102 => 33,  93 => 27,  88 => 25,  83 => 23,  76 => 19,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layoutv2.html\" %}
{% block content %}
<title>{{ student.idstudent }}-{{ student.fullName() }}-[{{exam.examcode}}]-{{ results.exam_date | date('Ymd') }}</title>

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
        <td>{{ results.exam_date | date('d/m/Y') }}</td>
    </tr>
    <tr>
        {% for assessor in assessors %}
        <td>Beoordelaar {{ loop.index }}:</td>
        <td>{{ assessor.fullname }}</td>
        {% endfor %}
    </tr>
</table>

<table style=\"width:100%;\">
    {% for proces in results.processes %}
    <tr>
        <td colspan=\"5\"><b>{{ proces.proces_description }}</b></td>
    </tr>
    {% for assignment in proces.assignments %}
    <tr>
        <td colspan=\"5\"> <i>{{ assignment.assignment_description }}</i></td>
    </tr>
    <tr>
        <td>0</td>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>resultaat</td>
    </tr>
    <tr>
        {% for aspect in assignment.aspects %}
        <td style=\"vertical-align: top; width:22%;{% if aspect.result != -1 %}font-weight:700;{% endif %}\">{{ aspect.aspect_description }}</td>
        {% endfor %}
        {% if assignment.aspectcount < 4 %}
        {% for i in range(4,(assignment.aspectcount+1)) %}
        <td></td>
        {% endfor %}
        {%  endif %}
        {% for aspect in assignment.aspects %}
        {% if aspect.result  != -1 %}
        <td style=\"vertical-align: top; width:5%;\">{{ aspect.result }}</td>
        {% endif %}
        {% endfor %}
    </tr>
    {% endfor %}
    {% if proces.proces_score %}
    <tr>
        <td colspan=\"4\" style=\"text-align: right;\">
            Score voor dit proces:
        </td>
        <td style=\"text-align: right;\">
            {{proces.proces_score }}
        </td>
    </tr>
    {% endif %}
    {% endfor %}
    <tr>
        <td colspan=\"4\" style=\"text-align:right;\">
            Totaal score examen:
        </td>
        <td style=\"text-align:right;\">
            {{ results.total_score }}
        </td>
    </tr>
</table>
<table style=\"width:100%;\">
    <tr>
        <td>
            Motivatie
        </td>
    </tr>
    <tr>
        <td>{{ results.comment }}</td>
    </tr>
</table>

<table style=\"width:100%;\">
    <tr>
        <td style=\"text-align:right;width:80%;\">
            Eindbeoordeling:
        </td>
        <td style=\"text-align:center; font-size:2em\">
            <b>{{ results.grade }} ({% if results.grade >= 8 %}G{% elseif results.grade >= 5.5 %}V{% else %}O{% endif %})</b>
        </td>
</table>
<table>
    <tr>
        <td colspan=\"2\">Cruciaal criterium</td>
    </tr>
    </tr>
    {% for ass in results.critical_assignments %}
    <tr>
        <td>{{ ass.description }}</td>
        <td>{% if ass.passed != 1 %}Niet behaald{% else %}Behaald{% endif %}</td>
    </tr>
    {% endfor %}
</table>
<table>
    <tr>
        <td colspan=\"{{ results.caesura | length }}\">Cesuur</td>
    </tr>
    <tr>
        {% for key,grade in results.caesura %}
        <td>{{key}}</td>
        {% endfor %}
    </tr>
    <tr>
        {% for key,grade in results.caesura %}
       <td>{{grade}}</td>
        {% endfor %}
    </tr>
</table>
    <table class=\"noborder\" style=\"width:70%;\">
        <tr>
            <td>Handtekening beoordelaar 1:</td>
            <td>Handtekening beoordelaar 2:</td>
        </tr>
        <tr>
            <td>
                <img class=\"handtekening\" src=\"{{ base_url() }}/assets/img/handtekening_{{ results.assessor1 }}.png\">
            </td>
            <td>
                <img class=\"handtekening\"  src=\"{{ base_url() }}/assets/img/handtekening_{{ results.assessor2 }}.png\">
            </td>
        </tr>
        <tr>
            <td>{{ results.assessor1_fullname }}</td>
            <td>{{ results.assessor2_fullname }}</td>
        </tr>
    </table>
        <p class=\"pagebreak\"></p>

<h3>Aanwezigheid en resultaten Examen / Proces verbaal</h3>
<table style=\"width:100%;\">
    <tr>
        <td>Examencode</td>
        <td>{{ report | first.examcode }}</td>
    </tr>
    <tr>
        <td>Examennaam</td>
        <td>{{ report | first.exam_description }}</td>
    </tr>
    <tr>
        <td>Onderwijsproduct</td>
        <td>{{ report | first.exam_description }}</td>
    </tr>
    <tr>
        <td>Crebo</td>
        <td>25187</td>
    </tr>
    <tr>
        <td>Datum</td>
        <td>{{ report | first.exam_date | date('d-m-Y') }}</td>
    </tr>
</table>

<table style=\"width:100%;\">
    <tr>
        <td>Studentnummer</td>
        <td>Naam</td>
        <td>Groep</td>
        <td>Cohort</td>
        <td>Opleidingscode</td>
        <td>1e beoordeling</td>
        <td>2e beoordeling</td>
        <td>3e beoordeling</td>

        <!--<td>O/V/G</td>-->
    </tr>
    {% for student in report %}
    <tr>
        <td>{{ student.student_idstudent }}</td>
        <td>{{ student.fullname }}</td>
        <td>{{ student.idgroup }}</td>
        <td>{{ student.cohort }}</td>
        <td>25187</td>
        <td style=\"text-align: right\">{% if student.attempt.count == 1 %}{{ student.grade }} ({{student.letter_grade}}){% endif %}</td>
        <td style=\"text-align: right\">{% if student.attempt.count == 2 %}{{ student.grade }} ({{student.letter_grade}}){% endif %}</td>
        <td style=\"text-align: right\">{% if student.attempt.count == 3 %}{{ student.grade }} ({{student.letter_grade}}){% endif %}</td>
    </tr>
    {% endfor %}
</table>
Opmerkingen n.a.v. examensessie
<table style=\"width:100%;\">
    <tr>
        <td><p style=\"padding:20px;\"></p></td>
    </tr>
</table>
<p>Naam surveillanten: {{ report | first.assessor1_fullname }},  {{ report | first.assessor2_fullname }}</p>

<div style=\"position: relative;  height:100px;\">
    <div class=\"handtekening\">
        <img src=\"{{ base_url() }}/assets/img/handtekening_{{ report | first.assessor1 }}.png\">
        <img src=\"{{ base_url() }}/assets/img/handtekening_{{ report | first.assessor2 }}.png\">
    </div>
    <div style=\"position: absolute; top:30px;\">
        <p>Paraaf surveillanten ......................................................................................................................</p>
    </div>
</div>

Opmerkingen n.a.v. correctie
<table style=\"width:100%;\">
    <tr>
        <td><p style=\"padding:20px;\"></p></td>
    </tr>
</table>
<p>Datum: {{ report | first.exam_date | date_modify(\"+10 days\") | date('d-m-Y') }}</p>
<p>Naam correctoren: {{ report | first.assessor1_fullname }}, {{ report | first.assessor2_fullname }}</p>
<div style=\"position: relative;  height:100px;\">
     <div class=\"handtekening\">
         <img src=\"{{ base_url() }}/assets/img/handtekening_{{ report | first.assessor1 }}.png\">
         <img src=\"{{ base_url() }}/assets/img/handtekening_{{ report | first.assessor2 }}.png\">
     </div>
     <div style=\"position: absolute; top:30px;\">
         <p>Paraaf correctoren ......................................................................................................................</p>
     </div>
</div>
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
<p class=\"pagebreak\" p>
    </div>
</div>

{% endblock %}", "result_detail_with_aspects.html", "/Users/janjaap/git/studentresults/templates/result_detail_with_aspects.html");
    }
}
