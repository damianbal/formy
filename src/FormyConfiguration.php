<?php

namespace damianbal\Formy;

use damianbal\Formy\Templates\HTMLTemplate;

/**
 * Formy configuration.
 *
 *
 * @author     Damian Balandowski <balandowski@icloud.com>
 * @copyright  2018 @ Damian Balandowski
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    1.0
 * 
 */
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