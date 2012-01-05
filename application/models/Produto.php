<?php

class Application_Model_Produto extends Zend_Db_Table
{
	protected $_name = 'produto';
	
	/**
	 * Método para cadastrar os dados do produto no banco de dados.
	 * @param array $data Array com os dados para inserir
	 */
	public function inserir($data)
	{
		try {
			unset($data['submit']);
			$data['id'] = $this->getMaxId();
			$this->insert($data);
			return true;
		} 
		catch (Zend_Db_Exception $e) {
			return false;
		}
	}
	
	private function getMaxId()
	{
		$id = $this->fetchAll()->toArray();
		return (sizeof($id) + 1);
	}
	
	public function getAll()
	{
		try {
			return $this->fetchAll();
		} catch (Zend_Db_Exception $e) {
			return false;
		}
	}
}