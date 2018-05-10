<?php

namespace damianbal\Formy;

class FormField
{
    public $name;
    public $title;
    public $description;
    public $type = "text";
    public $id = null;
    public $value = null;
    public $placeholder;
    public $validation_min;
    public $validation_max;
    public $validation_required = false;
    public $options = [];

    public function __construct($name)
    {
        $this->name = $name;
        $this->title = ucfirst($this->name);
        $this->type = 'text';
    }

    public function createFromArray($array) 
    {
        foreach($array as $key => $value) 
        {
            $this->{$key} = $value;
        }
    }

    /**
     * HTML input tag string
     *
     * @return void
     */
    public function getInputString() : string
    {
        $value = ($this->value != null) ? "value='$this->value'" : '';
        $placeholder = ($this->placeholder != null) ? "placeholder='$this->placeholder'" : "";
        $name = "name='$this->name'";
        $type = "type='$this->type'";

        if($this->type == 'textarea')
        {
            return "<textarea $name $placeholder>$value</textarea>";
        }
        else if($this->type == 'radio')
        {   
            return "";
        }
        else if($this->type == 'checkbox')
        {
            return "";
        }   
        else 
        {
            // normal input 
            return "<input $name $type $placeholder $value>";
        }
    }
}