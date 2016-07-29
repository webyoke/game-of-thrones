<?php

/* _layout.html */
class __TwigTemplate_e90ffd37df4403555e827335acc12df956d97c62eac7a4977483d4245f887465 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html lang='en'>
    <head>
        <meta charset='utf-8' />
        <meta content='index,follow' name='robots'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0' />
        ";
        // line 7
        echo $this->getAttribute($this->getAttribute((isset($context["enact"]) ? $context["enact"] : null), "view", array()), "styleSrc", array(0 => "/resource/css/foundation.min.css"), "method");
        echo "
        ";
        // line 8
        echo $this->getAttribute($this->getAttribute((isset($context["enact"]) ? $context["enact"] : null), "view", array()), "styleSrc", array(0 => "/resource/css/open-iconic-foundation.min.css"), "method");
        echo "
        ";
        // line 9
        echo $this->getAttribute($this->getAttribute((isset($context["enact"]) ? $context["enact"] : null), "view", array()), "styleSrc", array(0 => "/resource/css/css.css"), "method");
        echo "

        <title>";
        // line 11
        echo $this->getAttribute($this->getAttribute((isset($context["enact"]) ? $context["enact"] : null), "view", array()), "title", array());
        echo "</title>

    </head>
    <body> 

        ";
        // line 16
        if ((isset($context["bgImage"]) ? $context["bgImage"] : null)) {
            // line 17
            echo "            <div class='bg-image'>
                <div class='layer'></div>
                <img src='";
            // line 19
            echo (isset($context["bgImage"]) ? $context["bgImage"] : null);
            echo "'/>
            </div>
        ";
        }
        // line 22
        echo "
        <div class='content-con'>
            <div class='menu'>
                <a href='/' title='Game of Thrones Homepage'>
                    <div class='fi-home icon'></div>
                    <span class='heading'>GoT</span>
                </a>
                <a href='/author' title='George RR Martin, Author of A Song of Ice and Fire (Game of Thrones)'>
                    <div class='fi-person icon'></div>
                    <span>Author</span>
                </a>
                <a href='/books/'>
                    <div class='fi-book icon'></div>
                    <span>Books</span>
                </a>
                <a href='/house/'>
                    <div class='fi-people icon'></div>
                    <span>Houses</span>
                </a>
                <a href='/art'>
                    <div class='fi-image icon'></div>
                    <span>Art</span>
                </a>
                <a href='/resources'>
                    <div class='fi-flag icon'></div>
                    <span>Resources</span>
                </a>
            </div>
            <div class='content-holder'>
                <div class='content'>
                    ";
        // line 52
        $this->displayBlock('content', $context, $blocks);
        // line 54
        echo "                </div>
            </div>
        </div>

        ";
        // line 58
        echo $this->getAttribute($this->getAttribute((isset($context["enact"]) ? $context["enact"] : null), "view", array()), "scriptSrc", array(0 => "https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"), "method");
        echo "
        ";
        // line 59
        echo $this->getAttribute($this->getAttribute((isset($context["enact"]) ? $context["enact"] : null), "view", array()), "scriptSrc", array(0 => "/resource/js/foundation.min.js"), "method");
        echo "
        ";
        // line 60
        echo $this->getAttribute($this->getAttribute((isset($context["enact"]) ? $context["enact"] : null), "view", array()), "scriptSrc", array(0 => "/resource/js/modernizr.js"), "method");
        echo "
        ";
        // line 61
        echo $this->getAttribute($this->getAttribute((isset($context["enact"]) ? $context["enact"] : null), "view", array()), "scriptSrc", array(0 => "/resource/js/js.js"), "method");
        echo "

    </body>
</html>
";
    }

    // line 52
    public function block_content($context, array $blocks = array())
    {
        // line 53
        echo "                    ";
    }

    public function getTemplateName()
    {
        return "_layout.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 53,  122 => 52,  113 => 61,  109 => 60,  105 => 59,  101 => 58,  95 => 54,  93 => 52,  61 => 22,  55 => 19,  51 => 17,  49 => 16,  41 => 11,  36 => 9,  32 => 8,  28 => 7,  20 => 1,);
    }
}
/* <!doctype html>*/
/* <html lang='en'>*/
/*     <head>*/
/*         <meta charset='utf-8' />*/
/*         <meta content='index,follow' name='robots'>*/
/*         <meta name='viewport' content='width=device-width, initial-scale=1.0' />*/
/*         {{ enact.view.styleSrc('/resource/css/foundation.min.css') }}*/
/*         {{ enact.view.styleSrc('/resource/css/open-iconic-foundation.min.css') }}*/
/*         {{ enact.view.styleSrc('/resource/css/css.css') }}*/
/* */
/*         <title>{{ enact.view.title }}</title>*/
/* */
/*     </head>*/
/*     <body> */
/* */
/*         {% if bgImage %}*/
/*             <div class='bg-image'>*/
/*                 <div class='layer'></div>*/
/*                 <img src='{{ bgImage }}'/>*/
/*             </div>*/
/*         {% endif %}*/
/* */
/*         <div class='content-con'>*/
/*             <div class='menu'>*/
/*                 <a href='/' title='Game of Thrones Homepage'>*/
/*                     <div class='fi-home icon'></div>*/
/*                     <span class='heading'>GoT</span>*/
/*                 </a>*/
/*                 <a href='/author' title='George RR Martin, Author of A Song of Ice and Fire (Game of Thrones)'>*/
/*                     <div class='fi-person icon'></div>*/
/*                     <span>Author</span>*/
/*                 </a>*/
/*                 <a href='/books/'>*/
/*                     <div class='fi-book icon'></div>*/
/*                     <span>Books</span>*/
/*                 </a>*/
/*                 <a href='/house/'>*/
/*                     <div class='fi-people icon'></div>*/
/*                     <span>Houses</span>*/
/*                 </a>*/
/*                 <a href='/art'>*/
/*                     <div class='fi-image icon'></div>*/
/*                     <span>Art</span>*/
/*                 </a>*/
/*                 <a href='/resources'>*/
/*                     <div class='fi-flag icon'></div>*/
/*                     <span>Resources</span>*/
/*                 </a>*/
/*             </div>*/
/*             <div class='content-holder'>*/
/*                 <div class='content'>*/
/*                     {% block content %}*/
/*                     {% endblock %}*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/* */
/*         {{ enact.view.scriptSrc('https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js') }}*/
/*         {{ enact.view.scriptSrc('/resource/js/foundation.min.js') }}*/
/*         {{ enact.view.scriptSrc('/resource/js/modernizr.js') }}*/
/*         {{ enact.view.scriptSrc('/resource/js/js.js') }}*/
/* */
/*     </body>*/
/* </html>*/
/* */
