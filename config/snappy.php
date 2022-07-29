<?php

return [

    'pdf' => [
        'enabled' => true,
        'binary' => env( 'BINARYONE' ,'"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf.exe"'),
        'timeout' => false,
        'options' => [],
        'env'     => [],
    ],

    'image' => [
        'enabled' => true,
        'binary' => env('BINARYTWO','"C:\Program Files\wkhtmltopdf\bin\wkhtmltoimage.exe"'),
        'timeout' => false,
        'options' => [],
        'env'     => [],
    ],

];
