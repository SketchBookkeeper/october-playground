<?php

/* /Users/paulallen/Documents/TMD/october/themes/example-theme/layouts/fallback.htm */
class __TwigTemplate_1063d7a09ca165c4c04455818bd0e301ccb04edb0f84235979c5eb5f3dda15c6 extends Twig_Template
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
        echo $this->env->getExtension('Cms\Twig\Extension')->pageFunction();
    }

    public function getTemplateName()
    {
        return "/Users/paulallen/Documents/TMD/october/themes/example-theme/layouts/fallback.htm";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% page %}", "/Users/paulallen/Documents/TMD/october/themes/example-theme/layouts/fallback.htm", "");
    }
}
