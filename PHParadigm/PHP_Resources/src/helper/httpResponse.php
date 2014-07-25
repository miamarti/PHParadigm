<?php
/**
 * @author miamarti
 * @copyright CleverCode
 * @link clevercode.com.br
 * HTTP Responses
 */
class httpResponse{
	
	/**
	 * @param string $code
	 * @return Ambigous <string, number>
	 */
	function http_response_code($code=NULL){
		if ($code !== NULL) {
			switch ($code) {
				case 100: $text = 'Continue'; break;
				case 101: $text = 'Switching Protocols'; break;
				case 200: $text = 'OK'; break;
				case 201: $text = 'Created'; break;
				case 202: $text = 'Accepted'; break;
				case 203: $text = 'Non-Authoritative Information'; break;
				case 204: $text = 'No Content'; break;
				case 205: $text = 'Reset Content'; break;
				case 206: $text = 'Partial Content'; break;
				case 300: $text = 'Multiple Choices'; break;
				case 301: $text = 'Moved Permanently'; break;
				case 302: $text = 'Moved Temporarily'; break;
				case 303: $text = 'See Other'; break;
				case 304: $text = 'Not Modified'; break;
				case 305: $text = 'Use Proxy'; break;
				case 400: $text = 'Bad Request'; break;
				case 401: $text = 'Unauthorized'; break;
				case 402: $text = 'Payment Required'; break;
				case 403: $text = 'Forbidden'; break;
				case 404: $text = 'Not Found'; break;
				case 405: $text = 'Method Not Allowed'; break;
				case 406: $text = 'Not Acceptable'; break;
				case 407: $text = 'Proxy Authentication Required'; break;
				case 408: $text = 'Request Time-out'; break;
				case 409: $text = 'Conflict'; break;
				case 410: $text = 'Gone'; break;
				case 411: $text = 'Length Required'; break;
				case 412: $text = 'Precondition Failed'; break;
				case 413: $text = 'Request Entity Too Large'; break;
				case 414: $text = 'Request-URI Too Large'; break;
				case 415: $text = 'Unsupported Media Type'; break;
				case 500: $text = 'Internal Server Error'; break;
				case 501: $text = 'Not Implemented'; break;
				case 502: $text = 'Bad Gateway'; break;
				case 503: $text = 'Service Unavailable'; break;
				case 504: $text = 'Gateway Time-out'; break;
				case 505: $text = 'HTTP Version not supported'; break;
				default:
					exit('Unknown http status code "' . htmlentities($code) . '"');
					break;
			}
			$protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0');
			header($protocol . ' ' . $code . ' ' . $text);
			$GLOBALS['http_response_code'] = $code;
		} else {
			$code = (isset($GLOBALS['http_response_code']) ? $GLOBALS['http_response_code'] : 200);
		}
		return $code;
	}
	
	/**
	 * 100 - Continue
	 */
	function get_Continue() {
		$this->http_response_code(100);
	}
	
	/**
	 * 101 - Switching Protocols
	 */
	function get_SwitchingProtocols() {
		$this->http_response_code(101);
	}
	
	/**
	 * Código de sucesso
	 * 200 - OK
	 */
	function get_OK() {
		$this->http_response_code(200);
	}
	
	/**
	 * Código de sucesso
	 * 201 - Created
	 */
	function get_Created() {
		$this->http_response_code(201);
	}
	
	/**
	 * Código de sucesso
	 * 202 - Accepted
	 */
	function get_Accepted() {
		$this->http_response_code(202);
	}
	
	/**
	 * Código de sucesso
	 * 203 - Non-Authoritative Information
	 */
	function get_NonAuthoritativeInformation() {
		$this->http_response_code(203);
	}
	
	/**
	 * Código de sucesso
	 * 204 - No Content
	 */
	function get_NoContent() {
		$this->http_response_code(204);
	}
	
	/**
	 * Código de sucesso
	 * 205 - Reset Content
	 */
	function get_ResetContent() {
		$this->http_response_code(205);
	}
	
	/**
	 * Código de sucesso
	 * 206 - Partial Content
	 */
	function get_PartialContent() {
		$this->http_response_code(206);
	}
	
	/**
	 * Código de erros de Redirecionamento
	 * 300 - Multiple Choices
	 */
	function get_MultipleChoices() {
		$this->http_response_code(300);
	}
	
	/**
	 * Código de erros de Redirecionamento
	 * 301 - Moved Permanently
	 */
	function get_MovedPermanently() {
		$this->http_response_code(301);
	}
	
	/**
	 * Código de erros de Redirecionamento
	 * 302 - Found
	 */
	function get_Found() {
		$this->http_response_code(302);
	}
	
	/**
	 * Código de erros de Redirecionamento
	 * 303 - See Other
	 */
	function get_SeeOther() {
		$this->http_response_code(303);
	}
	
