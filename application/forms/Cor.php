<?php

class Application_Form_Cor extends Zend_Form
{

    public function init()
    {
    	$this->addElements($this->getFields());
    	
        $this->setName('form-cor')
        	->setMethod(self::METHOD_POST)
        	->setAction($this->getView()->url());
    }

    public function getFields()
    {
    	// Campo "Cor"
    	$cor = new Zend_Form_Element_Text('nome');
    	$cor->setLabel('Cor')
    		->setRequired(true)
    		->addFilter(new Zend_Filter_StringTrim())
    		->removeDecorator('HtmlTag')
    		->removeDecorator('DtDdWrapper');
    		
    	// Botão "Cadastrar"
    	$btCadastrar = new Zend_Form_Element_Submit('submit');
    	$btCadastrar->setLabel('Cadastrar')
    				->removeDecorator('HtmlTag')
    				->setIgnore(true);
    	
    	$elements = array(
    		$cor,
    		$btCadastrar
    	);
    	
    	return $elements;
    }
	
}

