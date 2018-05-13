<?php

namespace damianbal\Formy;

/**
 * FormField which is set of input and label composed into input group.
 *
 *
 * @author     Damian Balandowski <balandowski@icloud.com>
 * @copyright  2018 @ Damian Balandowski
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    1.0
 * 
 */

class FormField
{
    public $name;
    public $title;
    public $description = null;
    public $type = "text";
    public $id = null;
    public $value = null;
    public $placeholder;
    public $min = null;
    public $max = null;
    public $maxlength = null;
    public $minlength = null;
    public $accept = "";
    public $required = true;
    public $selection = [];
    public $showLabel = true;
    public $disabled = false;

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
        $value = $this->getAttribute('value', $this->value); 
        $placeholder = $this->getAttribute('placeholder', $this->placeholder);
        $name = "name='$this->name'";
        $type = "type='$this->type'";
        $id = $this->getAttribute('id', $this->id);
        
        $disabled = $this->disabled ? "disabled" : "";
        $required = $this->required ? "required" : "";

        if($this->type == 'textarea')
        {
            return "<textarea $id $name $placeholder $required>$value</textarea>";
        }
        else if($this->type == 'radio')
        {   
            $html = "";

            foreach($this->selection as $key => $value)
            {
                $checked = "";
                if($key == $this->value) $checked = "checked";

                $html .= "<input $id type='radio' $name value='$key' $checked> $value ";
            }

            return $html;
        }
        else if($this->type == 'checkbox')
        {
            $html = "";

            foreach($this->selection as $key => $value)
            {
                $checked = "";
                if($this->value != null)
                {
                    if(in_array($key, $this->value)) {
                        $checked = "checked";
                    }   
                }

                $html .= "<input $id type='checkbox' $name value='$key' $checked> $value ";
            }

            return $html;
        }   
        else if($this->type == 'select' || $this->type == 'list')
        {
            $html = "<select $id $name>";

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
            return "<input $id $name $type $placeholder $value $required>";
        }
    }

    /**
     * If attribute is not set then return empty string, if it is set then return html attribute string.
     *
     * @param string $attribute_name
     * @param string $attribute_value
     * @return string
     */
    private function getAttribute($attribute_name, $attribute_value) : string
    {
        return ($attribute_value != null) ? "$attribute_name='$attribute_value'" : "";
    }
}