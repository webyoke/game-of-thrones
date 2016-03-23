<?php

class SoundCloudPlugin extends \Enact\Plugin {



    public function name(){
        return 'SoundCloud';
    }//name



    public function author(){
        return 'webyoke.com';
    }//author



    public function version(){
        return 1.0;
    }//version



    public function onBoot(){

        enact()->registerAlias('soundcloud', dirname(__FILE__) . '/');

        require 'vendor/autoload.php';

    }//onBoot



    public function fields(){

        return Array(

            'SoundCloud' => Array(

                'options_assets' => Array(
                    '/js/jsx/SoundCloudFieldOptions.js',
                    '/js/PlayerOptions.js'
                ),

                'assets' => Array(
                    '/js/jsx/SoundCloudField.js',
                    '/js/PlayerOptions.js'
                ),

                'class' => 'SoundCloud\field\SoundCloud'
            )
        );

    }//fields



}//SoundCloudPlugin



return new SoundCloudPlugin;
