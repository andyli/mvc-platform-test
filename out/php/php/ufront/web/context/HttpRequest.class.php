<?php

class ufront_web_context_HttpRequest {
	public function __construct(){}
	public $params;
	public function get_params() {
		if(null === $this->params) {
			$this->params = ufront_core__MultiValueMap_MultiValueMap_Impl_::combine((new _hx_array(array($this->get_cookies(), $this->get_query(), $this->get_post()))));
		}
		return $this->params;
	}
	public $queryString;
	public function get_queryString() {
		throw new HException(ufront_web_HttpError::abstractMethod(_hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 110, "className" => "ufront.web.context.HttpRequest", "methodName" => "get_queryString"))));
	}
	public $postString;
	public function get_postString() {
		throw new HException(ufront_web_HttpError::abstractMethod(_hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 118, "className" => "ufront.web.context.HttpRequest", "methodName" => "get_postString"))));
	}
	public $query;
	public function get_query() {
		throw new HException(ufront_web_HttpError::abstractMethod(_hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 126, "className" => "ufront.web.context.HttpRequest", "methodName" => "get_query"))));
	}
	public $post;
	public function get_post() {
		throw new HException(ufront_web_HttpError::abstractMethod(_hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 142, "className" => "ufront.web.context.HttpRequest", "methodName" => "get_post"))));
	}
	public $files;
	public function get_files() {
		if(null === $this->files) {
			$this->files = new haxe_ds_StringMap();
		}
		return $this->files;
	}
	public $cookies;
	public function get_cookies() {
		throw new HException(ufront_web_HttpError::abstractMethod(_hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 161, "className" => "ufront.web.context.HttpRequest", "methodName" => "get_cookies"))));
	}
	public $hostName;
	public function get_hostName() {
		throw new HException(ufront_web_HttpError::abstractMethod(_hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 167, "className" => "ufront.web.context.HttpRequest", "methodName" => "get_hostName"))));
	}
	public $clientIP;
	public function get_clientIP() {
		throw new HException(ufront_web_HttpError::abstractMethod(_hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 173, "className" => "ufront.web.context.HttpRequest", "methodName" => "get_clientIP"))));
	}
	public $uri;
	public function get_uri() {
		throw new HException(ufront_web_HttpError::abstractMethod(_hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 183, "className" => "ufront.web.context.HttpRequest", "methodName" => "get_uri"))));
	}
	public $clientHeaders;
	public function get_clientHeaders() {
		throw new HException(ufront_web_HttpError::abstractMethod(_hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 189, "className" => "ufront.web.context.HttpRequest", "methodName" => "get_clientHeaders"))));
	}
	public $userAgent;
	public function get_userAgent() {
		if($this->userAgent === null) {
			$this->userAgent = ufront_web_UserAgent::fromString(ufront_core__MultiValueMap_MultiValueMap_Impl_::get($this->get_clientHeaders(), "User-Agent"));
		}
		return $this->userAgent;
	}
	public $httpMethod;
	public function get_httpMethod() {
		throw new HException(ufront_web_HttpError::abstractMethod(_hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 211, "className" => "ufront.web.context.HttpRequest", "methodName" => "get_httpMethod"))));
	}
	public $scriptDirectory;
	public function get_scriptDirectory() {
		throw new HException(ufront_web_HttpError::abstractMethod(_hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 223, "className" => "ufront.web.context.HttpRequest", "methodName" => "get_scriptDirectory"))));
	}
	public $authorization;
	public function get_authorization() {
		throw new HException(ufront_web_HttpError::abstractMethod(_hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 235, "className" => "ufront.web.context.HttpRequest", "methodName" => "get_authorization"))));
	}
	public function isMultipart() {
		return ufront_web_context_HttpRequest_0($this) && StringTools::startsWith(ufront_core__MultiValueMap_MultiValueMap_Impl_::get($this->get_clientHeaders(), "Content-Type"), "multipart/form-data");
	}
	public function parseMultipart($onPart = null, $onData = null, $onEndPart = null) {
		throw new HException(ufront_web_HttpError::abstractMethod(_hx_anonymous(array("fileName" => "HttpRequest.hx", "lineNumber" => 272, "className" => "ufront.web.context.HttpRequest", "methodName" => "parseMultipart"))));
	}
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->__dynamics[$m]) && is_callable($this->__dynamics[$m]))
			return call_user_func_array($this->__dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call <'.$m.'>');
	}
	static function create() {
		return new sys_ufront_web_context_HttpRequest();
	}
	static $__properties__ = array("get_authorization" => "get_authorization","get_scriptDirectory" => "get_scriptDirectory","get_httpMethod" => "get_httpMethod","get_userAgent" => "get_userAgent","get_clientHeaders" => "get_clientHeaders","get_uri" => "get_uri","get_clientIP" => "get_clientIP","get_hostName" => "get_hostName","get_cookies" => "get_cookies","get_files" => "get_files","get_post" => "get_post","get_query" => "get_query","get_postString" => "get_postString","get_queryString" => "get_queryString","get_params" => "get_params");
	function __toString() { return 'ufront.web.context.HttpRequest'; }
}
function ufront_web_context_HttpRequest_0(&$__hx__this) {
	{
		$this1 = $__hx__this->get_clientHeaders();
		return $this1->exists("Content-Type");
	}
}
