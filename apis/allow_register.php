<?php

$id=$_POST["btn"];
$db = mysqli_connect('127.0.0.1', 'root', 'autoset', 'dasom');
if(mysqli_connect_errno())
{
  echo "연결에러";
}
$sql = "UPDATE `user` SET `allowed`=true WHERE ID='$id'";
echo "$sql";
if($result = mysqli_query($db, $sql))
{
  mysqli_query($db, $sql);
  mysqli_close($db);
  echo "<script>window.location.replace('../Mainpage.html');</script>";
}
else {
  echo "good";
}

?>
