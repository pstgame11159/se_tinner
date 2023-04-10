<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"
  rel="stylesheet"
/>

<link rel= "stylesheet" href = "css//Register_Tinner.css">

</head>
<body>

<section>
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-4 fw-bold">Create Tinner Account</h2>

              <form action="register_db.php" method = "post" enctype="multipart/form-data">

                <div class="form-outline mb-4">
                  <input type="text" name = "name" id="form3Example1cg" class="form-control form-control-lg" required />
                  <label class="form-label" for="form3Example1cg">Name</label>
                </div>

                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Male"  required/>
                  <label class="form-check-label" for="inlineRadio1">Male</label>
                </div>

                 <div class="form-check form-check-inline mb-4">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Female" required/>
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                </div>

                <div class="form-check form-check-inline mb-4">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="LGBT" required />
                    <label class="form-check-label" for="inlineRadio3">LGBT</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="number" name="age" id="form3Example1cg" class="form-control form-control-lg" required />
                  <label class="form-label" for="form3Example1cg"  >Age</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" name="address" class="form-control form-control-lg"  required/>
                  <label class="form-label" for="form3Example1cg" >Address</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" name="phone_number" class="form-control form-control-lg" required />
                  <label class="form-label" for="form3Example1cg"  >Phone Number</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="form3Example3cg" name ="email" class="form-control form-control-lg" required />
                  <label class="form-label" for="form3Example3cg" >Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example4cg"  name = "username" class="form-control form-control-lg" required />
                  <label class="form-label" for="form3Example4cg" >Username</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cg" name="password_1" class="form-control form-control-lg"  required/>
                  <label class="form-label" for="form3Example4cg" >Password</label>
                </div>
 
                <label class="form-label">Upload your fisrt profile image</label>
                <input type="file" name="upload-img" class="form-control mb-4" required >

                <div class="d-flex justify-content-center">
                  <button type="submit" name="register_db"  class="btn btn-block btn-lg gradient-custom-4 text-black">สมัครสมาชิก</button>
                </div>

                

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php"class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"
></script>

</html>