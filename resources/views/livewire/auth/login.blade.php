@push('styles')

@endpush

<div class=" authentication-wrapper authentication-cover authentication-bg">
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
                <form  class="mb-3" wire:submit.prevent="login">
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" >ایمیل </label>
                        <input type="text" wire:model="email"  autofocus="" class="form-control"  placeholder="ایمیل خود را وارد کنید" >
                        @error('email')
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            <span class="text-danger">{{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                    <div  x-data="{ show :  false }"  class="mb-3 form-password-toggle fv-plugins-icon-container">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">رمز عبور</label>
                            <a wire:navigate href="{{ route('password.request') }}">
                                <small>رمز عبور را فراموش کرده اید؟</small>
                            </a>
                        </div>
                        <div class="input-group input-group-merge has-validation">
                            <input  :type="show ? 'text' : 'password'" type="password"   aria-describedby="password" class="form-control"  placeholder="············" >
                            <span class="input-group-text cursor-pointer">
{{--                                <i class="fa-solid fa-eye-slash"></i>--}}
                                <i @click="show = !show"  :class="{'fa-eye-slash' : show}" class="fa-solid fa-eye"></i>
                            </span>
                        </div>
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" id="remember-me" type="checkbox">
                            <label class="form-check-label" for="remember-me"> مرا به خاطر بسپار</label>
                        </div>
                    </div>
                    <button class="btn btn-primary d-grid w-100 waves-effect waves-light">ورود</button>
                    <input type="hidden"></form>
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
