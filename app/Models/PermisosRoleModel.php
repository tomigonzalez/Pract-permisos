<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisosRoleModel extends Model
{
    use HasFactory;

    protected $table = 'permisos_role';
   
    
static public function InserUpdateRecord($permission_ids, $role_id){

     PermisosRoleModel::where('role_id', '=', $role_id)->delete();
    
    foreach($permission_ids as $permission_id){
        $save = new PermisosRoleModel;
        $save->permission_id = $permission_id;
        $save->role_id = $role_id;
        $save->save();
    }
}

static public function getRolePermission($role_id){

    return PermisosRoleModel::where('role_id', '=', $role_id)->get();
}
static public function getPermission($slug, $role_id){

    return PermisosRoleModel::select('permisos_role.id')
        ->join('permisos', 'permisos.id', '=', 'permisos_role.permission_id')
        ->where('permisos_role.role_id', '=', $role_id)
        ->where('permisos.slug', '=', $slug)
        ->count();
}

}
