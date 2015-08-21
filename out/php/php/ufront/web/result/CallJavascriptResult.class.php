<?php

class ufront_web_result_CallJavascriptResult extends ufront_web_result_ActionResult {
	public function __construct($originalResult) {
		if(!php_Boot::$skip_constructor) {
		$this->originalResult = $originalResult;
		$this->scripts = (new _hx_array(array()));
	}}
	public $originalResult;
	public $scripts;
	public function addInlineJs($js) {
		$this->scripts->push("<script type=\"text/javascript\">" . _hx_string_or_null($js) . "</script>");
		return $this;
	}
	public function addJsScript($path) {
		$this->scripts->push("<script type=\"text/javascript\" src=\"" . _hx_string_or_null($path) . "\"></script>");
		return $this;
	}
	public function executeResult($actionContext) {
		$_g = $this;
		return tink_core__Future_Future_Impl_::_tryMap($this->originalResult->executeResult($actionContext), array(new _hx_lambda(array(&$_g, &$actionContext), "ufront_web_result_CallJavascriptResult_0"), 'execute'));
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
	static function addInlineJsToResult($originalResult, $js) {
		return _hx_deref(new ufront_web_result_CallJavascriptResult($originalResult))->addInlineJs($js);
	}
	static function addJsScriptToResult($originalResult, $path) {
		return _hx_deref(new ufront_web_result_CallJavascriptResult($originalResult))->addJsScript($path);
	}
	static function insertScriptsBeforeBodyTag($content, $scripts) {
		$script = $scripts->join("");
		$bodyCloseIndex = _hx_last_index_of($content, "</body>", null);
		if($bodyCloseIndex === -1) {
			$content .= _hx_string_or_null($script);
		} else {
			$content = _hx_string_or_null(_hx_substring($content, 0, $bodyCloseIndex)) . _hx_string_or_null($script) . _hx_string_or_null(_hx_substr($content, $bodyCloseIndex, null));
		}
		return $content;
	}
	function __toString() { return 'ufront.web.result.CallJavascriptResult'; }
}
function ufront_web_result_CallJavascriptResult_0(&$_g, &$actionContext, $n) {
	{
		$response = $actionContext->httpContext->response;
		if($response->get_contentType() === "text/html" && $_g->scripts->length > 0) {
			$newContent = ufront_web_result_CallJavascriptResult::insertScriptsBeforeBodyTag($response->getBuffer(), $_g->scripts);
			$response->clearContent();
			$response->write($newContent);
		}
		return tink_core_Noise::$Noise;
	}
}