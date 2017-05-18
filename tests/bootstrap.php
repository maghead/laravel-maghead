<?php

/*
|--------------------------------------------------------------------------
| Register The Composer Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader
| for our application. We just need to utilize it! We'll require it
| into the script here so that we do not have to worry about the
| loading of any our classes "manually". Feels great to relax.
|
*/

require __DIR__.'/../vendor/autoload.php';

use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Set The Default Timezone
|--------------------------------------------------------------------------
|
| Here we will set the default timezone for PHP. PHP is notoriously mean
| if the timezone is not explicitly set. This will be used by each of
| the PHP date and date-time functions throughout the application.
|
*/

date_default_timezone_set('UTC');

Carbon::setTestNow(Carbon::now());

if (function_exists('base_path') === false) {
    function base_path()
    {
        return __DIR__;
    }
}

if (function_exists('app_path') === false) {
    function app_path()
    {
        return __DIR__;
    }
}

if (function_exists('config_path') === false) {
    function config_path()
    {
        return __DIR__;
    }
}

if (function_exists('database_path') === false) {
    function database_path()
    {
        return __DIR__;
    }
}

if (function_exists('env') === false) {
    function env($key, $default = null)
    {
        $value = getenv($key);

        if ($value === false) {
            return value($default);
        }

        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return;
        }

        if (strlen($value) > 1 &&
            \Illuminate\Support\Str::startsWith($value, '"') &&
            \Illuminate\Support\Str::endsWith($value, '"')
        ) {
            return substr($value, 1, -1);
        }

        return $value;
    }
}
