<?php

/* @enact/widget/recent-entries.html */
class __TwigTemplate_e9f4174bf75e148cf6b90793cf9a1b3ca987ee3970495509ea0c8a9b3cbf983d extends Twig_Template
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
        echo "<div class='text-center'>
";
        // line 2
        if (((isset($context["section"]) ? $context["section"] : null) == "all")) {
            // line 3
            echo "    <h6>Recent Entries</h6>
";
        } else {
            // line 5
            echo "    <h6>Recent Entires in ";
            echo $this->getAttribute($this->getAttribute((isset($context["entries"]) ? $context["entries"] : null), 0, array(), "array"), "sectionName", array());
            echo "</h6>
";
        }
        // line 7
        echo "</div>

";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entries"]) ? $context["entries"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
            // line 10
            echo "    <div class='recent-entry'>
        <a style='font-size:.55em;' href='";
            // line 11
            echo $this->getAttribute($context["e"], "url", array());
            echo "' class='fi-external-link icon' target='_blank'></a>
        <a href='";
            // line 12
            echo enact_cpSlug(("entry/" . $this->getAttribute($context["e"], "id", array())));
            echo "'>";
            echo $this->getAttribute($context["e"], "title", array());
            echo "</a>
        <div><small>
                ";
            // line 14
            if (((isset($context["section"]) ? $context["section"] : null) == "all")) {
                // line 15
                echo "                    In ";
                echo $this->getAttribute($context["e"], "sectionName", array());
                echo " on 
                ";
            }
            // line 17
            echo "                ";
            echo twig_date_format_filter($this->env, $this->getAttribute($context["e"], "created_on", array()), "m/d/Y");
            echo "
        </small></div>
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "
";
        ob_start();
        // line 23
        echo ".recent-entry {
    border-bottom:1px solid #D2D2D2;
    padding-bottom:4px;
    margin-bottom:4px;
    font-size:.9em;
}
";
        $style = ob_get_clean();
        \View::style($style);    }

    public function getTemplateName()
    {
        return "@enact/widget/recent-entries.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 23,  75 => 21,  64 => 17,  58 => 15,  56 => 14,  49 => 12,  45 => 11,  42 => 10,  38 => 9,  34 => 7,  28 => 5,  24 => 3,  22 => 2,  19 => 1,);
    }
}
/* <div class='text-center'>*/
/* {% if section == 'all' %}*/
/*     <h6>Recent Entries</h6>*/
/* {% else %}*/
/*     <h6>Recent Entires in {{ entries[0].sectionName }}</h6>*/
/* {% endif %}*/
/* </div>*/
/* */
/* {% for e in entries %}*/
/*     <div class='recent-entry'>*/
/*         <a style='font-size:.55em;' href='{{ e.url }}' class='fi-external-link icon' target='_blank'></a>*/
/*         <a href='{{ cpSlug('entry/' ~ e.id) }}'>{{ e.title }}</a>*/
/*         <div><small>*/
/*                 {% if section == 'all' %}*/
/*                     In {{ e.sectionName }} on */
/*                 {% endif %}*/
/*                 {{ e.created_on|date('m/d/Y') }}*/
/*         </small></div>*/
/*     </div>*/
/* {% endfor %}*/
/* */
/* {% style %}*/
/* .recent-entry {*/
/*     border-bottom:1px solid #D2D2D2;*/
/*     padding-bottom:4px;*/
/*     margin-bottom:4px;*/
/*     font-size:.9em;*/
/* }*/
/* {% endstyle %}*/
/* */
