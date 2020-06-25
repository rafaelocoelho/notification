<?php

require_once __DIR__. '/lib_ext/autoload.php';

use Notification\Email;

$email = new Email;

$email->send(
    'Teste',
    'Isso é apenas um teste.',
    'eu.rafaelcoelho@gmail.com',
    'Rafael',
    'rafael.oliveiracoelho@gmail.com',
    'Rafael Coelho'
);