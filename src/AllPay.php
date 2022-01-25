<?php

namespace GatherPay;

use GatherPay\Alipay\AliPay;
use GatherPay\wechatpay\WxPay;

class  AllPay
{

    protected static $initialization = null;
    protected static $config = [];

    //初始化
    public static function initialization($config)
    {
        if (is_null(self::$initialization)) {
            self::$config = $config;
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
                switch ($form) {
                    case 'pc':
                        self::check('alipay-pc', self::$config['alipay'], $param);
                        $res = AliPay::pay(array_merge(self::$config['alipay'], [  //编码格式
                                'charset' => "UTF-8",
                                //签名方式
                                'sign_type' => "RSA2",
                                //支付宝网关
                                'gatewayUrl' => "https://openapi.alipay.com/gateway.do"
                            ])
                            , $param);
                        $res_type = 'form';
                        break;
                    default:
                        throw new  \Exception('未知微信支付方式');
                        break;
                }
                break;
            case 'wechat':
                switch ($form) {
                    case 'pc':
                        self::check('wechat-pc', self::$config['wechat'], $param);
                        $res = WxPay::pay(self::$config['wechat'], $param);
                        $res_type = 'qr';
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
        if ($res['code'] > 0) {
            throw new  \Exception($res['msg']);
        }
        return [
            'res_type' => $res_type ?? '',// ur l链接 qr 二维码 form 表单
            'request_source' => $type . '-' . $form,//请求来源
            'data' => $res['data']
        ];
    }

    public function check($type, $config, $param)
    {


        switch ($type) {
            case 'alipay-pc':
                break;
            case 'wechat-pc':
                self::checkFun($config, [
                    'appid' => 'APPID',
                    'merchant_id' => '商户号',
                    'merchant_private_key_file_path' => '商户API私钥文件',
                    'platform_certificate_file_path' => '微信支付平台证书',
                    'merchant_certificate_serial' => '证书序列号',
                ]);

                self::checkFun($param, [
                    'out_trade_no' => '订单号',
                    'description' => '商品描述',
                    'notify_url' => '回调地址',
                    'total' => '金额',
                ], function ($param) {
                    if (($param['total'] * 100) < 1) {
                        throw new \Exception('支付金额必须大于0.01');
                    }
                });
                break;
        }
        return true;
    }

    private function checkFun($value, $CheckValue, $fun = null)
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

}