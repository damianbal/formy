<?php

namespace damianbal\Formy\Templates;

use damianbal\Formy\TemplateInterface;

use damianbal\Formy\FormField;
use damianbal\Formy\Form;

class HTMLTemplate implements TemplateInterface
{
    public $submitButtonTitle = "";

    public function getFormFieldString(FormField $formField)
    {
        return  "
            <div>
                <div><label>$formField->title</label></div>
                <div>" . $formField->getInputString() . "</div>
            </div>
        ";
    }

    public function getTemplate(Form $form)
    {
        $html = "<form>";

        foreach($form->getFormFields() as $formField)
        {
            $html .= $this->getFormFieldString($formField);
        }

        $html .= "<br><button type='submit'>Submit</button>";

        $html .= "</form>";

        return $html;
    }
}