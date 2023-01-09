<?php

namespace App\Services;

interface INewsletter
{
    public function subscribe(string $email_address, string $list = null);
}