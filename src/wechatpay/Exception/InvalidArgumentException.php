<?php declare(strict_types=1);

namespace GatherPay\wechatpay\Exception;

use GuzzleHttp\Exception\GuzzleException;

class InvalidArgumentException extends \InvalidArgumentException implements WeChatPayException, GuzzleException
{
}
