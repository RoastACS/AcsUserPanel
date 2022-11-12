<?php
if(!isset($_COOKIE['success'])) {
    echo "<script>alert('您还没有登录或登陆过期！')</script>";
    echo "<script>location.href='login.php'</script>";
}
$cookie=$_COOKIE['success'];
$c='"'.$cookie.'"';

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
function cal_a($traffic)
{
    return $traffic * 0.1;
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
$file=file_get_contents('test.html');
$arr_search=array('$traffic','$balance','$link','$account','$price');
$arr_replace=array("$traffic","$balance","$link","$cookie","$price");
$file=str_replace($arr_search,$arr_replace,$file);
echo $file;