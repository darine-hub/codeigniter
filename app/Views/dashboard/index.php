
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
    crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/styleSignup.css'); ?>">
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
        <div class="form-container sign-in-container">

        
        <form action="<?= base_url('auth/registerUser')?>" 
          method="post"
          class="form mb-3">
        <?= csrf_field();?>
                <h2>Confirmation Code</h2>
            <p>Saisissez le code de confirmation que vous avez recu</p>
                <div class="input-icons">
            <i class="fa fa-qrcode icon"></i> 
            <input class="input-field" type="text" placeholder="Code" name="code"
                  >

                   <span class="text-danger text-sm">

<?= isset($validation) ? display_form_errors($validation,'name'): ''?>
</span>
            
        </div>
                <button>Valider</button><br><br>
              
            </form>
        </div>
        <div class="form-container sign-up-container">
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
        
            <i class="fa fa-envelope icon"></i>
            <input class="input-field" type="email" placeholder="Email"  name="email"
          >
                 <span style="color:red" >

<?= isset($validation) ? display_form_errors($validation,'email'): ''?>
</span> 
        
            <i class="fa fa-lock icon"></i>
            <input class="input-field" type="password" placeholder="Password" name="password"
              >
                   <span  style="color:red" class="text-danger text-sm">

<?= isset($validation) ? display_form_errors($validation,'password'): ''?>
</span>
        </div>
  </div> 
 
    
           
                <a href="#">Forgot your password?</a>
                <button>SIGN IN</button><br><br>
                <span>Dont have an account ?</span><span id="signUp" style="color:#40f2fe">REGISTER</span>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                <h1>Welcome to ENRagri</h1>
                    <p>Please subscribe to join our team</p>
                    <!-- <button class="ghost" id="signIn">Sign In</button> -->
                </div>
                <div class="overlay-panel overlay-left">
                    <h1>Welcome to ENRagri</h1>
                    <p>Please subscribe to join our team</p>
                   <!--  <button class="ghost" id="signUp">Sign Up</button> -->
                    
                </div>
            </div>
        </div>
    </div>

