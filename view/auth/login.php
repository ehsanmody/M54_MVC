
<form method="post" action="/auth/login">
  <div class="mb-3">
    <label for="exampleInputUsername" class="form-label">Username</label>
    <input type="text" class="form-control" id="exampleInputUsername" name="username">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <div class="text-danger">
    <?php 
      if(isset($error)){
        echo $error;
      }
    ?>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>

</form>