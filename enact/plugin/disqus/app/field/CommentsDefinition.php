<?php
namespace Disqus\field;

class CommentsDefinition {


    public function name(){
        return 'Disqus Comments';
    }//name



    public function fieldAssets(){
        return Array(
            '/js/jsx/CommentsField.js'
        );
    }//fieldAssets



    public function optionsAssets(){
        return Array(
            '/js/jsx/CommentsFieldOptions.js'
        );
    }//optionsAssets



    public function fieldClass(){
        return 'Disqus\field\Comments';
    }//fieldClass



}//CommentsDefinition
