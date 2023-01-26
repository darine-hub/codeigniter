
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
    crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">
    <script async src= "<?php echo base_url('js/script.js'); ?>"></script> 

     <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<div class="container" id="container">


<?php 
if(!empty(session()->getFlashData('success'))){  
    ?>
    <div class="alert alert-success">
        <?=
        session()->getFlashData('success')
        
        ?>
    </div> 
    <?php
} else if (!empty(session()->getFlashData('fail'))){  
    ?>
    <div class="alert alert-danger">
        <?=
        session()->getFlashData('fail')
        
        ?>
    </div> 
    <?php
} ?>
        <div class="form-container sign-up-container">

        
        <form action="<?= base_url('auth/registerUser')?>" 
          method="post"
          class="form mb-3">
        <?= csrf_field();?>
                <h2>Sing Up</h2>
                <div class="social-container">
                   
                    <a href="#" class="social"><img src="<?php echo base_url('images/google.png'); ?>"  style="width:40px;  height: 40px;"/></a>
                    <a href="#" class="social"><img src="<?php echo base_url('images/facebook.png'); ?>"  style="width:40px;  height: 40px;"/></a>
                    <a href="#" class="social"><img src="<?php echo base_url('images/twitter2.png'); ?>"  style="width:40px;  height: 40px;"/></a>
                </div>
                <span>or use your email for registration</span>
                <div class="input-icons">
            <i class="fa fa-user icon"></i>
            <input class="input-field" type="text" placeholder="Name" name="name"
                  >

                 <span style="color:red; " >
                   

<?= isset($validation) ? display_form_errors($validation,'name'): ''?>
</span>
<div>
            <i class="fa fa-envelope icon"></i>
            <input class="input-field" type="email" placeholder="Email" name="email"
                 >
                 <span style="color:red; " >
                   

<?= isset($validation) ? display_form_errors($validation,'email'): ''?>
</span>
</div>
<div>
            <i class="fa fa-phone icon"></i>
            <input class="input-field" type="text" placeholder="Mobile"  name="mobile"
                  >
                 <span style="color:red; " >
                  

<?= isset($validation) ? display_form_errors($validation,'mobile'): ''?>
</span>

</div>
            <i class="fa fa-lock icon"></i>
            <input class="input-field" type="password" placeholder="Password"    name="password"
                   >
                   <span style="color:red; " >

<?= isset($validation) ? display_form_errors($validation,'password'): ''?>
</span>
        </div>
                <button onclick="phoneauth()">Sign Up</button><br><br>
                <span>Already have an account ?</span><span id="signIn" style="color:#40f2fe">SIGN IN</span>
            </form>
        </div>
        <div class="form-container sign-in-container">
        <form action="<?= base_url('auth/loginUser')?>"
          method="post"
          class="form mb-3">
        <?= csrf_field();?>
                <h2>Sign In</h2>
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
       <div>
            <i class="fa fa-envelope icon"></i>
            <input class="input-field" type="email" placeholder="Email"  name="email"
          >
                 <span style="color:red; " >

<?= isset($validation) ? display_form_errors($validation,'email'): ''?>
</span> 
</div>     
<div>
            <i class="fa fa-lock icon"></i>
            <input class="input-field" type="password" placeholder="Password" name="password"
              >
                   <span  style="color:red" class="text-danger text-sm">

<?= isset($validation) ? display_form_errors($validation,'password'): ''?>
</span>
</div>
        </div>
  </div> 
 
    
           
                <a href="#">Forgot your password?</a>
                <button>SIGN IN</button><br><br>
                <span>Dont have an account ?</span><span id="signUp" style="color:#40f2fe">REGISTER</span>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                <h1>Welcome to ENRagri</h1>
                    <p>Please subscribe to join our team</p>
                    <!-- <button class="ghost" id="signIn">Sign In</button> -->
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Welcome to ENRagri</h1>
                    <p>Please login to join our team</p>
                   <!--  <button class="ghost" id="signUp">Sign Up</button> -->
                    
                </div>
            </div>
        </div>
    </div>

    <script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.16.0/firebase-app.js";
  import "https://www.gstatic.com/firebasejs/9.16.0/firebase-auth.js";

  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.16.0/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyA2LDgdZCIeZx3xGRIAHbnse26y0x9bn8M",
    authDomain: "numberphoneverification.firebaseapp.com",
    projectId: "numberphoneverification",
    storageBucket: "numberphoneverification.appspot.com",
    messagingSenderId: "390735095238",
    appId: "1:390735095238:web:98cea163374c317d9a3ec7",
    measurementId: "G-MZ9DW9VDR4"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>
<script>


function phoneauth(){
var data = {

    number:$('#mobile').val(),
    username:$('#name').val(),
    email:$('#email').val(),
    password:$('#password').val(),
};

auth().signInWithPhoneNumber(data.number).then(
    function(confirmationResult){
        window.confirmationResult = confirmationResult;
        
    }
)


}

</script>