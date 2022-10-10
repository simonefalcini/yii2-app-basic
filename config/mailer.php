<?php
return [
    'class' => 'yii\swiftmailer\Mailer',
    'transport' => [
        'class' => 'Swift_SmtpTransport',
        'host' => getenv('MAILER_HOST'),
        'username' => getenv('MAILER_USER'),
        'password' => getenv('MAILER_PASS'),
    ],
];
