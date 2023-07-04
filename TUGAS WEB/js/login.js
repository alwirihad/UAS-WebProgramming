let eyeicon = document.getElementById("eyeicon");
let password = document.getElementById("password");

eyeicon.onclick = function(){
    if(password.type == "password"){
       password.type ="text";
       eyeicon.src = "icon/eye-solid (1).png"
    }
    else{
        password.type = "password";
        eyeicon.src = "icon/vector.png"
    }
        
}
