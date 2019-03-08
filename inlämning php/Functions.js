
function PasswordValidateLength(){ // password length validaiton
    
    //alert("test");
    document.getElementById("submitButton").disabled = true;  
   var password = document.getElementById("pw").value.toString();
    
    if(password == "")
        {
        document.getElementById("pw").style.borderColor = "white";
        document.getElementById("pw2").style.borderColor = "white";
        document.getElementById("errorMessage").textContent = "";
        document.getElementById("submitButton").disabled = true;
        }
    
          if(password.length > 5)
              {
        document.getElementById("pw").style.borderColor = "white";
        document.getElementById("pw2").style.borderColor = "white";
        document.getElementById("errorMessage").textContent = "";
                document.getElementById("submitButton").disabled = false;
              }
          else
          {
        document.getElementById("pw").style.borderColor = "red";
        document.getElementById("pw2").style.borderColor = "red";
        document.getElementById("errorMessage").textContent = "Passwords has to be at least 6 characters long.";
        document.getElementById("submitButton").disabled = true;   
          }
      
};
/*
function PasswordMatch (){
  //      alert("test222222222222");
   var password1 = document.getElementById("pw").value;
   var password2 = document.getElementById("pw2").value;
    
    if(password1 == password2)
        {
        document.getElementById("pw").style.borderColor = "white";
        document.getElementById("pw2").style.borderColor = "white";
        document.getElementById("errorMessage").textContent = "";
        document.getElementById("submitButton").disabled = false;
            return true;
        }
    else
    {
        document.getElementById("pw").style.borderColor = "red";
        document.getElementById("pw2").style.borderColor = "red";
        document.getElementById("errorMessage").textContent = "Passwords didn't match.";
        document.getElementById("submitButton").disabled = true;  
    }
}
*/
$(document).ready(function () { // password match via jquery
   $('#pw2').on('keyup', function() {
       
       if($('#pw').val() == "" && $('#pw2').val() == "")
           {
            $('#pw').css("border-color", "white");
            $('#pw2').css("border-color", "white");
            $('#errorMessage').text("");
               return false;
           }
       
              if($('#pw2').val() == "")
           {
            $('#pw').css("border-color", "white");
            $('#pw2').css("border-color", "white");
            $('#errorMessage').text("");
               return false;
           }
   
    if($('#pw').val() == $('#pw2').val() && $('#pw').val().length >= 6)
        {
            $('#submitButton').disabled = false;
            $('#pw').css("border-color", "white");
            $('#pw2').css("border-color", "white");
            $('#errorMessage').text("passwords are matching");
        } 
    else
    {
            $('#submitButton').disabled = true;
            $('#pw').css("border-color", "red");
            $('#pw2').css("border-color", "red");
            $('#errorMessage').text("Passwords doesn't match.");
    }
});
});




