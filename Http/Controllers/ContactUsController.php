<?php

// This page needsa Request folder and a request page that will show the rules for user inputs and validation

namespace App\Http\Controllers;

use App\Models\Contact;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;
use Illuminate\Support\Facades\DB;

class ContactUsController extends Controller
{
    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contactusform');
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


     // goes to ContactUsRequest in Requests folder and executes if it passes the action.
     // must create this page with: php artisan make:controller ContactUsRequest -resource
    public function store(ContactUsRequest $request)
    {

        // contactus is the name of the table in the database
        DB::table('contactus')
        // using the $request because its already validated. puts the info into the database
            ->insert(['name' => $request->input('name'),
                'email' => $request->input('email'),
                'notes' => $request->input('notes')]);

         // will redirect to the contact us page and adds a message to it.
        return view('contactusform')->with('message', 'Thanks for contacting me, I own you now. ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // show something that is already created
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
