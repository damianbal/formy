<?php

namespace damianbal\Formy;

class FormField
{
    public $name;
    public $title;
    public $description = null;
    public $type = "text";
    public $id = null;
    public $value = null;
    public $placeholder;
    public $validation_min;
    public $validation_max;
    public $validation_required = false;
    public $selection = [];
    public $showLabel = true;

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
     * Label for input
     *
     * @return void
     */
    public function getLabelString($classList = "") : string
    {
        // this form field is hidden so we don't need label for it
        if($this->type == 'hidden' || $this->showLabel == false) return "";

        $label = "";
        $label .= "<label >" . $this->title . "</label>";

        if($this->description != null) 
        {
            $label .= "<div style='font-size:12px; color: rgba(0,0,0,0.3);' class='$classList'>" . $this->description . "</div>";
        }

        return $label;
    }

    /**
     * HTML input/textarea/checkbox/radio
     *
     * @param string $classList
     * @return string
     */
    public function getInputString($classList = "") : string
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
            $html = "";

            foreach($this->selection as $key => $value)
            {
                $html .= "<input type='radio' $name value='$key'> $value ";
            }

            return $html;
        }
        else if($this->type == 'checkbox')
        {
            $html = "";

            foreach($this->selection as $key => $value)
            {
                $html .= "<input type='checkbox' $name value='$key'> $value ";
            }

            return $html;
        }   
        else if($this->type == 'select' || $this->type == 'list')
        {
            $html = "<select $name>";

            foreach($this->selection as $key => $value)
            {
                $h = ($this->value == $key) ? "<option value='$key' selected>$value</option>" : "<option value='$key'>$value</option>";
                $html .= $h;
            }

            $html .= "</select>";
            return $html;
        }
        else 
        {
            // normal input 
            return "<input $name $type $placeholder $value>";
        }
    }
}