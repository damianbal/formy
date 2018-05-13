<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use damianbal\Formy\Form;
use damianbal\Formy\InputFactory;

final class InputFactoryTest extends TestCase
{
    public function test_inputs()
    {
        $text = InputFactory::text("This is text");
        $email = InputFactory::email("Email");
        $password = InputFactory::password("Password", ['placeholder' => 'pass', 
                                                        'description' => 
                                                        'Your secure passowrd']);

        $this->assertEquals($text['title'], "This is text");
        $this->assertEquals($text['type'], 'text');

        $this->assertEquals($email['type'], 'email');
        $this->assertEquals($password['type'], 'password');
    }
}