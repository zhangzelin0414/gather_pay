<?php

namespace GatherPay;

//异步通知数据解密
use GatherPay\wechatpay\Crypto\AesGcm;
use GatherPay\wechatpay\Crypto\Rsa;
use GatherPay\wechatpay\Formatter;

class Notify
{
    //微信回调通知
    public static function wechat($paramHeader, $config)
    {
        try {
            $inWechatpaySignature = $paramHeader['wechatpay-signature'];// 请根据实际情况获取
            $inWechatpayTimestamp = $paramHeader['wechatpay-timestamp'];// 请根据实际情况获取
            $inWechatpaySerial = $paramHeader['wechatpay-serial'];// 请根据实际情况获取
            $inWechatpayNonce = $paramHeader['wechatpay-nonce'];// 请根据实际情况获取

            if (empty($inWechatpaySignature) || empty($inWechatpayTimestamp) || empty($inWechatpaySerial) || empty($inWechatpayNonce)) {
                return ['code' => 1, 'data' => '缺少参数'];
            }
            $inBody = file_get_contents('php://input');// 请根据实际情况获取，例如: file_get_contents('php://input');

            $apiv3Key = $config['api_secret_key'];// 在商户平台上设置的APIv3密钥

            if (empty($apiv3Key)) {
                return ['code' => 1, 'data' => '缺少在商户平台上设置的APIv3密钥'];
            }

            if (!is_file($config['platform_certificate_file_path'])) {
                return ['code' => 1, 'data' => '缺少平台证书'];
            }

            // 根据通知的平台证书序列号，查询本地平台证书文件，
            $platformPublicKeyInstance = Rsa::from(file_get_contents($config['platform_certificate_file_path']), Rsa::KEY_TYPE_PUBLIC);

            // 检查通知时间偏移量，允许5分钟之内的偏移
            $timeOffsetStatus = 300 >= abs(Formatter::timestamp() - (int)$inWechatpayTimestamp);
            $verifiedStatus = Rsa::verify(
            // 构造验签名串
                Formatter::joinedByLineFeed($inWechatpayTimestamp, $inWechatpayNonce, $inBody),
                $inWechatpaySignature,
                $platformPublicKeyInstance
            );

            if ($timeOffsetStatus && $verifiedStatus) {
                // 转换通知的JSON文本消息为PHP Array数组
                $inBodyArray = (array)json_decode($inBody, true);
                // 使用PHP7的数据解构语法，从Array中解构并赋值变量
                ['resource' => [
                    'ciphertext' => $ciphertext,
                    'nonce' => $nonce,
                    'associated_data' => $aad
                ]] = $inBodyArray;
                // 加密文本消息解密
                $inBodyResource = AesGcm::decrypt($ciphertext, $apiv3Key, $nonce, $aad);
                // 把解密后的文本转换为PHP Array数组
                $inBodyResourceArray = (array)json_decode($inBodyResource, true);
                return ['code' => 0, 'data' => $inBodyResourceArray];
            }
            return ['code' => 1, 'data' => '知时间偏移量超过5分钟或者数据验证未通过'];
        } catch (\Throwable $e) {
            return ['code' => 1, 'data' => $e->getMessage()];
        }
    }

}