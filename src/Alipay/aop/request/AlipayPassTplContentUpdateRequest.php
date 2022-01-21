<?php
namespace GatherPay\Alipay\aop\request;
/**
 * ALIPAY API: alipay.pass.tpl.content.update request
 *
 * @author auto create
 * @since 1.0, 2016-07-01 15:29:44
 */
class AlipayPassTplContentUpdateRequest
{
	/** 
	 * 代理商代替商户发放卡券后，再代替商户更新卡券时，此值为商户的pid/appid
	 **/
	private $channelId;
	
	/** 
	 * 支付宝pass唯一标识
	 **/
	private $serialNumber;
	
	/** 
	 * 券状态,支持更新为USED,CLOSED两种状态
	 **/
	private $status;
	
	/** 
	 * 模版动态参数信息【支付宝pass模版参数键值对JSON字符串】
	 **/
	private $tplParams;
	
	/** 
	 * 核销码串值【当状态变更为USED时，建议传入】
	 **/
	private $verifyCode;
	
	/** 
	 * 核销方式，目前支持：wave（声波方式）、qrcode（二维码方式）、barcode（条码方式）、input（文本方式，即手工输入方式）。pass和verify_type不能同时为空
	 **/
	private $verifyType;

	private $apiParas = array();
	private $terminalType;
	private $terminalInfo;
	private $prodCode;
	private $apiVersion="1.0";
	private $notifyUrl;
	private $returnUrl;
    private $needEncrypt=false;

	public function getChannelId()
	{
		return $this->channelId;
	}

	public function setChannelId($channelId)
	{
		$this->channelId = $channelId;
		$this->apiParas["channel_id"] = $channelId;
	}

	public function getSerialNumber()
	{
		return $this->serialNumber;
	}

	public function setSerialNumber($serialNumber)
	{
		$this->serialNumber = $serialNumber;
		$this->apiParas["serial_number"] = $serialNumber;
	}

	public function getStatus()
	{
		return $this->status;
	}

	public function setStatus($status)
	{
		$this->status = $status;
		$this->apiParas["status"] = $status;
	}

	public function getTplParams()
	{
		return $this->tplParams;
	}

	public function setTplParams($tplParams)
	{
		$this->tplParams = $tplParams;
		$this->apiParas["tpl_params"] = $tplParams;
	}

	public function getVerifyCode()
	{
		return $this->verifyCode;
	}

	public function setVerifyCode($verifyCode)
	{
		$this->verifyCode = $verifyCode;
		$this->apiParas["verify_code"] = $verifyCode;
	}

	public function getVerifyType()
	{
		return $this->verifyType;
	}

	public function setVerifyType($verifyType)
	{
		$this->verifyType = $verifyType;
		$this->apiParas["verify_type"] = $verifyType;
	}

	public function getApiMethodName()
	{
		return "alipay.pass.tpl.content.update";
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
