<?php
$empty=null;
setcookie('success',$empty,time()-1,'/');
echo "<script>alert('退出登陆成功~')</script>";
echo "<script>location.href='https://t.yoimiya.love/login.php'</script>";