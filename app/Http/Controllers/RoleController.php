<?php

namespace App\Http\Controllers;

use App\Models\PermisosModel;
use App\Models\PermisosRoleModel;
use App\Models\RoleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index()
    {
        $PermissionRole = PermisosRoleModel::getPermission('Role', Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            abort(404);
        }
        $data['PermissionRole']=PermisosRoleModel::getPermission('Add Role', Auth::user()->role_id);
        $data['PermissionEdit']=PermisosRoleModel::getPermission('Edit Role', Auth::user()->role_id);
        $data['PermissionDelete']=PermisosRoleModel::getPermission('Delete Role', Auth::user()->role_id);
        $data['getRecord'] = RoleModel::getRecord();
    
        //  return view('/role/role',compact('data'));
         return view('/role/role',$data);

        
    }
    public function add()
    {  $PermissionRole = PermisosRoleModel::getPermission('Add Role', Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            abort(404);
        }
        $getPermission = PermisosModel::getRecord();
        $data['getPermission'] = $getPermission;
      
        return view('/role/add', compact('getPermission'));
    }
    public function insert(Request $request)
    {
        $PermissionRole = PermisosRoleModel::getPermission('Add Role', Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            abort(404);
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'permission_id' => 'required|array',
            'permission_id.*' => 'exists:permisos,id', // Validate each permission_id exists in the permisos table
        ]);

        $save = new RoleModel;
        $save->name = $request->name;
        $save -> save();
      
        PermisosRoleModel::InserUpdateRecord($request ->permission_id , $save->id);
        return redirect('role/role')->with('success', 'Role successfully created');

    }

    public function edit($id)
    {
        $PermissionRole = PermisosRoleModel::getPermission('Edit Role', Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            abort(404);
        }

        $data['getRecord']= RoleModel::getSingle($id);
        $data['getPermission'] = PermisosModel::getRecord();
        $data['getRolePermission'] = PermisosRoleModel::getRolePermission($id);

        // return view('/role/edit',$data);
         return view('/role/add', compact('data'));

    }
    public function update($id,Request $request)
    {
        $PermissionRole = PermisosRoleModel::getPermission('Edit Role', Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            abort(404);
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'permission_id' => 'required|array',
            'permission_id.*' => 'exists:permisos,id',
        ]);
        $save = RoleModel::getSingle($id);
        $save ->name = $request->name;
        $save -> save();
        PermisosRoleModel::InserUpdateRecord($request ->permission_id , $save->id);
        
        return redirect('role/role')->with('success', 'Role successfully updated');

    }
    public function delete($id)
    {
        $PermissionRole = PermisosRoleModel::getPermission('Delete Role', Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            abort(404);
        }
       
        $save = RoleModel::getSingle($id);
     
        $save -> delete();

        return redirect('role/role')->with('success', 'Role successfully deleted');
    }

}
