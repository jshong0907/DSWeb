<?php
$db = mysqli_connect('127.0.0.1', 'root', 'autoset', 'dasom');
if(mysqli_connect_errno())
{
  echo "연결에러";
}
$sql="SELECT * FROM user";
//$result = mysqli_query($db, $sql);
echo "<script>var inner_html='';</script>";
if ($result=mysqli_query($db,$sql))
{
  //echo "<script>var i = 0;</script>";
  while ($row=mysqli_fetch_row($result))
  {
    $id = $row[0];
    $pw = $row[1];
    $email = $row[2];
    $phone = $row[3];
    $allowed = $row[4];
    //echo "<script>var n = i.toString();</script>";
    echo "<script>inner_html += '<tr><td name=\'id\'>$id</td><td>$pw</td><td>$email</td><td>$phone</td><td>$allowed</td><td><form method=\'POST\' action=\"./apis/allow_register.php\"><button name=\'btn\' value=$id>승인</button></form></td><td><form method=\'POST\' action=\"./apis/refuse_register.php\"><button name=\'btn\' value=$id>취소</button></form></td><td><form method=\'POST\' action=\"./apis/delete_register.php\"><button name=\'btn\' value=$id>삭제</button></form></td></tr>'; </script>";
    //echo "<script>document.getElementById('table').innerHTML='<tr><td>$id</td><td>$pw</td><td>$email</td><td>$phone</td></tr>';</script>";
    //echo "<script>i += 1;</script>";
  }
  echo "<script>document.getElementById('table').innerHTML = inner_html;</script>";
  mysqli_free_result($result);
}
else {
  echo"good";
}
/*}
while ($row=mysqli_fetch_row($result))
{
  $id = $row[0];
  $pw = $row[1];
  $email = $row[2];
  $phone = $row[3];
  echo "<script>document.getElementById('table').'innerHTML=<tr><td>$id</td><td>$pw</td><td>$email</td><td>$phone</td></tr>';</script>";
}*/
mysqli_close($db);

/*function allow()
{
  echo "<script>$update_id = document.getElementById("$i").innerHTML;</script>";
  $sql = "UPDATE `user` SET `allowed`=true WHERE ID=$update_id";
}*/
?>
