<?php

namespace GatherPay\Alipay;

use GatherPay\Alipay\pagepay\buildermodel\AlipayTradePagePayContentBuilder;
use GatherPay\Alipay\pagepay\service\AlipayTradeService;

class AliPay
{
    /**
     * @param $config
     * @param $param
     * @return []
     */

    public static function pay($config, $param)
    {

        //商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no = trim($param['out_trade_no']);

        //订单名称，必填
        $subject = trim($param['description']);

        //付款金额，必填
        $total_amount = trim($param['total']);

        //商品描述，可空
        $body = trim($param['description']);

        //构造参数
        $payRequestBuilder = new AlipayTradePagePayContentBuilder();
        $payRequestBuilder->setBody($body);
        $payRequestBuilder->setSubject($subject);
        $payRequestBuilder->setTotalAmount($total_amount);
        $payRequestBuilder->setOutTradeNo($out_trade_no);

        $aop = new AlipayTradeService($config);
        /**
         * pagePay 电脑网站支付请求
         * @param $builder  |   业务参数，使用buildmodel中的对象生成。
         * @param $return_url |  同步跳转地址，公网可以访问
         * @param $notify_url |  异步通知地址，公网可以访问
         * @return $response 支付宝返回的信息
         */
        $response = $aop->pagePay($payRequestBuilder,$param['return_url'],$param['notify_url']);

        //输出表单
        var_dump($response);

        return [];
    }
}