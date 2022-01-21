<?php 
namespace GatherPay\Alipay\aop\request;
/**
 * ALIPAY API: alipay.mobile.public.template.message.query request
 *
 * @author auto create
 * @since 1.0, 2017-04-07 20:28:01
 */
class AlipayMobilePublicTemplateMessageQueryRequest
{
	/** 
	 * 模板
	 **/
	private $template;
	
	/** 
	 * 模板id
	 **/
	private $templateId;

	private $apiParas = array();
	private $terminalType;
	private $terminalInfo;
	private $prodCode;
	private $apiVersion="1.0";
	private $notifyUrl;
	private $returnUrl;
    private $needEncrypt=false;

	public function getTemplate()
	{
		return $this->template;
	}

	public function setTemplate($template)
	{
		$this->template = $template;
		$this->apiParas["template"] = $template;
	}

	public function getTemplateId()
	{
		return $this->templateId;
	}

	public function setTemplateId($templateId)
	{
		$this->templateId = $templateId;
		$this->apiParas["template_id"] = $templateId;
	}

	public function getApiMethodName()
	{
		return "alipay.mobile.public.template.message.query";
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
