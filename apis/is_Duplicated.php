<?php
function isDuplicated()
{

  $db = mysqli_connect('127.0.0.1', 'root', 'autoset', 'dasom');
  if(mysqli_connect_errno())
  {
    echo "연결에러";
  }
  $email=document.getElementById("new_id").value;
  $sql = "SELECT PW FROM $table_name WHERE ID='$email'";
  
  if($result = mysqli_query($db, $sql))
  {
      if(mysqli_num_rows($result) == 0)
      {
        echo "<script>alert('사용가능'');</script>";
        echo "<script>return false;</script>";
      }
      else
      {
        echo "<script>alert('사용불가');</script>";
        echo "<script>document.getElementById('new_id').value = '';</script>";
        echo "<script>return false;</script>";
      }
  }
}
?>
