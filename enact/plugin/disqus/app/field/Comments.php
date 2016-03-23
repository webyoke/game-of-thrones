<?php
namespace Disqus\field;

class Comments extends \Enact\template\wrapper\BaseFieldWrapper {

    public static $shortcode = false;


    public function __toString(){
        return $this->commentsHtml(); 
    }//__toString



    public function areTurnedOn(){
        return $this->field['field_value'] == 'on';
    }//areTurnedOn



    public function getSiteShortCode(){

        if(self::$shortcode === false){
            self::$shortcode = enact()->with('ConfigSetting')->setting(\DisqusPlugin::SHORTCODE_CONFIG);
        }//if

        return self::$shortcode;

    }//getSiteShortCode



    public function commentsHtml(){

        return $this->render('@disqus/comments');

    }//commentsHtml



    public function commentsCount(){

        return $this->render('@disqus/comment-count-link');
       
    }//commentsCount



    public function render($template){

        if(!$this->areTurnedOn()){
            return null;
        }//if

        $shortcode = $this->getSiteShortCode();

        if(!$shortcode){
            return '<div>In order to use disqus you need to <a href="/admin/plugin/disqus">set up your configuration</a></div>';
        }//if

        return \Template::build($template, Array(
            'id'        => $this->entry['id'],
            'url'       => $this->entry['url'],
            'shortcode' => $shortcode
        ));
       
    }//commentsCount




}//Comments
