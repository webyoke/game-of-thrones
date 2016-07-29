<?php

/* @enact/dashboard */
class __TwigTemplate_6a2e94f6a1f3c88a7cb33842a63cec8270472d7545f2dc1d603297a1333162c9 extends Twig_Template
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
        echo "<div class='row heading-con'>
    <div class='small-10 columns'>
        <h1><span class='fi-dashboard icon'></span> Dashboard</h1>
    </div>
    <div class='small-2 columns text-right'>
        <a class='button' href='";
        // line 6
        echo enact_cpSlug("dashboard/widgets/");
        echo "' title='Manage the widgets used on your Dashboard'><span class='fi-cog icon' style='position:relative;top:2px;'></span></a>
    </div>
</div>

<div class='row collapse content-con'>
    ";
        // line 11
        if ( !(isset($context["widget_count"]) ? $context["widget_count"] : null)) {
            // line 12
            echo "        <div class='info-box'>
            <p>You have not set up any widgets for your dashboard yet!</p>
            <p><a href='";
            // line 14
            echo enact_cpSlug("dashboard/widgets/add");
            echo "'>Add some widgets</a></p>
        </div>
    ";
        } else {
            // line 17
            echo "        <div class='dashboard-widgets'>
            ";
            // line 18
            echo (isset($context["widgets"]) ? $context["widgets"] : null);
            echo "
        </div>
        ";
            // line 20
            if (((isset($context["widget_column_span"]) ? $context["widget_column_span"] : null) > 12)) {
                // line 21
                echo "            ";
                echo $this->getAttribute((isset($context["View"]) ? $context["View"] : null), "libSrc", array(0 => "masonry/dist/masonry.pkgd.min.js"), "method");
                echo "
            ";
                ob_start();
                // line 23
                echo "                if(!Enact.isMobile()){
                    \$('.dashboard-widgets').masonry({
                        selector : '.widget-con',
                        fitWidth : true,
                    });
                }//if
            ";
                $script= ob_get_clean();
                \View::script($script);                // line 30
                echo "        ";
            }
            // line 31
            echo "    ";
        }
        // line 32
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "@enact/dashboard";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 32,  74 => 31,  71 => 30,  62 => 23,  56 => 21,  54 => 20,  49 => 18,  46 => 17,  40 => 14,  36 => 12,  34 => 11,  26 => 6,  19 => 1,);
    }
}
/* <div class='row heading-con'>*/
/*     <div class='small-10 columns'>*/
/*         <h1><span class='fi-dashboard icon'></span> Dashboard</h1>*/
/*     </div>*/
/*     <div class='small-2 columns text-right'>*/
/*         <a class='button' href='{{ cpSlug('dashboard/widgets/') }}' title='Manage the widgets used on your Dashboard'><span class='fi-cog icon' style='position:relative;top:2px;'></span></a>*/
/*     </div>*/
/* </div>*/
/* */
/* <div class='row collapse content-con'>*/
/*     {% if not widget_count %}*/
/*         <div class='info-box'>*/
/*             <p>You have not set up any widgets for your dashboard yet!</p>*/
/*             <p><a href='{{ cpSlug('dashboard/widgets/add') }}'>Add some widgets</a></p>*/
/*         </div>*/
/*     {% else %}*/
/*         <div class='dashboard-widgets'>*/
/*             {{ widgets }}*/
/*         </div>*/
/*         {% if widget_column_span > 12 %}*/
/*             {{ View.libSrc('masonry/dist/masonry.pkgd.min.js') }}*/
/*             {% script %}*/
/*                 if(!Enact.isMobile()){*/
/*                     $('.dashboard-widgets').masonry({*/
/*                         selector : '.widget-con',*/
/*                         fitWidth : true,*/
/*                     });*/
/*                 }//if*/
/*             {% endscript %}*/
/*         {% endif %}*/
/*     {% endif %}*/
/* </div>*/
/* */
