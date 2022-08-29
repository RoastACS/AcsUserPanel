<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>ACS流量查询页</title>
    <style>
        .container {
            width: 60%;
            margin: 10% auto 0;
            background-color: #f0f0f0;
            padding: 2% 5%;
            border-radius: 10px
        }

        ul {
            padding-left: 20px;
        }

        ul li {
            line-height: 2.3
        }

        a {
            color: #20a53a
        }
    </style>
</head>
<body>
<div class="container">
    <h1>ACS流量使用查询</h1>
    <form action="index.php">
        <input type="text" name="name" value="<?=@$_GET['name']?>" placeholder="输入您的qq号"><br/>
        <button type="submit">查询</button>
    </form>
    <ul>
        <li>用法：</li>
        <li>1.输入您的QQ号</li>
        <li>2.点击查询按钮</li>
        <li>3.根据你的类别进行计算选择即可</li>
    </ul>
</div>
<!-- Ver 0.01beta -->
</body>
</html>
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
    echo ">已成功连接到数据库"."</br></br>";
}
$arr1=array();
$arr1=$db->querySingle("SELECT up, down FROM inbounds WHERE remark=$s", true);
$traffic=intval(($arr1['down']+$arr1['up'])/"1073741824");
if ($traffic<=0)
    header("Location:https://t.yoimiya.love/404.html");
elseif ($traffic>0)
    echo "您所用的流量为：".$traffic."GB（将会自动取整）<br/>";
echo "<a href='https://t.yoimiya.love/calculate_old_a.php?name=$traffic'><br/>PlanA流量价格一键计算（老用户）</a>";
echo "<a href='https://t.yoimiya.love/calculate_new_a.php?name=$traffic'><br/>PlanA流量价格一键计算（新用户）</a>";
echo "<a href='https://t.yoimiya.love/calculate_old_b.php?name=$traffic'><br/>PlanB流量价格一键计算（老用户）</a>";
echo "<a href='https://t.yoimiya.love/calculate_new_b.php?name=$traffic'><br/>PlanB流量价格一键计算（新用户）</a>";
echo "<hr/>Aloha Cloud Studio</br>";
$db->close();
?>