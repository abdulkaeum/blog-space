<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailchimpNewsletter
{
    public function subscribe(string $email)
    {
        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.apiKey'),
            'server' => 'us5'
        ]);

        //dd($mailchimp->lists->getAllLists());
        //$response = $mailchimp->ping->get();
        //print_r($response);

        $mailchimp->lists->addListMember(config('services.mailchimp.lists.master'), [
            "email_address" => $email,
            "status" => "subscribed"
        ]);
    }
}
