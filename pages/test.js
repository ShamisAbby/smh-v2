    
    const personal = document.getElementById('personal');
    const education = document.getElementById('education');
    const financial = document.getElementById('financial');
    const tab_1 = document.getElementById('tab-1');
    const tab_2 = document.getElementById('tab-2');
    const tab_3 = document.getElementById('tab-3');
    const next1 = document.getElementById('next1');
    const next2 = document.getElementById('next2');
    const next3 = document.getElementById('next3');
    const prev1 = document.getElementById('prev1');
    const prev2 = document.getElementById('prev2');

    function form_1(){
      personal.style.display = 'block';
      education.style.display = 'none';
      financial.style.display = 'none';
      next1.style.display = 'block';
      next2.style.display = 'none';
      next3.style.display = 'none';
      prev1.style.display = 'none';
      prev2.style.display = 'none';

    }


    function form_2(){
      personal.style.display = 'none';
      education.style.display = 'block';
      financial.style.display = 'none';
      next1.style.display = 'none';
      next2.style.display = 'block';
      next3.style.display = 'none';
      prev1.style.display = 'block';
      prev2.style.display = 'none';
      
    }

    
    function form_3(){
      personal.style.display = 'none';
      education.style.display = 'none';
      financial.style.display = 'block';
      next1.style.display = 'none';
      next2.style.display = 'none';
      next3.style.display = 'block';
      prev1.style.display = 'none';
      prev2.style.display = 'block';
      
    }

    

    function validateForm() {
      // event.preventDefault()
        
      
        var fullName = document.getElementById("fullName").value;
        var username = document.getElementById("username").value;
        var email = document.getElementById("email").value;
        var phone = document.getElementById("phone").value;
        var accnt = document.getElementById("accnt").value;
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;
        var regNo = document.getElementById("regNo").value;
        var network = document.getElementById("network").value;
        var year = document.getElementById("year").value;

        var form = document.getElementById("myForm");

        
        var error1 = document.getElementById("error1");
        var error2 = document.getElementById("error2");
        var error3 = document.getElementById("error3");
        var error4 = document.getElementById("error4");
        var error5 = document.getElementById("error5");
        var error6 = document.getElementById("error6");
        var error7 = document.getElementById("error7");
        var error8 = document.getElementById("error8");
        var error9 = document.getElementById("error9");
        var error10 = document.getElementById("error10");
        var error11 = document.getElementById("error11");

        var isValid = true;

        var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var phoneRegex = /^\d{10}$/;
        var accntRegex = /^\d{10}$/;
        var regNo_validation = /^[A-Z]{1,5}\/\d{2}\/\d{2}\/\d{3}\/[A-Z]{2}$/;

      
        if (fullName.trim() === "") {
          error1.style.display = 'block';
          error1.textContent="Please enter your full name.";
          isValid = false;
        }else{
          error1.style.display = 'none';
        }
      
        if (username.trim() === "") {
          error2.style.display = 'block';
          error2.textContent="Please enter a username.";
          isValid = false;
        }else{
          error2.style.display = 'none';
        }
      
        if (!emailRegex.test(email)) {

          error3.style.display = 'block';
          error3.textContent="Please enter a valid email address.";
          isValid = false;
        }else{
          error3.style.display = 'none';
        }
      
        if (!phoneRegex.test(phone)) {
          error4.style.display = 'block';
          error4.textContent="Please enter a valid phone number (10 digits).";
          isValid = false;
        }else{
          error4.style.display = 'none';
        }

        if (!accntRegex.test(accnt)) {
          error5.style.display = 'block';
          error5.textContent="Please enter a valid Payment number (10 digits).";
          isValid = false;
          }else{
            error5.style.display = 'none';
          }
      
        if (password.trim() === "") {
          error6.style.display = 'block';
          error6.textContent="Please enter a password.";
          isValid = false;
        }else{
          error6.style.display = 'none';
        }
      
        if (confirmPassword.trim() === "") {
          error7.style.display = 'block';
          error7.textContent="Please confirm your password.";
          isValid = false;
        }else{
          error7.style.display = 'none';
        }
      
        if (password !== confirmPassword) {
          error8.style.display = 'block';
          error8.textContent ="Passwords do not match.";
          isValid = false;
        }else{
          error8.style.display = 'none';
        }
      
        if (!regNo_validation.test(regNo)) {
          error9.style.display = 'block';
          error9.textContent ="Please enter a valid registration number (e.g., AAAA/11/11/000/TZ).";
          isValid = false;
        }else{
          error9.style.display = 'none';
        }

        if (network.trim() === "") {
          error10.style.display = 'block';
          error10.textContent="Please Select your network.";
          isValid = false;
        }else{
          error10.style.display = 'none';
        }

        if (year.trim() === "") {
          error11.style.display = 'block';
          error11.textContent="Please your Studies year";
          isValid = false;
        }else{
          error11.style.display = 'none';
        }
        
        return isValid;

        
      }

