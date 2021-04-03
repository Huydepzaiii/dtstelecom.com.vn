<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @CoreUpdater/runUpdaterAndExit_done.twig */
class __TwigTemplate_6c91bd0171658c8f462f03a9cfb38d0848a3a25bce16ce379c71825a556b3286 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@CoreUpdater/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 2
        ob_start();
        // line 3
        echo "    ";
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreUpdater_HelpMessageContent", "<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/faq/\">", "</a>", "</li><li>"]);
        echo "
";
        $context["helpMessage"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent = $this->loadTemplate("@CoreUpdater/layout.twig", "@CoreUpdater/runUpdaterAndExit_done.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_content($context, array $blocks = [])
    {
        // line 7
        echo "
";
        // line 8
        if (($context["coreError"] ?? $this->getContext($context, "coreError"))) {
            // line 9
            echo "    <div class=\"header\">
        <h1>";
            // line 10
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreUpdater_UpdateErrorTitle"]), "html", null, true);
            echo "</h1>
    </div>
    <div class=\"content\">
        <div class=\"alert alert-danger\">
            ";
            // line 14
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreUpdater_CriticalErrorDuringTheUpgradeProcess"]), "html", null, true);
            echo "
            ";
            // line 15
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["errorMessages"] ?? $this->getContext($context, "errorMessages")));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 16
                echo "                <br/><strong>";
                echo \Piwik\piwik_escape_filter($this->env, strip_tags($context["message"]), "html", null, true);
                echo "</strong>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 18
            echo "        </div>
        <p>";
            // line 19
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreUpdater_HelpMessageIntroductionWhenError"]), "html", null, true);
            echo "</p>
        <ul>
            <li>";
            // line 21
            echo \Piwik\piwik_escape_filter($this->env, ($context["helpMessage"] ?? $this->getContext($context, "helpMessage")), "html", null, true);
            echo "</li>
        </ul>
        <p>";
            // line 23
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreUpdater_ErrorDIYHelp"]), "html", null, true);
            echo "</p>
        <ul>
            <li>";
            // line 25
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreUpdater_ErrorDIYHelp_1"]), "html", null, true);
            echo "</li>
            <li>";
            // line 26
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreUpdater_ErrorDIYHelp_2"]), "html", null, true);
            echo "</li>
            <li>";
            // line 27
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreUpdater_ErrorDIYHelp_3"]), "html", null, true);
            echo " <a href='https://matomo.org/faq/how-to-update/#faq_179' rel='noreferrer noopener' target='_blank'>(see FAQ)</a></li>
            <li>";
            // line 28
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreUpdater_ErrorDIYHelp_4"]), "html", null, true);
            echo "</li>
            <li>";
            // line 29
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreUpdater_ErrorDIYHelp_5"]), "html", null, true);
            echo "</li>
        </ul>
    </div>
";
        } else {
            // line 33
            echo "
    ";
            // line 34
            if (((twig_length_filter($this->env, ($context["errorMessages"] ?? $this->getContext($context, "errorMessages"))) == 0) && (twig_length_filter($this->env, ($context["warningMessages"] ?? $this->getContext($context, "warningMessages"))) == 0))) {
                // line 35
                echo "        <div class=\"header\">
            <h1>";
                // line 36
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreUpdater_PiwikHasBeenSuccessfullyUpgraded"]), "html", null, true);
                echo "</h1>
        </div>
    ";
            }
            // line 39
            echo "
    <div class=\"content\">

        ";
            // line 42
            if ((twig_length_filter($this->env, ($context["warningMessages"] ?? $this->getContext($context, "warningMessages"))) > 0)) {
                // line 43
                echo "            <div class=\"alert alert-warning\">
                <p>";
                // line 44
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreUpdater_WarningMessages"]), "html", null, true);
                echo "</p>
                ";
                // line 45
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["warningMessages"] ?? $this->getContext($context, "warningMessages")));
                foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                    // line 46
                    echo "                    <br/><strong>";
                    echo \Piwik\piwik_escape_filter($this->env, strip_tags($context["message"]), "html", null, true);
                    echo "</strong>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 48
                echo "            </div>
        ";
            }
            // line 50
            echo "
        ";
            // line 51
            if ((twig_length_filter($this->env, ($context["errorMessages"] ?? $this->getContext($context, "errorMessages"))) > 0)) {
                // line 52
                echo "            <div class=\"alert alert-warning\">
                <p>";
                // line 53
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreUpdater_ErrorDuringPluginsUpdates"]), "html", null, true);
                echo "</p>
                ";
                // line 54
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["errorMessages"] ?? $this->getContext($context, "errorMessages")));
                foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                    // line 55
                    echo "                    <br/><strong>";
                    echo \Piwik\piwik_escape_filter($this->env, strip_tags($context["message"]), "html", null, true);
                    echo "</strong>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 57
                echo "            </div>
            ";
                // line 58
                if (((isset($context["deactivatedPlugins"]) || array_key_exists("deactivatedPlugins", $context)) && (twig_length_filter($this->env, ($context["deactivatedPlugins"] ?? $this->getContext($context, "deactivatedPlugins"))) > 0))) {
                    // line 59
                    echo "                ";
                    $context["listOfDeactivatedPlugins"] = twig_join_filter(($context["deactivatedPlugins"] ?? $this->getContext($context, "deactivatedPlugins")), ", ");
                    // line 60
                    echo "                <div class=\"alert alert-danger\">
                    ";
                    // line 61
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreUpdater_WeAutomaticallyDeactivatedTheFollowingPlugins", ($context["listOfDeactivatedPlugins"] ?? $this->getContext($context, "listOfDeactivatedPlugins"))]), "html", null, true);
                    echo "
                </div>
            ";
                }
                // line 64
                echo "        ";
            }
            // line 65
            echo "
        ";
            // line 66
            if (((twig_length_filter($this->env, ($context["errorMessages"] ?? $this->getContext($context, "errorMessages"))) > 0) || (twig_length_filter($this->env, ($context["warningMessages"] ?? $this->getContext($context, "warningMessages"))) > 0))) {
                // line 67
                echo "            <p>";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreUpdater_HelpMessageIntroductionWhenWarning"]), "html", null, true);
                echo "</p>
            <ul>
                <li>";
                // line 69
                echo \Piwik\piwik_escape_filter($this->env, ($context["helpMessage"] ?? $this->getContext($context, "helpMessage")), "html", null, true);
                echo "</li>
            </ul>
        ";
            } else {
                // line 72
                echo "            <div id=\"donate-form-container\">
                ";
                // line 73
                $this->loadTemplate("@CoreHome/_donate.twig", "@CoreUpdater/runUpdaterAndExit_done.twig", 73)->display($context);
                // line 74
                echo "            </div>
        ";
            }
            // line 76
            echo "
    </div>

    <div class=\"footer\">
        <a href=\"index.php\">";
            // line 80
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["General_ContinueToPiwik"]), "html", null, true);
            echo "</a>
    </div>

