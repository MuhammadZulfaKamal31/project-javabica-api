<?php

namespace App\Http\Requests\RolesPermissionRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ShowUsersPermissionValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // if(Auth::user()->hasRole('super_admin')) 
        // {
        //      return true;
        // }

        // if(Auth::user()->can('model_has_permission_show')) 
        // {
        //      return true;
        // }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return  [
            'user_uuid'                    => 'required|exists:users,uuid', 
            'show_type'                    => 'required|in:getDirectPermissions,getPermissionsViaRoles,getAllPermissions', 
            'use_pluk_permission_name'     => 'nullable|boolean', 
        ];
    }
    public function messages()
    {
        return [
            'user_uuid.required'                   => 'user uuid tidak boleh kosong',
            'user_uuid.exists'                     => 'user uuid tidak ditemukan',
            'show_type.required'             => 'show type tidak dapat kosong',
            'show_type.in'                   => 'show type hanya antara lain  getDirectPermissions,getPermissionsViaRoles, getAllPermissions',
           
           ]; 
    }
}
