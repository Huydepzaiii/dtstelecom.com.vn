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

/* @CoreHome/_htmlEmailHeader.twig */
class __TwigTemplate_4a1948d22940076d433c8d027aebfbd95003e33dde6f5c28aa023dfcafffe965 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<html style=\"background-color:#edecec\">

<head>
    <meta charset=\"utf-8\">
    <meta name=\"robots\" content=\"noindex,nofollow\">
    <meta name=\"generator\" content=\"Matomo Analytics\">
</head>

<body style=\"";
        // line 9
        echo ($context["fontStyle"] ?? $this->getContext($context, "fontStyle"));
        echo " line-height: 24px; margin:0 auto; max-width:1000px; background-color:rgb(255, 255, 255);box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.75);\">

<a name=\"reportTop\"></a>

<table style=\"width:100%; background-color: ";
        // line 13
        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["themeStyles"] ?? $this->getContext($context, "themeStyles")), "colorHeaderBackground", []), "html_attr");
        echo "; color: ";
        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["themeStyles"] ?? $this->getContext($context, "themeStyles")), "colorHeaderText", []), "html_attr");
        echo "; padding:10px 0; margin: 0 0 25px 0; height:64px;\">
    <tr>
        <td>
            <a style=\"";
        // line 16
        echo ($context["fontStyle"] ?? $this->getContext($context, "fontStyle"));
        echo "; font-size:16px;padding:0 15px;";
        if (( !($context["isCustomLogo"] ?? $this->getContext($context, "isCustomLogo")) ||  !($context["logoHeader"] ?? $this->getContext($context, "logoHeader")))) {
            echo "padding-bottom: 8px;";
        }
        echo "color: ";
        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["themeStyles"] ?? $this->getContext($context, "themeStyles")), "colorHeaderText", []), "html_attr");
        echo ";height: 22px;display: inline-block;vertical-align: inherit;\" rel=\"noreferrer noopener\" target=\"_blank\" href=\"";
        echo \Piwik\piwik_escape_filter($this->env, ($context["piwikUrl"] ?? $this->getContext($context, "piwikUrl")), "html", null, true);
        echo "\">
                ";
        // line 17
        if ((($context["isCustomLogo"] ?? $this->getContext($context, "isCustomLogo")) && ($context["logoHeader"] ?? $this->getContext($context, "logoHeader")))) {
            // line 18
            echo "                    <img src=\"";
            echo \Piwik\piwik_escape_filter($this->env, ($context["logoHeader"] ?? $this->getContext($context, "logoHeader")), "html", null, true);
            echo "\" height=\"20px\" width=\"auto\" />
                ";
        } else {
            // line 20
            echo "                    <img src=\"";
            echo \Piwik\piwik_escape_filter($this->env, ($context["piwikUrl"] ?? $this->getContext($context, "piwikUrl")), "html", null, true);
            echo "/plugins/Morpheus/images/logo-email.png\" height=\"30px\" width=\"auto\" alt=\"";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["emailStyles"] ?? $this->getContext($context, "emailStyles")), "brandNameLong", []), "html_attr");
            echo "\" />
                ";
        }
        // line 22
        echo "            </a>
        </td>
        <td align=\"right\">
            ";
        // line 25
        if ( !twig_test_empty((((isset($context["idSite"]) || array_key_exists("idSite", $context))) ? (_twig_default_filter(($context["idSite"] ?? $this->getContext($context, "idSite")))) : ("")))) {
            // line 26
            echo "            <a style=\"";
            echo ($context["fontStyle"] ?? $this->getContext($context, "fontStyle"));
            echo "; font-size:16px; padding:0 15px; color: ";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["themeStyles"] ?? $this->getContext($context, "themeStyles")), "colorHeaderText", []), "html_attr");
            echo "\" ";
            if ( !twig_test_empty((((isset($context["websiteName"]) || array_key_exists("websiteName", $context))) ? (_twig_default_filter(($context["websiteName"] ?? $this->getContext($context, "websiteName")))) : ("")))) {
                echo "title=\"";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["Dashboard_TopLinkTooltip", ($context["websiteName"] ?? $this->getContext($context, "websiteName"))]), "html", null, true);
                echo "\"";
            }
            echo " target=\"_blank\" href=\"";
            echo \Piwik\piwik_escape_filter($this->env, ($context["piwikUrl"] ?? $this->getContext($context, "piwikUrl")), "html", null, true);
            echo call_user_func_array($this->env->getFunction('linkTo')->getCallable(), [["module" => "CoreHome", "action" => "redirectToCoreHomeIndex", "idSite" => ($context["idSite"] ?? $this->getContext($context, "idSite")), "period" => (((isset($context["period"]) || array_key_exists("period", $context))) ? (_twig_default_filter(($context["period"] ?? $this->getContext($context, "period")))) : ("")), "date" => (((isset($context["date"]) || array_key_exists("date", $context))) ? (_twig_default_filter(($context["date"] ?? $this->getContext($context, "date")))) : ("")), "token_auth" => null, "method" => null, "idReport" => null, "outputType" => null, "format" => null]]);
            echo "\">
                ";
            // line 27
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["Dashboard_Dashboard"]), "html", null, true);
            echo "
            </a>
            ";
        }
        // line 30
        echo "        </td>
    </tr>
