<?php

class Application_Form_Produto extends Zend_Form
{

    public function init()
    {	
    	// Adicionando os campo no formulário.
    	$this->addElements($this->getFields());
    	
    	// Propriedades do formulário.
    	$this->setName('form-produto')
    			->setMethod(self::METHOD_POST)
    			->setAction($this->getView()->url());
    }
    
    /**
     * Cria os campos do formulário.
     * 
     * @return array $elements	Campos do formulário.
     */
    private function getFields()
    {
    	// Campo "Tamanho"
    	$tamanho = new Zend_Form_Element_Select('tamanho_id');
    	$tamanho->setLabel('Tamanho')
    			->removeDecorator('HtmlTag')
    			->setMultiOptions($this->getTamanhos())
    			->removeDecorator('DtDdWrapper');
    	
    	// Campo "Quantidade"
    	$quantidade = new Zend_Form_Element_Text('quantidade');
    	$quantidade->setLabel('Quantidade')
    				->removeDecorator('HtmlTag')
    				->setRequired(true)
    				->addFilter(new Zend_Filter_StringTrim())
    				->addValidator(new Zend_Validate_Int())
    				->removeDecorator('DtDdWrapper');
    	
    	// Campo "Referência"
    	$referencia = new Zend_Form_Element_Text('referencia');
    	$referencia->setLabel('Referência')
    				->removeDecorator('HtmlTag')
    				->removeDecorator('DtDdWrapper');
    	
    	// Campo "Artigo"
    	$artigo = new Zend_Form_Element_Text('artigo');
    	$artigo->setLabel('Artigo')
    			->removeDecorator('HtmlTag')
    			->removeDecorator('DtDdWrapper');
    	
    	// Campo "Página"
    	$pagina = new Zend_Form_Element_Text('pagina');
    	$pagina->setLabel('Página')
    			->removeDecorator('HtmlTag')
    			->setRequired(true)
    			->addValidator(new Zend_Validate_Int())
    			->removeDecorator('DtDdWrapper');
    	
    	// Campo "Cor"
    	$cor = new Zend_Form_Element_Select('cor_id');
    	$cor->setLabel('Cor')
    			->removeDecorator('HtmlTag')
    			->setMultiOptions($this->getCores())
    			->removeDecorator('DtDdWrapper');	
    		
    	// Campo "Preço"
    	$preco = new Zend_Form_Element_Text('preco');
    	$preco->setLabel('Preço')
    			->removeDecorator('HtmlTag')
    			->setRequired(true)
    			->removeDecorator('DtDdWrapper');
    	
    	// Botão "Cadastrar"
    	$btCadastrar = new Zend_Form_Element_Submit('submit');
    	$btCadastrar->setLabel('Cadastrar')
    				->removeDecorator('HtmlTag')
    				->setIgnore(true);
    	
    	$elements = array(
    		$quantidade,
    		$tamanho,
    		$referencia,
    		$artigo,
    		$pagina,
    		$cor,
    		$preco,
    		$btCadastrar
    	);
    	
    	return $elements;
    }
    
    /**
     * Retorna os tamanhos cadastrados.
     * 
     * @return array
     */
    private function getTamanhos()
    {
    	$modelTamanho = new Application_Model_Tamanho();
    	return $modelTamanho->getTamanhos();
    }
    
    /**
     * Retorna as cores cadastradas.
     * 
     * @return array
     */
    private function getCores()
    {
    	$modelCores = new Application_Model_Cor();
    	return $modelCores->getCores();
    }
}

