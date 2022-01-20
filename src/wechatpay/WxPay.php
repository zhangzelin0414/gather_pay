<?php

namespace GatherPay\wechatpay;

use GatherPay\WeChatPay\Crypto\Rsa;
use GatherPay\WeChatPay\Util\PemUtil;

class WxPay
{
    public static function test()
    {
        // 设置参数

// 商户号
        $merchantId = '1515945761';

// 从本地文件中加载「商户API私钥」，「商户API私钥」会用来生成请求的签名
        $merchantPrivateKeyFilePath = file_get_contents('/mnt/hgfs/www/kaifa/zf/public/uploads/apiclient_key.pem');
        $merchantPrivateKeyInstance = Rsa::from($merchantPrivateKeyFilePath, Rsa::KEY_TYPE_PRIVATE);

// 「商户API证书」的「证书序列号」
        $merchantCertificateSerial = '6633D82720E59C53CEBDF9C83AB1F46DD27617D9';
//        $merchantCertificateSerial = 'apsgofEefwHLxmQALRrOW9NO2h9brjAM';

// 从本地文件中加载「微信支付平台证书」，用来验证微信支付应答的签名
        $platformCertificateFilePath = file_get_contents('/mnt/hgfs/www/kaifa/zf/public/uploads/platform_cert.pem');
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
                    'mchid'        => '1515945761',
                    'out_trade_no' => 'native12177525012014070332333',
                    'appid'        => 'wx80aabccdc7b64f03',
                    'description'  => 'Image形象店-深圳腾大-QQ公仔',
                    'notify_url'   => 'https://weixin.qq.com/',
                    'amount'       => [
                        'total'    => 1,
                        'currency' => 'CNY'
                    ],
                ]]);

            echo $resp->getStatusCode(), PHP_EOL;
            echo $resp->getBody(), PHP_EOL;
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