<?php

namespace App\Http\Controllers;

use App\DataTables\MembersDataTable;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use sirajcse\UniqueIdGenerator\UniqueIdGenerator;
use function Termwind\render;

class MemberController extends Controller
{
    public function index(MembersDataTable $dataTable)
    {
        return $dataTable->render('account.admin.members.members');
    }

    public function create()
    {
        return view('account.admin.members.new-member');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required',
            'city' => 'required',
            'address' => 'required'
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'city' => $request->city,
            'address' => $request->address
        ])->addRole('member');

        $uniqID = UniqueIdGenerator::generate([
            'table' => 'members',
            'field'=>'membership_no',
            'length' => 6,
            'prefix' =>'M',
            'suffix' => date('y')
        ]);

        Member::create([
            'membership_no' => $uniqID,
            'user_id' => $user->id
        ]);

        return redirect()->back()->withSuccess(
            'Member added successfully!'
        );
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);

        return view('account.admin.members.edit-member', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'phone' => 'required',
            'city' => 'required',
            'address' => 'required'
        ]);
        
    }

    public function deactivate($id)
    {

    }

    public function activate($id)
    {

    }

    public function destroy($id)
    {

    }
}
