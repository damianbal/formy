<?php

include 'vendor/autoload.php';

use damianbal\Formy\Form;
use damianbal\Formy\InputFactory;
use damianbal\Formy\FormyConfiguration;

$donutForm = new Form([
    'person_firstName' => InputFactory::text('First name', ['placeholder' => 'Your name', 'disabled' => true]),
    'person_lastName' => InputFactory::text('Last name', ['placeholder' => 'Your last name']),
    'person_continent' => InputFactory::select('Contient', ['asia' => 'Asia', 'eu' => 'Europe'], ['description' => 'Where have you been born?']),
    'person_fav_colors' => InputFactory::checkbox('Favorite color', ['red' => 'Red', 'blue' => 'Blue', 'yellow' => 'Yellow'], ['value' => ['red', 'yellow']]),
    'person_gender' => InputFactory::radio('Gender', ['male' => 'Male', 'female' => 'Female'], []),
], "Register for free donut :)");

$donutForm->setSubmitTitle('Register please, I am hungry!');

$data = new \StdClass;
$data->person_continent = 'eu';

$donutForm->setDataSource($data);

$form_string = $donutForm->build();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formy Donut Form</title>
    <style>
    body {
        background: rgb(245,245,245);
        margin-top: 50px;
        font-family: system-ui;
        
    }
    h2 {
        color: rgb(100,100,100);
    }
    .wrap {
        width: 600px;
        padding: 1rem;
        background: #fff;
        margin: 0 auto;
        border-radius:3px;
        border:1px solid rgb(235,235,235);
        color:rgb(100,100,100);
    }
    footer {
        font-size:12px;
        color:rgb(100,100,100);
        text-align: center;
        margin-top: 10px;
    }

    .formy-input-group {
        margin-bottom: 20px;
    }

    .formy-input-group input {
        padding:5px;
        border-radius:3px;
        border:none;
        outline:none;

        font-family: system-ui;
        font-size:14px;
        border-bottom:2px solid rgba(0,0,0,0.2);


    }

    .formy-button {
        background: #1976D2;
        padding: 6px;
        border-radius: 4px;

        font-family: system-ui;
        border:none;
        font-size:12px;
        color:#fff;
        transition: 1s;

        outline: none;

    }

    .formy-button:hover {
        transition: 1s;

        color: rgba(255,255,255,0.5);
    }
    </style>
</head>
<body>
    <div style='text-align:center;'><h2><?php echo $donutForm->get()['form']['name']; ?></h2></div>

    <div class="wrap">
        <div style='text-align:center;'><?php echo $form_string; ?></div>
    </div>
    <footer>Form powered by Formy</footer>
</body>
</html>