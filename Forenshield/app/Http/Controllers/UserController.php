<?php

namespace App\Http\Controllers;

use App\Models\User;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $data = User::where('is_admin', false)->orderByDesc('id')->paginate(10);
        return view('pages.users', compact('data'));
    }

    public function find(Request $request)
    {
        $data = [];

        foreach (
            User::select('id', 'name', 'nic')->where('nic', 'LIKE', '%' . $request->term . '%')
                ->get() as $key => $value
        ) {
            $data[] = ['id' => $value->id, 'text' => $value->name . ' (' . $value->nic  . ')'];
        }

        return $data;
    }

    public function logout()
    {
        Auth::logout();
        Session::forget('routes');
        Session::flush();
        return redirect('/login');
    }

    public function enroll(Request $request)
    {
        $request->validate([
            'isnew' => 'required|in:1,2',
            'nic' => 'required|string',
            'name' => 'required|min:1',
        ]);

        if ($request->isnew == 1) {
            $request->validate([
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:8',
                'password_confirmation' => 'required|same:password',
            ]);

            $data = [
                'nic' => $request->nic,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];

            User::create($data);
        } else {
            $request->validate([
                'password' => 'nullable|min:8',
                'password_confirmation' => 'nullable|same:password',
                'record' => 'required|exists:users,id'
            ]);
            $data = [
                'nic' => $request->nic,
                'name' => $request->name,
            ];

            if ($request->has('password') && $request->password != '' && $request->has('password_confirmation')) {
                $data['password'] = Hash::make($request->password);
            }

            User::where('id', $request->record)->update($data);
        }
        return redirect()->back()->with(['code' => 1, 'color' => 'success', 'msg' => 'User Successfully ' . (($request->isnew == 1) ? 'Registered' : 'Updated')]);
    }

    public function deleteOne(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id'
        ]);
        User::where('id', $request->id)->delete();

        return redirect()->back()->with(['code' => 1, 'color' => 'danger', 'msg' => 'User Successfully Removed']);
    }

    public function getOne(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id'
        ]);
        return User::where('id', $request->id)->first();
    }
}
