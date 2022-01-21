<?php
namespace GatherPay\Alipay\aop\request;
/**
 * ALIPAY API: alipay.offline.material.image.upload request
 *
 * @author auto create
 * @since 1.0, 2017-04-07 16:11:37
 */
class AlipayOfflineMaterialImageUploadRequest
{
	/** 
	 * 图片/视频二进制内容，图片/视频大小不能超过5M
	 **/
	private $imageContent;
	
	/** 
	 * 图片/视频名称
	 **/
	private $imageName;
	
	/** 
	 * 用于显示指定图片/视频所属的partnerId（支付宝内部使用，外部商户无需填写此字段）
	 **/
	private $imagePid;
	
	/** 
	 * 图片/视频格式
	 **/
	private $imageType;

	private $apiParas = array();
	private $terminalType;
	private $terminalInfo;
	private $prodCode;
	private $apiVersion="1.0";
	private $notifyUrl;
	private $returnUrl;
    private $needEncrypt=false;

	public function getImageContent()
	{
		return $this->imageContent;
	}

	public function setImageContent($imageContent)
	{
		$this->imageContent = $imageContent;
		$this->apiParas["image_content"] = $imageContent;
	}

	public function getImageName()
	{
		return $this->imageName;
	}

	public function setImageName($imageName)
	{
		$this->imageName = $imageName;
		$this->apiParas["image_name"] = $imageName;
	}

	public function getImagePid()
	{
		return $this->imagePid;
	}

	public function setImagePid($imagePid)
	{
		$this->imagePid = $imagePid;
		$this->apiParas["image_pid"] = $imagePid;
	}

	public function getImageType()
	{
		return $this->imageType;
	}

	public function setImageType($imageType)
	{
		$this->imageType = $imageType;
		$this->apiParas["image_type"] = $imageType;
	}

	public function getApiMethodName()
	{
		return "alipay.offline.material.image.upload";
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
