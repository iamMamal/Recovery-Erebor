<?php

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    #[Locked]
    public string $token = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Mount the component.
     */
    public function mount(string $token): void
    {
        $this->token = $token;

        $this->email = request()->string('email');
    }

    /**
     * Reset the password for the given user.
     */
    public function resetPassword(): void
    {
        $this->validate([
            'token' => ['required'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            $this->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        if ($status != Password::PASSWORD_RESET) {
            $this->addError('email', __($status));

            return;
        }

        Session::flash('status', __($status));

        $this->redirectRoute('login', navigate: true);
    }
}; ?>

{{--<div>--}}
{{--    <form wire:submit="resetPassword">--}}
{{--        <!-- Email Address -->--}}
{{--        <div>--}}
{{--            <x-input-label for="email" :value="__('Email')" />--}}
{{--            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />--}}
{{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password" :value="__('Password')" />--}}
{{--            <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />--}}
{{--            <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Confirm Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />--}}

{{--            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"--}}
{{--                          type="password"--}}
{{--                          name="password_confirmation" required autocomplete="new-password" />--}}

{{--            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <div class="flex items-center justify-end mt-4">--}}
{{--            <x-primary-button>--}}
{{--                {{ __('Reset Password') }}--}}
{{--            </x-primary-button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</div>--}}


<div class="authentication-wrapper authentication-cover authentication-bg">
    <div class="authentication-inner row">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 p-0">
            <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                <img src="{{ asset('images/auth-reset-password-illustration-dark.png') }}" alt="لوگو" class="img-fluid my-5 auth-illustration">
                <img src="{{ asset('images/bg-shape-image-dark.png') }}" alt="لوگو" class="platform-bg">
            </div>
        </div>
        <!-- /Left Text -->
        <!-- Reset Password -->
        <div class="d-flex col-12 col-lg-5 align-items-center p-4 p-sm-5">
            <div class="w-px-400 mx-auto">
                <!-- Logo -->

                <!-- /Logo -->
                <h4 class="mb-1">ریست رمز عبور 🔒</h4>
                <form wire:submit="resetPassword" class="mb-3 fv-plugins-bootstrap5 fv-plugins-framework" >
                    <div class="mb-3 form-password-toggle fv-plugins-icon-container">

                        <div class="mb-3 fv-plugins-icon-container">
                            <label class="form-label" >ایمیل </label>
                            <input type="email" wire:model="email" id="email" name="email" required autofocus autocomplete="username" class="form-control" placeholder="ایمیل خود را وارد کنید" >
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
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




                    <button class="btn btn-primary d-grid w-100 mb-3 waves-effect waves-light">تایید رمز عبور</button>
                    <div class="text-center">
                        <a  wire:navigate href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
                            <i class="ti ti-chevron-left scaleX-n1-rtl"></i>
                            بازگشت به صفحه ورود
                        </a>
                    </div>
                <input type="hidden"></form>
            </div>
        </div>
        <!-- /Reset Password -->
    </div>
</div>
