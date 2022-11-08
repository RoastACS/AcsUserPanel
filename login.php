<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ACS登录页</title>
    <link rel="stylesheet" href="style1.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<body>
<div class="box">
    <div class="form">
        <form method="post" action="login.php">
            <h2>登录ACS面板 </h2>
            <div class="inputbox">
                <input type="text" required="required" name="username" autocomplete=”off”>
                <span>用户名 </span>
                <i></i>
            </div>
            <div class="inputbox">
                <input type="password" required="required" name="password">
                <span>密码</span>
                <i></i>
            </div>
            <div class="links">
                <a href="" onclick="alert('当前功能尚未制作完毕~')"> 忘记密码？</a>
                <a href="" onclick="alert('当前功能尚未制作完毕~')">注册账户</a>
            </div>
            <input type="submit" value="登录">
        </form>
    </div>
</div>
</body>
</html>
<?php
if (isset($_COOKIE['success'])){
    echo "<script>alert('您已登录，即将跳转')</script>";
    echo "<script>location.href='http://t.yoimiya.love/usercenter.php'</script>";
}
if (!(isset($_POST['username'])&&isset($_POST['password'])))
    return;
$username=$_POST["username"];
$password=$_POST["password"];
//不知道为啥需要加双引号之后才能正常查询到
$u='"'.$username.'"';
class ACSDB extends SQLite3
{
    function __construct()
    {
        $this->open('/www/wwwroot/t.yoimiya.love/dcmcscmskcmskcm/user.db');
    }
}
$search=new ACSDB();
$result=array();
$result=$search->querySingle("SELECT password FROM username WHERE account=$u", true);
if($password==$result["password"])
{
    setcookie('success',"$username",time()+60*60*24,'/');
    echo "<script>alert('登陆成功~')</script>";
    echo "<script>location.href='http://t.yoimiya.love/usercenter.php'</script>";
}
else
{
    echo '<script>alert("登陆失败！")</script>';
}
$search->close();