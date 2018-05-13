<?php 

namespace damianbal\Formy;

/**
 * InputFactory - simpler way to make form fields, instead of passing array
 * we can use static method which is going to configure and create array for us.
 *
 *
 * @author     Damian Balandowski <balandowski@icloud.com>
 * @copyright  2018 @ Damian Balandowski
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    1.0
 * 
 */
class InputFactory
{
    public static function text($title, $params = [])
    {
        return array_merge($params, [
            'title' => $title,
            'type' => 'text',
        ]);
    }

    public static function password($title, $params = [])
    {
        return array_merge($params, [
            'title' => $title,
            'type' => 'password',
        ]);
    }

    public static function email($title, $params = [])
    {
        return array_merge($params, [
            'title' => $title,
            'type' => 'email',
        ]);
    }

    public static function radio($title, $selection = [], $params = [])
    {
        return array_merge($params, [
            'title' => $title,
            'type' => 'radio',
            'selection' => $selection,
        ]);
    }


    public static function checkbox($title, $selection = [], $params = [])
    {
        return array_merge($params, [
            'title' => $title,
            'type' => 'checkbox',
            'selection' => $selection,
        ]);
    }

    public static function hidden($value, $params = [])
    {
        return array_merge($params, [
            'type' => 'hidden',
            'value' => $value
        ]);
    }

    public static function select($title, $selection = [], $params = [])
    {
        return array_merge($params, [
            'title' => $title,
            'type' => 'select',
            'selection' => $selection
        ]);
    }

    public static function file($title, $accept = "audio/*,video/*", $params = [])
    {
        return array_merge($params, ['title' => $title, 'type' => 'file', 'accept' => $accept]);
    }
}