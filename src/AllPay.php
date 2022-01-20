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
     * @return []
     */
    public function sendPay($param, string $type = 'alipay', string $form = 'pc')
    {
        switch ($type) {
            case 'alipay':
                break;

            case 'wechat':
                switch ($form) {
                    case 'pc':
                        self::check('wechat-pc', self::$config['wechat'], $param);
                        $data = WxPay::pay(self::$config['wechat'], $param);
                        var_dump($data);exit();
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

        return [
            'type'=> 'qr',// ur l链接 qr 二维码
            'source'=>$type.'-'.$form,//来源
            'data'=>$data
        ];
    }

    public function check($type, $config, $param)
    {
        function checkFun($value, $CheckValue, $fun = null)
        {
            foreach (array_keys($CheckValue) as $v) {
                if (empty($value[$v])) {
                    throw new \Exception('缺少' . $CheckValue[$v]);
                }
            }
            if ($fun != null) {
                $fun($value);
            }
        }

        switch ($type) {
            case 'wechat-pc':
                checkFun($config, [
                    'appid' => 'APPID',
                    'merchant_id' => '商户号',
                    'merchant_private_key_file_path' => '商户API私钥文件',
                    'platform_certificate_file_path' => '微信支付平台证书',
                    'merchant_certificate_serial' => '证书序列号',
                ]);

                checkFun($param, [
                    'out_trade_no' => '订单号',
                    'description' => '商品描述',
                    'notify_url' => '回调地址',
                    'total' => '金额',
                ], function ($param) {
                    if (($param['total'] * 100) <= 1) {
                        throw new \Exception('支付金额必须大于0.01');
                    }
                });
                break;
        }
        return true;
    }

}