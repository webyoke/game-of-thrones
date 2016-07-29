<?php

/* @enact/_layout-small.html */
class __TwigTemplate_5060eb3d09eccbbf0e0f451df35e753e097fbc1f2c4733991afbd51b462498ca extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@enact/_layout.html", "@enact/_layout-small.html", 1);
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
        <div class='body'>";
        // line 6
        echo $this->getAttribute((isset($context["View"]) ? $context["View"] : null), "body", array());
        echo "</div>
    </div>

    <a class='enact-logo' target='_blank' href='https://enactcms.com'>
        <img src='";
        // line 10
        echo enact_cpSlug("resource/img/logo-black.png");
        echo "'/>
        <h6>CMS</h6>
    </a>

";
        ob_start();
        // line 15
        echo "    Enact.verticalCenterBody();
";
        $script= ob_get_clean();
        \View::script($script);        // line 17
        echo "
";
    }

    public function getTemplateName()
    {
        return "@enact/_layout-small.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 17,  50 => 15,  42 => 10,  35 => 6,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "@enact/_layout.html" %}*/
/* */
/* {% block content %}*/
/* */
/*     <div class='enact'>*/
/*         <div class='body'>{{ View.body }}</div>*/
/*     </div>*/
/* */
/*     <a class='enact-logo' target='_blank' href='https://enactcms.com'>*/
/*         <img src='{{ cpSlug('resource/img/logo-black.png') }}'/>*/
/*         <h6>CMS</h6>*/
/*     </a>*/
/* */
/* {% script %}*/
/*     Enact.verticalCenterBody();*/
/* {% endscript %}*/
/* */
/* {% endblock %}*/
/* */
/* */
/* */
