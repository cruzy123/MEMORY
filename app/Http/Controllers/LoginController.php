<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    function login()
    {
        return view('login');
    }

    function submitLoginAjax()
    {
        $user = Employee::where('em_email',request('email'))->first();
        if($user)
        {
            $auth = Employee::join('users','employes.em_id','=','users.user_em_id')->where('em_id',$user->em_id)->first();
            if(Hash::check(request('password'),$auth->user_password)){
                session()->put('user_id',$auth->user_id);
                session()->put('user_role',$auth->user_role);
                session()->put('username',$auth->em_nom.' '.$auth->em_prenoms);
                echo 'true||Connexion réussie';
            }else{
                echo 'false||Vos paramètres de connexions sont erronés';
            }
        }
        else{
            echo 'false||Ce mail n\'est pas reconnu par le système';
        }
    }
}
