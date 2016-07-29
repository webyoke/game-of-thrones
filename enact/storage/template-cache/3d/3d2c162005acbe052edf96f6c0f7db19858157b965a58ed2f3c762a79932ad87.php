<?php

/* @enact/_layout.html */
class __TwigTemplate_da077c0c100678664d0189fda172beab70fd67e5db68f5dcb898ab0d3969af2c extends Twig_Template
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
        echo "<!DOCTYPE HTML>
<html lang='";
        // line 2
        echo $this->getAttribute((isset($context["View"]) ? $context["View"] : null), "lang", array());
        echo "'>
    <head>
        <meta charset='";
        // line 4
        echo $this->getAttribute((isset($context["View"]) ? $context["View"] : null), "charset", array());
        echo "' />
        <meta content='";
        // line 5
        echo $this->getAttribute((isset($context["View"]) ? $context["View"] : null), "robots", array());
        echo "' name='robots'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0' />
        <title>";
        // line 7
        echo $this->getAttribute((isset($context["View"]) ? $context["View"] : null), "title", array());
        echo " | ";
        if ( !$this->getAttribute((isset($context["View"]) ? $context["View"] : null), "getViewVariable", array(0 => "doingInstall"), "method")) {
            echo $this->getAttribute((isset($context["enact"]) ? $context["enact"] : null), "siteName", array());
            echo " |";
        }
        echo " Enact CMS</title>
        ";
        // line 8
        if ($this->getAttribute((isset($context["View"]) ? $context["View"] : null), "description", array())) {
            // line 9
            echo "        <meta name='description' content=\"";
            echo $this->getAttribute((isset($context["View"]) ? $context["View"] : null), "description", array());
            echo "\">
        ";
        }
        // line 11
        echo "
        <link type='image/x-icon' href='";
        // line 12
        echo $this->getAttribute((isset($context["View"]) ? $context["View"] : null), "favIcon", array());
        echo "' rel='shortcut icon'>

        ";
        // line 14
        echo $this->getAttribute((isset($context["View"]) ? $context["View"] : null), "printStyleSrcs", array(), "method");
        echo "

        ";
        // line 16
        echo $this->getAttribute((isset($context["View"]) ? $context["View"] : null), "printStyles", array(), "method");
        echo "

        ";
        // line 18
        echo $this->getAttribute((isset($context["View"]) ? $context["View"] : null), "printHeadScriptSrcs", array(), "method");
        echo "

        ";
        // line 20
        if ($this->getAttribute((isset($context["View"]) ? $context["View"] : null), "headExtra", array())) {
            // line 21
            echo "            ";
            echo $this->getAttribute((isset($context["View"]) ? $context["View"] : null), "headExtra", array());
            echo "
        ";
        }
        // line 23
        echo "
    </head>

    ";
        // line 26
        $context["bodyClasses"] = $this->getAttribute((isset($context["View"]) ? $context["View"] : null), "bodyClasses", array(), "method");
        // line 27
        echo "    <body";
        if ((isset($context["bodyClasses"]) ? $context["bodyClasses"] : null)) {
            echo " class='";
            echo (isset($context["bodyClasses"]) ? $context["bodyClasses"] : null);
            echo "'";
        }
        echo "> 

        ";
        // line 29
        if ($this->getAttribute((isset($context["enact"]) ? $context["enact"] : null), "config", array(0 => "devMode"), "method")) {
            // line 30
            echo "            <div class='dev-mode-strip' title='Your Running in DEV Mode!'></div>
        ";
        }
        // line 32
        echo "
        ";
        // line 33
        $this->displayBlock('content', $context, $blocks);
        // line 34
        echo "
        ";
        // line 35
        $context["bg_img"] = $this->getAttribute((isset($context["View"]) ? $context["View"] : null), "getViewVariable", array(0 => "bg_img"), "method");
        // line 36
        echo "        ";
        if ((isset($context["bg_img"]) ? $context["bg_img"] : null)) {
            // line 37
            echo "            <div class='full-bg-img'>
                <img src='";
            // line 38
            echo (isset($context["bg_img"]) ? $context["bg_img"] : null);
            echo "'/>
            </div>
        ";
        }
        // line 41
        echo "
        <div class='notification-con'></div>

        <noscript>
            <div class='row'>
                <div class='attention-block noscript'>
                    <span class='fi-bullhorn'></span>
                    <div>Enact needs javascript enabled to function!</div>
                </div>
            </div>
        </noscript>

        ";
        // line 53
        echo $this->getAttribute((isset($context["View"]) ? $context["View"] : null), "printScriptSrcs", array(), "method");
        echo "
        ";
        // line 54
        echo $this->getAttribute((isset($context["View"]) ? $context["View"] : null), "printScripts", array(), "method");
        echo "

    </body>
</html>
";
    }

    // line 33
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "@enact/_layout.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 33,  148 => 54,  144 => 53,  130 => 41,  124 => 38,  121 => 37,  118 => 36,  116 => 35,  113 => 34,  111 => 33,  108 => 32,  104 => 30,  102 => 29,  92 => 27,  90 => 26,  85 => 23,  79 => 21,  77 => 20,  72 => 18,  67 => 16,  62 => 14,  57 => 12,  54 => 11,  48 => 9,  46 => 8,  37 => 7,  32 => 5,  28 => 4,  23 => 2,  20 => 1,);
    }
}
/* <!DOCTYPE HTML>*/
/* <html lang='{{ View.lang }}'>*/
/*     <head>*/
/*         <meta charset='{{ View.charset }}' />*/
/*         <meta content='{{ View.robots }}' name='robots'>*/
/*         <meta name='viewport' content='width=device-width, initial-scale=1.0' />*/
/*         <title>{{ View.title }} | {% if not View.getViewVariable('doingInstall') %}{{ enact.siteName }} |{% endif %} Enact CMS</title>*/
/*         {% if View.description %}*/
/*         <meta name='description' content="{{ View.description }}">*/
/*         {% endif %}*/
/* */
/*         <link type='image/x-icon' href='{{ View.favIcon }}' rel='shortcut icon'>*/
/* */
/*         {{ View.printStyleSrcs() }}*/
/* */
/*         {{ View.printStyles() }}*/
/* */
/*         {{ View.printHeadScriptSrcs() }}*/
/* */
/*         {% if View.headExtra %}*/
/*             {{ View.headExtra }}*/
/*         {% endif %}*/
/* */
/*     </head>*/
/* */
/*     {% set bodyClasses = View.bodyClasses() %}*/
/*     <body{% if bodyClasses %} class='{{ bodyClasses }}'{% endif %}> */
/* */
/*         {% if enact.config('devMode') %}*/
/*             <div class='dev-mode-strip' title='Your Running in DEV Mode!'></div>*/
/*         {% endif %}*/
/* */
/*         {% block content %}{% endblock %}*/
/* */
/*         {% set bg_img = View.getViewVariable('bg_img') %}*/
/*         {% if bg_img %}*/
/*             <div class='full-bg-img'>*/
/*                 <img src='{{ bg_img }}'/>*/
/*             </div>*/
/*         {% endif %}*/
/* */
/*         <div class='notification-con'></div>*/
/* */
/*         <noscript>*/
/*             <div class='row'>*/
/*                 <div class='attention-block noscript'>*/
/*                     <span class='fi-bullhorn'></span>*/
/*                     <div>Enact needs javascript enabled to function!</div>*/
/*                 </div>*/
/*             </div>*/
/*         </noscript>*/
/* */
/*         {{ View.printScriptSrcs() }}*/
/*         {{ View.printScripts() }}*/
/* */
/*     </body>*/
/* </html>*/
/* */
