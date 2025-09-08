<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

{{--<div>--}}
{{--    <form wire:submit="register">--}}
{{--        <!-- Name -->--}}
{{--        <div>--}}
{{--            <x-input-label for="name" :value="__('Name')" />--}}
{{--            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />--}}
{{--            <x-input-error :messages="$errors->get('name')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Email Address -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="email" :value="__('Email')" />--}}
{{--            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />--}}
{{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password" :value="__('Password')" />--}}

{{--            <x-text-input wire:model="password" id="password" class="block mt-1 w-full"--}}
{{--                            type="password"--}}
{{--                            name="password"--}}
{{--                            required autocomplete="new-password" />--}}

{{--            <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Confirm Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />--}}

{{--            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"--}}
{{--                            type="password"--}}
{{--                            name="password_confirmation" required autocomplete="new-password" />--}}

{{--            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <div class="flex items-center justify-end mt-4">--}}
{{--            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}" wire:navigate>--}}
{{--                {{ __('Already registered?') }}--}}
{{--            </a>--}}

{{--            <x-primary-button class="ms-4">--}}
{{--                {{ __('Register') }}--}}
{{--            </x-primary-button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</div>--}}






<div class="authentication-wrapper authentication-cover authentication-bg">
    <div class="authentication-inner row">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 p-0">
            <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                <img alt="auth-register-cover" class="img-fluid my-5 auth-illustration"  src="{{ asset('images/auth-register-illustration-dark.png') }}" >
                <img alt="auth-register-cover" class="platform-bg" src="{{ asset('images/bg-shape-image-dark.png') }}">
            </div>
        </div>
        <!-- /Left Text -->
        <!-- Register -->
        <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
            <div class="w-px-400 mx-auto">
                <!-- Logo -->

                <!-- /Logo -->
                <h3 class="mb-1">شروع همه چی از اینجا 🚀</h3>
                <p class="mb-4">مدیریت حسابهای خود را آسان و سرگرم کننده کنید!</p>
                <form  wire:submit="register" class="mb-3 fv-plugins-bootstrap5 fv-plugins-framework">
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="username">نام کاربری</label>
                        <input wire:model="name" id="name" type="text" name="name" required autofocus autocomplete="name" class="form-control"  placeholder="نام کاربری خود را وارد کنید" >
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="email">ایمیل</label>
                        <input  wire:model="email"  type="email" name="email" required autocomplete="username"  class="form-control"  placeholder="ایمیل خود را وارد کنید" >
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>


                    <div class="mb-3 form-password-toggle fv-plugins-icon-container">
                        <label class="form-label" for="password">کلمه عبور</label>
                        <div x-data="{ show :  false }" class="input-group input-group-merge has-validation">
                            <input  :type="show ? 'text' : 'password'" type="password"  name="password"
                                    required autocomplete="new-password"
                                    wire:model="password" id="password" aria-describedby="password" class="form-control"  placeholder="············" >
                            <span class="input-group-text cursor-pointer">
                                 <i @click="show = !show"  :class="{'fa-eye' : show}" class="fa-solid fa-eye-slash"></i>
                            </span>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>




                    <div class="mb-3 form-password-toggle fv-plugins-icon-container">
                        <label class="form-label" for="password">تکرار کلمه عبور</label>
                        <div x-data="{ show :  false }"  class="input-group input-group-merge has-validation">
                            <input  :type="show ? 'text' : 'password'" type="password"  name="password_confirmation"
                                    required autocomplete="new-password"
                                    wire:model="password_confirmation" id="password_confirmation" aria-describedby="password" class="form-control"  placeholder="············" >
                            <span class="input-group-text cursor-pointer">
                                <i @click="show = !show"  :class="{'fa-eye' : show}" class="fa-solid fa-eye-slash"></i>
                            </span>
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>


                    <div class="mb-3 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                        <div class="form-check">
                            <input class="form-check-input" id="terms-conditions" name="terms" type="checkbox">
                            <label class="form-check-label" for="terms-conditions"> من با سیاست
                                <a>حفظ حریم خصوصی و شرایط</a>
                                موافقت می کنم
                            </label>
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                    </div>
                    <button class="btn btn-primary d-grid w-100 waves-effect waves-light">ثبت نام</button>
                    <input type="hidden"></form>
                <p class="text-center">
                    <span>در حال حاضر یک حساب کاربری دارید؟</span>
                    <a wire:navigate href="{{ route('login') }}">
                        <span>وارد شوید</span>
                    </a>
                </p>
                <div class="divider my-4">
                    <div class="divider-text">یا</div>
                </div>
                <div class="d-flex justify-content-center">
                    <a class="btn btn-icon btn-label-facebook me-3 waves-effect">
                        <i class="tf-icons fa-brands fa-facebook-f fs-5"></i>
                    </a>
                    <a class="btn btn-icon btn-label-google-plus me-3 waves-effect" >
                        <i class="tf-icons fa-brands fa-google fs-5"></i>
                    </a>
                    <a class="btn btn-icon btn-label-twitter waves-effect" >
                        <i class="tf-icons fa-brands fa-twitter fs-5"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- /Register -->
    </div>
</div>
