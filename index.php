<!DOCTYPE html>
<html lang="">
<head><title>流量自助查询</title></head>
<body>
<h3>ACS流量自助查询页面</h3>
<form action="index.php">
    <input type="text" name="name" value="<?=@$_GET['name']?>" placeholder="输入您的qq号"><br/>
    <button type="submit">查询</button>
</form>>
</body></html>
<?php
if(!isset($_GET['name']))
    return;
$s=$_GET['name'];
class acs extends SQLite3
    {
        function __construct()
        {
            $this->open('/etc/x-ui/x-ui.db');
        }
    }
    $db = new acs();
    if(!$db){
        echo $db->lastErrorMsg();
    } else {
        echo "已成功连接到数据库"."</br></br>";
    }
    $arr1=array();
    $arr1=$db->querySingle("SELECT up, down FROM inbounds WHERE remark=$s", true);
    $traffic=intval(($arr1['down']+$arr1['up'])/"1073741824");
    echo "您所用的流量为：".$traffic."GB（将会自动取整）";
    echo "<a href='https://t.yoimiya.love/calculate_old_a.php?name=$traffic'><br/>PlanA流量价格一键计算（老用户）</a>";
    echo "<a href='https://t.yoimiya.love/calculate_new_a.php?name=$traffic'><br/>PlanA流量价格一键计算（新用户）</a>";
    echo "<a href='https://t.yoimiya.love/calculate_old_b.php?name=$traffic'><br/>PlanB流量价格一键计算（老用户）</a>";
    echo "<a href='https://t.yoimiya.love/calculate_new_b.php?name=$traffic'><br/>PlanB流量价格一键计算（新用户）</a>";
    echo "<hr/>Aloha Cloud Studio</br>";
    $db->close();
?>
