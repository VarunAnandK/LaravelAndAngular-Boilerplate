<?php
namespace App\AlphaFramework;
class CommonHelper
{
    public static function  objectToArray($d)
    {
        if (is_object($d)) {
            $d = get_object_vars($d);
        }
        if (is_array($d)) {
            return array_map(__FUNCTION__, $d);
        } else {
            return $d;
        }
    }

    public static  $app_id = "865596";
    public static $app_key = '19d2025e10fd2bddfd72';
    public static $app_secret = 'e1490a18f99b2256781e';
    public static $app_cluster = 'ap2';
}
