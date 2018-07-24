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
  while ($row=mysqli_fetch_row($result))
  {
    $id = $row[0];
    $pw = $row[1];
    $email = $row[2];
    $phone = $row[3];

    echo "<script>inner_html += '<tr><td>$id</td><td>$pw</td><td>$email</td><td>$phone</td></tr>'; </script>";
    //echo "<script>document.getElementById('table').innerHTML='<tr><td>$id</td><td>$pw</td><td>$email</td><td>$phone</td></tr>';</script>";
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
?>
