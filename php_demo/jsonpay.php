<?php

//第二种JSON方式调用
include 'common.php';
$goodsName = '测试商品'; //商品的名称，商户后台会展示该名称。
$format = 'json';//默认为表单模式。form：表单模式；json：返回json结构

$merchantOrderId = date('YmdHis',time()).mt_rand(10000, 99999); //商户自定的订单号，该订单号将后在后台展示。
$notifyURL = $config['notifyURL']; //支付成功回调地址
$returnURL = $config['returnURL']; //支付成功跳转页面
$_POST['money'] = empty($_POST['money']) ?1:$_POST['money'];
$money = floatval(sprintf("%.2f",$_POST['money'])); //支付金额

// $money = floatval(sprintf("%.2f",100)); //支付金额
$pub = $config['pub']; //商户号
$secretKey = $config['secretkey']; //商家后台密钥
$paytype = $config['paytype'][1];


$sign = md5(md5($money .$merchantOrderId  .$paytype . $notifyURL.$returnURL) . $secretKey);
$param = array(
    'money' => $money,//订单金额
    'format' => $format, //默认为表单模式。form：表单模式；json：返回json结构
    'goodsName' => $goodsName, //选填。商品的名称，商户后台会展示该名称。
    'notifyURL' => $notifyURL, //选填。支付成功后系统会对该地址发起回调，通知支付成功的消息。
    'returnURL' => $returnURL, //选填。成功成功后系统会跳转页面到该地址上。
    'merchantOrderId' => $merchantOrderId, //必填。商户自定的订单号，该订单号将后在后台展示。
    'pub' => $pub, //必填。商户号
    'paytype' => $paytype,//支付类型，支付宝、微信，默认值支付宝
    'sign' => $sign, //必填。
);


$res = request_post($config['apiurl'], $param);
echo $res;


/**
 * 模拟post进行url请求
 * @param string $url
 * @param string $param
 */
function request_post($url = '', $param = '')
{
    if (empty($url) || empty($param)) {
        return false;
    }

    $postUrl = $url;
    $curlPost = $param;
    $ch = curl_init(); //初始化curl
    curl_setopt($ch, CURLOPT_URL, $postUrl); //抓取指定网页
    curl_setopt($ch, CURLOPT_HEADER, 0); //设置header
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //要求结果为字符串且输出到屏幕上
    curl_setopt($ch, CURLOPT_POST, 1); //post提交方式
    curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
    $data = curl_exec($ch); //运行curl
    curl_close($ch);

    return $data;
}