<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;
    public $product_id;
    public function deleteProduct(){
        // Product::find($this->product_id)->delete();

        $product=Product::find($this->product_id);
        // unlink('assets/imgs/products/'.$product->image);
        $product->delete();
        session()->flash('message','Product Deleted Successfully');
    }
    public function render()
    {
        $products=Product::orderBy('created_at','ASC')->paginate(10);

        return view('livewire.admin.admin-product-component',['products'=>$products]);
    }
}
