<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name', 'price'];

    public function store(){
        try {
            $result = $this->save();
        }catch(\Exception $e) {
            $result = false;
        }
        return $result;
    }

    public function modify(Request $request) {
        try {
            $result = $this->update($request->all());
        }catch(\Exception $e) {
            $result = false;
        }
        return $result;
    }
}
