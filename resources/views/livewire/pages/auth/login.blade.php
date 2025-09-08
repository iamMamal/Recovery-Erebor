<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>


{{--<div>--}}
{{--    <!-- Session Status -->--}}
{{--    <x-auth-session-status class="mb-4" :status="session('status')" />--}}

{{--    <form wire:submit="login">--}}
{{--        <!-- Email Address -->--}}
{{--        <div>--}}
{{--            <x-input-label for="email" :value="__('Email')" />--}}
{{--            <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />--}}
{{--            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password" :value="__('Password')" />--}}

{{--            <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full"--}}
{{--                            type="password"--}}
{{--                            name="password"--}}
{{--                            required autocomplete="current-password" />--}}

{{--            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Remember Me -->--}}
{{--        <div class="block mt-4">--}}
{{--            <label for="remember" class="inline-flex items-center">--}}
{{--                <input wire:model="form.remember" id="remember" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">--}}
{{--                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--            </label>--}}
{{--        </div>--}}

{{--        <div class="flex items-center justify-end mt-4">--}}
{{--            @if (Route::has('password.request'))--}}
{{--                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}" wire:navigate>--}}
{{--                    {{ __('Forgot your password?') }}--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            <x-primary-button class="ms-3">--}}
{{--                {{ __('Log in') }}--}}
{{--            </x-primary-button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</div>--}}





<div class=" authentication-wrapper authentication-cover authentication-bg">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="authentication-inner row">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 p-0">
            <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                <img src="{{ asset('images/auth-login-illustration-dark.png') }}" alt="لوگو" class="img-fluid my-5 auth-illustration">
                <img src="{{ asset('images/bg-shape-image-dark.png') }}" alt="لوگو" class="platform-bg">
            </div>
        </div>
        <!-- /Left Text -->
        <!-- Login -->
        <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
            <div class="w-px-400 mx-auto">
                <!-- Logo -->

                <!-- /Logo -->
                <h3 class="mb-1">به Erebor خوش آمدید! 👋</h3>
                <p class="mb-4">لطفا به حساب کاربری خود وارد شوید تا از امکانات سامانه استفاده کنید.</p>
                <form  class="mb-3"  wire:submit.prevent="login">



                    <!-- Email Address -->



                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" >ایمیل </label>
                        <input type="email" wire:model="form.email" id="email" name="email" required autofocus autocomplete="username" class="form-control" placeholder="ایمیل خود را وارد کنید" >
                            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
                    </div>


                    <!-- Password -->


                    <div  x-data="{ show :  false }"  class="mb-3 form-password-toggle fv-plugins-icon-container">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">رمز عبور</label>
                            @if (Route::has('password.request'))
                            <a wire:navigate href="{{ route('password.request') }}">
                                <small>رمز عبور را فراموش کرده اید؟</small>
                            </a>
                            @endif
                        </div>



                        <div  class="input-group input-group-merge has-validation">
                            <input  :type="show ? 'text' : 'password'" type="password"   wire:model="form.password" id="password" aria-describedby="password" class="form-control"  placeholder="············" >
                            <span class="input-group-text cursor-pointer">
                                <i @click="show = !show"  :class="{'fa-eye' : show}" class="fa-solid fa-eye-slash"></i>
                            </span>
                        </div>
                            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
                    </div>

                    <!-- Remember me check -->


                    <div class="mb-3">
                        <div class="form-check">
                            <input  wire:model="form.remember" class="form-check-input" id="remember" type="checkbox">
                            <label class="form-check-label" for="remember"> مرا به خاطر بسپار</label>
                        </div>
                    </div>



                    <button class="btn btn-primary d-grid w-100 waves-effect waves-light">ورود</button>
                    <input type="hidden">
                </form>
                <p class="text-center">
                    <span>حساب کاربری ندارید؟</span>
                    <a wire:navigate href="{{ route('register') }}">
                        <span>ثبت نام</span>
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
        <!-- /Login -->
    </div>
</div>

