let clickpass = document.getElementById("pwdButt").addEventListener("click",comparePass);
//let shwPsswd = document.getElementById("checkbox").addEventListener("click",showPass);
function comparePass(){
    let str =document.getElementById("pwd").value,str2= document.getElementById("pwd2").value;
    if(str===str2){
        document.getElementById("res").innerHTML="Password Match"
    }
    else{
        document.getElementById("res").innerHTML="Password don't Match"
    }
}
function showPass(){
    let pwd = document.getElementById("pwd2");
    if(pwd.type ==="password"){
        pwd.type = "text";
    }
    else{
        pwd.type = "password";
    }
}