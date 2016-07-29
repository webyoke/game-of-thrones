<?php

/* @enact/_default.html */
class __TwigTemplate_476d3b7a6a0d3d8c3aabb81d2a353ca8aa4af7cdfc317176703283ba22fe91a9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@enact/_layout.html", "@enact/_default.html", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@enact/_layout.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
    <div class='enact'>
        <div class='left-page'>
            ";
        // line 7
        echo $this->getAttribute((isset($context["View"]) ? $context["View"] : null), "getHeader", array());
        echo "
        </div>
        <div class='right-page'>
            <div class='body-min-height-wrapper'>
                <div class='body'>";
        // line 11
        echo $this->getAttribute((isset($context["View"]) ? $context["View"] : null), "body", array());
        echo "</div>
            </div>
            <div class='footer unloaded'>";
        // line 13
        echo $this->getAttribute((isset($context["View"]) ? $context["View"] : null), "getFooter", array());
        echo "</div>
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "@enact/_default.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 13,  43 => 11,  36 => 7,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "@enact/_layout.html" %}*/
/* */
/* {% block content %}*/
/* */
/*     <div class='enact'>*/
/*         <div class='left-page'>*/
/*             {{ View.getHeader }}*/
/*         </div>*/
/*         <div class='right-page'>*/
/*             <div class='body-min-height-wrapper'>*/
/*                 <div class='body'>{{ View.body }}</div>*/
/*             </div>*/
/*             <div class='footer unloaded'>{{ View.getFooter }}</div>*/
/*         </div>*/
/*     </div>*/
/* */
/* {% endblock %}*/
/* */
