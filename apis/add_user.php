<?php
$id=$_POST["id"];
$pass=$_POST['pw'];
$email=$_POST['email'];
$phone=$_POST['p1'].'-'.$_POST['p2'].'-'.$_POST['p3'];

$db = mysqli_connect('127.0.0.1', 'root', 'autoset', 'dasom');
if(mysqli_connect_errno()){
  echo "연결에러";
}
$table_name = 'user';
$sql = "SELECT PW FROM $table_name WHERE ID='$id'";
if($result = mysqli_query($db, $sql))
  {
    if (($id != "") && ($pass !="") && ($email != "") && ($phone != ""))
    {
      if(mysqli_num_rows($result) == 0)
      {
          $pw_encode = md5($pass);
          $table_name = "user";
          $sql = "INSERT INTO `user`(`ID`, `PW`, `Phone`, `email`) VALUES ('$id','$pw_encode','$phone', '$email')";
          mysqli_query($db, $sql);
          mysqli_close($db);
          echo "<script>alert('회원가입성공');</script>";
          echo "<script>window.location.replace('../Mainpage.html');</script>";
      }
      else {echo "<script>alert('아이디중복!!')</script>"; echo"<script>window.location.replace('../Register.html');</script>";}
  }
else {
  echo "필요충분조건성립X";
}
mysqli_close($db);
}
?>
