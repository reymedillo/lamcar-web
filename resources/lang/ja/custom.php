<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Custom Language Lines
    |--------------------------------------------------------------------------
    | custom API languaege texts.
    | 
    | 
    | 
    |
    */
    'already'                       => 'Already',
    'error_occured'                 => 'An error occurred.',
    'failure'                       => 'Failure',
    'success'                       => 'Success',
    'fail_to'                       => 'It failed to :name .',   
    'error_user_not_found'          => 'User not found',
    'error_car_not_found'           => 'Car not found',
    'wrong_credentials'             => 'Incorrect Credentials',
    'wrong_password'                => 'The number/password is incorrect.',
    'error_generating_access_token' => 'Error while generating access token',
    'auth_error'                    => 'Authentication error.',
    'disclaimer'                    => 'The information contained in this website is for general information purposes only. The information is provided by [business name] and while we endeavour to keep the information up to date and correct, we make no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, suitability or availability with respect to the website or the information, products, services, or related graphics contained on the website for any purpose. Any reliance you place on such information is therefore strictly at your own risk.',
    'status' => [
        1  => 'RESERVE',
        2  => 'PAYMENT COMPLETION',
        3  => 'ACCEPT',
        4  => 'ARRIVED',
        5  => 'PICKUP',
        6  => 'DROPOFF',
        8  => 'REFUNDED',
        9  => 'CANCELED'
    ],
    'vacant'                        => 'VACANT',
    'pickup'                        => 'PICKUP',
    'dropoff'                       => 'DROPOFF',

    // payment
    'payment' => '決済',
    'order-id' => '予約番号',
    'pickup-location' => '乗車場所',
    'dropoff-location' => '降車場所',
    'distance' => '距離',
    'fare' => '料金',
    'email' => 'メールアドレス',
    'optional' => '任意',
    'card-no' => 'カード番号',
    'card-expired-date' => 'カード有効期限',
    'card-security-code' => 'カードセキュリティコード',
    'card-name' => 'カード名義',
    'terms-and-conditions-agree' => '利用規約に同意',
    'back-to-app' => 'アプリに戻る',
    'payment-complete' => '決済完了しました。',

    'title' => [
        'howto' => '利用方法',
        'privacy-policy' => 'プライバシーポリシー',
    ],

    // howto
    'howto-message' => 'ラムカーアプリを使ってグアムを満喫しよう',
    'howto-1-title' => '乗車場所設定',  
    'howto-1-description' => '乗車場所にピンを設置し、「乗車場所を設定する」をタップ',  
    'howto-2-title' => '降車場所設定',  
    'howto-2-description' => '降車地点にピンを設置し、「乗車場所を設定する」をタップ',  
    'howto-3-title' => 'お支払い',  
    'howto-3-description' => 'クレジットカードを使用しお支払い可能',  
    'howto-4-title' => 'ハイヤー到着・乗車',  
    'howto-4-description' => 'ハイヤーが到着したら通知でお知らせ',  
];
