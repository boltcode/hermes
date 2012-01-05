<?php

class Application_Form_Tamanho extends Zend_Form
{

    public function init()
    {
    	$this->addElements($this->getFields());
    	
        $this->setName('form-tamanho')
        		->setMethod(self::METHOD_POST)
        		->setAction($this->getView()->url());
    }

	public function getFields()
	{
		// Campo "Tamanho".
		$tamanho = new Zend_Form_Element_Text('nome');
		$tamanho->setLabel('Tamanho')
				->addFilter(new Zend_Filter_StringTrim())
				->addFilter(new Zend_Filter_StringToUpper())
				->setRequired(true)
				->removeDecorator('DtDdWrapper')
				->removeDecorator('HtmlTag');
		
		// Botão "Cadastrar".
		$btCadastrar = new Zend_Form_Element_Submit('submit');
		$btCadastrar->setLabel('Cadastrar')
					->setIgnore(true);
					
		$elements = array(
			$tamanho,
			$btCadastrar
		);
		
		return $elements;
	}
    
}