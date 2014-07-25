<?php
/**
 * 
 * @author MIAMARTI
 *
 */
class filter{
	public static $POST = array();
	public static $GET = array();
	
	/**
	 * 
	 */
	function filter() {
		$response = new httpResponse();
		$POST = $_POST;
		$GET = $_GET;
		//$response->get_NotFound();
	}
	
	/**
	 * 
	 * @param unknown $param
	 */
	function setPost($param) {
		$this::$POST = array_merge_recursive($this::$POST, $param);
	}
	
	/**
	 * 
	 * @param unknown $param
	 */
	function setGet($param) {
		$this::$GET = array_merge_recursive($this::$GET, $param);
	}
	
	/**
	 * Carrega Imagens
	 * @param string $param
	 * @param int $width
	 * @param int $height
	 * @param string $type - padrão [vazio], 'fill' [preenchimento] ou 'crop'
	 */
	function getIMG($param=null,$quality=80,$width=null,$height=null,$type=null) {
		if($param!=null){
			include '../helper/m2brimagem.php';
			$oImg = new m2brimagem('../../../WebContent/assets/img/'.$param);
			$valida = $oImg->valida();
			if ($valida == 'OK') {
				if($width!=null AND $height!=null AND $type!=null){
		 			$oImg->redimensiona($width,$height,$type);
				} else{
					if($width!=null AND $height!=null){
			 			$oImg->redimensiona($width,$height);
					}
				}
				$oImg->grava('',$quality);
			}else {
				die($valida);
			}
		} else{
			$response = new httpResponse();
			$response->get_NotFound();
		}
	}
	
	/**
	 * 
	 * @param string $file
	 * @param string $download
	 */
	function getFile($file,$download=null) {
		if($file!=null){
			if($download!=null){
				header('Content-type: octet/stream');
				header('Content-disposition: attachment; filename="'.$file.'";');
				header('Content-Length: '.filesize($arquivo));
			}
			readfile('../../../WebContent/assets/files/'.$file);
		} else{
			$response = new httpResponse();
			$response->get_NotFound();
		}
	}
	
	/**
	 * 
	 * @param string $name
	 * @return mixed
	 */
	function getJS($name=null) {
		function js_compress($buf){
			$data =  str_replace(array("\n","\r","\t","    ","  ","	"),'',$buf);
			$data = preg_replace(array('/<!--(.*)-->/Uis',"/[[:blank:]]+/"),array('',' '),$data);
			return $data;
		}
		if($name!=null){
			$js = file('../../../WebContent/assets/js-sys/'.$name);
			foreach ($js as $value) {
				echo(js_compress($value));
			}
		} else{
			$response = new httpResponse();
			$response->get_NotFound();
		}
	}
}