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

    /*
    |--------------------------------------------------------------------------
    | WhatsApp Contact
    |--------------------------------------------------------------------------
    |
    | Nomor WhatsApp tujuan untuk menerima pesan dari website.
    |
    */

    'whatsapp_number' => env('CONTACT_WHATSAPP_NUMBER'),

    /*
    |--------------------------------------------------------------------------
    | WhatsApp API Token
    |--------------------------------------------------------------------------
    |
    | Token API Fonnte untuk mengirim pesan WhatsApp otomatis.
    |
    */

    'fonnte_token' => env('FONNTE_TOKEN'),
];
