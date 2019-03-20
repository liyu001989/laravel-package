<?php

if (! function_exists('settings')) {
    function settings($key = null, $default = null) {
        if ($key === null) {
            return app(App\Settings::class);
        }

        return app(App\Settings::class)->get($key, $default);
    }
}