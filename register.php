<title>Attendance MS QR Code | Register</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row d-flex justify-content-center">

          <div class="col-lg-9 mt-5">
            <div class="card card-outline card-primary">
              <div class="card-header text-center">
                <a href="#" class="h1"><b>Registration</b></a>
              </div>
              <div class="card-body">
                  <p class="login-box-msg">Register a new membership</p>
                  <form action="processes.php" method="post" enctype="multipart/form-data">
                  <div class="row">              

                  <div class="col-lg-4">
                    <label style="margin-bottom: 0px;">ID Number</label>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="ID_number" placeholder="ID number" required>
                      </div>
                  </div>
                  <div class="col-lg-4"></div>
                  <div class="col-lg-4"></div>

                  <div class="col-lg-6">
                      <label style="margin-bottom: 0px;">First name</label>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="firstname" placeholder="First name" required onkeyup="lettersOnly(this)">
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <label style="margin-bottom: 0px;">Middle name</label>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="middlename" placeholder="Middle name" required onkeyup="lettersOnly(this)">
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <label style="margin-bottom: 0px;">Last name</label>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="lastname" placeholder="Last name" required onkeyup="lettersOnly(this)">
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <label style="margin-bottom: 0px;">Suffix</label>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="suffix" placeholder="Suffix">
                      </div>
                  </div>
                  <div class="col-lg-4">
                      <label style="margin-bottom: 0px;">Gender</label>
                      <div class="input-group mb-3">
                        <select class="custom-select" name="gender" required>
                            <option selected disabled>Select gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                         </select> 
                      </div>
                  </div>

                  <div class="col-lg-4">
                      <label style="margin-bottom: 0px;">Date of Birth</label>
                      <div class="input-group mb-3">
                        <input type="date" class="form-control" name="dob" placeholder="Date of birth" required id="txtbirthdate" onkeyup="getAgeVal(0)" onblur="getAgeVal(0);" onchange="getAgeVal(0);">
                      </div>
                  </div>
                  <div class="col-lg-4">
                      <label style="margin-bottom: 0px;">Age</label>
                      <div class="input-group">
                        <input type="text" class="form-control bg-white" placeholder="Select DOB first" required id="txtage" readonly>
                        <input type="hidden" class="form-control" name="age" placeholder="Age" required id="agestatus">
                      </div>
                      <small id="age_text"></small>
                  </div>
                  <div class="col-lg-12">
                      <label style="margin-bottom: 0px;">Address</label>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="address" placeholder="Address" required>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <label style="margin-bottom: 0px;">Email address</label>
                      <div class="input-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder = "email@gmail.com" required onkeydown="validation()" onkeyup="validation()">
                      </div>
                      <small id="text"></small>
                  </div>
                  <div class="col-auto form-group col-lg-6 mb-3">
                      <label style="margin-bottom: 0px;">Contact number</label>
                      <div class="input-group">
                        <div class="input-group-text">+63</div>
                        <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="contact" placeholder = "Contact Number" required maxlength="10">
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <label style="margin-bottom: 0px;">Password</label>
                      <div class="input-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" id="password" required minlength="8" onkeypress="validate_password()">
                      </div>
                      <small id="length"></small>
                  </div>
                  <div class="col-lg-6 ">
                      <label style="margin-bottom: 0px;">Confirm password</label>
                      <div class="input-group ">
                        <input type="password" class="form-control" name="cpassword" placeholder="Retype password" id="cpassword" onkeyup="validate_password_confirm_password()" required minlength="8">
                      </div>
                      <small id="wrong_pass_alert"></small>
                  </div>
                  <div class="col-lg-6 mt-3">
                      <label style="margin-bottom: 0px;">Upload image</label>
                      <div class="input-group mb-3">
                        <input type="file" class="form-control" name="fileToUpload" onchange="getImagePreview(event)" required >
                      </div>
                  </div>
                  <!-- LOAD IMAGE PREVIEW -->
                  <div class="col-lg-6 mt-3">
                      <div class="form-group" id="preview">
                      </div>
                  </div>
                </div>
                <div class="row d-none">
                  <div class="col-8">
                    <div class="icheck-primary">
                      <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                      <label for="agreeTerms">
                       I agree to the <a href="#">terms</a>
                      </label>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="social-auth-links text-center">
                  <button type="submit" name="create_user" class="btn  btn-primary" id="usercreate">Submit</button>
                </div>
                <p>I already have an account? <a href="login.php" class="text-center">Login here!</a></p>
                </form>

            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include 'footer.php'; ?>

