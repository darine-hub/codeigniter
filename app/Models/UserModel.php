<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name','email','mobile','password','code','active'];


    protected $userTimestamps = true ;
    protected $beforeInsert = ['beforeInsert'];

    public function beforeInsert(array $data):array{

      if(isset($data['data']['password'])){
        $planPassword = $data['data']['password'];
        $data['data']['password']=password_hash($planPassword,PASSWORD_BCRYPT);


      }
      return $data;

    }
    
}
