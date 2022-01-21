<?php
namespace  GatherPay\Alipay\lotusphp_runtime;
class LtConfigExpression
{
	public $autoRetrived;
	private $_expression;
	
	public function __construct($string, $autoRetrived = true)
	{
		$this->_expression = (string) $string;
		$this->autoRetrived = $autoRetrived;
	}
	
	public function __toString()
	{
		return $this->_expression;
	}
}