<?php

class ProdutoController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
		$this->view->conteudo = "Apresentar listagem dos produtos cadastrados.";
    }
    
    public function addAction()
    {
    	$formProduto = new Application_Form_Produto();
    	
        if ($this->_request->isPost()) {
        	$data = $this->_request->getPost();
        	
        	if ($formProduto->isValid($data)) {
        		$modelProduto = new Application_Model_Produto();
        		
        		if (!$modelProduto->inserir($data)) {
        			$mensagem = 'Erro ao gravar produto.';
        			$formProduto->populate($data);
        		} else {
        			$mensagem = 'Produto gravado com sucesso.';
        			$formProduto->reset();
        		}
        		
        		$this->view->mensagem = $mensagem;
        	} else {
        		$formProduto->populate($data);
        	}
        }
        
        $this->view->form = $formProduto;
    }
    
    public function listAction()
    {
    	$model = new Application_Model_Produto();
    	
    	$this->view->produtos = $model->getAll();

    }
}








