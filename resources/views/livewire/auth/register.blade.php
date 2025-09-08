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
                <form  class="mb-3 fv-plugins-bootstrap5 fv-plugins-framework">
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="username">نام کاربری</label>
                        <input autofocus="" class="form-control" id="username" name="username" placeholder="نام کاربری خود را وارد کنید" type="text">
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>

                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="email">ایمیل</label>
                        <input type="text" wire:model="email"  autofocus="" class="form-control"  placeholder="ایمیل خود را وارد کنید" >
                        @error('email')
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            <span class="text-danger">{{ $message }}</span>
                        </div>
                        @enderror
                    </div>


                    <div class="mb-3 form-password-toggle fv-plugins-icon-container">
                        <label class="form-label" for="password">کلمه عبور</label>
                        <div x-data="{ show :  false }"  class="input-group input-group-merge has-validation">
                            <input  :type="show ? 'text' : 'password'" type="password"   aria-describedby="password" class="form-control"  placeholder="············" >
                            <span class="input-group-text cursor-pointer">
                                <i @click="show = !show"  :class="{'fa-eye-slash' : show}" class="fa-solid fa-eye"></i>
                            </span>
                        </div>
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">

                        </div>
                    </div>



                    <div class="mb-3 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                        <div class="form-check">
                            <input class="form-check-input" id="terms-conditions" name="terms" type="checkbox">
                            <label class="form-check-label" for="terms-conditions"> من با سیاست
                                <a href="javascript:void(0);">حفظ حریم خصوصی و شرایط</a>
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