	/**
	 * Código de erros de Redirecionamento
	 * 304 - Not Modified
	 */
	function get_NotModified() {
		$this->http_response_code(304);
	}
	
	/**
	 * Código de erros de Redirecionamento
	 * 305 - Use Proxy
	 */
	function get_UseProxy() {
		$this->http_response_code(305);
	}
	
	/**
	 * Código de erros de Redirecionamento
	 * 307 - Temporary Redirect
	 */
	function get_TemporaryRedirect() {
		$this->http_response_code(307);
	}
	
	/**
	 * Código de erros de Cliente
	 * 400 - Bad Request
	 */
	function get_BadRequest() {
		$this->http_response_code(400);
	}
	
	/**
	 * Código de erros de Cliente
	 * 401 - Unauthorized
	 */
	function get_Unauthorized() {
		$this->http_response_code(401);
	}
	
	/**
	 * Código de erros de Cliente
	 * 402 - Payment Required
	 */
	function get_PaymentRequired() {
		$this->http_response_code(402);
	}
	
	/**
	 * Código de erros de Cliente
	 * 403 - Forbidden
	 */
	function get_Forbidden() {
		$this->http_response_code(403);
	}
	
	/**
	 * Código de erros de Cliente
	 * 404 - Not Found
	 */
	function get_NotFound() {
		$this->http_response_code(404);
	}
	
	/**
	 * Código de erros de Cliente
	 * 405 - Method Not Allowed
	 */
	function get_MethodNotAllowed() {
		$this->http_response_code(405);
	}
	
	/**
	 * Código de erros de Cliente
	 * 406 - Not Acceptable
	 */
	function get_NotAcceptable() {
		$this->http_response_code(406);
	}
	
	/**
	 * Código de erros de Cliente
	 * 407 - Proxy
	 */
	function get_Proxy() {
		$this->http_response_code(407);
	}
	
	/**
	 * Código de erros de Cliente
	 * 408 - Request Timeout
	 */
	function get_RequestTimeout() {
		$this->http_response_code(408);
	}
	
	/**
	 * Código de erros de Cliente
	 * 409 - Conflict
	 */
	function get_Conflict() {
		$this->http_response_code(409);
	}
	
	/**
	 * Código de erros de Cliente
	 * 410 - Gone
	 */
	function get_Gone() {
		$this->http_response_code(410);
	}
	
	/**
	 * Código de erros de Cliente
	 * 411 - Length Required
	 */
	function get_LengthRequired() {
		$this->http_response_code(411);
	}
	
	/**
	 * Código de erros de Cliente
	 * 412 - Precondition Failed
	 */
	function get_PreconditionFailed() {
		$this->http_response_code(412);
	}
	
	/**
	 * Código de erros de Cliente
	 * 413 - Request Entity Too Large
	 */
	function get_RequestEntityTooLarge() {
		$this->http_response_code(413);
	}
	
	/**
	 * Código de erros de Cliente
	 * 414 - Request-URI Too Large
	 */
	function get_RequestURITooLarge() {
		$this->http_response_code(414);
	}
	
	/**
	 * Código de erros de Cliente
	 * 415 - Unsupported Media Type
	 */
	function get_UnsupportedMediaType() {
		$this->http_response_code(415);
	}
	
	/**
	 * Código de erros de Cliente
	 * 416 - Requested Range Not Satisfiable
	 */
	function get_RequestedRangeNotSatisfiable() {
		$this->http_response_code(416);
	}
	
	/**
	 * Código de erros de Cliente
	 * 417 - Expectation Failed
	 */
	function get_ExpectationFailed() {
		$this->http_response_code(417);
	}
	
	/**
	 * Código de erros de Servidor
	 * 500 - Internal Server Error
	 */
	function get_InternalServerError() {
		$this->http_response_code(500);
	}
	
	/**
	 * Código de erros de Servidor
	 * 501 - Not Implemented
	 */
	function get_NotImplemented() {
		$this->http_response_code(501);
	}
	
	/**
	 * Código de erros de Servidor
	 * 502 - Bad Gateway
	 */
	function get_BadGatewayd() {
		$this->http_response_code(502);
	}
	
	/**
	 * Código de erros de Servidor
	 * 503 - Service Unavailable
	 */
	function get_ServiceUnavailable() {
		$this->http_response_code(503);
	}
	
	/**
	 * Código de erros de Servidor
	 * 504 - Gateway Timeout
	 */
	function get_GatewayTimeout() {
		$this->http_response_code(504);
	}
	
	/**
	 * Código de erros de Servidor
	 * 505 - HTTP Version not supported
	 */
	function get_HTTPVersionNotSupported() {
		$this->http_response_code(505);
	}
}