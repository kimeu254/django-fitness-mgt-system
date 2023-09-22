<?php

namespace App\Http\Controllers;

use App\DataTables\MemberRequestsDataTable;
use App\Models\Member;
use App\Models\MemberRequest;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use sirajcse\UniqueIdGenerator\UniqueIdGenerator;

class MemberRequestController extends Controller
{
    public function index(MemberRequestsDataTable $dataTable)
    {
        return $dataTable->render('account.admin.members.member-requests');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:member_requests',
            'phone' => 'required',
            'city' => 'required',
            'address' => 'required'
        ]);

        MemberRequest::create($request->all());

        return redirect()->back()->withSuccess(
            'You request to join the club has been submitted!
            You will be notified once the admin approves your request. Thank you!');
    }

    public function admit($id)
    {
        $member_request = MemberRequest::findOrFail($id);

        $user = User::create([
            'first_name' => $member_request->first_name,
            'last_name' => $member_request->last_name,
            'phone' => $member_request->phone,
            'email' => $member_request->email,
            'city' => $member_request->city,
            'address' => $member_request->address,
            'password' => Hash::make('password')
        ])->addRole('member');

        $uniqID = UniqueIdGenerator::generate([
            'table' => 'members',
            'field'=>'membership_no',
            'length' => 6,
            'prefix' =>'M',
            'suffix' => date('y')
        ]);

        $member = Member::create([
            'membership_no' => $uniqID,
            'user_id' => $user->id
        ]);

        $member_request->delete();

        return redirect()->back()->withSuccess(
            $member->user->first_name.' '.$member->user->last_name.' '.'was admitted successfully!'
        );
    }

    public function decline($id)
    {
        $member_request = MemberRequest::findOrFail($id);

        $member_request->status = 'declined';

        $member_request->save();

        return redirect()->back()->withSuccess(
            $member_request->first_name.' '.$member_request->last_name.' '.'membership was declined successfully!'
        );
    }

    public function destroy($id)
    {
        $member_request = MemberRequest::findOrFail($id);

        $member_request->delete();

        return redirect()->back()->withSuccess(
            'Request was deleted successfully!'
        );
    }
}
