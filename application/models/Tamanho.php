<?php

class Application_Model_Tamanho extends Zend_Db_Table
{
	protected $_name = 'tamanho';
	
	/**
	 * Retorna todos os tamanhos em um array onde o index = id e value = nome.
	 * 
	 * @return array $tamanhos	Tamanhos.
	 */
	public function getTamanhos()
	{
		try
		{
			$data = $this->fetchAll()->toArray();
			
			$tamanhos[0] = 'Selecione';
			foreach ( $data as $tamanho )
			{
				$tamanhos[$tamanho['id']] = $tamanho['nome'];
			}
			
			return $tamanhos;
			
		} catch (Zend_Db_Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
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