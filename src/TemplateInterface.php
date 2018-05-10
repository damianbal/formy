<?php 

namespace damianbal\Formy;

use damianbal\Formy\Form;

/**
 * Layout your forms using that interface
 */
interface TemplateInterface
{
    /**
     * Helper method to generate form field, you can use it then inside getTemplate
     *
     * @return void
     */
    public function getFormFieldString(FormField $formField);

    /**
     * Return string containg form
     *
     * @param Form $form
     * @return void
     */
    public function getTemplate(Form $form);
}