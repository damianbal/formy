<?php 

namespace damianbal\Formy;

use damianbal\Formy\Form;

/**
 * TemplateInterface - Implement this interface to make different templates for Formy forms.
 *
 *
 * @author     Damian Balandowski <balandowski@icloud.com>
 * @copyright  2018 @ Damian Balandowski
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    1.0
 * 
 */
interface TemplateInterface
{
    /**
     * Helper method to generate form field, you can use it then inside getTemplate
     *
     * @return void
     */
    public function getFormFieldString($formField);

    /**
     * Return string containg form
     *
     * @param Form $form
     * @return void
     */
    public function getTemplate(Form $form);
}