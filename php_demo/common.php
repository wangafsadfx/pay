<?php



$config = [

    'apiurl'    => 'http://pay.sfapay.com/addons/pay/api/create',//支付订单提交接口

    'pub' => '$2y$10$LmZHxhI4gIPWCBr0vGe0TO8GFmOqaipFJbz9TrKDpIjgBAIO2O3qe',//商家接口公钥

    'secretkey' => '$2y$10$BnkBOwUg8oAh8dcxKO9W9uzvbvpdVj3faECupVDPVhe/tfGBfDRm.',//商家后台密钥

    'notifyURL' => 'http://sf.sfapay.net/demo1/paynotify.php', //支付成功回调地址

    'returnURL' => 'http://sf.sfapay.net/demo1/payreturn.php', //支付成功跳转页面

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