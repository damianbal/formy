<?php

namespace damianbal\Formy;

use damianbal\Formy\FormField;
use damianbal\Formy\Templates\HTMLTemplate;

class Form
{
    protected $name = null;
    protected $description = null;
    protected $action = '';

    protected $formFields = [];
    protected $dataSource = null;

    protected $template = null;

    protected $submitTitle = "Submit";

    public function __construct($fields = [], $name = "", $action = "/")
    {
        $this->setTemplate(new HTMLTemplate);

        $this->name = $name;
        $this->action = $action;

        foreach($fields as $key => $field) 
        {
            $this->addField($key, $field);
        }
    }

    public function getFormFields() 
    {
        return $this->formFields;
    }

    public function setSubmitTitle($title)
    {
        $this->submitTitle = $title;
    }

    public function getSubmitTitle()
    {
        return $this->submitTitle;
    }

    /**
     * StdClass object or array
     *
     * @param StdClass|array $dataSource
     * @return void
     */
    public function setDataSource($dataSource) : void
    {
        $this->dataSource = $dataSource;
    }

    /**
     * Set template to display our form
     *
     * @param TemplateInterface $template
     * @return void
     */
    public function setTemplate(TemplateInterface $template)
    {
        $this->template = $template;
    }

    /**
     * Add field to form
     *
     * @param [type] $key
     * @param array $field_array
     * @return FormField
     */
    public function addField($key, $field_array = []) : FormField
    {
        $formField = new FormField($key);
        $formField->createFromArray($field_array);
        $this->formFields[$key] = $formField;
        return $this->formFields[$key];
    }

    /**
     * Returns form data and form inputs
     *
     * @return array
     */
    public function get() : array
    {
        return [
            'form' => ['name' => $this->name, 'description' => $this->description],
            'fields' => $this->formFields
        ];
    }

    /**
     * Build the form
     *
     * @return void
     */
    public function build()
    {
        /*
        if($this->dataSource != null)
        {
            if(is_array($this->dataSource))
            {
                foreach($this->dataSource as $key => $value)
                {
                    $this->formFields[$key]->value = $value;
                }
            }
            else if(is_object($this->dataSource))
            {
                // TODO: implement...
                foreach($this->formFields as $key => $value)
                {
                    if(isset($this->dataSource->{$key}))
                        $this->formFields[$key]->value = $this->dataSource->{$key};
                }
            }
        }*/
   
        $tpl = $this->template->getTemplate($this);

        return $tpl;
    }
}
