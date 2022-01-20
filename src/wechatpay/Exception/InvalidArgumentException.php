<?php declare(strict_types=1);

namespace GatherPay\WeChatPay\Exception;

use GuzzleHttp\Exception\GuzzleException;

class InvalidArgumentException extends \InvalidArgumentException implements WeChatPayException, GuzzleException
{
}
