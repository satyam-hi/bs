<?php

namespace App\Http\Controllers;

use App\Models\AlluserModel;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use PDO;

class AlluserController extends Controller
{
    //
    public function index()
    {
        return view('register');
    }
    public function registerAction(Request $req)
    {
        $validator = FacadesValidator::make($req->all(), [
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
        ]);
        if ($validator->fails()) {
            // return response()->json($validator->errors(), 400);
            $err = $req->validate([
                'name' => 'required',
                'email' => 'required',
                'mobile' => 'required',
            ]);
            return response()->json($err);
        } else {
            $saveData =  AlluserModel::create([
                'name' => $req->name,
                'email' => $req->email,
                'mobile' => $req->mobile,
                'password' => $req->password,
                'items'  => json_encode([])
            ]);
            return redirect('/user-login');
            return response()->json($saveData);
        }
    }

    public function list()
    {
        return response()->json(AlluserModel::all());
    }

    public function userLogin()
    {
        return view('userLogin');
    }

    public function userLoginAction(Request $req)
    {
        $email = $req->email;
        $password = $req->password;
        $user = AlluserModel::where('email', '=', $email)->where('password', '=', $password)->get()->first();
        if ($user) {
            session(['userEmail' => $user->email, 'userPassword' => $user->password]);
            echo  'are you login ';
            return redirect('/web');
        } else {
            echo 'wrong info !!';
            return redirect('/user-login');
        }
    }

    public function userLogout(Request $req)
    {
        $req->session()->forget(['userEmail', 'userPassword']);
        return redirect('/web');
        return 'user logout';
    }
    
}
