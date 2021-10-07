<?php

$capsule = dependency('db');
$presence = new \Illuminate\Validation\DatabasePresenceVerifier($capsule->getDatabaseManager());
$translator = dependency('translator');
$validation = new \Illuminate\Validation\Factory($translator, new \Illuminate\Container\Container());
$validation->setPresenceVerifier($presence);

return $validation;