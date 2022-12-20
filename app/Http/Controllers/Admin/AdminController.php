<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function dashboard()
    {
        $users = $this->adminRepository->getAllUsers();
        $active = $this->adminRepository->getActiveUsers();
        $unActive = $this->adminRepository->getUnActiveUsers();

    	return view('admin.dashboard', compact('users', 'active', 'unActive'));
    }

    public function users()
    {
        $users = $this->adminRepository->getActiveUsers();
    	return view('admin.users', compact('users'));
    }

    public function unactiveusers()
    {
        $users = $this->adminRepository->getUnActiveUsers();
    	return view('admin.unactiveusers', compact('users'));
    }

    public function delete_user($id)
    {
        $this->adminRepository->deleteUser($id);
        $this->flashMsg('info', _('Poprawnie usunałeś użytkownika'));
        return redirect()->back();
    }

    public function add_user()
    {
        return view('admin.add_user');
    }

    public function create_user(Request $request)
    {

        $this->validate($request, [
            'name' => 'required', 'surname' => 'required', 'email' => 'required|unique:users'], [
            'required' => 'To pole jest wymagane', 'unique' => 'Taki e-mail juz istnieje w bazie']
        );


        if($request->isMethod('post'))
        {
            $this->adminRepository->createUser($request);
            $this->flashMsg('info', _('Poprawnie dodałeś użytkownka'));
            return redirect('admin/unactiveusers');
        }
    }

    public function activate_user($id)
    {
        $this->adminRepository->activateByAdminUser($id);
         $this->flashMsg('info', _('Poprawnie aktywowałeś użytkownka'));
        return redirect()->back();
    }

    // Account
    public function account()
    {
    	return view('admin.account');
    }
    public function update_password(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:8|confirmed', 'password_confirmation' => 'required'], [
            'required' => 'To pole jest wymagane', 'min' => 'Hasło musi mieć minimalnie 8 znaków', 'confirmed' => 'Hasła nie zgadzają się']
        );

        $this->adminRepository->updatePassword($request);
        $this->flashMsg('info', _('Poprawnie zmieniłeś hasło'));
        return redirect()->back();
    }
    // End Account


    public function delete_all_chat()
    {
        $this->adminRepository->deleteAllMessages();
        $this->flashMsg('info', _('Poprawnie usunałeś chat'));
        return redirect()->back();
    }

     // import users
     public function import_user_view()
     {
        return view('admin.import_user');
     }
     public function import_user() 
     {
         Excel::import(new UsersImport, request()->file('file'));
            
         $this->flashMsg('info', _('Poprawnie zaimportowałeś użytkowników'));
         return back();
     }
     // end import users
}
