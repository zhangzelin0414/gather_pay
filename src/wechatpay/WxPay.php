<?php

namespace GatherPay\wechatpay;

use GatherPay\wechatpay\Crypto\Rsa;
use GatherPay\wechatpay\Util\PemUtil;

class WxPay
{
    public static function pay($config, $param)
    {
        // 设置参数

// 商户号
        $merchantId = trim($config['merchant_id']);


        // 从本地文件中加载「商户API私钥」，「商户API私钥」会用来生成请求的签名
        $merchantPrivateKeyFilePath = file_get_contents(trim($config['merchant_private_key_file_path']));
        $merchantPrivateKeyInstance = Rsa::from($merchantPrivateKeyFilePath, Rsa::KEY_TYPE_PRIVATE);

        // 「商户API证书」的「证书序列号」
        $merchantCertificateSerial = trim($config['merchant_certificate_serial']);


        // 从本地文件中加载「微信支付平台证书」，用来验证微信支付应答的签名
        $platformCertificateFilePath = file_get_contents(trim($config['platform_certificate_file_path']));
        $platformPublicKeyInstance = Rsa::from($platformCertificateFilePath, Rsa::KEY_TYPE_PUBLIC);

        // 从「微信支付平台证书」中获取「证书序列号」
        $platformCertificateSerial = PemUtil::parseCertificateSerialNo($platformCertificateFilePath);

        // 构造一个 APIv3 客户端实例
        $instance = Builder::factory([
            'mchid' => $merchantId,
            'serial' => $merchantCertificateSerial,
            'privateKey' => $merchantPrivateKeyInstance,
            'certs' => [
                $platformCertificateSerial => $platformPublicKeyInstance,
            ],
        ]);
// 发送请求
//        $resp = $instance->chain('v3/certificates')->get(
//            ['debug' => true] // 调试模式，https://docs.guzzlephp.org/en/stable/request-options.html#debug
//        );
        try {

            $resp = $instance
                ->chain('v3/pay/transactions/native')
                ->post(['json' => [
                    'mchid' => $merchantId,
                    'out_trade_no' => $param['out_trade_no'],
                    'appid' => trim($config['appid']),
                    'description' => $param['description'],
                    'notify_url' => $param['notify_url'],
                    'amount' => [
                        'total' => (int)$param['total'],
                        'currency' => 'CNY'
                    ],
                ]]);
//            echo $resp->getStatusCode(), PHP_EOL;
            return $resp->getBody();
        } catch (\Exception $e) {
            // 进行错误处理
            echo $e->getMessage(), PHP_EOL;
            if ($e instanceof \GuzzleHttp\Exception\RequestException && $e->hasResponse()) {
                $r = $e->getResponse();
                echo $r->getStatusCode() . ' ' . $r->getReasonPhrase(), PHP_EOL;
                echo $r->getBody(), PHP_EOL, PHP_EOL, PHP_EOL;
            }
            echo $e->getTraceAsString(), PHP_EOL;
        }
    }
}