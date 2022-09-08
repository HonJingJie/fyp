<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new Customer;
        $customer->username = $request->input('username');
        $customer->email = $request->input('email');
        $customer->password = $request->input('password');
        $customer->address = $request->input('address');
        $customer->save();

        echo "Registration completed.<br/>";
        echo '<a href = "/customer/login">Click Here</a> to log in.';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    public function loginForm()
    {
        return view('customer/login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $users = Customer::where('email', '=', $email)
        ->where('password', '=', $password)
        ->get();

        if (sizeof($users) == 0) {
            echo "Wrong email or password.<br/>";
            echo '<a href = "/customer/login">Click Here</a> to go back.';
        }

        foreach ($users as $user) {
            if ($user->email == $email && $user->password == $password) {
                $request->session()->put('customer' , $user->username);

                return redirect('/store/home');
            }
        }
        
        
    }

    public function logout(Request $request)
    {
        $request->session()->forget('customer');

        return redirect('/');
    }

}
