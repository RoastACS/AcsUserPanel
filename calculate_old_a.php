<!DOCTYPE html>
<html lang="">
<head><title>Calculator_TypeA</title></head>
<body>
<h3>ACS流量价格计算器(A型)</h3>
<h5>老用户版</h5>
<a href="https://t.yoimiya.love/calculate_new_a.php">跳转至非老用户版</a>
<form action="calculate_old_a.php">
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
    if($traffic <= 10)
    {
        $price = $traffic * 0.05;
        if ($price < 1)
            return 1;
        else
            return $price;
    }
    else if($traffic <= 20)
    {
        $price = 0.5 + ($traffic - 10) * 0.07;
        return $price;
    }
    else if($traffic <= 30)
    {
        $price = 0.5 + 0.7 + ($traffic - 20) * 0.11;
        return $price;
    }
    else
    {
        $price = 0.5 + 0.7 + 1.1 +($traffic - 30) * 0.12;
        if($price<=4)
            return $price;
        else
            return 4;
    }
}
echo "<hr/>总价格为：".cal($traffic)."RMB";