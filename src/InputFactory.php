<?php 

namespace damianbal\Formy;

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

    public static function select($title, $selection = [], $params = [])
    {
        return array_merge($params, [
            'title' => $title,
            'type' => 'select',
            'selection' => $selection
        ]);
    }
}