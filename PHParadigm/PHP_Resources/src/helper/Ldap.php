<?php
class ldapEmb extends MySQL{
	protected $ldap_url = 'corp.ad';
	protected $ldap_domain = 'corp.ad';
	protected $ldap_dn = "dc=corp, dc=ad";
	protected $ds;
	protected $login;
	
	function __construct(){
		parent::__construct();
		$this->ds = ldap_connect($this->ldap_url);
		ldap_set_option($this->ds, LDAP_OPT_PROTOCOL_VERSION, 3);
		ldap_set_option($this->ds, LDAP_OPT_REFERRALS, 0);
	}
	
	/**
	 * 
	 * @param string $username
	 * @param string $password
	 * @return boolean
	 */
	function login($username, $password) {
		$key = $username.'@'.$this->ldap_domain;
		if($this->login = ldap_bind($this->ds, $key, $password)){
			echo($this->access($username));
			if($this->access($username)){
				$_SESSION['login'] = $username;
				$_SESSION['logon'] = true;
				return true;
			} else{
				session_destroy();
				return false;
			}
		} else{
			session_destroy();
			return false;
		}
	}
	
	/**
	 * Busca de entidades
	 * @param string $data
	 * @param string $param ['givenname', 'displayname', 'sAMAccountName', 'etc..']
	 */
	function search($data, $param){
		$filter = '(|('.$param.'='.$data.'))';
		$result = ldap_search($this->ds, $this->ldap_dn, $filter);
		$entries = ldap_get_entries($this->ds, $result);
		return $entries;
	}
	
	/**
	 * @param unknown $username
	 * @return boolean
	 */
	function access($username){
		$sql = "SELECT * FROM  `tab_access` WHERE  `username` =  '{username}'";
		$sql = str_replace('{username}', $username, $sql);
		if($this->connect->query($sql)){
			if($this->connect->affected_rows == 1){
				return true;
			} else{
				return false;
			}
		} else {
			return false;
		}
	}
}