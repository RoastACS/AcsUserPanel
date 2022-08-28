<head><title>ACS流量查询</title></head>
<h3>ACS流量查询</h3>
<a href="https://t.yoimiya.love/calculate_new_a.php">进入价格计算器</a>
<?php
   class MyDB extends SQLite3
   {
       function __construct()
       {
           $this->open('x-ui.db');
       }
   }
   $db = new MyDB();
   if(!$db){
       echo $db->lastErrorMsg();
   } else {
       echo "已成功连接到数据库"."</br></br>";
   }
?>
<?php
/* 这一段暂时屏蔽掉
   $sql =<<<EOF
      SELECT * from inbounds;
EOF;

   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
       echo "用户ID = ". $row['id'] . "</br>";
       echo "账户名 =  ".$row['remark'] ."</br>";
       echo "上传流量(单位：GB) = ". $row['up'] /"1073741824"."</br>";
       echo "下载流量(单位：GB) = ". $row['down'] /"1073741824"."</br></br>";
   }
*/
   $search=1293368668;
   print_r($db->querySingle("SELECT up, down FROM inbounds WHERE remark=$search", true));
   echo "Aloha Cloud Studio</br>";
   echo "下午写作业没时间随便写的，暂且用着，很快就换自助查询的";
   $db->close();
?>