<?php

/* /Users/paulallen/Documents/TMD/october/themes/example-theme/pages/movies.htm */
class __TwigTemplate_07fc738717ba1bdd69e04298945387d1b550ee496db0ccdd5f222c9ff839a29e extends Twig_Template
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
        $context['__cms_component_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->componentFunction("builderList"        , $context['__cms_component_params']        );
        unset($context['__cms_component_params']);
    }

    public function getTemplateName()
    {
        return "/Users/paulallen/Documents/TMD/october/themes/example-theme/pages/movies.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% component 'builderList' %}", "/Users/paulallen/Documents/TMD/october/themes/example-theme/pages/movies.htm", "");
    }
}
