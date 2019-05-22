<?php

/**
 * Description of ProfileRequest
 *
 * @author user1
 */
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest {
    public function  rules(){
        return [
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:6|required_with:new_password', //starata e 
            //zadaljitelna ako e vavedena nova
            'new_password' =>'nullable|string|min:6|confirmed',
            'new_password_confirmation' =>'nullable|string'
            
        ];
    }
    
    
}
