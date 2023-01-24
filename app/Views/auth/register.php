<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class="container">
<div class="row mt-3">
<div class="col-md-4 offset-4">
    <h4>Sign Up</h4>
    <hr>
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



    <form action="<?= base_url('auth/registerUser')?>" 
          method="post"
          class="form mb-3">
        <?= csrf_field();?>

        <div class="form-group mb-3">
            <label for=""> name </label>
            <input type="text" 
                   class="form-control"
                   name="name"
                   value="<?= set_value('name');?>"
                   placeholder="Name Here" >
                   <span class="text-danger text-sm">

                   <?= isset($validation) ? display_form_errors($validation,'name'): ''?>
                   </span>
        </div>


        <div class="form-group mb-3">
            <label for=""> E-mail </label>
            <input type="text" 
                   class="form-control"
                   name="email"
                   value="<?= set_value('email');?>"
                   placeholder="Email Here" >

                   <span class="text-danger text-sm">

                   <?= isset($validation) ? display_form_errors($validation,'email'): ''?>
                   </span>
        </div>

        <div class="form-group mb-3">
            <label for=""> Mobile </label>
            <input type="text" 
                   class="form-control"
                   name="mobile"
                   value="<?= set_value('mobile');?>"
                   placeholder="mobile" >
                   <span class="text-danger text-sm">

                   <?= isset($validation) ? display_form_errors($validation,'mobile'): ''?>
                   </span>
        </div>


        <div class="form-group mb-3">
            <label for=""> Password </label>
            <input type="password" 
                   class="form-control"
                   name="password"
                   value="<?= set_value('password');?>"
                   placeholder="Password Here" >
                   <span class="text-danger text-sm">

                   <?= isset($validation) ? display_form_errors($validation,'password'): ''?>
                   </span>
        </div>

        
        <div class="form-group mb-3">
           
            <input type="submit" 
                   class="btn btn-info"
                   value="Sign Up"
                   >
        </div>

    </form>
    <br>
    <a href="<?= site_url('auth');?>">
    I already have an account, login

</a>

</div>


</div>

</div>

</body>
</html>