
<div class="container">
  <div class="col-lg-4 col-md-4 offset-lg-4 mt-5">
    <h3>Register</h3>
    <hr>
    <?php if(isset($_SESSION['message'])) : ?>
      <div class="alert alert-success">
        <?php echo $_SESSION['message']; ?>
      </div>
    <?php endif; ?>
    <form action="<?php echo ROOT_URL; ?>users/register" method="post">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" maxlength="11">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="password" name="password" maxlength="11">
      </div>
      <input type="submit" class="btn btn-primary w-100" name="submit">
    </form>
  </div>
</div>
<?php unset($_SESSION['message']); ?>
