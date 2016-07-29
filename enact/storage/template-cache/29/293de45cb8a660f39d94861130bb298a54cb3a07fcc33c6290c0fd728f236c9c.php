<?php

/* resources.html */
class __TwigTemplate_b851b0d730a23c1001c73f34510886677d768a5c4a9e1511b93e0ae7bb1a8f5e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("_layout.html", "resources.html", 1);
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
    <h1 class='primary-title'>Resources</h1>

    ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["entry"]) ? $context["entry"] : null), "resource", array()), "matrixFieldHandle", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["resource"]) {
            // line 10
            echo "        ";
            if (($this->getAttribute($context["resource"], "handle", array()) == "resource")) {
                // line 11
                echo "            <div class='resource'>
                <h2>";
                // line 12
                echo $this->getAttribute($context["resource"], "title", array());
                echo "</h2>
                <a href='";
                // line 13
                echo $this->getAttribute($context["resource"], "link", array());
                echo "' href='_blank'>";
                echo $this->getAttribute($context["resource"], "link", array());
                echo "</a>
                <p>";
                // line 14
                echo $this->getAttribute($context["resource"], "description", array());
                echo "</p>
            </div>
        ";
            }
            // line 17
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['resource'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "
";
    }

    public function getTemplateName()
    {
        return "resources.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 18,  65 => 17,  59 => 14,  53 => 13,  49 => 12,  46 => 11,  43 => 10,  39 => 9,  34 => 6,  31 => 5,  27 => 1,  25 => 3,  11 => 1,);
    }
}
/* {% extends "_layout.html" %}*/
/* */
/* {% set bgImage = "/img/art/tumblr_o2aawoHCDR1sh566ao1_1280.jpg" %}*/
/* */
/* {% block content %}*/
/* */
/*     <h1 class='primary-title'>Resources</h1>*/
/* */
/*     {% for resource in entry.resource.matrixFieldHandle %}*/
/*         {% if resource.handle == 'resource' %}*/
/*             <div class='resource'>*/
/*                 <h2>{{ resource.title }}</h2>*/
/*                 <a href='{{ resource.link }}' href='_blank'>{{ resource.link}}</a>*/
/*                 <p>{{ resource.description }}</p>*/
/*             </div>*/
/*         {% endif %}*/
/*     {% endfor %}*/
/* */
/* {% endblock %}*/
/* */