</table>

<div style=\"margin:0 20px;\">
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_htmlEmailHeader.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 30,  106 => 27,  90 => 26,  88 => 25,  83 => 22,  75 => 20,  69 => 18,  67 => 17,  55 => 16,  47 => 13,  40 => 9,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<html style=\"background-color:#edecec\">

<head>
    <meta charset=\"utf-8\">
    <meta name=\"robots\" content=\"noindex,nofollow\">
    <meta name=\"generator\" content=\"Matomo Analytics\">
</head>

<body style=\"{{fontStyle|raw}} line-height: 24px; margin:0 auto; max-width:1000px; background-color:rgb(255, 255, 255);box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.75);\">

<a name=\"reportTop\"></a>

<table style=\"width:100%; background-color: {{ themeStyles.colorHeaderBackground|e('html_attr') }}; color: {{ themeStyles.colorHeaderText|e('html_attr') }}; padding:10px 0; margin: 0 0 25px 0; height:64px;\">
    <tr>
        <td>
            <a style=\"{{ fontStyle|raw }}; font-size:16px;padding:0 15px;{% if not isCustomLogo or not logoHeader %}padding-bottom: 8px;{% endif %}color: {{ themeStyles.colorHeaderText|e('html_attr') }};height: 22px;display: inline-block;vertical-align: inherit;\" rel=\"noreferrer noopener\" target=\"_blank\" href=\"{{ piwikUrl }}\">
                {% if isCustomLogo and logoHeader %}
                    <img src=\"{{ logoHeader }}\" height=\"20px\" width=\"auto\" />
                {% else %}
                    <img src=\"{{ piwikUrl }}/plugins/Morpheus/images/logo-email.png\" height=\"30px\" width=\"auto\" alt=\"{{ emailStyles.brandNameLong|e('html_attr') }}\" />
                {% endif %}
            </a>
        </td>
        <td align=\"right\">
            {% if idSite|default is not empty %}
            <a style=\"{{ fontStyle|raw }}; font-size:16px; padding:0 15px; color: {{ themeStyles.colorHeaderText|e('html_attr') }}\" {% if websiteName|default is not empty %}title=\"{{'Dashboard_TopLinkTooltip'|translate(websiteName)}}\"{% endif %} target=\"_blank\" href=\"{{ piwikUrl }}{{ linkTo({'module': 'CoreHome', 'action': 'redirectToCoreHomeIndex', 'idSite': idSite, 'period': period|default, 'date': date|default, 'token_auth': null, 'method': null, 'idReport': null, 'outputType': null, 'format': null})|raw }}\">
                {{ 'Dashboard_Dashboard'|translate }}
            </a>
            {% endif %}
        </td>
    </tr>
</table>

<div style=\"margin:0 20px;\">
", "@CoreHome/_htmlEmailHeader.twig", "/home/dtstelecom/domains/dtstelecom.com.vn/public_html/analytics/plugins/CoreHome/templates/_htmlEmailHeader.twig");
    }
}
