<?php

namespace App\Repositories\Interfaces;

interface AdminRepositoryInterface {

	// Users
	public function getAllUsers();
	public function getActiveUsers();
	public function getUnActiveUsers();
	public function getUser($id);
	public function createUser(array $request);
	public function updateUser($request, $id);
	public function deleteUser($id);
	public function activateUser($id);
	public function activateByAdminUser($id);
	// Accout
	public function updateAccount($request);

	// Password
	public function updatePassword($request);


	// chat
	public function createChat($request);
	public function deleteMessage($id);
	public function activateMessage($id);
	public function deleteAllMessages();
}