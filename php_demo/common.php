<?php



$config = [

    'apiurl'    => 'http://pay.sfapay.com/addons/pay/api/create',//支付订单提交接口

    'pub' => '$2y$10$wiKwZyOB7eruVojCo5ZSrudT9wFSYMsa3EPnh4q7ossWOZIY4hnMe',//商户号

    'secretkey' => '$2y$10$jlzIY2a0nSut2htW50/AGuD8qzqwW5VZQUtPoxdE1J/JqpTcvz8M2',//商家后台密钥

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