<?php
/**
 * ---------------------支付成功，用户会跳转到这里-------------------------------
 *
 * 此页就是您之前传给支付页的returnURL页的网址
 * 支付成功，我们会把用户跳转回这里。
 *
 * --------------------------------------------------------------
 */
include 'common.php';

$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : '';//平台订单号
$out_order_id = isset($_GET['out_order_id']) ? $_GET['out_order_id'] : ''; //商户订单号
$sign = isset($_GET['sign']) ? $_GET['sign'] : '';

$new_sign = md5(md5($order_id . $out_order_id) . $config['secretkey']);

if ($sign != $new_sign) {
    echo '签名错误';
    exit();
}

// 此处在您数据库中查询：此笔订单号是否已经异步通知给您付款成功了。如成功了，就给他返回一个支付成功的展示。
echo "恭喜，支付成功!，订单号：{$out_order_id}。";
$sign = md5(md5($out_order_id) . $config['secretkey']);
echo "<a href='http://pay.sfapay.com/addons/pay/api/query/out_order_id/{$out_order_id}/sign/{$sign}'>详情</a>";
echo "<br/><a href='list.php'>订单列表</a>";


?>