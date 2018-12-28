<?php
/**
 * ---------------------通知异步回调接收页-------------------------------
 *
 * 此页就是您之前传给支付页的notifyURL页的网址
 * 支付成功，我们会根据您之前传入的网址，回调此页URL，post回参数
 *
 * --------------------------------------------------------------
 */
include 'common.php';
$orderNo = $_POST["orderNo"]; // 系统订单号
$merchantOrderNo = $_POST["merchantOrderNo"]; // 商户订单号
$price = $_POST['price']; // 商户提交金额
$realprice = $_POST['realprice']; // 用户支付金额
$money = $_POST["money"]; // 商户收款金额(去掉手续)
$paytype = $_POST['type']; // 支付类型
$paytime = $_POST['paytime']; // 支付时间
$sign = $_POST["sign"]; // 签名

// orderNo&merchantOrderNo&money&密钥
$vsign = md5(md5($orderNo.$merchantOrderNo.$price.$realprice.$money.$paytype.$paytime ). $config['secretkey']);

if ($vsign != $sign) {
    // return jsonError("key值不匹配");
    echo 'error';
} else {
    $_REQUEST['time'] = time();
    file_put_contents("./logs/" . $merchantOrderNo . ".json", json_encode($_REQUEST));
    echo "success";
    // 校验key成功，是自己人。执行自己的业务逻辑：加余额，订单付款成功，装备购买成功等等。
}

?>