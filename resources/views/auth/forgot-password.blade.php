<x-app-layout>   
        <div class="container ">
            <div class="row align-items-start">
                <div class="col">
                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>
                
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                        <div class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h3 class="mb-30">Please tell me your email</h3>
                                </div>
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                            
                                    <!-- Email Address -->
                                    <div class="row">
                                        <div class="col">
                                            <div>
                                                <x-input-label for="email" :value="__('Email')" />
                                                <x-text-input id="email" style="column-width: 50%" class="block mt-1 " type="email" name="email" :value="old('email')" required autofocus  />
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>
                                        </div>
                                    </div>
                                    
                            
                                    <div class="flex items-center justify-end mt-4">
                                        <x-primary-button>
                                            {{ __('Email Password Reset Link') }}
                                        </x-primary-button>
                                    </div>
                                </form>
    
                            </div>
                        </div>
                   
                </div>
            </div>
        </div>
    

</x-app-layout>

