<?php

/* author.html */
class __TwigTemplate_2374cce3ca07a2f65d952dc60f1ce81330ea2d7ed232c333b8df1699977d8e44 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("_layout.html", "author.html", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "_layout.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        $context["bgImage"] = "/img/art/tumblr_o2aawoHCDR1sh566ao1_1280.jpg";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "
    <div class='row collapse body'>
        <h1 class='primary-title'>";
        // line 8
        echo $this->getAttribute((isset($context["entry"]) ? $context["entry"] : null), "title", array());
        echo "</h1>
        
        <div class='text-center'>
            ";
        // line 11
        echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entry"]) ? $context["entry"] : null), "image", array()), "assetFieldHandle", array()), 0, array(), "array"), "getImgHtml", array());
        echo " 
        </div>

        ";
        // line 14
        echo $this->getAttribute((isset($context["entry"]) ? $context["entry"] : null), "body", array());
        echo "
    </div>

";
    }

    public function getTemplateName()
    {
        return "author.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 14,  44 => 11,  38 => 8,  34 => 6,  31 => 5,  27 => 1,  25 => 3,  11 => 1,);
    }
}
/* {% extends "_layout.html" %}*/
/* */
/* {% set bgImage = "/img/art/tumblr_o2aawoHCDR1sh566ao1_1280.jpg" %}*/
/* */
/* {% block content %}*/
/* */
/*     <div class='row collapse body'>*/
/*         <h1 class='primary-title'>{{ entry.title }}</h1>*/
/*         */
/*         <div class='text-center'>*/
/*             {{ entry.image.assetFieldHandle[0].getImgHtml }} */
/*         </div>*/
/* */
/*         {{ entry.body }}*/
/*     </div>*/
/* */
/* {% endblock %}*/
/* */
