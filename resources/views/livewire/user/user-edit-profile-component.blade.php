
    <div class="card">
        <div class="card-header">
            <h5>Account Details</h5>
        </div>
        @if(Session::has('message'))
                <div class="alert alert-success" role="alert"> {{Session::get('message')}}</div>
                 @endif
        <div class="card-body">
            {{-- <p>Already have an account? <a href="login.html">Log in instead!</a></p> --}}
            <form  wire:submit.prevent="updateUser">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="name" class="form-label">Full Name <span class="required">*</span></label>
                        <input  class="form-control square" name="name"  wire:model="name" />
                        @error('name') <span>{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="phone" class="form-label">Phone Number <span class="required">*</span></label>
                        <input  class="form-control square" name="phone" wire:model="phone" />
                        @error('phone') <span>{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="address" class="form-label">Address <span class="required">*</span></label>
                        <input class="form-control square" name="address" wire:model="address" />
                        @error('address') <span>{{ $message }}</span> @enderror
                    </div>
                    {{-- <div class="form-group col-md-12">
                        <label>Confirm Password <span class="required">*</span></label>
                        <input required="" class="form-control square" name="cpassword" type="password">
                    </div> --}}
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-fill-out submit" >Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

