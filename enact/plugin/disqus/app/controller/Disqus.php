<?php
namespace Disqus\controller;

class Disqus {


    public function getIndex(){

        $data = Array();

        $data['shortcode'] = enact()->with('ConfigSetting')->setting(\DisqusPlugin::SHORTCODE_CONFIG);

        \View::title('Disqus Plugin Configuration');
        enact()->with('Plugin')->getPlugin('Disqus')->includeResource('/js/jsx/DisqusConfig.js');

        \View::html('<div id="disqus"></div>');

        $data = json_encode($data);

        \View::script("
            React.render(React.createElement(Enact.react_class.DisqusConfig,{$data}),document.getElementById('disqus'));
        ");

    }//getIndex



    public function postIndex(){

        $data = \Data::post(Array('shortcode'));

        if(!$data['shortcode']){
            enact_ajaxResponse('Shortcode cannot be empty!',1);
        }//if

        enact()->with('ConfigSetting')->set(\DisqusPlugin::SHORTCODE_CONFIG,$data['shortcode']);

        enact_ajaxResponse('Success!',0);

    }//postIndex


}//Disqus
