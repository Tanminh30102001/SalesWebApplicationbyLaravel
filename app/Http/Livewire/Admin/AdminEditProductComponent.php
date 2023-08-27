<?php

namespace App\Http\Livewire\Admin;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Component;
use Carbon\Carbon;
use App\Models\Product;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;
    public $product_id;
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
    public $newImage;
    function mount($product_id){
        $product =Product::find($product_id);
        $this->product_id=$product->id;
        $this->name =$product->name ;
        $this->slug  =$product->slug ;
        $this->short_desc=$product->short_desc ;
        $this->desc   =$product->desc  ;
        $this->regular_price=$product->regular_price;
        $this->sale_price =$product->sale_price;
        $this->sku =$product->sku ;
        $this->stock_status=$product->stock_status;
        $this->featured=$product->featured ;
        $this->quanity =$product->quanity ;
        $this->image =$product->image;
        $this->category_id=$product->category_id;
    }

    public function generateSlug() {
        $this->slug=Str::slug($this->name);
    }

    public function updateProduct(){
        $this->validate( [
            'name'=>'required',
            'slug'=>'required',
            'short_desc' => "required| max:50",
            'desc'=>"required",
            'regular_price'=>'required | numeric ',
            'sale_price'=>'numeric',
            'sku'=>'required',
            'stock_status'=>'required',
            'featured'=>'required',
            'quanity'=>'required',
            'image'=>'required ',
            'category_id'=>'required'

        ]);
        $product= Product::find($this->product_id);
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
        if($this->newImage){
            unlink('assets/imgs/products/'.$product->image);
            $imageName = Carbon::now()->timestamp.'.'.$this->newImage->extension();
            $this->newImage->storeAs('products',$imageName);
            $product->image=$imageName;
        }
        $product->category_id=$this->category_id;
        $product->save();
        session()->flash('message','Product has been updated');
        
    }
    public function render()
    {
        $categories=Category::orderBy('name','ASC')->get();
        return view('livewire.admin.admin-edit-product-component',['categories'=>$categories]);
    }
}
