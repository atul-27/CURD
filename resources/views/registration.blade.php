<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header"></div>
    <div class="container">
    
    <div class="bord">
    <div class="top">
        <h1>Registration Form</h1>
       
    </div>
        @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif 
@if(count($errors) > 0)
   @foreach($errors-> all() as $error )
      <div class="alert alert-danger">{{$error}}</div>
      @endforeach 
@endif
    <form method="post" action="/User" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4">
            <div class="firstname">
                <input type="text" name="fname" id="name"  placeholder="Enter First Name">
                
            </div>
            @csrf   

 
            <div class="firstname" style="margin: 30px 0 0 0;">
                <input type="password" name="password" id="password"  placeholder="Enter Password">
            </div>

            <div class="Salutation"  style="margin: 30px 0 0 0;">
                
               <select name="salutation" id="salutation" >
                   <option value="java"> Salutation </option>
                   <option value="java"> Mr. </option>
                   <option value="php"> Mrs. </option>
                   <option value="db"> Ms. </option>
               </select>
            </div>



        </div>
        <div class="col-md-4">
            <div class="firstname">
                <input type="text" name="lname"  id="lastname" placeholder="Enter Last Name">
            </div>


            <div class="firstname" style="margin: 30px 0 0 0;">
                <input type="password" name="confirm_password"  id="password" placeholder="Enter Confirm_Password">
            </div>

            <div class="firstname" style="margin: 30px 0 0 0;">
                <input type="text" name="contact_no"  id="contact" placeholder="Contact No.">
            </div>





        </div>
        <div class="col-md-4">
            <div class="firstname">
                <input type="text" name="email" id="emailid"  placeholder="Enter Email-id">
            </div>

            <div class="firstname" style="margin: 30px 0 0 0;">
                <input type="date" name="dob" id="birth"  placeholder="Enter Date Of Birth">
            </div>

            <div class="firstname" style="margin: 30px 0 0 0;">
                <input type="text" name="mob_no"  id="mobile" placeholder="Mobile No.">
            </div>





        </div>
    </div>

  <div class="row">
      <div class="col-md-12">
        <div class="firstname" style="margin: 30px 0 0 0;">
            <input type="text" name="occuption"  id="mobile" placeholder="Occuption." style="width: 90%;">
            <input type="hidden" name="role_id" value="1">
        </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-4">
        <div class="Salutation"  style="margin: 30px 0 0 0;">
                
            <select name="gender" id="gender" >
                <option value="male"> Gender </option>
                <option value="male"> Male </option>
                <option value="female "> Female  </option>
            </select>
         </div>
</div>
    

  </div>

  <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
          <div class="submit">
              <input type="submit" value="Submit">
          </div>
      </div>
      <div class="col-md-4"></div>
  </div>



</form>
    
</div>


</div>
<div class="header" style="margin: 50px 0 0 0;"></div>

</body>
</html>