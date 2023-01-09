<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailchimpSubscribe implements INewsletter
{
    public function __construct(protected ApiClient $client)
    {
        //
    }

    public function subscribe(string $email_address, string $list = null)
    {
        $list ??= config('services.mailchimp.lists.subscribers');

        return $this->client->lists->addListMember($list, [
            'email_address' => $email_address,
            'status' => 'subscribed'
        ]);
    }
}