
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
    crossorigin="anonymous">
   
    <script async src= "<?php echo base_url('js/script.js'); ?>"></script> 
   
     <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
     <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/test.css'); ?>">
<body>
  <div class="topnav">
 
  <a href="#about"><i class="fa fa-user-circle-o" style="font-size:40px;color:white"></i></a>
  <a href="#notification"><i class="fa fa-bell" style="font-size:40px;color:white"></i>  <div class="badge">
        <div class="message-count">0</div>
      </div></a>
   	
</div>


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

        
        <form action=""
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

                   <span class="text-danger text-sm">

<?= isset($validation) ? display_form_errors($validation,'name'): ''?>
</span>
            <i class="fa fa-envelope icon"></i>
            <input class="input-field" type="email" placeholder="Email" name="email"
                 >
                   <span class="text-danger text-sm">

<?= isset($validation) ? display_form_errors($validation,'email'): ''?>
</span>
            <i class="fa fa-phone icon"></i>
            <input class="input-field" type="text" placeholder="Mobile"  name="mobile"
                  >
                   <span class="text-danger text-sm">

<?= isset($validation) ? display_form_errors($validation,'mobile'): ''?>
</span>
            <i class="fa fa-lock icon"></i>
            <input class="input-field" type="password" placeholder="Password"    name="password"
                   >
                   <span class="text-danger text-sm">

<?= isset($validation) ? display_form_errors($validation,'password'): ''?>
</span>
        </div>
                <button>Sign Up</button><br><br>
                <span>Already have an account ?</span><span id="signIn" style="color:#40f2fe">SIGN IN</span>
            </form>
        </div>
        <div class="form-container sign-in-container">
        <form 
          class="form mb-3" action="" method="post">
        <?= csrf_field();?>
        <i class="fa fa-envelope" aria-hidden="true" style="font-size:80px;color:#37c1be"></i>
         
               
                <!-- <input type="email" placeholder="Email" />
                <input type="password" placeholder="Password" /> -->
                <div class="inline">
        <div class="input-icons">
        
        <label for="replay"> Replay to </label> 
        
        <select name="pty_select" > 
   <?php foreach($listUser as $key => $value){ ?>
                    <option value="<?php echo $key; ?>"><?php echo $value['name']; ?></option> 
    <?php } ?>
        </select>


          

<label for="title"> Title </label>    
            <input class="input-field" type="text"  name="title"
              >

              <label for="story"> Message </label>

<textarea id="message" name="message"
          rows="5" cols="33">

</textarea>
                  
              
        </div>
  </div> 
 
    
           
      
                <button class="send"> <span> SEND </span> <i class="fa fa-send-o" style="font-size:16px;color:white"></i></button>

                <div id="messages"> </div>  
        
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
                    <h1>L'est Chat</h1>
                    <span style="color:#048b9a;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor. Cras vestibulum bibendum augue. Praesent egestas leo in pede. Praesent blandit odio eu enim. Pellentesque sed dui ut augue blandit sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam nibh. Mauris ac mauris sed pede pellentesque fermentum. Maecenas adipiscing ante non diam sodales hendrerit</span>
                   <!--  <button class="ghost" id="signUp">Sign Up</button> -->
                    
                </div>
            </div>
        </div>
    </div>
    </body>

    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.map"></script> 
   

 
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  
  <script type="text/javascript">
 
   $( ".form mb-3" ).submit(function( event ) {
e.preventDefault();
$.ajax({
  url:$(this).attr("<?= base_url('chat/process')?>"),
  type:'post',
  data:new FormData($(this)[0]),
  contentType:false,
  processData:false,
  success:function(data){
    
    
  }
})


 })
 
 // Enable pusher logging - don't include this in production
 Pusher.logToConsole = true;

var pusher = new Pusher('137831850feb3f0501f6', {
  cluster: 'eu'
});

var channel = pusher.subscribe('my-channel');

channel.bind('pusher:subscription_succeeded', function(members) {
    // alert('successfully subscribed!');
 });

 channel.bind('my-event', function(data) {
     console.log(data);
 });


channel.bind('my-event', function(data) {
  $('#message').append('<div>'+data.message+'</div>')
});

    
  </script>