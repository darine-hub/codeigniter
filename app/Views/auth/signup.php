
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
    crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/styleSignup.css'); ?>">

     <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<div class="container" id="container">
        
        <div class="form-container sign-up-container">
            <form action="#">
                <h2>Sign Up</h2>
                <div class="social-container">
                   
                    <a href="#" class="social"><img src="<?php echo base_url('images/google.png'); ?>"  style="width:40px;  height: 40px;"/></a>
                    <a href="#" class="social"><img src="<?php echo base_url('images/facebook.png'); ?>"  style="width:40px;  height: 40px;"/></a>
                    <a href="#" class="social"><img src="<?php echo base_url('images/twitter2.png'); ?>"  style="width:40px;  height: 40px;"/></a>
                </div>
                <span>or use your account</span>
               
                <!-- <input type="email" placeholder="Email" />
                <input type="password" placeholder="Password" /> -->
                <div class="inline">
                <div class="input-icons">
            <i class="fa fa-user icon"></i>
            <input class="input-field" type="text" placeholder="Name">
            <i class="fa fa-envelope icon"></i>
            <input class="input-field" type="email" placeholder="Email">
            <i class="fa fa-phone icon"></i>
            <input class="input-field" type="text" placeholder="Mobile">
            <i class="fa fa-lock icon"></i>
            <input class="input-field" type="password" placeholder="Password">
        </div>
  </div> 
 
    
           
                <a href="#">Forgot your password?</a>
                <button>SIGN UP</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                
            </div>
        </div>
    </div>

