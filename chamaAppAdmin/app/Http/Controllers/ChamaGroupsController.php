<?php

namespace App\Http\Controllers;

use App\Models\ChamaGroups;
use Illuminate\Http\Request;
use App\Models\Transacton;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ChamaGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usr_id = Auth::id(); 
        if(session('success_message')){
            Alert::success('Thank you', session('success_message'));
        }
        $chama_groups = ChamaGroups::all();
        
        return view ('groups.index', compact('chama_groups'));
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
        $usr_id = Auth::id(); 
        // $actual_deposit_balance = Transacton::where('user_id', $usr_id)->sum('deposit_amount'); 
        

        $request -> validate([
            'group_name'=>'required',
        ]);
            $new_group = new ChamaGroups();
            $new_group -> group_name = $request ->group_name;  
            $new_group -> save();       
            return redirect('/groups')->withSuccessMessage('Added group Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChamaGroups  $chamaGroups
     * @return \Illuminate\Http\Response
     */
    public function show(ChamaGroups $chamaGroups)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChamaGroups  $chamaGroups
     * @return \Illuminate\Http\Response
     */
    public function edit(ChamaGroups $chamaGroups)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChamaGroups  $chamaGroups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChamaGroups $chamaGroups)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChamaGroups  $chamaGroups
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChamaGroups $chamaGroups)
    {
        //
    }
}
