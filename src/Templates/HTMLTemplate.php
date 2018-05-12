<?php

namespace damianbal\Formy\Templates;

use damianbal\Formy\TemplateInterface;

use damianbal\Formy\FormField;
use damianbal\Formy\Form;

/**
 * Basic HTML layout, you can style it with CSS
 * formy-input-group for input group which has label, description and input field
 * formy-input to style input field
 * formy-button to style submit button
 */
class HTMLTemplate implements TemplateInterface
{
    public function getFormFieldString($formField)
    {
        return  "
            <div class='formy-input-group'>
                <div>" . $formField->getLabelString() . "</div>
                <div>" . $formField->getInputString() . "</div>
            </div>
        ";
    }

    public function getTemplate(Form $form)
    {
        $html = "<form method='POST'>";

        foreach($form->get()['fields'] as $formField)
        {
            $html .= $this->getFormFieldString($formField);
        }

        $html .= "<div class='formy-input-group'><button class='formy-button' type='submit'>".$form->getSubmitTitle()."</button></div>";

        $html .= "</form>";

        return $html;
    }
}