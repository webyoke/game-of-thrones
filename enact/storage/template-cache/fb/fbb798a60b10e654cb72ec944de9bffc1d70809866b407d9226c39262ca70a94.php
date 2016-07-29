<?php

/* @enact/_app_layout.html */
class __TwigTemplate_c94cba5491256f1026e967192c5be5d3952319b310cac043bfd3c730979f4368 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo $this->getAttribute((isset($context["View"]) ? $context["View"] : null), "body", array());
        echo "
";
    }

    public function getTemplateName()
    {
        return "@enact/_app_layout.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
/* {{ View.body }}*/
/* */
