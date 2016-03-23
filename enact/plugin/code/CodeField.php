<?php
namespace Code\field;

class Code extends \Enact\template\wrapper\BaseFieldWrapper {


    private static $included_pretty_print = false;


    public function __toString(){
        return $this->render();
    }//toString



    public function render(){

        $output = '';

        if(!self::$included_pretty_print){
            $output = '<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>';
            $output .= 
'<script type="text/javascript">
    var style   = document.createElement( "link" );
    style.rel   = "stylesheet";
    style.type  = "text/css";
    style.href  = "' . enact_cpSlug('resource/:code:/css/sunburst.css') . '";
    document.getElementsByTagName( "head" )[0].appendChild( style );
</script>';
            self::$included_pretty_print = true;
        }//if

        $linenums = '';
        if(property_exists($this->field['field_options'],'linenums') && $this->field['field_options']->linenums == '1'){
            $linenums = ' linenums';
        }//if

        $output .= \Html::pre(Array(
                'class' => 'prettyprint' . $linenums,
            ),
            htmlentities($this->field['field_value'])
        );

        return $output;

    }//render


}//Code

?>
