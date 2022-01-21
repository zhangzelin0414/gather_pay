<?php

use GatherPay\Alipay\lotusphp_runtime\ObjectUtil\LtObjectUtil;

function C($className)
{
	return LtObjectUtil::singleton($className);
}
