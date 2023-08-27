<?php

namespace App\Http\Livewire\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
class UserEditProfileComponent extends Component
{
    public $name;
    public $phone;
    public $address;
    // public $user_id;

    public function mount(){

        
        // $this->user_id=Auth::user()->id;
        $user = Auth::user();
        $this->name =$user->name;
        $this->phone =$user->phone;
        $this->address=$user->address;
        
    }
    public function updateUser(){
        
        $this->validate([
            'name' => 'required|string',
            'phone' => 'required|numeric',
            'address' => 'required|string',
        ]);
        $user = Auth::user();
        User::where('id', $user->id)->update([
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
        ]);
        // $user=User::find(auth()->user()->id);
        // // $user=Auth::user();
        // $user->name=$this->name;
        // $user->phone =$this->phone;
        // $user->address=$this->address;
        
        // $user->save();
      session()->flash("message"," Updated Successfully");

    }
    public function render()
    {
        return view('livewire.user.user-edit-profile-component');
    }
}
