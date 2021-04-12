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

/* signup.html */
class __TwigTemplate_9a2edd406b76ec85571658e83cf9600c6309ca223b80bf39fd3342a719ec414c extends Template
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
        $this->parent = $this->loadTemplate("layout.html", "signup.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div>
    <table>
        ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["users"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 7
            echo "        <tr>
            <td>
                ";
            // line 9
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "fullname", [], "any", false, false, false, 9), "html", null, true);
            echo "
            </td>
            <td>
                ";
            // line 12
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "email", [], "any", false, false, false, 12), "html", null, true);
            echo "
            </td>
            <td>
                ";
            // line 15
            echo twig_escape_filter($this->env, twig_join_filter(twig_get_attribute($this->env, $this->source, $context["user"], "roles", [], "any", false, false, false, 15), ", "), "html", null, true);
            echo "
            </td>
            <td>
                <a href=\"/user/delete/";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "iduser", [], "any", false, false, false, 18), "html", null, true);
            echo "\">delete</a>
            </td>
        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "    </table>
</div>
<div class=\"row\">
    <div class=\"col-md-6 col-md-offset-3\">
        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">Sign Up</div>
            <div class=\"panel-body\">
                <form action=\"/signup\" method=\"post\">
                    ";
        // line 30
        echo twig_get_attribute($this->env, $this->source, ($context["csrf"] ?? null), "field", [], "any", false, false, false, 30);
        echo "
                    <div class=\"form-group";
        // line 31
        echo ((twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "email", [], "any", false, false, false, 31)) ? (" has-error") : (""));
        echo "\">
                        <label for=\"email\">Email</label>
                        <input type=\"email\" name=\"email\" id=\"email\" placeholder=\"you@domain.com\" class=\"form-control\" value=\"";
        // line 33
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["old"] ?? null), "email", [], "any", false, false, false, 33), "html", null, true);
        echo "\">
                        ";
        // line 34
        if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "email", [], "any", false, false, false, 34)) {
            // line 35
            echo "                        <span class=\"hel-block\">";
            echo twig_escape_filter($this->env, twig_first($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "email", [], "any", false, false, false, 35)), "html", null, true);
            echo "</span>
                        ";
        }
        // line 37
        echo "                    </div>

                    <div class=\"form-group";
        // line 39
        echo ((twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "name", [], "any", false, false, false, 39)) ? (" has-error") : (""));
        echo "\">
                        <label for=\"first_name\">First Name</label>
                        <input type=\"text\" name=\"first_name\" id=\"first_name\" class=\"form-control\" value=\"";
        // line 41
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["old"] ?? null), "first_name", [], "any", false, false, false, 41), "html", null, true);
        echo "\" >
                        ";
        // line 42
        if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "name", [], "any", false, false, false, 42)) {
            // line 43
            echo "                        <span class=\"hel-block\">";
            echo twig_escape_filter($this->env, twig_first($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "first_name", [], "any", false, false, false, 43)), "html", null, true);
            echo "</span>
                        ";
        }
        // line 45
        echo "                    </div>
                    <div class=\"form-group";
        // line 46
        echo ((twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "name", [], "any", false, false, false, 46)) ? (" has-error") : (""));
        echo "\">
                        <label for=\"last_name\">Last Name</label>
                        <input type=\"text\" name=\"last_name\" id=\"last_name\" class=\"form-control\" value=\"";
        // line 48
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["old"] ?? null), "last_name", [], "any", false, false, false, 48), "html", null, true);
        echo "\" >
                        ";
        // line 49
        if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "last_name", [], "any", false, false, false, 49)) {
            // line 50
            echo "                        <span class=\"hel-block\">";
            echo twig_escape_filter($this->env, twig_first($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "last_name", [], "any", false, false, false, 50)), "html", null, true);
            echo "</span>
                        ";
        }
        // line 52
        echo "                    </div>

                    <div class=\"form-group";
        // line 54
        echo ((twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", false, false, false, 54)) ? (" has-error") : (""));
        echo "\">
                        <label for=\"password\">Password</label>
                        <input type=\"password\" name=\"password\" id=\"password\" class=\"form-control\">
                        ";
        // line 57
        if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", false, false, false, 57)) {
            // line 58
            echo "                        <span class=\"hel-block\">";
            echo twig_escape_filter($this->env, twig_first($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", false, false, false, 58)), "html", null, true);
            echo "</span>
                        ";
        }
        // line 60
        echo "                    </div>
                    <div class=\"form-group";
        // line 61
        echo ((twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "roles", [], "any", false, false, false, 61)) ? (" has-error") : (""));
        echo "\">
                        <label for=\"roles\">Roles</label>
                        ";
        // line 63
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["roles"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
            // line 64
            echo "                        <input type=\"checkbox\" name=\"roles[]\" id=\"role_";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["role"], "idrole", [], "any", false, false, false, 64), "html", null, true);
            echo "\" class=\"form-control\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["role"], "idrole", [], "any", false, false, false, 64), "html", null, true);
            echo "\"> ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["role"], "description", [], "any", false, false, false, 64), "html", null, true);
            echo "<br>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "                        ";
        if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "roles", [], "any", false, false, false, 66)) {
            // line 67
            echo "                        <span class=\"hel-block\">";
            echo twig_escape_filter($this->env, twig_first($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "roles", [], "any", false, false, false, 67)), "html", null, true);
            echo "</span>
                        ";
        }
        // line 69
        echo "                    </div>
                    <button type=\"submit\" class=\"btn btn-default\">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "signup.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  214 => 69,  208 => 67,  205 => 66,  192 => 64,  188 => 63,  183 => 61,  180 => 60,  174 => 58,  172 => 57,  166 => 54,  162 => 52,  156 => 50,  154 => 49,  150 => 48,  145 => 46,  142 => 45,  136 => 43,  134 => 42,  130 => 41,  125 => 39,  121 => 37,  115 => 35,  113 => 34,  109 => 33,  104 => 31,  100 => 30,  90 => 22,  80 => 18,  74 => 15,  68 => 12,  62 => 9,  58 => 7,  54 => 6,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layout.html' %}

