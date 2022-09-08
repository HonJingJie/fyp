<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Restaurant;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Products::where('owner', $request->session()->get('owner'))->get();

        if (sizeof($products) == 0) {
            echo "Product List is empty.<br/>";
            echo '<a href = "products/create"><button>Add Product</button></a>';
            echo '<a href = "/logout"><button>Log Out</button></a>';
        }
        else {
            return view('products.index', [
                'products' => $products
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Products;
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->category = $request->input('category');
        $product->description = $request->input('description');
        $product->owner = $request->session()->get('owner');
        $product->save();

        return redirect('/products');
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
        $product = Products::where('id', $id)->first();

        return view('products.edit')->with('product', $product);
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
        $product = Products::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'category' => $request->input('category'),
                'description' => $request->input('description'),
        ]);

        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::where('id', $id)->first();

        $product->delete();

        return redirect('/products');
    }

    public function viewDetail($name)
    {
        
        $products = Products::where('owner', $name)->get();
        $restaurant = Restaurant::where('owner_name', $name)->get();

        return view('store/view', [
            'products' => $products,
            'restaurant' => $restaurant
        ]);
    }

    public function returnToSearch()
    {
        $cart = session()->get('cart');
        session()->forget('cart');

        return redirect('store/home');
    }

    public function order_add($id)
    {
        $product = Products::find($id);

        if(!$product){
            abort(404);
        }

        $cart = session()->get('cart');

        if(!$cart) {
            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back();
        }

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back();
        }
        
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
        ];
        session()->put('cart', $cart);
        return redirect()->back();
    }
    
    public function order_remove($id)
    {
        $product = Products::find($id);

        $cart = session()->get('cart');

        if(!$cart) {
            return redirect()->back();
        }

        if(isset($cart[$id])) {
            $cart[$id]['quantity']--;
            if($cart[$id]['quantity'] == 0) {
                unset($cart[$id]);
                session()->put('cart', $cart);
                return redirect()->back();
            }
            else {
                session()->put('cart', $cart);
                return redirect()->back();
            }
        }

    }

    public function place_order()
    {
        $cart = session()->get('cart');
        session()->forget('cart');

        echo "You have placed an order.<br/>";
        echo '<a href = "/store/home">Click Here</a> to go back.';
    }
}
