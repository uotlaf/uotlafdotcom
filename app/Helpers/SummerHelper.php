<?php


namespace App\Helpers;

class SummerHelper
{
    static public function is_summer(): bool
    {
        if (date('m') > Config('site.summer_theme_mode_init_month') &&
            date('m') < Config('site.summer_theme_mode_end_month')) {
            return true;
        }
        return false;
    }

}
