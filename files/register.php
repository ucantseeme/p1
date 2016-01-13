<?php
 $n1 = mt_rand(1, 5);
 $n2 = mt_rand(1, 5);
 $sum = $n1 + $n2;
 ?>
 <input type="number" id="captacha_sum" style="display: none;" value="<?php echo $sum; ?>">
<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h2>Quick Sign Up</h2>
      <hr class="star-primary">
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2">
      <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
      <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
      <form name="signup" id="register" action="index.php?action=controller" method="POST" validate>
        <div class="row control-group">
          <div class="form-group col-xs-12 floating-label-form-group controls">
            <label>Username</label>
            <input type="text" class="form-control" placeholder="Username" id="uname" name="uname" required data-validation-required-message="Please enter your unique username.">
            <p class="help-block text-danger" id="userexists"></p>
          </div>
        </div>
        <div class="row control-group">
          <div class="form-group col-xs-12 floating-label-form-group controls">
            <label>Email Address</label>
            <input type="email" class="form-control" placeholder="Email Address" id="email" name="email" required data-validation-required-message="Please enter your email address.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <div class="row control-group">
          <div class="form-group col-xs-12 floating-label-form-group controls">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Password" id="password1" name="pass" required data-validation-required-message="Please enter your password.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <div class="row control-group">
          <div class="form-group col-xs-12 floating-label-form-group controls">
            <label>Confirm Password</label>
            <input type="password" class="form-control" placeholder="Confirm Password" id="password2" name="cpass" required data-validation-required-message="Please enter your password again.">
            <p class="help-block text-danger" id="validate-status"></p>
            <p class="help-block" id="match"></p>
          </div>
        </div>
        <div class="row control-group">
          <div class="form-group col-xs-12 floating-label-form-group controls">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Name" id="name1" name="name" required data-validation-required-message="Please enter your name.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <div class="row control-group">
          <div class="form-group col-xs-12 floating-label-form-group controls">
            <label>Date of birth</label>
            <input type="text" class="form-control" placeholder="Date of birth" id="datepicker" name="dob" required data-validation-required-message="Please enter your date of birth.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <div class="row control-group">
          <div class="form-group col-xs-12 floating-label-form-group controls">
            <label>What is <?php echo $n1; ?> + <?php echo $n2; ?> ?</label>
            <input type="number" class="form-control" placeholder="What is <?php echo $n1; ?> + <?php echo $n2; ?> ?" id="user_captcha" name="captcha" required data-validation-required-message="Wrong answer.">
            <p class="help-block" id="captcha_result"></p>
          </div>
        </div>
        <br>
        <div id="success"></div>
        <div class="row">
          <div class="form-group col-xs-12">
            <button type="submit" class="btn btn-success btn-lg register" name="register">Proceed</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
