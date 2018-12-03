<?php

namespace App;

class CreateWatermarkImage
{
    public function handle($image)
    {
        $image->insert('https://laravel.com/favicon.png', 'top-right', 10, 10);
    }
}