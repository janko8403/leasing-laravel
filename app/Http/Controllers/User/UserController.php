<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use Auth;
use Session;

class UserController extends Controller
{
    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function activate($id)
    {
        $this->adminRepository->activateUser($id);
        return redirect('/home');
    }


    // register
    public function view_user()
    {
        return view('form');
    }

    public function register_user(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required',
            'company' => 'required',
            'agree' => 'accepted',
        ], [
            'required' => 'To pole jest wymagane', 
            'unique' => 'Taki e-mail juz istnieje w bazie',
            'accepted' => 'Zaakceptuj zgodę'
        ]);

        $role_user = Role::where('name', 'User')->first();

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' =>  $request->email,
            'password' => Hash::make('pass'),
            // 'password' => Hash::make($request->password),
            'ask' => $request->ask,
            'company' => $request->company,
            'agree' => $request->agree,
            'phone' => $request->phone,
            'email_verified_at' => date("Y-m-d H:i:s")
        ]);

        $user->roles()->attach($role_user);
    
        $user->save();

        return redirect('/thx');
    }

    public function thx()
    {
        return view('thx');
    }

}
