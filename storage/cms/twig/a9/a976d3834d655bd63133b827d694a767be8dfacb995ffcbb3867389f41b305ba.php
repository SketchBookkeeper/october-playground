<?php

/* /Users/paulallen/Documents/TMD/october/themes/example-theme/partials/header.htm */
class __TwigTemplate_c5613ee9976eec461835de3584dc0146b89be74ba8e1ca2000cbd604750efd13 extends Twig_Template
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
        echo "<div class=\"xs-border-bottom fill-gray-darker\">
    <nav class=\"xs-mx-auto large-wrapper clearfix xs-p2\">
        <ul class=\"list-unstyled xs-flex xs-text-2\">
            <li class=\"xs-pr2\">
                <a href=\"";
        // line 5
        echo $this->extensions['Cms\Twig\Extension']->pageFilter("home");
        echo "\">Home</a>
            </li>
            <li class=\"xs-pr2\">
                <a href=\"";
        // line 8
        echo $this->extensions['Cms\Twig\Extension']->pageFilter("blog");
        echo "\">Blog</a>
            </li>
        </ul>
    </nav>
</div>";
    }

    public function getTemplateName()
    {
        return "/Users/paulallen/Documents/TMD/october/themes/example-theme/partials/header.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 8,  29 => 5,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"xs-border-bottom fill-gray-darker\">
    <nav class=\"xs-mx-auto large-wrapper clearfix xs-p2\">
        <ul class=\"list-unstyled xs-flex xs-text-2\">
            <li class=\"xs-pr2\">
                <a href=\"{{ 'home'|page }}\">Home</a>
            </li>
            <li class=\"xs-pr2\">
                <a href=\"{{ 'blog'|page }}\">Blog</a>
            </li>
        </ul>
    </nav>
</div>", "/Users/paulallen/Documents/TMD/october/themes/example-theme/partials/header.htm", "");
    }
}
