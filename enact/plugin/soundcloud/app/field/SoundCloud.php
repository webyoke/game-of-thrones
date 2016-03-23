<?php
namespace SoundCloud\field;

class SoundCloud extends \Enact\template\wrapper\BaseFieldWrapper {


    const ENDPOINT = "https://w.soundcloud.com/player/?url=%1\$s";



    public function __toString(){
        return $this->getPlayerHtml(); 
    }//__toString



    public function getPlayerHtml($iframe_props = Array(), $atts = Array()){

        $url = $this->field['field_value'];

        if(!$url){
            return '';
        }//if

        $url = json_decode($url);

        if(!$url->value){
            return '';
        }//if

        //convert the options from a stdclass to an array
        $url->options = (array) $url->options;

        //override any set soundcloud url attributes
        $url->options = array_merge($url->options,$atts);

        //convert booleans to their string equivalent 
        //to prevent http_build_query from coverting them to 1 and 0s 
        foreach($url->options as $key=>$value){
            if($value === true){
                $url->options[$key] = 'true';
            } elseif($value === false){
                $url->options[$key] = 'false';
            }//el
        }//foreach

        //append the atts to the url
        if(count($url->options)){
            $url->value .= '?' . http_build_query($url->options);
        }//if

        $props = Array();
        $props['src'] = sprintf(self::ENDPOINT, $url->value);

        $props['width']         = '100%';
        $props['frameborder']   = 'no';
        $props['scrolling']     = 'no';

        $props = array_merge($props,$iframe_props);

        return \Html::iframe($props);

    }//getPlayerHtml



}//Comments
