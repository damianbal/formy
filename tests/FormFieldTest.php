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

    public function test_get_input_string()
    {
        $formField = new FormField("email");
        $formField2 = new FormField("blog_post");

        $formField->createFromArray(['type' => 'email']);
        $formField2->createFromArray(['type' => 'textarea', 'value' => 'xd']);

        //$this->assertEquals("<input name='email' type='email'>", $formField->getInputString());
        //$this->assertEquals("<textarea name='blog_post'>xd</textarea>", $formField->getInputString());
    }
}