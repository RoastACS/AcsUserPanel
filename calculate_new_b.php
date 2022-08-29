<!DOCTYPE html>
<html lang="">
<head><title>Calculator_TypeB</title></head>
<body>
<h3>ACS流量价格计算器(B型)</h3>
<h5>非老用户版</h5>
<a href="https://t.yoimiya.love/calculate_old_b.php">跳转至老用户版</a>
<form action="calculate_new_b.php">
    <input type="text" name="name" value="<?=@$_GET['name']?>" placeholder="输入流量大小,单位GB"><br/>
   <button type="submit">计算</button>
</form>>
</body></html>
<?php
if(!isset($_GET['name']))
    return;
$traffic=(int)$_GET['name'];
function cal($traffic)
{
    $price = 0.7+$traffic*0.075;
    if($price<=4)
        return $price;
    else
        return 4;
}
echo "<hr/>总价格为：".cal($traffic)."RMB";