<?php

namespace damianbal\Formy;

use damianbal\Formy\Templates\HTMLTemplate;

class FormyConfiguration
{
    public static $defaultTemplate = 'damianbal\Formy\Templates\HTMLTemplate';

    public static function setTemplate($template)
    {
        FormyConfiguration::$defaultTemplate = $template;
    }
}