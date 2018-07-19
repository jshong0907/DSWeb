function loginClick()
{
    var id = document.getElementById("id").value;
    var pw = document.getElementById("pw").value;
    if (id == "jshong0907" && pw == "12345")
    {
        document.write("로그인성공!!")
    }
    else {document.write("로그인실패!!")}
}