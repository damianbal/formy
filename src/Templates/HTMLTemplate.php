<?php

namespace damianbal\Formy\Templates;

use damianbal\Formy\TemplateInterface;

use damianbal\Formy\FormField;
use damianbal\Formy\Form;

/**
 * HTML Layout with simple styling.
 *
 *
 * @author     Damian Balandowski <balandowski@icloud.com>
 * @copyright  2018 @ Damian Balandowski
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    1.0
 * 
 */
class HTMLTemplate implements TemplateInterface
{
    public function getFormFieldString($formField)
    {
        return  "
            <div class='formy-input-group'>
                <div>" . $formField->getLabelString() . "</div>
                <div>" . $formField->getInputString('formy-input') . "</div>
            </div>
        ";
    }

    public function getTemplate(Form $form)
    {
        $html = "<form action='$form->getAction()' method='POST'>";

        foreach($form->get()['fields'] as $formField)
        {
            $html .= $this->getFormFieldString($formField);
        }

        $html .= "<div class='formy-input-group'><button class='formy-button' type='submit'>".$form->getSubmitTitle()."</button></div>";

        $html .= "</form>";

        return $html;
    }
}