<?php
namespace EmailNewsletter\controller;

class Subscribe extends \Disco\classes\Controller {



    /**
     * POST `/email-newsletter-subscribe`.
     *
     *
     * Add a new email to the subscribers list. Emails are added via the pre-provided form loaded by 
     * `@emailnewsletter:subscribe-form.html` or by creating your own form and pointing it to 
     * `email-newsletter-subscribe`.
     *
     * In the post data you must provide:
     * - `email` : The email to add to the subscribers list.
     * - `submit-uri` : The URI to redirect to after the action, whether it fails or not.
     *
     * Determine success or error by checking the session flash data:
     * - `email-newsletter-subscribe-error` : Set to a string providing information about the error.
     * - `email-newsletter-subscribe-success` : Set to `1` if email was successfully subscribed.
     *
    */
    public function postSubscribe(){

        $data = Array();

        $ajax = \Data::post('ajax');

        $data['email'] = trim(\Data::post('email'));

        if(stripos($data['email'],'@') !== false){
            
            $data['ip_address'] = \Request::ip();
            $data['created_on'] = Array('raw' => 'NOW()');
            $data['token']      = \Crypt::hash(time() . $data['email']);

            $record = new \EmailNewsletter\record\Email($data);

            try {

                $record->insert();

                $message = 'Thanks for subscribing!';

                if($ajax){
                    $this->json(Array('success' => $message));
                }//if

                \Session::setFlash('email-newsletter-subscribe-success',$message);

            } catch(\Exception $e){

                \Enact::logError($e->getMessage());

                $message = 'We were unable to subscribe you to our email list, please try again later.';

                if($ajax){
                    $this->json(Array('error' => $message));
                }//if

                \Session::setFlash('email-newsletter-subscribe-error',$message);

            }//catch

        } else {

            $message = 'Please enter a valid email address and try again';

            if($ajax){
                $this->json(Array('error' => $message));
            }//if

            \Session::setFlash('email-newsletter-subscribe-error',$message);

        }//el

        $this->redirect(\Data::post('submit-uri'));

    }//postSubscribe



    public function getUnSubscribe($token){

        $record = \EmailNewsletter\record\Email::find(Array('token' => $token),'id');

        if($record){
            $record->delete();
        }//if

        if(\Template::isTemplate('emailnewsletter/unsubscribed')){

            \View::title('You Unsubscribed From Our Newsletter');
            \Template::with('emailnewsletter/unsubscribed');

        } else {

            \Template::with('@emailnewsletter/unsubscribed.html');

        }//el

    }//getUnSubscribe


}//Subscribe
