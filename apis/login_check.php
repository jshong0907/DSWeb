<?php
$email=$_POST["id"];
$pass=$_POST['pw'];

$db = mysqli_connect('127.0.0.1', 'root', 'autoset', 'dasom');
if(mysqli_connect_errno()){
  echo "연결에러";
}

$pass_encode = md5($pass);
$table_name = 'user';
$sql = "SELECT PW FROM $table_name WHERE ID='$email'";

if($result = mysqli_query($db, $sql))
{
    if(mysqli_num_rows($result) == 0)
    {
        echo "<script>alert('No matched ID.');</script>";
        echo "<script>window.location.replace('../Login.html');</script>";
    }
    else
    {
        $row = mysqli_fetch_assoc($result);
        if($row["PW"] == $pass_encode) // 로그인 성공
        {
            $sql = "SELECT `allowed` FROM `user` WHERE ID='$email'";
            // 리디렉션
            echo "<script>alert('Login Succeed.');</script>";
            if($result = mysqli_query($db, $sql))
            {
              $row = mysqli_fetch_assoc($result);
              if($row['allowed'] == true)
              {
                echo "<script>location.href='../Mainpage.html';</script>";
              }
              else
              {
                echo "<script>location.href='https://www.naver.com';</script>";
              }
            }
            else
            {
              echo "good";
            }
        }
        else
        {
            echo "<script>alert('Wrong Password.');</script>";
            echo "<script>window.location.replace('../Login.html');</script>";
        }
    }
}
//mysqli_free_result($result);
mysqli_close($db);

//추가하는건 insert 검색,가져오는건 select 업데잉  update 지우는 delete

?>
