<?php

/* index.html */
class __TwigTemplate_64668c214f0ca18ec44871ed5bd4384c174c603a22e9666ce42239d6ec53cfd0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("_layout.html", "index.html", 1);
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
        $context["bgImage"] = "/img/art/tumblr_ne6qgitaXJ1qjvigio1_1280.jpg";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <h1 class='primary-title'>";
        echo $this->getAttribute((isset($context["entry"]) ? $context["entry"] : null), "title", array());
        echo "</h1>
    ";
        // line 7
        echo $this->getAttribute($this->getAttribute((isset($context["entry"]) ? $context["entry"] : null), "video", array()), "fullWidth", array());
        echo "
    ";
        // line 8
        echo $this->getAttribute((isset($context["entry"]) ? $context["entry"] : null), "body", array());
        echo "
";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 8,  39 => 7,  34 => 6,  31 => 5,  27 => 1,  25 => 3,  11 => 1,);
    }
}
/* {% extends "_layout.html" %}*/
/* */
/* {% set bgImage = "/img/art/tumblr_ne6qgitaXJ1qjvigio1_1280.jpg" %}*/
/* */
/* {% block content %}*/
/*     <h1 class='primary-title'>{{ entry.title }}</h1>*/
/*     {{ entry.video.fullWidth }}*/
/*     {{ entry.body }}*/
/* {% endblock %}*/
/* */
