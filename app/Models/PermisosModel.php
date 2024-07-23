<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisosModel extends Model
{
    use HasFactory;

    protected $table = 'permisos';
   
    
    static public function getSingle($id){
        return RoleModel::find($id);
    }
    static public function getRecord(){
        
        $getPermission = PermisosModel::groupBy('groupby')->get();
        $result = array();
        foreach($getPermission as $value)
        { 
          $getPermissionGroup = PermisosModel::getPermissionGroup($value->groupby);
          $data = array();
          $data['id']=$value->id;
          $data['name']=$value->name;
          $group = array();
          foreach($getPermissionGroup as $valueG)
          { 
            $dataG = array();
            $dataG['id'] = $valueG->id;
            $dataG['name'] = $valueG->name;
            $group[]=$dataG;
          }
          $data['group'] = $group;
          $result[]=$data;
        }
    return $result;
        
    }

    static public function getPermissionGroup($groupby)
    {
        return PermisosModel::where('groupby', '=',$groupby)->get();
    }
}
