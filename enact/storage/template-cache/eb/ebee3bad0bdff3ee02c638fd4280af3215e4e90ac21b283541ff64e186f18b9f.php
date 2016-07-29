<?php

/* @enact/footer.html */
class __TwigTemplate_b419becc32a5eecbc422d153e4349c4f722e1be49f51243368fc6319ee5bc187 extends Twig_Template
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
        echo "<div class='footer-bg'>
    <div class='row text-center'>
        <div>
            <a href='https://enactcms.com' target='_blank'>Enact</a> ";
        // line 4
        echo (isset($context["edition"]) ? $context["edition"] : null);
        echo " v";
        echo (isset($context["version"]) ? $context["version"] : null);
        echo "  
            ";
        // line 5
        if (((isset($context["user_is_admin"]) ? $context["user_is_admin"] : null) && ((isset($context["edition"]) ? $context["edition"] : null) != "Client"))) {
            // line 6
            echo "                <a class='upgrade-enact'>(Upgrade)</a>
            ";
        }
        // line 8
        echo "            ";
        if ((isset($context["user_can_system_update"]) ? $context["user_can_system_update"] : null)) {
            // line 9
            echo "                <a href='";
            echo enact_cpSlug("system-update/");
            echo "'>
                    ";
            // line 10
            if (((isset($context["updates"]) ? $context["updates"] : null) != 0)) {
                // line 11
                echo "                    <span class='fi-bullhorn updates-icon'></span>";
                echo (isset($context["updates"]) ? $context["updates"] : null);
                echo " update";
                if (((isset($context["updates"]) ? $context["updates"] : null) != 1)) {
                    echo "s";
                }
                echo " available
                    ";
            } else {
                // line 13
                echo "                        (check for updates)
                    ";
            }
            // line 15
            echo "                </a>
            ";
        }
        // line 17
        echo "        </div>
        ";
        // line 18
        if ((isset($context["user_can_bug_report"]) ? $context["user_can_bug_report"] : null)) {
            // line 19
            echo "        <div class='bar'>|</div>
        <a href='";
            // line 20
            echo enact_cpSlug("bug/");
            echo "'>Report Bug</a>
        ";
        }
        // line 22
        echo "        <div class='bar'>|</div>
        <div>Released ";
        // line 23
        echo (isset($context["released"]) ? $context["released"] : null);
        echo "</div>
        <div class='bar'>|</div>
        <div>Copyright ";
        // line 25
        echo (isset($context["year"]) ? $context["year"] : null);
        echo " <a href='http://webyoke.com' target='_blank'>WebYoke</a> All rights reserved.</div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@enact/footer.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 25,  80 => 23,  77 => 22,  72 => 20,  69 => 19,  67 => 18,  64 => 17,  60 => 15,  56 => 13,  46 => 11,  44 => 10,  39 => 9,  36 => 8,  32 => 6,  30 => 5,  24 => 4,  19 => 1,);
    }
}
/* <div class='footer-bg'>*/
/*     <div class='row text-center'>*/
/*         <div>*/
/*             <a href='https://enactcms.com' target='_blank'>Enact</a> {{ edition }} v{{ version }}  */
/*             {% if user_is_admin and edition != 'Client' %}*/
/*                 <a class='upgrade-enact'>(Upgrade)</a>*/
/*             {% endif %}*/
/*             {% if user_can_system_update %}*/
/*                 <a href='{{ cpSlug('system-update/') }}'>*/
/*                     {% if updates != 0 %}*/
/*                     <span class='fi-bullhorn updates-icon'></span>{{ updates }} update{% if updates != 1 %}s{% endif %} available*/
/*                     {% else %}*/
/*                         (check for updates)*/
/*                     {% endif %}*/
/*                 </a>*/
/*             {% endif %}*/
/*         </div>*/
/*         {% if user_can_bug_report %}*/
/*         <div class='bar'>|</div>*/
/*         <a href='{{ cpSlug('bug/') }}'>Report Bug</a>*/
/*         {% endif %}*/
/*         <div class='bar'>|</div>*/
/*         <div>Released {{ released }}</div>*/
/*         <div class='bar'>|</div>*/
/*         <div>Copyright {{ year }} <a href='http://webyoke.com' target='_blank'>WebYoke</a> All rights reserved.</div>*/
/*     </div>*/
/* </div>*/
/* */
