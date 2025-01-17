<?php

return [
    'default_user' => [
        'name' => env('DEFAULT_USER_NAME', 'Default User'),
        'email' => env('DEFAULT_USER_EMAIL', 'user@example.com'),
        'password' => env('DEFAULT_USER_PASSWORD', 'password'),
    ],
    'default_teacher' => [
        'name' => env('DEFAULT_TEACHER_NAME', 'Default Teacher'),
        'email' => env('DEFAULT_TEACHER_EMAIL', 'teacher@example.com'),
        'password' => env('DEFAULT_TEACHER_PASSWORD', 'password'),
    ],
];
