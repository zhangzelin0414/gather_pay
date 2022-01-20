<?php

namespace GatherPay;

use GatherPay\wechatpay\WxPay;

class  AllPay
{

    protected static $initialization = null;
    protected static $config = [];

    //初始化
    public static function initialization($config)
    {
        if (is_null(self::$initialization)) {
            self::$config = [
                'wechat' => [
                    'appid' => 'wx80aabccdc7b64f03',//APPID
                    'merchant_id' => '1515945761',//商户号
                    'merchant_private_key_file_path' => '/mnt/hgfs/www/moban/gather_pay/apiclient_key.pem',//商户API私钥文件
                    'platform_certificate_file_path' => '/mnt/hgfs/www/moban/gather_pay/platform_cert.pem',//微信支付平台证书
                    'merchant_certificate_serial' => ' 6633D82720E59C53CEBDF9C83AB1F46DD27617D9',//证书序列号
                ],
                'alipay' => [],
            ];
            self::$initialization = new self();
        }
        return self::$initialization;
    }

    /**
     * @param string $type |  支付宝 alipay ;  微信 wechat
     * @param string $form | 来源 电脑浏览器pc  ; 手机浏览器 mobile ;  微信浏览器  wx  ;
     * @return void
     */
    public function sendPay($param, string $type = 'alipay', string $form = 'pc')
    {
        switch ($type) {
            case 'alipay':
                break;

            case 'wechat':
                switch ($form) {
                    case 'pc':
                        $param = [
                            'out_trade_no' => 'native12177525012014070343434',
                            'description' => 'Image形象店-深圳腾大-QQ公仔',
                            'notify_url' => 'https://weixin.qq.com/',
                            'total' => '2',
                        ];
                        $url = WxPay::pay(self::$config['wechat'], $param);
                        break;
                    default:
                        throw new  \Exception('未知微信支付方式');
                        break;
                }
                break;
            default:
                throw new  \Exception('未知支付渠道');
                break;

        }
    }

}