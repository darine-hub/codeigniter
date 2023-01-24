<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/test.css'); ?>">
    <script async src= "<?php echo base_url('js/test.js'); ?>"></script> 

<div class="container" id="container">
      <div class="form-container sign-up-container">
        <form>
          <h1>Sign Up</h1>
          <div class="social-container">
            <a href="#" class="social"><i class="fab fa-instagram"></i></a>
            <a href="#" class="social"><i class="fab fa-google"></i></a>
            <a href="#" class="social"><i class="fab fa-tiktok"></i></a>
          </div>
          <span>or use your email for registration</span>
          <input type="text" placeholder="Name" />
          <input type="email" placeholder="Email" />
          <input type="password" placeholder="Password" />
          <button onclick="return false;">Sign Up</button>
        </form>
      </div>
      <div class="form-container sign-in-container">
        <form>
          <h1>Sign In</h1>
          <div class="social-container">
            <a href="#" class="social"><i class="fab fa-instagram"></i></a>
            <a href="#" class="social"><i class="fab fa-google"></i></a>
            <a href="#" class="social"><i class="fab fa-tiktok"></i></a>
          </div>
          <span>or use your account</span>
          <input type="email" placeholder="Email" />
          <input type="password" placeholder="Password" />
          <a href="#">Forgot your password?</a>
          <button onclick="return false;">Sign In</button>
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>Welcome Back!</h1>
            <p>Please login with your personal info</p>
            <button class="ghost" id="signIn">Sign In</button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1>Hello, Friend!</h1>
            <p>Enter your personal details and start your journey with us</p>
            <button class="ghost" id="signUp">Sign Up</button>
          </div>
        </div>
      </div>
    </div>