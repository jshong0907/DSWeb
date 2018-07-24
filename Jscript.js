$(document).ready(function(){

$('#check_id').onclick(function(){

$.ajax({ // ajax실행부분
  type: "post",
  url : "../apis/is_Duplicated.php",
  data : {
      id : $('#new_id').val()
  },
  error : function error(){ alert('시스템 문제발생');}
  });
  });
});
