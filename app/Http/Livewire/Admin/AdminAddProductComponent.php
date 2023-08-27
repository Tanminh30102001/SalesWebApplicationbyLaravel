<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_desc;
    public $desc;
    public $regular_price;
    public $sale_price;
    public $sku;
    public $stock_status="instock";
    public $featured=0;
    public $quanity;
    public $image;
    public $category_id;

    public function generateSlug() {
        $this->slug=Str::slug($this->name);
    }
    public function addProduct(){
        $this->validate( [
            'name'=>'required',
            'slug'=>'required',
            'short_desc' => "required| ",
            'desc'=>"required",
            'regular_price'=>'required | numeric ',
            'sale_price'=>'numeric',
            'sku'=>'required',
            'stock_status'=>'required',
            'featured'=>'required',
            'quanity'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png',
            'category_id'=>'required'

        ]);
        $product=new Product();
        $product->name=$this->name;
        $product->slug=$this->slug;
        $product->short_desc=$this->short_desc;
        $product->desc=$this->desc;
        $product->regular_price=$this->regular_price;
        $product->sale_price=$this->sale_price;
        $product->sku=$this->sku;
         $product->stock_status=$this->stock_status;
         $product->featured=$this->featured;
        $product->quantity=$this->quanity;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('products',$imageName);
        $product->image=$imageName;
        $product->category_id=$this->category_id;
        $product->save();
        session()->flash('message','Product has been added');

    }
    public function render()
    {
        $categories=Category::orderBy('name','ASC')->get();
        return view('livewire.admin.admin-add-product-component',['categories'=>$categories]);
    }
}
