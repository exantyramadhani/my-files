<?php 
  if(!empty($user)){
   ?>
    <script type="text/javascript">
      window.location.href="?p=home";
    </script>
   <?php 
  }
?>

 <style type="text/css">
   body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

 </style>

 <form action="" method="post" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="inputUsername" class="form-control" placeholder="Username" required autofocus name="Username">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="Password">
        <button name="masuk" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>

<?php
  if(isset($_POST['masuk'])){
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];

    $sql = "SELECT * FROM user WHERE username='$Username'";
    $query = mysqli_query($koneksi,$sql);
    $cek= mysqli_num_rows($query);
    
    if($cek >0){
    $data = mysqli_fetch_array($query);
    @$Password =md5($Password);
    echo $Password;
    $pass_db = $data['Password'];

    if($Password == $pass_db){
      $_SESSION['username']= $Username;
      $_SESSION['Level']= $data ['Level'];
      $_SESSION['Id_User']= $data ['Id_User'];
      ?>
      <script type="text/javascript">
        window.location.href="?p=home";
      </script>
      <?php
    }else{
      ?>
     <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Gagal!</strong> Password salah.
    </div>
      <?php
    }

    }else{
      ?>
     <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Gagal!</strong> Username tidak ditemukan.
    </div>
      <?php
    }
  }
 ?>