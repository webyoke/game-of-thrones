<?php

class DisqusPlugin extends \Enact\Plugin {


    const SHORTCODE_CONFIG = 'disqus.shortcode';


    private static $shortcode = false;



    public function name(){
        return 'Disqus';
    }//name



    public function creator(){
        return 'WebYoke';
    }//creator


    public function website(){
        return 'http://webyoke.com';
    }//website


    public function version(){
        return 1.0;
    }//version


    public function githubLink(){
        return 'https://github.com/webyoke/enact-cms-disqus-plugin';
    }//githubLink


    public function onInstall(){
        enact()->with('ConfigSetting')->create(self::SHORTCODE_CONFIG,'');
    }//onInstall



    public function onUnInstall(){
        enact()->with('ConfigSetting')->delete(self::SHORTCODE_CONFIG);
    }//onInstall



    public function onBoot(){

        require 'vendor/autoload.php';

    }//onBoot


    public function templatePath(){
        return 'app/template/';
    }//templatePath



    public function template(){
        return new \Disqus\Template;
    }//template


    public function configUri(){
        return enact_cpSlug('/plugin/disqus');
    }//configUri



    public function fields(){

        return Array(
            new Disqus\field\CommentsDefinition,
        );

    }//fields



    public function privateRoutes(){

        \Router::get($this->configUri(),'Disqus\controller\Disqus@getIndex');
        \Router::post($this->configUri(),'Disqus\controller\Disqus@postIndex');

    }//privateRoutes



    public function getSiteShortCode(){

        if(self::$shortcode === false){
            self::$shortcode = enact()->with('ConfigSetting')->setting(self::SHORTCODE_CONFIG);
        }//if

        return self::$shortcode;

    }//getSiteShortCode



}//DisqusPlugin

return new DisqusPlugin;
