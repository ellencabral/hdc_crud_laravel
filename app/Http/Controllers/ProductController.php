<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\User;

class ProductController extends Controller
{

    public function index() {

        $search = request('search');

        if($search) {

            $products = Product::where([
                ['name', 'like', '%'.$search.'%']
            ])->get();
        } 
        else {
            $products = Product::all();
        }

        return view('welcome', ['products' => $products, 'search' => $search]);
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {

        $product = new Product;

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->categories = $request->categories;

        // Image upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") .  "." . $extension);

            $requestImage->move(public_path('img/products'),$imageName);

            $product->image = $imageName;
        }

        $user = auth()->user(); // acesso ao usuario logado
        $product->user_id = $user->id;

        $product->save();

        return redirect('/')->with('msg','Produto criado com sucesso!');
    }

    public function show($id) {

        $product = Product::findOrFail($id);

        $productOwner = User::where('id', $product->user_id)->first()->toArray(); // o primeiro que encontrar

        return view('products.show',['product' => $product, 'productOwner' => $productOwner]);
    }

    public function dashboard()  {
        
        $user = auth()->user();

        $products = $user->products;

        return view('products.dashboard', ['products' => $products]);
    }

    public function destroy($id) {

        Product::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Produto excluído com sucesso!');
    }

    public function edit($id) {

        $product = Product::findOrFail($id);

        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request) {

        $data = $request->all();

        // Image upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") .  "." . $extension);

            $requestImage->move(public_path('img/products'),$imageName);

            $data['image'] = $imageName;
        }

        Product::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg','Produto editado com sucesso!');
    }
}
