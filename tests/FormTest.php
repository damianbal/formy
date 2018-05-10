<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use damianbal\Formy\Form;

final class FormTest extends TestCase
{
    public function test_construct_form()
    {
        $form = new Form([
            'username' => [
                'placeholder' => 'Your username'
            ]
        ]);

        $c = count($form->get()['fields']);

        $this->assertEquals(1, $c);
    }

    
}