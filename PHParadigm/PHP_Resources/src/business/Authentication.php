<?php
/**
 * 
 * @author MIAMARTI
 *
 */
class Authentication{
	
	/**
	 * Efetua a autenticacao
	 * @param string $username
	 * @param string $password
	 * @return boolean
	 */
	public function getLogin($username, $password) {
		if($this->getAccess(array('username'=>$username,'password'=>$password))){
			$_SESSION['logon'] = true;
			$_SESSION['username'] = $username;
			return true;
		} else{
			unset($_SESSION['logon']);
			unset($_SESSION['username']);
			return false;
		}
	}
	
	/**
	 * Verifica o acesso
	 * @param string $param
	 * @return boolean
	 */
	private function getAccess($param=null) {
		if($param != null){
			if(($param['username'] != null AND $param['password'] != null) AND ($param['username'] != '' AND $param['password'] != '') AND ($param['username'] != ' ' AND $param['password'] != ' ')){
				
				if($param['username'] == 'admin' AND $param['password'] == 'admin'){ //TODO: Implementar autenticacao
					return true;
				} else{
					return false;
				}
				
			}
		} else{
			return false;
		}
	}
	
	/**
	 * Efetua logOut
	 */
	static public function logOut() {
		if(session_destroy()){
			return true;
		} else{
			return false;
		}
	}
}