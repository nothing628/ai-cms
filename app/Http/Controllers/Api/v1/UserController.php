<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Hash;

class UserController extends Controller
{
	public function profileStore(Request $request)
	{
		$redirect_url = 'user.setting';
		$user = Auth::user();

		//Check if user try to change password
		if ($request->input('current_password') != '' || $request->input('new_password') != '') {
			$curPassword = $request->input('current_password');
			$newPassword = $request->input('new_password');
			$repPassword = $request->input('repeat_password');

			//Start validation for password changing
			if (Hash::check($curPassword, $user->password) && $newPassword == $repPassword) {
				//Validation OK;
				$user->password = Hash::make($newPassowrd);
				$redirect_url = 'logout.get';
			} else {
				return response()->json([
					'success' => false,
					'message' => 'Incorrect current password or repeat password not match!',
					'type' => 'error'
				]);
			}
		}

		//Change Username
		if ($request->input('username') != '')
			$user->username = $request->input('username');

		//Change Email
		if ($request->input('email') != '')
			$user->email = $request->input('email');

		//Save data
		$user->save();

		return response()->json([
			'success' => true,
			'message' => "Success to change user profile.\nPlease login again to take the effect.",
			'timer' => 5000,
			'redirect_url' => route($redirect_url)
		]);
	}

	public function settingStore(Request $request)
	{
		return response()->json(['success' => true]);
	}
}
