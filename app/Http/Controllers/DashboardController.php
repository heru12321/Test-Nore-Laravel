<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExport;


use App\Models\Blog;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('crud.dashboard', [
            'title' => 'Dashboard Page',
        ]);
    }

    public function editprofile(Request $request)
    {
        $dataasli = User::where('email', $request->email)->first();
        $rules = [
            'name' => 'required|max:255',
            'as' => 'required',
            'address' => 'required|max:255',
            'bio' => 'max:255',
            'image' => 'image|file|max:1024'
        ];

        if ($request->email != $dataasli->email) {
            $rules['email'] = 'required|unique:users|email:dns';
        };

        $validated = $request->validate($rules);

        if ($request->file('profilepic')) {
            if ($request->oldimage != 'placeholder.jpg') {
                Storage::delete($request->oldimage);
            }
            $validated['image'] = $request->file('profilepic')->store('profile-pic');
        }

        User::where('id', $dataasli->id)
            ->update($validated);


        return redirect('dashboard')->with('success', 'Profile has been updated');
    }

    public function showpdf(Request $request)
    {
        $data = User::where('email', $request->email)->first();

        $pdf = PDF::loadview('layout.pdf', ['user' => $data]);
        $pdf->setPaper('A4', 'landscape');
        set_time_limit(300);
        return $pdf->stream('coba.pdf', array("Attachment" => 0));
    }

    public function showexcel(Request $request)
    {
        $data = User::where('email', $request->email)->first();
        return Excel::download(new UserExport(), 'user.xlsx');
    }

    public function changepass(Request $request)
    {
        $dataasli = User::where('email', $request->email)->first();
        $validated = $request->validate([
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required',
            'oldpass' => 'required'
        ]);
        if (Hash::check($validated['oldpass'], $dataasli->password)) {
            User::where('email', $dataasli->email)
                ->update(['password' => bcrypt($validated['password'])]);
            return redirect('dashboard')->with('success', 'Password has been changed');
        } else {
            return redirect('dashboard')->with('error', 'Password changed Failed!');
        }
    }

    public function delaccount(Request $request)
    {
        User::where('email', $request->email)->delete();
        return redirect('login')->with('success', 'Account Deleted!');
    }
}
