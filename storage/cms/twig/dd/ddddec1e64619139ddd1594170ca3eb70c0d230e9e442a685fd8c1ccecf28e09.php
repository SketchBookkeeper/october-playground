<?php

/* /Users/paulallen/Documents/TMD/october/themes/example-theme/layouts/default.htm */
class __TwigTemplate_188b03f41cc72f3f113568a14d09ffc456327fcc485b428e0531f52635f074ac extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <title>";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", array()), "title", array()), "html", null, true);
        echo "</title>
    <link rel=\"stylesheet\" href=\"";
        // line 8
        echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/dist/app.css");
        echo "\">
</head>
<body class=\"fill-gray-lighter\">
    <header>
        ";
        // line 12
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("header"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 13
        echo "    </header>

    <main id=\"layout-content\" class=\"medium-wrapper xs-mx-auto xs-p1\">
        ";
        // line 16
        echo $this->env->getExtension('Cms\Twig\Extension')->pageFunction();
        // line 17
        echo "    </main>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "/Users/paulallen/Documents/TMD/october/themes/example-theme/layouts/default.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 17,  51 => 16,  46 => 13,  42 => 12,  35 => 8,  31 => 7,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <title>{{ this.page.title }}</title>
    <link rel=\"stylesheet\" href=\"{{ 'assets/dist/app.css'|theme }}\">
</head>
<body class=\"fill-gray-lighter\">
    <header>
        {% partial 'header' %}
    </header>

    <main id=\"layout-content\" class=\"medium-wrapper xs-mx-auto xs-p1\">
        {% page %}
    </main>
</body>
</html>", "/Users/paulallen/Documents/TMD/october/themes/example-theme/layouts/default.htm", "");
    }
}