<script>

   function agevalidation() {
    var age = document.getElementById("age").value;

    if(age < 12) {
        document.getElementById('age_text').style.color = 'red';
        document.getElementById('age_text').innerHTML = 'Must be 12yrs old and above.';
        document.getElementById('usercreate').disabled = true;
        document.getElementById('usercreate').style.opacity = (0.4);
    } else {
        document.getElementById('age_text').style.color = 'green';
        document.getElementById('age_text').innerHTML = '';
        document.getElementById('usercreate').disabled = false;
        document.getElementById('usercreate').style.opacity = (1);
    }
  } 

  // EMAIL GOOGLE FORMAT
  function validation() {
    var email = document.getElementById("email").value;
    var pattern =/.+@(gmail)\.com$/;
    // var pattern =/.+@(gmail|yahoo)\.com$/;
    var form = document.getElementById("form");

    if(email.match(pattern)) {
        document.getElementById('text').style.color = 'green';
        document.getElementById('text').innerHTML = '';
        document.getElementById('usercreate').disabled = false;
        document.getElementById('usercreate').style.opacity = (1);
    } 
    else {
        document.getElementById('text').style.color = 'red';
        document.getElementById('text').innerHTML = 'Domain must be @gmail.com.';
        document.getElementById('usercreate').disabled = true;
        document.getElementById('usercreate').style.opacity = (0.4);
    }
  }


   function getImagePreview(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview');
    var newimg=document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width="90";
    newimg.height="90";
    newimg.style['border-radius']="50%";
    newimg.style['display']="block";
    newimg.style['margin-left']="auto";
    newimg.style['margin-right']="auto";
    newimg.style['box-shadow']="rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
    imagediv.appendChild(newimg);
  }

</script>


<script>
    function validate_password_confirm_password() {

      var pass = document.getElementById('password').value;
      var confirm_pass = document.getElementById('cpassword').value;
      if (pass != confirm_pass) {
        document.getElementById('wrong_pass_alert').style.color = 'red';
        document.getElementById('wrong_pass_alert').innerHTML = 'X Password did not matched!';
        document.getElementById('usercreate').disabled = true;
        document.getElementById('usercreate').style.opacity = (0.4);
      } else {
        document.getElementById('wrong_pass_alert').style.color = 'green';
        document.getElementById('wrong_pass_alert').innerHTML = '✓ Password matched!';
        document.getElementById('usercreate').disabled = false;
        document.getElementById('usercreate').style.opacity = (1);
      }
    }

    function validate_password() {
       var pass = document.getElementById('password').value;
       var confirm_pass = document.getElementById('cpassword').value;
       var regex = /[a-zA-Z0-9]/g;
       var pass2 = pass.match(regex).length;

      if(pass2 < 8) {
        document.getElementById('length').style.color = 'red';
        document.getElementById('length').innerHTML = 'Password must be at least 8 characters.';
        document.getElementById('usercreate').disabled = true;
        document.getElementById('usercreate').style.opacity = (0.4);

      } else {
        document.getElementById('length').style.color = 'green';
        document.getElementById('length').innerHTML = '';
        document.getElementById('usercreate').disabled = false;
        document.getElementById('usercreate').style.opacity = (1);
      }
    }


    function lettersOnly(input) {
      var regex = /[^a-z ]/gi;
      input.value = input.value.replace(regex, "");
    }






    
// GET AGE AUTOMATICALLY FROM SETTINGS DOB

    function formatDate(date){
    var d = new Date(date),
    month = '' + (d.getMonth() + 1),
    day = '' + d.getDate(),
    year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');

    }

    function getAge(dateString){
      var birthdate = new Date().getTime();
      if (typeof dateString === 'undefined' || dateString === null || (String(dateString) === 'NaN')){
      // variable is undefined or null value
      birthdate = new Date().getTime();
      }
      birthdate = new Date(dateString).getTime();
      var now = new Date().getTime();
      // now find the difference between now and the birthdate
      var n = (now - birthdate)/1000;
      if (n < 604800){ // less than a week
      var day_n = Math.floor(n/86400);
      if (typeof day_n === 'undefined' || day_n === null || (String(day_n) === 'NaN')){
      // variable is undefined or null
      return '';
      }else{
      return day_n + ' day' + (day_n > 1 ? 's' : '') + ' old';
      }
      } else if (n < 2629743){ // less than a month
      var week_n = Math.floor(n/604800);
      if (typeof week_n === 'undefined' || week_n === null || (String(week_n) === 'NaN')){
      return '';
      }else{
      return week_n + ' week' + (week_n > 1 ? 's' : '') + ' old';
      }
      } else if (n < 31562417){ // less than 24 months
      var month_n = Math.floor(n/2629743);
      if (typeof month_n === 'undefined' || month_n === null || (String(month_n) === 'NaN')){
      return '';
      }else{
      return month_n + ' month' + (month_n > 1 ? 's' : '') + ' old';
      }
      }else{
      var year_n = Math.floor(n/31556926);
      if (typeof year_n === 'undefined' || year_n === null || (String(year_n) === 'NaN')){
      return year_n = '';
      }else{
      return year_n + ' year' + (year_n > 1 ? 's' : '') + ' old';
      }
      }
    }

    function getAgeVal(pid){
      var birthdate = formatDate(document.getElementById("txtbirthdate").value);
      var count = document.getElementById("txtbirthdate").value.length;
      if (count=='10'){
      var age = getAge(birthdate);
      var str = age;
      var res = str.substring(0, 1);
      if (res =='-' || res =='0'){
      document.getElementById("txtbirthdate").value = "";
      document.getElementById("txtage").value = "";
      document.getElementById("agestatus").value = "";
      $('#txtbirthdate').focus();
      return false;
      }else{
      document.getElementById("txtage").value = age;
      document.getElementById("agestatus").value = age;
      }
      }else{
      document.getElementById("txtage").value = "";
      document.getElementById("agestatus").value = "";
      return false;
      }
    }
</script>