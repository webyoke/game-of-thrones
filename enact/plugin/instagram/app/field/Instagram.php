<?php
namespace Instagram\field;

class Instagram extends \Enact\template\wrapper\BaseFieldWrapper {

    private static $included_embed = false;

    private $gram;


    public function __construct($field){

        $this->field = $field;

        $gram = $this->field['field_value'];

        if(!$gram){
            $gram = new stdClass;
        } else {
            $gram = json_decode($gram);
        }//el
        
        $this->gram = $gram;


    }//__construct



    public function __toString(){
        return $this->getGramHtml(); 
    }//__toString



    public function getGramProperty($prop){

        if(!$this->gram->options || !property_exists($this->gram->options,$prop)){
            return '';
        }//if

        return $this->gram->options->{$prop};

    }//getGramProperty



    public function getGramHtml($iframe_props = Array(), $atts = Array()){

        if(!$this->gram->value){
            return '';
        }//if

        $script = '';

        if(!self::$included_embed){
            self::$included_embed = true;
            $script = '<script async defer src="//platform.instagram.com/en_US/embeds.js"></script>';
        }//if

        return $this->getGramProperty('html') . $script;

    }//getGramHtml



}//Instagram
