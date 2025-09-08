<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        session()->flash('status', __($status));
    }
}; ?>

{{--<div>--}}
{{--    <div class="mb-4 text-sm text-gray-600">--}}
{{--        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}--}}
{{--    </div>--}}

{{--    <!-- Session Status -->--}}
{{--    <x-auth-session-status class="mb-4" :status="session('status')" />--}}

{{--    <form wire:submit="sendPasswordResetLink">--}}
{{--        <!-- Email Address -->--}}
{{--        <div>--}}
{{--            <x-input-label for="email" :value="__('Email')" />--}}
{{--            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus />--}}
{{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <div class="flex items-center justify-end mt-4">--}}
{{--            <x-primary-button>--}}
{{--                {{ __('Email Password Reset Link') }}--}}
{{--            </x-primary-button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</div>--}}





<div class="authentication-wrapper authentication-cover authentication-bg">
    <div class="authentication-inner row">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 p-0">
            <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                <img src="{{ asset('images/auth-forgot-password-illustration-dark.png') }}" alt="لوگو" class="img-fluid my-5 auth-illustration">
                <img src="{{ asset('images/bg-shape-image-dark.png') }}" alt="لوگو" class="platform-bg">
            </div>
        </div>
        <!-- /Left Text -->
        <!-- Forgot Password -->
        <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
            <div class="w-px-400 mx-auto">
                <!-- Logo -->

                <!-- /Logo -->
                <h3 class="mb-1">رمز عبور را فراموش کرده اید؟ 🔒</h3>
                <p class="mb-4">ایمیل خود را وارد کنید و ما لینکی را جهت ثبت رمز جدید برای شما ارسال می کنیم</p>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form wire:submit="sendPasswordResetLink" class="mb-3 fv-plugins-bootstrap5 fv-plugins-framework">
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="email">ایمیل</label>

                        <input wire:model="email" class="form-control" id="email" name="email" placeholder="ایمیل خود را وارد کنید" type="email" required autofocus>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <button class="btn btn-primary d-grid w-100 waves-effect waves-light">ارسال لینک</button>
                    <input type="hidden"></form>
                <div class="text-center">

                    <a  wire:navigate href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
                        <i class="ti ti-chevron-left scaleX-n1-rtl"></i>
                        بازگشت به صفحه ورود
                    </a>
                </div>
            </div>
        </div>
        <!-- /Forgot Password -->
    </div>
</div>
