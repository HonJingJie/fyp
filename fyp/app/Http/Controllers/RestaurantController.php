<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function insertform()
    {
        return view('restaurant/index');
    }

    public function insert(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $created_at = now();
        $updated_at = now();
        $approved = false;
        $data=array('name'=>$name,"email"=>$email,"created_at"=>$created_at, "updated_at"=>$updated_at, "approved"=>$approved);
        DB::table('restaurants')->insert($data);
        echo "Registration successfully applied.<br/>";
        echo '<a href = "/restaurant">Click Here</a> to go back.';
    }

    public function view()
    {
        $restaurants = DB::select('select * from restaurants');

        return view('restaurant/show', ['restaurants'=>$restaurants]);
    }

    public function loginForm()
    {
        return view('restaurant/login');
    }

    public function login(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');

        $users = Restaurant::where('name', '=', $name)
        ->where('email', '=', $email)
        ->where('approved', '=', 1)
        ->get();

        if (sizeof($users) == 0) {
            echo "Wrong username or email.<br/>";
            echo '<a href = "login">Click Here</a> to go back.';
        }

        foreach ($users as $user) {
            if ($user->name == $name && $user->email == $email) {
                $request->session()->put('owner' , $name);
                echo "Login successful.<br/>";
                echo '<a href = "/products">Click Here</a> to see product list.';
            }
        }
        
        
    }

    public function approve(Request $request, $id)
    {
        $restaurant = Restaurant::where('id', $id)
            ->update([
                'approved' => true,
        ]);

        return redirect('/admin/show');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('owner');

        return redirect('/');
    }

    public function reject($id)
    {
        $restaurant = Restaurant::where('id', $id)->first();

        $restaurant->delete();

        return redirect('/admin/show');
    }
}
