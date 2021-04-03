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

/* @CoreHome/_htmlEmailFooter.twig */
class __TwigTemplate_6f79a5a86d8dd6b8ffc8e30a2cfb992830586ec477464ea8c9fe34c1e947e0cd extends \Twig\Template
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
        ob_start();
        echo "color:";
        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["themeStyles"] ?? $this->getContext($context, "themeStyles")), "colorText", []), "html_attr");
        echo ";font-family:";
        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["themeStyles"] ?? $this->getContext($context, "themeStyles")), "fontFamilyBase", []), "html_attr");
        echo ";";
        $context["fontStyle"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 2
        $context["styleParagraph"] = "font-size:15px;line-height:24px;margin:0 0 16px;";
        // line 3
        ob_start();
        echo \Piwik\piwik_escape_filter($this->env, ($context["styleParagraph"] ?? $this->getContext($context, "styleParagraph")), "html", null, true);
        echo \Piwik\piwik_escape_filter($this->env, ($context["fontStyle"] ?? $this->getContext($context, "fontStyle")), "html", null, true);
        echo "text-align:center;font-size:13px; color:#666;";
        $context["footerParagraphStyle"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 4
        $context["hasHorizontalRule"] = ( !($context["hasWhiteLabel"] ?? $this->getContext($context, "hasWhiteLabel")) ||  !twig_test_empty((((isset($context["unsubscribeLink"]) || array_key_exists("unsubscribeLink", $context))) ? (_twig_default_filter(($context["unsubscribeLink"] ?? $this->getContext($context, "unsubscribeLink")))) : (""))));
        // line 5
        echo "
";
        // line 6
        if (($context["hasHorizontalRule"] ?? $this->getContext($context, "hasHorizontalRule"))) {
            // line 7
            echo "    <hr style=\" border: 0; margin-top: 50px;  height: 1px; background-image: linear-gradient(to right, rgba(231, 231, 231, 0), rgba(231, 231, 231, 1), rgba(2311, 2311, 231, 0));\">
";
        } else {
            // line 9
            echo "    <br/>
";
        }
        // line 11
        echo "
";
        // line 12
        if ( !($context["hasWhiteLabel"] ?? $this->getContext($context, "hasWhiteLabel"))) {
            // line 13
            echo "    <p style='";
            echo \Piwik\piwik_escape_filter($this->env, ($context["footerParagraphStyle"] ?? $this->getContext($context, "footerParagraphStyle")), "html", null, true);
            echo "padding-top:30px;margin-bottom:0;'>
        ";
            // line 14
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["General_PoweredBy"]), "html", null, true);
            echo "
        <a style=\"color:#439fe0;\" rel=\"noreferrer\" href=\"https://matomo.org/\" title=\"Matomo Analytics\">Matomo Analytics</a>
        <br />
        ";
            // line 17
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreHome_LeadingAnalyticsPlatformRespectsYourPrivacy"]), "html", null, true);
            echo "
    </p>
";
        }
        // line 20
        echo "
";
        // line 21
        if ( !twig_test_empty((((isset($context["unsubscribeLink"]) || array_key_exists("unsubscribeLink", $context))) ? (_twig_default_filter(($context["unsubscribeLink"] ?? $this->getContext($context, "unsubscribeLink")))) : ("")))) {
            // line 22
            echo "    ";
            ob_start();
            echo "<a style=\"color:#439fe0;\" href=\"";
            echo \Piwik\piwik_escape_filter($this->env, ($context["unsubscribeLink"] ?? $this->getContext($context, "unsubscribeLink")), "html_attr");
            echo "\">";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), ["ScheduledReports_Unsubscribe"]), "html", null, true);
            echo "</a>";
            $context["unsubLink"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 23
            echo "    <p style='";
            echo \Piwik\piwik_escape_filter($this->env, ($context["footerParagraphStyle"] ?? $this->getContext($context, "footerParagraphStyle")), "html", null, true);
            if (($context["hasWhiteLabel"] ?? $this->getContext($context, "hasWhiteLabel"))) {
                echo "padding-top:30px;";
            }
            echo "'>";
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), ["ScheduledReports_UnsubscribeFooter", ($context["unsubLink"] ?? $this->getContext($context, "unsubLink"))]);
            echo ".</p>
";
        }
        // line 25
        echo "
</div>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_htmlEmailFooter.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 25,  97 => 23,  88 => 22,  86 => 21,  83 => 20,  77 => 17,  71 => 14,  66 => 13,  64 => 12,  61 => 11,  57 => 9,  53 => 7,  51 => 6,  48 => 5,  46 => 4,  40 => 3,  38 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% set fontStyle %}color:{{ themeStyles.colorText|e('html_attr') }};font-family:{{ themeStyles.fontFamilyBase|e('html_attr') }};{% endset %}
{% set styleParagraph = 'font-size:15px;line-height:24px;margin:0 0 16px;' %}
{% set footerParagraphStyle %}{{styleParagraph}}{{fontStyle}}text-align:center;font-size:13px; color:#666;{% endset %}
{% set hasHorizontalRule = not hasWhiteLabel or unsubscribeLink|default is not empty  %}

{% if hasHorizontalRule %}
    <hr style=\" border: 0; margin-top: 50px;  height: 1px; background-image: linear-gradient(to right, rgba(231, 231, 231, 0), rgba(231, 231, 231, 1), rgba(2311, 2311, 231, 0));\">
{% else %}
    <br/>
{% endif %}

{% if not hasWhiteLabel %}
    <p style='{{ footerParagraphStyle }}padding-top:30px;margin-bottom:0;'>
        {{'General_PoweredBy'|translate}}
        <a style=\"color:#439fe0;\" rel=\"noreferrer\" href=\"https://matomo.org/\" title=\"Matomo Analytics\">Matomo Analytics</a>
        <br />
        {{ 'CoreHome_LeadingAnalyticsPlatformRespectsYourPrivacy'|translate }}
    </p>
{% endif %}

{% if unsubscribeLink|default is not empty %}
    {% set unsubLink %}<a style=\"color:#439fe0;\" href=\"{{ unsubscribeLink|e('html_attr') }}\">{{ 'ScheduledReports_Unsubscribe'|translate }}</a>{% endset %}
    <p style='{{ footerParagraphStyle }}{% if hasWhiteLabel %}padding-top:30px;{% endif %}'>{{ 'ScheduledReports_UnsubscribeFooter'|translate(unsubLink)|raw }}.</p>
{% endif %}

</div>
</body>
</html>
", "@CoreHome/_htmlEmailFooter.twig", "/home/dtstelecom/domains/dtstelecom.com.vn/public_html/analytics/plugins/CoreHome/templates/_htmlEmailFooter.twig");
    }
}
