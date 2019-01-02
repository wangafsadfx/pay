<?php



$config = [

    'apiurl'    => 'http://pay.sfapay.com/addons/pay/api/create',//支付订单提交接口

    'pub' => '$2y$10$FSzlVdqp/PpEC3vmPDvcCeLcABov9/tR8uqZlC.jzLIz8MBAAQK5i',//商家接口公钥

    'secretkey' => '$2y$10$YEIGbkPo7vojHkvga75vlOb8ESHfikWAPYN0xZfaJoCYsH1tBt4LK',//商家后台密钥

    'notifyURL' => 'http://demo.sfapay.com/demo1/paynotify.php', //支付成功回调地址

    'returnURL' => 'http://demo.sfapay.com/demo1/payreturn.php', //支付成功跳转页面

    'paytype' => ['wechat','alipay'],//支付方式

];

// 错误显示级别

error_reporting(E_ALL);

//设置时区

ini_set('date.timezone', 'Asia/Shanghai');

//强制服务器编码

header("Content-Type: text/html; charset=utf-8");

//设置mbstring字符编码

mb_internal_encoding("UTF-8");