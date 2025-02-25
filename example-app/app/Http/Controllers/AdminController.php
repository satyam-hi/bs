<?php

namespace App\Http\Controllers;

use App\Models\adminModel;
use App\Models\productModel;
use App\Models\publication;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function adminLogin()
    {
        return view('adminLogin');
    }

    public function adminLoginAction(Request $req)
    {
        $email = $req->email;
        $password = $req->password;
        $admin = adminModel::where('email', '=', $email)->where('password', '=', $password)->get()->first();
        if ($admin) {
            session(['adminEmail' => $admin->email, 'AdminPassword' => $admin->password]);
            return redirect('/admin-dashboard');
        } else {
            echo 'wrong info !!';
            return redirect('/admin-login');
        }
    }

    public function adminDashoard(Request $req)
    {
        $publication = publication::all();
        return view('adminDashBord', compact('publication'));
        // return $data = session()->all();
    }

    public function adminLogout(Request $req)
    {
        $req->session()->forget(['adminEmail', 'AdminPassword']);
        return redirect('/admin-login');
        return 'admin logoute';
    }

    public function check(Request $req)
    {
        return 'check';
    }

    public function addProductAction(Request  $req)
    {
        // return $req->all();

        $imageFilename = time() . '.' . $req->file('image')->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageFilename);

        $pdfFilename  = time() . rand(2, 28) . '.' . $req->file('pdf')->getClientOriginalExtension();
        request()->pdf->move(public_path('pdf'), $pdfFilename);
        $saveData =  productModel::create([
            'name' => $req->name,
            'tittle' => $req->tittle,
            'pdf' =>  $pdfFilename,
            'image' => $imageFilename,
            'sellCount' => 0,
            'publication' => $req->publication,
            'plan' => $req->plan,
        ]);
        return   $saveData;
    }

    public function addPublicationAction(Request  $req)
    {
        // return $req->all();
        $saveData =  publication::create([
            'name' => $req->Publication,
        ]);
        return   $saveData;
    }
}
