<?php

namespace App\Repositories\Repositories;

use App\{User, Role, Message};
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\DatabaseNotification;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Classes\GeneratePass;
use App\Mail\EmailVerification;
use URL;

class AdminRepository implements AdminRepositoryInterface {

	private $model;

    // Users
	public function getAllUsers()
	{
		return User::all();
	}

	public function getActiveUsers()
	{
		$active = User::WhereNotNull('email_verified_at')->get();

		return $active;
	}

	public function getUnActiveUsers()
	{
		 $unActive = User::WhereNull('email_verified_at')->get();

		 return $unActive;
	}

	public function getUser($id)
	{
		return User::find($id);
	}

	public function createUser($request)
	{
        $gp = new GeneratePass;
        $pass = $gp->randomPassword();
        $token = md5($gp->rememberToken());

        $role_user = Role::where('name', 'User')->first();

        $user = User::create([
            'name' => $request['name'],
            'surname' => $request['surname'],
            'email' => $request['email'],
            'password' => Hash::make($pass),
            'active_token' => $token
        ]);

        $url = url('/activate/'.$token);

        Mail::to($request['email'])->send(new EmailVerification($pass, $token, $url));

        $user->roles()->attach($role_user);
        return $user;

	}

	public function updateUser($request, $id)
	{
		$user = User::findOrFail($id);
		$user->name = $request->name;

        $user->save();
	}

	public function deleteUser($id)
	{
		return User::where('id', $id)->delete();
	}

	// Account
	public function updateAccount($request)
	{
		return User::where('id',Auth::id())->update([
            'name' => $request->input('name'),
        ]);
	}
	// End Account

	// Change Password
	public function updatePassword($request)
	{
		return User::where('id',Auth::id())->update([
            'password' => Hash::make($request['password'])

        ]);
	}
	// End Change Password

	public function activateUser($id)
	{
		return User::where('active_token', $id)->update([
            'email_verified_at' => date("Y-m-d H:i:s")
        ]);
	}

	public function activateByAdminUser($id)
	{
		return User::where('id', $id)->update([
            'email_verified_at' => date("Y-m-d H:i:s")
        ]);
	}


	// chat
	public function createChat($request)
	{
        $message = Message::create([
            'user_id' => Auth::id(),
            'message' => $request['message'],
            'active'  => 1
        ]);

        return $message;
	}

	public function deleteMessage($id)
	{
		return Message::where('id', $id)->delete();
	}

	public function activateMessage($id)
    {
        return Message::where('id', $id)->update([
            'active' => 1
        ]);
    }

    public function deleteAllMessages()
    {
    	$messages = Message::all();
		foreach($messages as $message)
		{
			$message->delete();
		}
    }
}
