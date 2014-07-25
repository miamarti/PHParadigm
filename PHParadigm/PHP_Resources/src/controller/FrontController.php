<?php
class FrontController {
	protected $controller = '';
	protected $action = '';
	protected $params = array ();
	protected $baseUriController = "";
	protected $forbidden = array ();
	protected $noCompress = array (
			'filter' 
	);
	
	/**
	 * Conntrutor
	 * 
	 * @param unknown $param        	
	 */
	public function __construct($param) {
		$this->baseUriController = $param;
		$this->parseUri ();
	}
	
	/**
	 * Explode a url e identifica as chamadas
	 */
	protected function parseUri() {
		$path = trim ( parse_url ( $_SERVER ["REQUEST_URI"], PHP_URL_PATH ), "/" );
		$path = str_replace ( $this->baseUriController, '', $path );
		$path = preg_replace ( '/[^a-zA-Z0-9]\//', "", $path );
		if (strpos ( $path, $this->basePath ) === 0) {
			$path = substr ( $path, strlen ( $this->basePath ) );
		}
		@list ( $controller, $action, $params ) = explode ( "/", $path, 3 );
		if (isset ( $controller )) {
			$this->setController ( $controller );
		}
		if (isset ( $action )) {
			$this->setAction ( $action );
		}
		if (isset ( $params )) {
			$this->setParams ( explode ( "/", $params ) );
		}
	}
	
	/**
	 * Define o Controller
	 * 
	 * @param unknown $controller        	
	 */
	public function setController($controller) {
		$this->controller = $controller;
	}
	
	/**
	 * Defines as Acoes
	 * 
	 * @param unknown $action        	
	 */
	public function setAction($action) {
		$reflector = new ReflectionClass ( $this->controller );
		$this->action = $action;
	}
	
	/**
	 * Define os parametros
	 * 
	 * @param array $params        	
	 */
	public function setParams(array $params) {
		$this->params = $params;
	}
	
	/**
	 *
	 * @param array $param        	
	 */
	public function setForbidden($param = array()) {
		$this->forbidden = $param;
	}
	
	/**
	 *
	 * @param array $param        	
	 */
	public function setNoCompress($param = array()) {
		$this->noCompress = array_merge_recursive ( $this->noCompress, $param );
	}
	
	/**
	 * Estancia a classe e gera o retorno
	 * 
	 * @return mixed
	 */
	public function run() {
		/**
		 * Comprime o conteudo
		 * 
		 * @param unknown $buf        	
		 * @return mixed
		 */
		function ob_html_compress($buf) {
			$data = str_replace ( array (
					"\n",
					"\r",
					"\t",
					"    ",
					"  ",
					"	" 
			), '', $buf );
			$data = preg_replace ( array (
					'/<!--(.*)-->/Uis',
					"/[[:blank:]]+/" 
			), array (
					'',
					' ' 
			), $data );
			return $data;
		}
		if (! in_array ( $this->controller, $this->forbidden )) {
			if (! in_array ( $this->controller, $this->noCompress )) {
				ob_start ( "ob_html_compress" );
				call_user_func_array ( array (
						new $this->controller (),
						$this->action 
				), $this->params );
				ob_end_flush ();
			} else {
				call_user_func_array ( array (
						new $this->controller (),
						$this->action 
				), $this->params );
			}
		} else {
			$response = new httpResponse ();
			$response->get_NotFound ();
		}
	}
}