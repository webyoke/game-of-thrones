<?php

/* art.html */
class __TwigTemplate_512119c6ae6d0c5a4e8afeb0992caf87a55210cc141e1ec7eba775e0c78b7994 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("_layout.html", "art.html", 1);
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
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
    <h1 class='primary-title'>";
        // line 5
        echo $this->getAttribute((isset($context["entry"]) ? $context["entry"] : null), "title", array());
        echo "</h1>

    <div class='art-con row clearfix'>
    ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["entry"]) ? $context["entry"] : null), "art", array()), "assetFieldHandle", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["asset"]) {
            // line 9
            echo "        <div class='art'>
            ";
            // line 10
            echo $this->getAttribute($context["asset"], "getImgHtml", array());
            echo "
            ";
            // line 11
            $context["author"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["asset"], "getEntry", array()), "imageArtist", array()), "tagFieldHandle", array()), 0, array(), "array"), "getEntry", array());
            // line 12
            echo "            <div class='author heading'>";
            echo $this->getAttribute((isset($context["author"]) ? $context["author"] : null), "name", array());
            echo "</div>
            <a class='website' href='";
            // line 13
            echo $this->getAttribute((isset($context["author"]) ? $context["author"] : null), "website", array());
            echo "' target='_blank'>";
            echo $this->getAttribute((isset($context["author"]) ? $context["author"] : null), "website", array());
            echo "</a>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['asset'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "    </div>

    <div class='reveal-modal' data-reveal id='art-modal'>
        <img id='current-art'/>
        <a class='close-reveal-modal'>&#215;</a>
    </div>

    ";
        ob_start();
        // line 24
        echo "        Art.mount();
    ";
        $script= ob_get_clean();
        \View::script($script);        // line 26
        echo "
";
    }

    public function getTemplateName()
    {
        return "art.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 26,  79 => 24,  69 => 16,  58 => 13,  53 => 12,  51 => 11,  47 => 10,  44 => 9,  40 => 8,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "_layout.html" %}*/
/* */
/* {% block content %}*/
/* */
/*     <h1 class='primary-title'>{{ entry.title }}</h1>*/
/* */
/*     <div class='art-con row clearfix'>*/
/*     {% for asset in entry.art.assetFieldHandle %}*/
/*         <div class='art'>*/
/*             {{ asset.getImgHtml }}*/
/*             {% set author = asset.getEntry.imageArtist.tagFieldHandle[0].getEntry %}*/
/*             <div class='author heading'>{{ author.name }}</div>*/
/*             <a class='website' href='{{ author.website }}' target='_blank'>{{ author.website }}</a>*/
/*         </div>*/
/*     {% endfor %}*/
/*     </div>*/
/* */
/*     <div class='reveal-modal' data-reveal id='art-modal'>*/
/*         <img id='current-art'/>*/
/*         <a class='close-reveal-modal'>&#215;</a>*/
/*     </div>*/
/* */
/*     {% script %}*/
/*         Art.mount();*/
/*     {% endscript %}*/
/* */
/* {% endblock %}*/
/* */
