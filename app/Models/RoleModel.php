<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    use HasFactory;

    protected $table = 'role';
   
    
    public static function getSingle($id){
        return RoleModel::find($id);
    }
     public static function getRecord(){
        return RoleModel::get();
    }
}
