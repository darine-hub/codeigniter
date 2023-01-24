<?php

namespace App\Controllers;

use App\Views\vendor\autoload;
use App\Models\UserModel;

class Chat extends BaseController
{
    public function index()
    {

        $userModel = new \App\Models\UserModel();
        $userList = $userModel->select('name')->findAll();
        $data['listUser']=  $userList;
      
        return view('chat/index',$data);
    }


    public function process(){
       
       
     

 
        

        $options = array(
          'cluster' => 'eu',
          'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
          '137831850feb3f0501f6',
          'c1bf25155a0447870ca4',
          '1542341',
          $options
        );
      
        //$data['message'] = $_POST['message'];
        
        $data['message'] = 'hello world';
        $pusher->trigger('my-channel', 'my-event', $data);
        
    
    }

}

