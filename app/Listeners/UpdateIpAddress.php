<?php

namespace App\Listeners;

use App\User;
use Request;

class UpdateIpAddress
{
    public function handle($login)
    {
        User::where('id', $login->user->id)
            ->update([
                'ip_address' => Request::ip()
            ]);
    }
}