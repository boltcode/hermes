<?php

class CorController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->conteudo = "Apresentar a listagem das cores cadastradas";
    }
	
    /**
     * Exibe o formulário para cadastro de cor.
     * Valida o formulário e utiliza o modelo para cadastrar a cor.
     */
    public function addAction()
    {
        $formCor = new Application_Form_Cor();
        
        if ($this->getRequest()->isPost()) {
        	$data = $this->getRequest()->getPost();
        	
        	if ($formCor->isValid($data)) {
        		$model = new Application_Model_Cor();
        		
        		if (!$model->inserir($data)) {
        			$mensagem = 'Erro ao gravar cor.';
        			$formCor->populate($data);
        		} else {
        			$mensagem = 'Cor gravada com sucesso.';
        			$formCor->reset();
        		}
        		$this->view->mensagem = $mensagem;
        	} else {
        		$formCor->populate($data);
        	}
        }
        
        $this->view->form = $formCor;
    }
}