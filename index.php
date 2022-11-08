<?php
$loading=file_get_contents('load.html');
echo $loading;
echo "<script>setTimeout(\"javascript:location.href='login.php'\", 5000); </script>";