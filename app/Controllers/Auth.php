<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Hash;
use Authy\AuthyApi;
use App\Models\UserModel;


class Auth extends BaseController
{
  //Enabling features
  public function __construct(){
    helper(['url','form']);
  }


    public function index()
    {
        return view('auth/signin');
    }

    public function register()
    {
        return view('auth/signin');
    }


/*** save new user to database */
/*** save new user to database */
public function registerUser()
{
/*     $validated = $this->validate([
    'name'=>'required',
    'email'=>'required|valid_email',
    'password'=>'required|min_length[5]|max_length[20]',
    'passwordConf'=>'required|min_length[5]|max_length[20]|matches[password]'
  
    
]); */

$validated = $this->validate([
    'name'=>[
        'rules'=>'required',
        'errors'=>[
            'required' => 'Your full name is required ',
        ]
    ],

    'email'=>[
        'rules'=>'required|valid_email',
        'errors'=>[
            'required' => 'Your email is required ',
            'valid_email'=>'Email is already used.'
        ]
    ],

    'mobile'=>[
        'rules'=>'required',
        'errors'=>[
            'required' => 'Your full name is required ',
        ]
    ],

    'password'=>[
        'rules'=>'required|min_length[5]|max_length[20]',
        'errors'=>[
            'required' => 'Your password is required ',
            'min_length'=>'Password must be 5 charactars long',
            'max_length'=>'Password cannot be longer than 20 characters'
        ]
    ],

    

    
  
    
]);

if (!$validated)
{
    return view ('auth/signin',['validation'=> $this->validator]);

}

//here we save the user 

$name =$this->request->getPost('name');
$email =$this->request->getPost('email');
$mobile =$this->request->getPost('mobile');
$password =$this->request->getPost('password');

//generate simple random code
$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$code = substr(str_shuffle($set), 0, 12);
/****** */
$data = [
    'name'=>$name,
    'email'=>$email,
    'mobile'=>$mobile,
    'password'=> Hash::encrypt($password),
    'code'=>$code,
    'active' => false

];
///*******onother way */



$userModel = new \App\Models\UserModel();
$id  = $userModel->insert($data);


//set up email
$config = array(
      'protocol' => 'mail',
      'smtp_host' => 'smtp.gmail.com',
      'smtp_port' => 465,
      'smtp_user' => 'baraamidassi@gmail.com', // change it to yours
      'smtp_pass' => 'baraamoemen', // change it to yours
      'mailtype' => 'html',
      'wordwrap' => TRUE,
      

    
);







$message = 	"
            <html>
            <head>
                <title>Verification Code</title>
            </head>
            <body>
                <h2>Thank you for Registering.</h2>
                <p>Your Account:</p>
                <p>Email: ".$email."</p>
                <p>Password: ".$password."</p>
                <p>Please click the link below to activate your account.</p>
                <h4><a href='".base_url()."user/activate/".$id."/".$code."'>Activate My Account</a></h4>
            </body>
            </html>
            ";

           
          
            $email = \Config\Services::email();
            $email->setFrom($config['smtp_user']);
            $email->setTo("",$email);
            $email->setSubject('Signup Verification Email');
            $email->setMessage($message);//your message here
             
  





//sending email

if($email->send())
{
    $response = 'Email successfully sent';
}
else{
    $data = $email->printDebugger(['headers']);
            $response ='Email send failed';
}



redirect('register');


}


public function activate(){
    $id =  $this->uri->segment(3);
    $code = $this->uri->segment(4);


    $userModel = new \App\Models\UserModel();

    //fetch user details
    $user = $userModel->getUser($id);

    //if code matches
    if($user['code'] == $code){
        //update user active status
        $data['active'] = true;
        $query = $userModel->activate($data, $id);

        if($query){
            $this->session->set_flashdata('message', 'User activated successfully');
        }
        else{
            $this->session->set_flashdata('message', 'Something went wrong in activating account');
        }
    }
    else{
        $this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
    }

    redirect('register');

}



public function loginUser(){
    $validated = $this->validate([
   
    
        'email'=>[
            'rules'=>'required|valid_email',
            'errors'=>[
                'required' => 'Your email is required ',
                'valid_email'=>'Email is already used.'
            ]
        ],
    
        'password'=>[
            'rules'=>'required|min_length[5]|max_length[20]',
            'errors'=>[
                'required' => 'Your password is required ',
                'min_length'=>'Password must be 5 charactars long',
                'max_length'=>'Password cannot be longer than 20 characters'
            ]
        ],
    
       
    
        
      
        
    ]);
    
    if (!$validated)
    {
        return view ('auth/signin',['validation'=> $this->validator]);
    
    }
    else {
        //checking user details in database

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new \App\Models\UserModel();
        $userInfo = $userModel->where('email',$email)->first();


        $checkPassword = Hash::check($password,$userInfo['password']);

        
    if(!$checkPassword){
        session()->setFlashdata('fail','Incorrect password provided');
        return redirect()->to('auth');
    }
    else{

        //Process user info 
        $userId = $userInfo['id'];
        session()->set('loggedInUser',$userId);
        return redirect()->to('chat/index');
    }
    }
    

}

/*** Log out the user */

public function logout()
      {
          if(session()->has('loggedInUser'))
          {
              session()->remove('loggedInUser');
          }


          return redirect()->to('/auth?access=loggedout')->with('fail',
          'You are logged out');
      }

}
