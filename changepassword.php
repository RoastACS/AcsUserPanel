<?php
if(!isset($_COOKIE['success'])) {
    echo "<script>alert('您还没有登录或登陆过期！')</script>";
    echo "<script>location.href='http://t.yoimiya.love/index.php'</script>";
}
$replace=$_COOKIE['success'];
$file=file_get_contents('change1111.html');
echo $file;
$panduan1=isset($_POST['table']);
$panduan2=isset($_POST['value']);
if(!$panduan1&&!$panduan2){
    return;
}
$table='username';
$project='password';
$value=$_POST['value'];
$account="$replace";
$a='"'.$account.'"';
$p='"'.$project.'"';
$v='"'.$value.'"';
class ACSDB extends SQLite3
{
    function __construct()
    {
        $this->open('/www/wwwroot/t.yoimiya.love/dcmcscmskcmskcm/user.db');
    }
}
$tempdb=new ACSDB();
$sql =<<<EOF
      UPDATE $table set $p = $v where account=$a;
EOF;
$ret = $tempdb->exec($sql);
if(!$ret){
    echo $tempdb->lastErrorMsg();
} else {
    echo "<p style='color: #36ecec'>记录已成功修改！</p>";
}
$tempdb->close();
