<?php
namespace EmailNewsletter\controller;

class Subscription extends \Disco\classes\Controller {


    private $search_for = null;



    /**
     * GET `/admin/email-newsletter/subscriptions/`.
     *
     *
     * Subscription management dashboard.
    */
    public function getIndex(){

        \View::title('Manage Email Newsletter Subscriptions');

        \View::dataFeedAdapterResources();

        enact()->with('Plugin')->getPlugin('EmailNewsletter')->includeResource('/js/jsx/EmailSubscriptions.js');

        \View::html('<div id="subscriptions"></div>');

        \View::script('React.render(React.createElement(Enact.react_class.EmailSubscriptions),document.getElementById("subscriptions"));');


    }//getIndex



    /**
     * AJAX/JSON.
     * GET `/admin/email-newsletter/subscriptions/data/page/{page}/{sort_on}/{sort_type}`.
     *
     * Return all email subscribtions as JSON.
     *
     *
     * @param int $page The page number.
     * @param string $sort_on What column to sort on.
     * @param string $sort_type A value of either "asc|desc" denoting how to order the results in conjunction with 
     * $sort_on.
     *
     * @return void 
    */
    public function getData($page,$sort_on,$sort_type) {

        \View::json();

        $data = Array();

        $page = enact_getPagination($page);

        $Model = new \EmailNewsletter\model\Email;

        $Model->alias('e')
                ->select('
                    e.id,
                    e.email,
                    e.ip_address,
                    UNIX_TIMESTAMP(e.created_on) AS created_on
                ')
                ->order('e.' . $sort_on . ' ' . $sort_type)
                ->limit($page['offset'],$page['per_page']);

        if($this->search_for){
            $search = "%{$this->search_for}%";
            $Model->whereLike(Array('e.email' => $search));
        }//if

        $data['types'] = $Model->asArray();

        enact_ajaxResponse($data);

    }//getData



    /**
     * AJAX/JSON.
     * POST `/admin/email-newsletter/subscriptions/page/{page}/{sort_on}/{sort_type}`.
     *
     * Search for a particular email subscription.
     *
     *
     * @return void 
    */
    public function postSearch() {

        $post = \Data::post()->all();

        $this->search_for = $post['search_for'];

        $this->getData($post['page'],$post['sort_on'],$post['sort_type']);

    }//postSearch



    /**
     * GET `/admin/email-newsletter/subscriptions/export`.
     *
     * Write out all subscribed emails to a csv file and send it back to the browser as a download.
    */
    public function getExport(){

        $Model = new \EmailNewsletter\model\Email;

        $result = $Model
            ->select('email')
            ->order('created_on DESC')
            ->data();

        $csv = '';

        while($row = $result->fetch()){
            $csv .= "{$row['email']}\n";
        }//while

        $path = ENACT_STORAGE . 'email-newsletter-dump.csv';

        file_put_contents(ENACT_STORAGE . 'email-newsletter-dump.csv', $csv);

        if(!is_file($path)){
            $back = enact_cpSlug('email-newsletter/');
            $this->html("<h1>Sorry, the email newsletter export doesn't exist</h1><a href='{$back}'>Go back</a>");
        }//if

        $this->download($path);

    }//getExport



    /**
     * DELETE `/admin/email-newsletter/subscriptions/{id}`
     *
     *
     * Remove an email subscription.
     *
    */
    public function deleteSubscription($id){

        \View::json();

        $record = new \EmailNewsletter\record\Email;
        $record->id = $id;

        $record->delete();

        enact_ajaxResponse(true);

    }//deleteSubscription



}//Subscription
