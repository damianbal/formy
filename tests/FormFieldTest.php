<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use damianbal\Formy\FormField;

final class FormFieldTest extends TestCase
{
    public function test_constructor_title_should_be_capitalized()
    {
        $formField = new FormField("username");

        $this->assertEquals("Username", $formField->title);
    }

    public function test_create_from_array()
    {
        $formField = new FormField("password");

        $formField->createFromArray([
            'placeholder' => 'pass',
            'type' => 'password',
            'id' => 'pass_id'
        ]);

        $this->assertEquals("pass", $formField->placeholder);
        $this->assertEquals("password", $formField->type);
        $this->assertEquals("pass_id", $formField->id);
    }

    public function test_form_field_show_label_false_should_return_empty_string()
    {
        $formField = new FormField("firstName");

        $formField->showLabel = false;
        var_dump($formField->getLabelString());

        $this->assertEquals(0, strlen($formField->getLabelString()));
    }
}