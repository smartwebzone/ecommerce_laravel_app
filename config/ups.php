<?php

return [
    /*
      |--------------------------------------------------------------------------
      | UPS Credentials
      |--------------------------------------------------------------------------
      |
      | This option specifies the UPS credentials for your account.
      | You can put it here but I strongly recommend to put thoses settings into your
      | .env & .env.example file.
      |
     */
    'access_key' => '0CB6DF726ED2607B',
    'username' => 'graceship2',
    'password' => 'GFjaren1',
    'account_number' => 'Y42687',
    'shipping_percent' => 8,
    'shipping_rate<=20' => 4,
    'shipping_percent<=20' => 7,
    'shipping_rate>20' => 9,
    'shipping_percent>20' => 7,
    'from_zip' => '84127',
    'from_state' => 'UT', // Optional, may yield a more accurate quote
    'from_country' => 'US'
];
