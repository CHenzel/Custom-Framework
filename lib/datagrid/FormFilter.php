<?php

namespace lib\datagrid;

class FormFilter
{
//    protected $data = array();
//    
//    protected $types = array();
//    
//    protected $options = array();

    protected $builder;
    
    protected $form;
    
    protected $name;
    
    public function __construct($filters, $name,$data)
    {
        $this->name = 'filter_'.$name;
        foreach ($filters as $key => $filter) 
        {
            if($data[$key])
            {
                $filter['data']=$data[$key];
                $this->builder['filter_'.$name] = array($key => $filter) ;
            }
            else
            {
                $this->builder['filter_'.$name] = array($key => $filter);
            }
        }
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    
    
    
//    public function add($name, $type, $options = array(), $value = null)
//    {   
//        $this->options[$name] = $options;
//        $this->types[$name] = $type;
//        $this->data[$name] = $value;
//        
//        $this->builder->add($name, $type, $options);
//    }
//
//    public function submit($data)
//    {
//        $this->data = $data;
//        $this->form = $this->getForm();
//        $this->form->submit($this->data);
//    }
//    
//    public function getData()
//    {
//        return $this->data;
//    }
//    
    public function getBuilder()
    {
        return $this->builder;
    }
//    
//    public function getForm()
//    {   
//        if(!$this->form)
//        {
//            return $this->builder->getForm();
//        }
//        return $this->form;
//    }
//    
//    public function getType($field)
//    {
//        return isset($this->types[$field])? $this->types[$field] : null;
//    }
//    
//    public function getOptions($field)
//    {
//        return isset($this->options[$field])? $this->options[$field] : null;
//    }
//    
//    public function getOption($field, $option, $default = null)
//    {
//        if(isset($this->options[$field]) && isset($this->options[$field][$option]))
//        {
//            return $this->options[$field][$option]; 
//        }
//        return $default;
//    }
}