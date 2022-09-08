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
        $owner_name = $request->input('owner_name');
        $restaurant_name = $request->input('restaurant_name');
        $email = $request->input('email');
        $password = $request->input('password');
        $created_at = now();
        $updated_at = now();
        $approved = false;
        $data=array('owner_name'=>$owner_name,'restaurant_name'=>$restaurant_name,"email"=>$email,"password"=>$password,"created_at"=>$created_at, "updated_at"=>$updated_at, "approved"=>$approved);
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
        $password = $request->input('password');
        $email = $request->input('email');

        $users = Restaurant::where('password', '=', $password)
        ->where('email', '=', $email)
        ->where('approved', '=', 1)
        ->get();

        if (sizeof($users) == 0) {
            echo "Wrong email or password.<br/>";
            echo '<a href = "login">Click Here</a> to go back.';
        }

        foreach ($users as $user) {
            if ($user->password == $password && $user->email == $email) {
                $request->session()->put('owner' , $user->owner_name);
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

    public function viewAll()
    {
        $restaurants = Restaurant::where('approved', '=', 1)->get();

        return view('store/home', ['restaurants'=>$restaurants]);
    }

    public function search(Request $request)
    {
        $name = $request->input('owner');
        
        $restaurants = Restaurant::where('restaurant_name', '=', $name)
        ->where('approved', '=', 1)
        ->get();

        if (sizeof($restaurants) == 0 ) {
            $restaurants = Restaurant::where('approved', '=', 1)->get();

            return view('store/home', ['restaurants'=>$restaurants]);

        } else {
            return view('store/home', ['restaurants'=>$restaurants]);
        }
        
    }

}
