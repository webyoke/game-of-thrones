<?php

/* @enact/small-body-layout */
class __TwigTemplate_ea0a4ecd10e22467dd882308b8c07f4bdec7ece3120a07267ef9418fc1fb50ed extends Twig_Template
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
        echo "<h1 class='text-center'>";
        echo $this->getAttribute((isset($context["enact"]) ? $context["enact"] : null), "siteName", array());
        echo "</h1>
";
        // line 2
        if ((isset($context["body"]) ? $context["body"] : null)) {
            echo " ";
            echo (isset($context["body"]) ? $context["body"] : null);
            echo " ";
        }
        // line 3
        echo "<div id='component'></div>
";
    }

    public function getTemplateName()
    {
        return "@enact/small-body-layout";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 3,  24 => 2,  19 => 1,);
    }
}
/* <h1 class='text-center'>{{ enact.siteName }}</h1>*/
/* {% if body %} {{ body }} {% endif %}*/
/* <div id='component'></div>*/
/* */
