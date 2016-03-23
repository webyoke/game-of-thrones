<?php

class DisqusPlugin extends \Enact\Plugin {


    const SHORTCODE_CONFIG = 'disqus.shortcode';


    public function name(){
        return 'Disqus';
    }//name



    public function author(){
        return 'webyoke.com';
    }//author



    public function version(){
        return 1.0;
    }//version



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


    public function configUri(){
        return '/admin/plugin/disqus';
    }//configUri



    public function fields(){

        return Array(

            'Disqus Comments' => Array(

                'options_assets' => Array(
                    '/js/jsx/CommentsFieldOptions.js'
                ),

                'assets' => Array(
                    '/js/jsx/CommentsField.js'
                ),

                'class' => 'Disqus\field\Comments'
            )
        );

    }//fields



    public function privateRoutes(){

        \Router::get('/admin/plugin/disqus','Disqus\controller\Disqus@getIndex');
        \Router::post('/admin/plugin/disqus','Disqus\controller\Disqus@postIndex');

    }//privateRoutes



}//DisqusPlugin

return new DisqusPlugin;
