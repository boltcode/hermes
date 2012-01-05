<?php

class TamanhoController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function addAction()
    {
        $formTamanho = new Application_Form_Tamanho();
        
        if ($this->getRequest()->isPost()) {
        	$data = $this->getRequest()->getPost();
        	
        	if ($formTamanho->isValid($data)) {
        		$model = new Application_Model_Tamanho();
        		
        		if ($model->inserir($data)) {
        			$mensagem = 'Tamanho cadastrado com sucesso';
        			$formTamanho->reset();
        		} else {
        			$mensagem = 'Erro ao cadastrar tamanho.';
        			$formTamanho->populate($data);
        		}
        		$this->view->mensagem = $mensagem;
        		
        	} else {
        		$formTamanho->populate($data);
        	}
        }
        
        $this->view->form = $formTamanho;
    }


}



