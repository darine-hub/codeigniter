<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Hash;


class Auth extends BaseController
{
  //Enabling features
  public function __construct(){
    helper(['url','form']);
  }


    public function index()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }


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

    'password'=>[
        'rules'=>'required|min_length[5]|max_length[20]',
        'errors'=>[
            'required' => 'Your password is required ',
            'min_length'=>'Password must be 5 charactars long',
            'max_length'=>'Password cannot be longer than 20 characters'
        ]
    ],

    'passwordConf'=>[
        'rules'=>'required|min_length[5]|max_length[20]|matches[password]',
        'errors'=>[
            'required' => 'Your password confirmation  is required ',
            'min_length'=>'Password must be 5 charactars long',
            'max_length'=>'Password cannot be longer than 20 characters',
            'matches' =>'Confirm password must mtch the password'
        ]
    ],

    
  
    
]);

if (!$validated)
{
    return view ('auth/register',['validation'=> $this->validator]);

}

//here we save the user 

$name =$this->request->getPost('name');
$email =$this->request->getPost('email');
$password =$this->request->getPost('password');
$passwordConf =$this->request->getPost('passwordConf');

$data = [
    'name'=>$name,
    'email'=>$email,
    'password'=> Hash::encrypt($password)
];

// Storing data 

$userModel = new \App\Models\UserModel();
$query = $userModel->insert($data);

if(!$query)
{
  return redirect()->back()->with('fail','Saving user failed');

}
else
{
    return redirect()->back()->with('success','Registred successfully');


}
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
        return view ('auth/login',['validation'=> $this->validator]);
    
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
        return redirect()->to('/dashboard');
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
