<?php

class Application_Model_Cor extends Zend_Db_Table
{
	protected $_name = 'cor';
	
	/**
	 * Retorna um array com cores onde index = id e value = nome
	 */
	public function getCores()
	{
		try
		{
			$data = $this->fetchAll()->toArray();
			
			$cores[0] = 'Selecione';
			foreach ( $data as $cor )
			{
				$cores[$cor['id']] = $cor['nome'];
			}
			
			return $cores;
			
		} catch (Zend_Db_Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	/**
	 * Insere um nome de cor no banco de dados.
	 * 
	 * @param array $data Dados para inserir.
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
		return (count($id) + 1);
	}
}