<?php
namespace Disqus;

class Template {



    public function __toString(){
        return $this->commentsHtml();    
    }//__toString



    public function commentsHtml(){
        return $this->render('@disqus/comments');
    }//commentsHtml



    public function commentsCount(){
        return $this->render('@disqus/comment-count-link');
    }//commentsCount



    public function render($template){

        $shortcode = \DisqusPlugin::instance()->getSiteShortCode();

        if(!$shortcode){
            return '<div>In order to use disqus you need to <a href="' . \DisqusPlugin::instance()->configUri() . '">set up your configuration</a></div>';
        }//if

        $id = \Request::path();

        return \Template::build($template, Array(
            'id'        => $id,
            'url'       => $id,
            'shortcode' => $shortcode
        ));
       
    }//render



}//Template
