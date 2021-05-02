<?php

namespace App\Http\Controllers;

use App\Models\ChangePassword;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;

class ChangePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        return view('changePassword');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if (session('success_message')) {
            Alert::success('Thank you');
        }
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        // dd('Password change successfully.');
        // return view ('changePassword');
        // redirect('/change-password');
        return view('changePassword')->withSuccessMessage('We have received your support request. Kindly check your email for confirmation');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChangePassword  $changePassword
     * @return \Illuminate\Http\Response
     */
    public function show(ChangePassword $changePassword)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChangePassword  $changePassword
     * @return \Illuminate\Http\Response
     */
    public function edit(ChangePassword $changePassword)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChangePassword  $changePassword
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChangePassword $changePassword)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChangePassword  $changePassword
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChangePassword $changePassword)
    {
        //
    }
}
