<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	/**
	 * Método para incluir classes dinamicamente ao serem utilizadas.
	 */
	public function _initAutoloader()
	{
		require_once 'Zend/Loader/Autoloader.php';
		$loader = Zend_Loader_Autoloader::getInstance();
		$loader->setFallbackAutoloader(true);
	}
	
	/**
	 * Método para setar o idioma português brasileiro nas mensagens de validação.
	 */
	protected function _initTranslate()
	{
		try
		{
			$translate = new Zend_Translate(
				'Array', 
				APPLICATION_PATH . '/languages/pt_BR/Zend_Validate.php', 
				'pt_BR'
			);
			
			Zend_Validate_Abstract::setDefaultTranslator($translate);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	/**
	 * Método que define o layout.
	 */
	public function _initLayout()
	{
		Zend_Layout::startMvc(
			array(
				'layout'		=> 'default',
				'layoutPath'	=> APPLICATION_PATH.'/views/scripts/layout'
			)
		);
	}
}