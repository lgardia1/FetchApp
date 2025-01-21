<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /* $request->merge(['page'=>3]); */
        return response()->json(['products' => Product::orderBy('name')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    /*     public function create()
    {
        //
    } */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $products = [];
        $result = false;
        $message = '';

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:products|min:3',
            'price' => 'required|numeric|gt:0|lte:10000'
        ]);

        if ($validator->passes()) {
                $product = new Product($request->all());
                $result = $product->store();

                if($result) {
                    $products = Product::orderBy('name')->paginate(10)->setPath(route('product.index'));
                }else {
                    $message = "The message hasn't been created";
                }

        } else {
            $message = $validator->getMessageBag();
        }


        return response()->json(['products'=>$products ,  'result' => $result, 'message' => $message]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        if ($product)
            return response()->json(['product' => $product, 'X-Error-Message' => '',]);

        $message = 'Product not found';
        return response()->json(['product' => [
            'product' => $product,
            'X-Error-Message' => $message,
        ]]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    /*     public function edit(Product $product)
    {
        //
    } */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $result = false;
        $products = [];
        $message = '';
        if ($product) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:products|min:3',
                'price' => 'required|numeric|gt:0|lte:10000',
                'page' => 'required|numeric|gt:0|lte:10000'
            ]);

            if ($validator->passes()) {
                $result = $product->modify($request);

                if(!$result) {
                    $message = "Product can't be saved";
                }else {
                    $products = Product::orderBy('name')->paginate('10')->setPath(route('product.index'));
                }

            } else {
                $message = $validator->getMessageBag();
            }
        } else {
            $message = 'Product not found';
        }

        return response()->json(['products'=> $products, 'result' => $result, 'message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $result = false;
        $message = 'The product has been deleted';

        if ($product) {
            try {
                $result = $product->delete();
                $products = Product::orderBy('name')->paginate(10)->setPath(route('product.index'));
            } catch (\Exception $e) {
                $message = $e;
            }
        }else {
            $message = 'Product not found';
        }

        return response()->json(['products' => $products, 'result'=> $result, 'message' => $message]);
    }
}
