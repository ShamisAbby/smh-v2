function validate() {
  const pass1 = document.getElementsByClassName("pass1").value;
  const pass2 = document.getElementsByClassName("pass2").value;
  const passError = document.getElementById("passError");
  submitOK = "true";

  if(pass1 != pass2){
    passError.style.display = 'block';
    submitOK = "false";
  }
 
  if(submitOK == "false"){
    return false;
  }
}
