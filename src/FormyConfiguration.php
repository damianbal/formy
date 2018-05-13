<?php

namespace damianbal\Formy;

use damianbal\Formy\Templates\HTMLTemplate;

class FormyConfiguration
{
    public static $defaultTemplate = 'damianbal\Formy\Templates\HTMLTemplate';
    public static $template = null;

    public static function setDefaultTemplate($class)
    {
        FormyConfiguration::$defaultTemplate = $class;
        FormyConfiguration::$template = null;
    }

    public static function getTemplate()
    {
        if(FormyConfiguration::$template == null) FormyConfiguration::$template = new FormyConfiguration::$defaultTemplate;

        return FormyConfiguration::$template;
    }
}