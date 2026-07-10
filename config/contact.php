<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Contact Receiver
    |--------------------------------------------------------------------------
    |
    | Email dan nama penerima pesan dari contact form portfolio.
    |
    */

    'receiver_email' => env('CONTACT_RECEIVER_EMAIL'),
    'receiver_name' => env('CONTACT_RECEIVER_NAME', 'Admin Portfolio'),

];