";
        }
        // line 84
        echo "
";
    }

    public function getTemplateName()
    {
        return "@CoreUpdater/runUpdaterAndExit_done.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  253 => 84,  246 => 80,  240 => 76,  236 => 74,  234 => 73,  231 => 72,  225 => 69,  219 => 67,  217 => 66,  214 => 65,  211 => 64,  205 => 61,  202 => 60,  199 => 59,  197 => 58,  194 => 57,  185 => 55,  181 => 54,  177 => 53,  174 => 52,  172 => 51,  169 => 50,  165 => 48,  156 => 46,  152 => 45,  148 => 44,  145 => 43,  143 => 42,  138 => 39,  132 => 36,  129 => 35,  127 => 34,  124 => 33,  117 => 29,  113 => 28,  109 => 27,  105 => 26,  101 => 25,  96 => 23,  91 => 21,  86 => 19,  83 => 18,  74 => 16,  70 => 15,  66 => 14,  59 => 10,  56 => 9,  54 => 8,  51 => 7,  48 => 6,  43 => 1,  37 => 3,  35 => 2,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends '@CoreUpdater/layout.twig' %}
{% set helpMessage %}
    {{ 'CoreUpdater_HelpMessageContent'|translate('<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/faq/\">','</a>','</li><li>')|raw }}
{% endset %}

{% block content %}

{% if coreError %}
    <div class=\"header\">
        <h1>{{ 'CoreUpdater_UpdateErrorTitle'|translate }}</h1>
    </div>
    <div class=\"content\">
        <div class=\"alert alert-danger\">
            {{ 'CoreUpdater_CriticalErrorDuringTheUpgradeProcess'|translate }}
            {% for message in errorMessages %}
                <br/><strong>{{ message|striptags }}</strong>
            {% endfor %}
        </div>
        <p>{{ 'CoreUpdater_HelpMessageIntroductionWhenError'|translate }}</p>
        <ul>
            <li>{{ helpMessage }}</li>
        </ul>
        <p>{{ 'CoreUpdater_ErrorDIYHelp'|translate }}</p>
        <ul>
            <li>{{ 'CoreUpdater_ErrorDIYHelp_1'|translate }}</li>
            <li>{{ 'CoreUpdater_ErrorDIYHelp_2'|translate }}</li>
            <li>{{ 'CoreUpdater_ErrorDIYHelp_3'|translate }} <a href='https://matomo.org/faq/how-to-update/#faq_179' rel='noreferrer noopener' target='_blank'>(see FAQ)</a></li>
            <li>{{ 'CoreUpdater_ErrorDIYHelp_4'|translate }}</li>
            <li>{{ 'CoreUpdater_ErrorDIYHelp_5'|translate }}</li>
        </ul>
    </div>
{% else %}

    {% if errorMessages|length == 0 and warningMessages|length == 0 %}
        <div class=\"header\">
            <h1>{{ 'CoreUpdater_PiwikHasBeenSuccessfullyUpgraded'|translate }}</h1>
        </div>
    {% endif %}

    <div class=\"content\">

        {% if warningMessages|length > 0 %}
            <div class=\"alert alert-warning\">
                <p>{{ 'CoreUpdater_WarningMessages'|translate }}</p>
                {% for message in warningMessages %}
                    <br/><strong>{{ message|striptags }}</strong>
                {% endfor %}
            </div>
        {% endif %}

        {% if errorMessages|length > 0 %}
            <div class=\"alert alert-warning\">
                <p>{{ 'CoreUpdater_ErrorDuringPluginsUpdates'|translate }}</p>
                {% for message in errorMessages %}
                    <br/><strong>{{ message|striptags }}</strong>
                {% endfor %}
            </div>
            {% if deactivatedPlugins is defined and deactivatedPlugins|length > 0 %}
                {% set listOfDeactivatedPlugins=deactivatedPlugins|join(', ') %}
                <div class=\"alert alert-danger\">
                    {{ 'CoreUpdater_WeAutomaticallyDeactivatedTheFollowingPlugins'|translate(listOfDeactivatedPlugins) }}
                </div>
            {% endif %}
        {% endif %}

        {% if errorMessages|length > 0 or warningMessages|length > 0 %}
            <p>{{ 'CoreUpdater_HelpMessageIntroductionWhenWarning'|translate }}</p>
            <ul>
                <li>{{ helpMessage }}</li>
            </ul>
        {% else %}
            <div id=\"donate-form-container\">
                {% include \"@CoreHome/_donate.twig\" %}
            </div>
        {% endif %}

    </div>

    <div class=\"footer\">
        <a href=\"index.php\">{{ 'General_ContinueToPiwik'|translate }}</a>
    </div>

{% endif %}

{% endblock %}
", "@CoreUpdater/runUpdaterAndExit_done.twig", "/home/dtstelecom/domains/dtstelecom.com.vn/public_html/analytics/plugins/CoreUpdater/templates/runUpdaterAndExit_done.twig");
    }
}
