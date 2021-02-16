<?php

include_once 'db.php';

if(isset($_POST['submit'])){

  $name=$_POST['name'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $workplace=$_POST['workplace'];
  $mobile=$_POST['mobile'];
  $image=$_FILES['img']['name'];
  $dest="uploads/".$image;
  $sql="insert into employee(name,email,address,workplace,mobile,image) values('$name','$email','$address','$workplace','$mobile','$image')";
  $row=mysqli_query($conn,$sql);
  if($row){
    move_uploaded_file($_FILES['img']['tmp_name'], $dest);
    echo "<script type='text/javascript'>alert('Submitted Successfully');
  window.location='index.php';
  </script>";
  }
  else{
    echo '<script>alert("Something Went Wrong");</script>';
  }

}
?>
<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <style type="text/css">
    .container{
      border-style: inset;

    }
    h3{
      margin-top: 20px;
    }
  </style>
  
</head>
<body>

  <form method="post" onsubmit="return validate()" enctype="multipart/form-data">
    <div class="container">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-5">
           <h3 class="text-center"><u>Register Here</u></h3><br>
          <label>Name:</label>
          <div class="form-group">
            <input type="text" id="name" name="name"  class="form-control" >
          </div>
          <span id="nId"></span>

          <label>Email:</label>
          <div class="form-group">
            <input type="email" id="email" name="email"  class="form-control" >
          </div>

          <label>Address:</label>
          <div class="form-group">
            <input type="address" id="address" name="address"  class="form-control" >
          </div>

          <label>Work Place:</label>
          <div class="form-group">
             <input type="radio" name="workplace" value="1" required><b>Home</b>&nbsp;&nbsp;
             <input type="radio" name="workplace" value="2" required><b>Office</b>
          </div>

           <label>Mobile:</label>
          <div class="form-group">
            <input type="number" id="mobile" name="mobile"  class="form-control" maxlength="10">
          </div>

          <label>Image:</label>
          <div class="form-group">
            <input type="file" name="img" class="form-control" required>
          </div>
          <button type="submit" name="submit" class="btn btn-success" > Submit</button><br><br>
          <div id="error"></div>
        </div>
      </div>
    </div>

  </form>
</body>
<script>
    function validate()
    {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var address = document.getElementById('address').value;
    var mobile = document.getElementById('mobile').value;


      if(name == "")
      {
              alert('Please provide name');
              return false;       
      }
      else if(email == "")
      {
        alert('Please provide email');
        return false;
      }
      else if(address == "")
      {
        alert('Please provide address');
        return false;
      }
       else if(mobile == "")
      {
        alert('Please provide Mobile number');
        return false;
      }
   
      else if(mobile.length !=10)
      {
        alert('Length of Mobile should be 10');
        return false;
      }
     
    }
  </script>
</html>


