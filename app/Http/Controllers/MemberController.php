<?php

	namespace App\Http\Controllers;
	use App\Member;

	class MemberController extends Controller{
		public function info($id){
			// return 'member-info : ' . $id;

			return Member::getMember();

			return view('member/info',['name' => '学院君']);
			return view('member/member-info',['name' => '学院君']);
		}
	}