{% block content %}
<div>
    <table>
        {% for user in users %}
        <tr>
            <td>
                {{ user.fullname }}
            </td>
            <td>
                {{ user.email }}
            </td>
            <td>
                {{ user.roles|join(', ') }}
            </td>
            <td>
                <a href=\"/user/delete/{{ user.iduser }}\">delete</a>
            </td>
        </tr>
        {% endfor %}
    </table>
</div>
<div class=\"row\">
    <div class=\"col-md-6 col-md-offset-3\">
        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">Sign Up</div>
            <div class=\"panel-body\">
                <form action=\"/signup\" method=\"post\">
                    {{ csrf.field | raw }}
                    <div class=\"form-group{{ errors.email ? ' has-error' : '' }}\">
                        <label for=\"email\">Email</label>
                        <input type=\"email\" name=\"email\" id=\"email\" placeholder=\"you@domain.com\" class=\"form-control\" value=\"{{ old.email }}\">
                        {% if errors.email %}
                        <span class=\"hel-block\">{{ errors.email | first }}</span>
                        {% endif %}
                    </div>

                    <div class=\"form-group{{ errors.name ? ' has-error' : '' }}\">
                        <label for=\"first_name\">First Name</label>
                        <input type=\"text\" name=\"first_name\" id=\"first_name\" class=\"form-control\" value=\"{{ old.first_name }}\" >
                        {% if errors.name %}
                        <span class=\"hel-block\">{{ errors.first_name | first }}</span>
                        {% endif %}
                    </div>
                    <div class=\"form-group{{ errors.name ? ' has-error' : '' }}\">
                        <label for=\"last_name\">Last Name</label>
                        <input type=\"text\" name=\"last_name\" id=\"last_name\" class=\"form-control\" value=\"{{ old.last_name }}\" >
                        {% if errors.last_name %}
                        <span class=\"hel-block\">{{ errors.last_name | first }}</span>
                        {% endif %}
                    </div>

                    <div class=\"form-group{{ errors.password ? ' has-error' : '' }}\">
                        <label for=\"password\">Password</label>
                        <input type=\"password\" name=\"password\" id=\"password\" class=\"form-control\">
                        {% if errors.password %}
                        <span class=\"hel-block\">{{ errors.password | first }}</span>
                        {% endif %}
                    </div>
                    <div class=\"form-group{{ errors.roles ? ' has-error' : '' }}\">
                        <label for=\"roles\">Roles</label>
                        {% for role in roles %}
                        <input type=\"checkbox\" name=\"roles[]\" id=\"role_{{ role.idrole }}\" class=\"form-control\" value=\"{{ role.idrole }}\"> {{ role.description }}<br>
                        {% endfor %}
                        {% if errors.roles %}
                        <span class=\"hel-block\">{{ errors.roles | first }}</span>
                        {% endif %}
                    </div>
                    <button type=\"submit\" class=\"btn btn-default\">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "signup.html", "/Users/janjaap/git/studentresults/templates/signup.html");
    }
}
