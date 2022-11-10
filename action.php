<?php
if(!isset($_COOKIE['success'])) {
    echo "<script>alert('您还没有登录或登陆过期！')</script>";
    echo "<script>location.href='login.php'</script>";
}
$cookie=$_COOKIE['success'];
$c='"'.$cookie.'"';

function cal_a($traffic)
{
    if($traffic <= 20)
    {
        $price = $traffic * 0.1;
        return $price;
    }
    else
    {
        $price = 2 +($traffic - 20) * 0.15;
        return $price;
    }
}
class XUIDB extends SQLite3
{
    function __construct()
    {
        $this->open('/etc/x-ui/x-ui.db');
    }
}
class ACSDB extends SQLite3
{
    function __construct()
    {
        $this->open('/www/wwwroot/t.yoimiya.love/dcmcscmskcmskcm/user.db');
    }
}
$user=new XUIDB();
$result=array();
$result=$user->querySingle("SELECT up, down FROM inbounds WHERE remark=$c", true);
$message=new ACSDB();
$result2=$message->querySingle("SELECT balance,link FROM username WHERE account=$c", true);
$traffic=intval(($result['down']+$result['up'])/"1073741824");
$balance=$result2['balance'];
$link=$result2['link'];
$price=cal_a($traffic);
$resl_balance=$balance-$price;
$opr_usrsql="UPDATE username set balance = $resl_balance where account=$c;";
$opr_trafsql="UPDATE inbounds set down = 0 where remark=$c;";
$resl=$message->exec($opr_usrsql);
$user->exec($opr_trafsql);
if(!$resl)
    echo $message->lastErrorMsg();
else{
    echo "<script>alert('已成功结算！')</script>";
    echo "<script>location.href='https://t.yoimiya.love/usercenter.php'</script>";
}