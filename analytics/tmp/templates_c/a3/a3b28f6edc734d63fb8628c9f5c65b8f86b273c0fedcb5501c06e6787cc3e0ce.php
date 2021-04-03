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

/* @CoreUpdater/layout.twig */
class __TwigTemplate_d47f4f94ad56cba73f301d4292722db647e13c118638c1638e2b6aa24c9b0213 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!DOCTYPE html>
<html id=\"ng-app\" ng-app=\"piwikApp\">
<head>
    <meta charset=\"utf-8\">
    <title>Matomo &rsaquo; ";
        // line 5
        echo \Piwik\piwik_escape_filter($this->env, (((isset($context["pageTitle"]) || array_key_exists("pageTitle", $context))) ? (_twig_default_filter(($context["pageTitle"] ?? $this->getContext($context, "pageTitle")), call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreUpdater_UpdateTitle"]))) : (call_user_func_array($this->env->getFilter('translate')->getCallable(), ["CoreUpdater_UpdateTitle"]))), "html", null, true);
        echo "</title>
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=EDGE,chrome=1\"/>
    <meta name=\"viewport\" content=\"initial-scale=1.0\" />
    <meta name=\"robots\" content=\"noindex,nofollow\">
    <meta name=\"google\" content=\"notranslate\">

    <link rel=\"stylesheet\" type=\"text/css\" href=\"index.php?module=CoreUpdater&action=getUpdaterCss\"/>
    <script type=\"text/javascript\" src=\"index.php?module=CoreUpdater&action=getUpdaterJs\"></script>

    <script type=\"text/javascript\">";
        // line 14
        echo Piwik\Translate::getJavascriptTranslations();
        echo "</script>

    ";
        // line 16
        $this->loadTemplate("@CoreHome/_favicon.twig", "@CoreUpdater/layout.twig", 16)->display($context);
        // line 17
        echo "    ";
        $this->loadTemplate("@CoreHome/_applePinnedTabIcon.twig", "@CoreUpdater/layout.twig", 17)->display($context);
        // line 18
        echo "</head>
<body id=\"simple\" ng-app=\"app\">

";
        // line 21
        $this->loadTemplate("@CoreHome/_logo.twig", "@CoreUpdater/layout.twig", 21)->display(twig_array_merge($context, ["logoLink" => false]));
        // line 22
        echo "
<div class=\"box\">
    ";
        // line 24
        $this->displayBlock('content', $context, $blocks);
        // line 26
        echo "</div>

</body>
</html>
";
    }

    // line 24
    public function block_content($context, array $blocks = [])
    {
        // line 25
        echo "    ";
    }

    public function getTemplateName()
    {
        return "@CoreUpdater/layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 25,  80 => 24,  72 => 26,  70 => 24,  66 => 22,  64 => 21,  59 => 18,  56 => 17,  54 => 16,  49 => 14,  37 => 5,  31 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html id=\"ng-app\" ng-app=\"piwikApp\">
<head>
    <meta charset=\"utf-8\">
    <title>Matomo &rsaquo; {{ pageTitle|default('CoreUpdater_UpdateTitle'|translate) }}</title>
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=EDGE,chrome=1\"/>
    <meta name=\"viewport\" content=\"initial-scale=1.0\" />
    <meta name=\"robots\" content=\"noindex,nofollow\">
    <meta name=\"google\" content=\"notranslate\">

    <link rel=\"stylesheet\" type=\"text/css\" href=\"index.php?module=CoreUpdater&action=getUpdaterCss\"/>
    <script type=\"text/javascript\" src=\"index.php?module=CoreUpdater&action=getUpdaterJs\"></script>

    <script type=\"text/javascript\">{{ getJavascriptTranslations()|raw }}</script>

    {% include \"@CoreHome/_favicon.twig\" %}
    {% include \"@CoreHome/_applePinnedTabIcon.twig\" %}
</head>
<body id=\"simple\" ng-app=\"app\">

{% include \"@CoreHome/_logo.twig\" with { 'logoLink': false } %}

<div class=\"box\">
    {% block content %}
    {% endblock %}
</div>

</body>
</html>
", "@CoreUpdater/layout.twig", "/home/dtstelecom/domains/dtstelecom.com.vn/public_html/analytics/plugins/CoreUpdater/templates/layout.twig");
    }
}
