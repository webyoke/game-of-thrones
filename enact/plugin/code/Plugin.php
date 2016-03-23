<?php

class CodePlugin extends \Enact\Plugin {


    public function name(){
        return 'Code';
    }//name



    public function author(){
        return 'webyoke.com';
    }//author



    public function version(){
        return 1.0;
    }//version



    public function fields(){

        require_once 'CodeField.php';

        return Array(

            'Code' => Array(

                'options_assets' => Array(
                    '/js/jsx/CodeFieldOptions.js'
                ),

                'assets' => Array(
                    '/js/jsx/CodeField.js'
                ),

                'class' => 'Code\field\Code'
            )
        );

    }//fields



}//CodePlugin

return new CodePlugin;
