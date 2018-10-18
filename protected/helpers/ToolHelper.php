<?php

/**
 * Created by PhpStorm.
 * User: jacobs
 * Date: 2017/7/6
 * Time: 9:14
 */
class ToolHelper
{
    public static function createDir($dir = "")
    {
        if (empty($dir)) {
            return false;
        }

        $pathinfo = pathinfo($dir);
        $dir = $pathinfo['dirname'];
        $dir = str_replace('/', DIRECTORY_SEPARATOR, $dir);
        $dir = str_replace('\\', DIRECTORY_SEPARATOR, $dir);

        $folds = explode(DIRECTORY_SEPARATOR, $dir);
        $path = $folds[0];
        $count = count($folds);
        for ($i = 1; $i < $count; $i++) {
            if (empty($folds[$i])) {
                continue;
            }
            $path .= DIRECTORY_SEPARATOR . $folds[$i];
            if (!is_dir($path)) {
                @mkdir($path, 0755);
            }
        }

        return true;
    }


    /**
     * @param string $email
     * @return bool
     */
    public static function validateEmail($email = '')
    {
        $pattern = '/^[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/';

        $valid = is_string($email) && strlen($email) <= 254 && (preg_match($pattern, $email));

        return $valid;
    }

    public static function byte_format($num, $precision = 1)
    {
        if ($num >= 1000000000000) {
            $num = round($num / 1099511627776, $precision);
            $unit = "TB";
        } elseif ($num >= 1000000000) {
            $num = round($num / 1073741824, $precision);
            $unit = "GB";
        } elseif ($num >= 1000000) {
            $num = round($num / 1048576, $precision);
            $unit = "MB";
        } elseif ($num >= 1000) {
            $num = round($num / 1024, $precision);
            $unit = "KB";
        } else {
            $unit = "Bytes";
            return number_format($num) . ' ' . $unit;
        }

        return number_format($num, $precision) . ' ' . $unit;
    }

    public static function uuid($prefix = '')
    {
        $chars = md5(uniqid(mt_rand(), true));

        $uuid = substr($chars, 0, 8) . $prefix;
        $uuid .= substr($chars, 8, 4) . $prefix;
        $uuid .= substr($chars, 12, 4) . $prefix;
        $uuid .= substr($chars, 16, 4) . $prefix;
        $uuid .= substr($chars, 20, 12);

        return $uuid;
    }

    public static function getHostUrl()
    {
        $scheme = $_SERVER['REQUEST_SCHEME'];
        $port = $_SERVER['SERVER_PORT'];
        $host = $_SERVER['HTTP_HOST'];

        $url = $scheme . '://' . $host;
        if ($port != 80 && $port != 443) {
            $url .= ':' . $port;
        }

        return $url;
    }

    public static function contactName($first_name = '', $last_name = '')
    {
        if (empty($first_name) && empty($last_name))
            return '';
        elseif (empty($first_name))
            return $last_name;
        elseif (empty($last_name))
            return $first_name;
        else
            return $first_name . ' ' . $last_name;
    }
}