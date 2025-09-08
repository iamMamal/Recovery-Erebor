<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-0">
        <span class="text-muted fw-light">
            پنل کاربری /لیست حساب های بانکی /
        </span>
        ویرایش حساب بانکی
    </h4>
    <div class="app-ecommerce">
        <!-- Add Product -->
        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1 mt-3">یک حساب جدید اضافه کنید</h4>
                <p class="text-danger"> اگر برای تراز حساب کاربری می خواهید ویرایش کنید پیشنهاد میشود از قسمت ثبت تراکنش مقدار را کم و زیاد کنید </p>
                <p class="text-muted"> ویرایش برای تفییر نام حساب و مقدار اولیه قبل از ثبت تراکنش برای این حساب پیشنهاد می شود
                    </p>
            </div>

        </div>
        <div class="row">
            <!-- First column-->
            <div class="col-12">
                <!-- Product Information -->

                <form wire:submit.prevent="update" class="mb-3">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-tile mb-0">اطلاعات حساب</h5>
                        </div>
                        <div class="card-body">

                            <div class="mb-3"

                            >
                                <label class="form-label"> موجودی قابل ویرایش نیست و از قسمت ثبت تراکنش موجودی حساب را ویرایش کنید</label>
                                <input
                                    disabled
                                         wire:model="balance" class="form-control"
                                         placeholder=" موجودی اولیه حساب بانکی" type="text"
                                         style="background-color: unset">
                                <p class="mt-2 text-green-400">مبلغ وارد شده: <span x-text="resultText"></span> تومان</p>
                                <x-input-error :messages="$errors->get('balance')" class="mt-2"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">نام حساب</label>
                                <input wire:model="title" class="form-control" placeholder="عنوان حساب بانکی"
                                       type="text" style="background-color: unset">
                                <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                            </div>
                        </div>

                    </div>
                    <br/>
                    <div class="d-flex align-content-center flex-wrap gap-3">
                        <button  type="submit" wire:loading.attr='disabled'
                                 class="btn btn-primary waves-effect waves-light">ثبت حساب
                        </button>
                        <div
                            class="d-flex gap-3">
                            <a href="{{route('dashboard.bank-manager')}}" wire:navigate>
                                <button class="btn btn-danger waves-effect">برگشت</button>
                            </a>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>



