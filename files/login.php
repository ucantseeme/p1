  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2>Login</h2>
        <hr class="star-light">
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
        <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
        <form name="signup" id="register" novalidate>
          <div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Userame</label>
              <input type="text" class="form-control" placeholder="Enter your username" id="username" required data-validation-required-message="Please enter your unique username.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="Enter your password" id="pass" required data-validation-required-message="Please enter your password.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <!-- <div class="row control-group">
          <div class="form-group col-xs-12 floating-label-form-group controls">
          <label>What is 2 + 2 ?</label>
          <input type="tel" class="form-control" placeholder="What is 2 + 2 ?" id="captcha" required data-validation-required-message="Wrong answer.">
          <p class="help-block text-danger"></p>
        </div>
      </div> -->
      <br>
      <div id="success"></div>
      <div class="row">
        <div class="form-group col-xs-12">
          <button type="submit" class="btn btn-success btn-lg" style="
          color: #18BC9C !important;
          background-color: #ffffff !important;
          border-color: #ffffff !important;
          ">
          Proceed
        </button>
      </div>
    </div>
  </form>
</div>
</div>
</div>
