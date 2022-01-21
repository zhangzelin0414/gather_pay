<?php
namespace GatherPay\Alipay\aop\request;
/**
 * ALIPAY API: koubei.marketing.data.smartactivity.forecast request
 *
 * @author auto create
 * @since 1.0, 2017-03-15 17:09:47
 */
class KoubeiMarketingDataSmartactivityForecastRequest
{
	/** 
	 * 商户智能活动效果预测接口
	 **/
	private $bizContent;

	private $apiParas = array();
	private $terminalType;
	private $terminalInfo;
	private $prodCode;
	private $apiVersion="1.0";
	private $notifyUrl;
	private $returnUrl;
    private $needEncrypt=false;

	public function getBizContent()
	{
		return $this->bizContent;
	}

	public function setBizContent($bizContent)
	{
		$this->bizContent = $bizContent;
		$this->apiParas["biz_content"] = $bizContent;
	}

	public function getApiMethodName()
	{
		return "koubei.marketing.data.smartactivity.forecast";
	}

	public function getNotifyUrl()
	{
		return $this->notifyUrl;
	}

	public function setNotifyUrl($notifyUrl)
	{
		$this->notifyUrl=$notifyUrl;
	}

	public function getReturnUrl()
	{
		return $this->returnUrl;
	}

	public function setReturnUrl($returnUrl)
	{
		$this->returnUrl=$returnUrl;
	}

	public function getApiParas()
	{
		return $this->apiParas;
	}

	public function getTerminalType()
	{
		return $this->terminalType;
	}

	public function setTerminalType($terminalType)
	{
		$this->terminalType = $terminalType;
	}

	public function getTerminalInfo()
	{
		return $this->terminalInfo;
	}

	public function setTerminalInfo($terminalInfo)
	{
		$this->terminalInfo = $terminalInfo;
	}

	public function getProdCode()
	{
		return $this->prodCode;
	}

	public function setProdCode($prodCode)
	{
		$this->prodCode = $prodCode;
	}

	public function getApiVersion()
	{
		return $this->apiVersion;
	}

	public function setApiVersion($apiVersion)
	{
		$this->apiVersion=$apiVersion;
	}

  public function getNeedEncrypt()
  {
    return $this->needEncrypt;
  }

  public function setNeedEncrypt($needEncrypt)
  {

     $this->needEncrypt=$needEncrypt;

  }

}
