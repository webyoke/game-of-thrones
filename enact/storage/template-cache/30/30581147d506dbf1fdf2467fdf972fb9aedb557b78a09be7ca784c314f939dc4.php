<?php

/* books.html */
class __TwigTemplate_3b26d9c5cc368b6ed4eba68cbb916423fe5fe5f9c747832ee858a5e11074f801 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("_layout.html", "books.html", 1);
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
        $context["bgImage"] = "/img/art/tumblr_ne6qgitaXJ1qjvigio2_1280.jpg";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <h1 class='text-center'>";
        echo $this->getAttribute((isset($context["entry"]) ? $context["entry"] : null), "title", array());
        echo "</h1>

    ";
        // line 8
        $context["books"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["enact"]) ? $context["enact"] : null), "entry", array()), "sectionHandle", array(0 => "books"), "method"), "fetch", array());
        // line 9
        echo "
    <ul class='book-covers'>
    ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["books"]) ? $context["books"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["book"]) {
            // line 12
            echo "        <li><a href='";
            echo $this->getAttribute($context["book"], "url", array());
            echo "'>";
            echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["book"], "bookCover", array()), "assetFieldHandle", array()), 0, array(), "array"), "getImgHtml", array(), "method");
            echo "</a></li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['book'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "    </ul>

    ";
        // line 16
        echo $this->getAttribute((isset($context["entry"]) ? $context["entry"] : null), "body", array());
        echo "
";
    }

    public function getTemplateName()
    {
        return "books.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 16,  61 => 14,  50 => 12,  46 => 11,  42 => 9,  40 => 8,  34 => 6,  31 => 5,  27 => 1,  25 => 3,  11 => 1,);
    }
}
/* {% extends "_layout.html" %}*/
/* */
/* {% set bgImage = "/img/art/tumblr_ne6qgitaXJ1qjvigio2_1280.jpg" %}*/
/* */
/* {% block content %}*/
/*     <h1 class='text-center'>{{ entry.title }}</h1>*/
/* */
/*     {% set books = enact.entry.sectionHandle('books').fetch %}*/
/* */
/*     <ul class='book-covers'>*/
/*     {% for book in books %}*/
/*         <li><a href='{{ book.url }}'>{{ book.bookCover.assetFieldHandle[0].getImgHtml() }}</a></li>*/
/*     {% endfor %}*/
/*     </ul>*/
/* */
/*     {{ entry.body }}*/
/* {% endblock %}*/
/* */
