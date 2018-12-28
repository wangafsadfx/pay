<?php

$filelist = getFile("./logs/");
$strpay = "";
$i = 1;
foreach ($filelist as $key => $val) {
    $datastr = file_get_contents("./logs/" . $val);
    $dataarr = json_decode($datastr, true);

    if (empty($dataarr['time'])) {
        $datestr = '';
    } else {
        $datestr = date("Y-m-d H:i:s", $dataarr['time']);
    }
    $strpay .= "<tr><td>{$i}</td>
                <td>{$dataarr['orderNo']}</td>
                <td>{$dataarr['merchantOrderNo']}</td>
                <td>{$dataarr['price']}</td>
                <td>{$dataarr['realprice']}</td>
                <td>{$dataarr['money']}</td>
                <td>{$dataarr['type']}</td>
                <td>{$datestr}</td></tr>";
    $i++;
}

// <td>序号</td>
// <th>平台单号</th>
// <th>充值单号</th>
// <th>充值金额</th>
// <th>用户支付金额</th>
// <th>收款金额</th>
// <th>支付类型</th>
// <th>时间</th>
// <th>签名</th>

//获取文件列表
function getFile($dir)
{
    //取得当前文件所在目录
    // $dir = dirname($dir);

    //判断目标目录是否是文件夹
    $file_arr = array();
    if (is_dir($dir)) {
        //打开
        if ($dh = @opendir($dir)) {
            //读取

            while (($file = readdir($dh)) !== false) {

                if ($file != '.' && $file != '..') {

                    $file_arr[] = $file;
                }

            }
            //关闭
            closedir($dh);
        }
    }
    return $file_arr;

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<style type="text/css">
table
  {
  border-collapse:collapse;
  }

table, td, th
  {
  border:1px solid black;
  }
</style>
 <meta http-equiv="refresh" content="3">
</head>

<body>
<table>
<tr>
<td>序号</td>
<th>平台单号</th>
<th>充值单号</th>
<th>充值金额</th>
<th>用户支付金额</th>
<th>收款金额</th>
<th>支付类型</th>
<th>时间</th>
</tr>
<?php echo $strpay; ?>
<!-- <tr>
<td>Bill</td>
<td>Bill</td>
<td>Gates</td>
<td>Bill</td>
<td>Gates</td>
</tr> -->
</table>
</body>
</html>
