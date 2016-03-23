<?php

class InstagramPlugin extends \Enact\Plugin {



    public function name(){
        return 'Instagram';
    }//name



    public function author(){
        return 'webyoke.com';
    }//author



    public function version(){
        return 1.0;
    }//version



    public function onBoot(){

        enact()->registerAlias('instagram', dirname(__FILE__) . '/');

        require 'vendor/autoload.php';

    }//onBoot



    public function fields(){

        return Array(

            'Instagram' => Array(

                'options_assets' => Array(
                    '/js/jsx/FieldOptions.js'
                ),

                'assets' => Array(
                    '/js/jsx/Field.js'
                ),

                'class' => 'Instagram\field\Instagram'
            )
        );

    }//fields



}//InstagramPlugin



return new InstagramPlugin;
