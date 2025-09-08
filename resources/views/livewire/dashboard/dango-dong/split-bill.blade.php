
<div class="container-xxl flex-grow-1 container-p-y">
        <div class="app-ecommerce">
            <div
                class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
                <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1 mt-3">دنگ و دونگ را راحت حساب کنید</h4>
                    <p class="text-muted">
                        نگران حساب‌ها و تقسیم هزینه‌ها نباشید! اینجا می‌تونید خرج‌های مشترک و شخصی رو ثبت کنید، سهم هر کس رو ببینید و بدون دردسر تسویه کنید. فقط کافی‌ست کاربرها و مبالغ رو وارد کنید، باقی کار رو سیستم خودش محاسبه می‌کنه.
                    </p>
                    <p class="text-muted">
                        اگر هم مبلغ خرج هر کسی فرق میکرد مانند : شام که هرکی هر چیزی سفارش میده تو قسمت خرج شخصی  وارد کنید
                    </p>
                </div>

            </div>
    <!-- افزودن کاربر -->
            <div class="row">
                <!-- First column-->
                <div class="col-12">

    <div class="space-y-2">
        <div class="mb-3">
            <label class="form-label">👥 کاربران</label>
            <div class="flex space-x-2">
                <input type="text" wire:model="newUser" placeholder="نام کاربر"
                       class="form-control flex-1" style="background-color: unset">
                <button wire:click="addUser"
                        class="btn btn-primary waves-effect waves-light">
                     افزودن
                </button>
            </div>
        </div>
        <div class="col-lg-6 mb-4 mb-xl-0">
            <small class="text-light fw-medium">لیست کاربران</small>
            <div class="demo-inline-spacing mt-3">
                <ol class="list-group list-group-numbered">
                    @foreach($users as $u)
                    <li class="list-group-item">{{ $u }}</li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>

    <!-- خرج مشترک -->
    <div class="col-md mb-4 mb-md-0 mt-3">
        <div class="card">
            <div class="card-header">
                🍕 خرج مشترک
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label" for="bs-validation-country">انتخاب کاربر</label>
                    <select class="form-select" id="bs-validation-country" wire:model="sharedUser" style="background: unset">
                        <option value="">انتخاب کاربر</option>
                        @foreach($users as $u)
                            <option value="{{ $u }}">{{ $u }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="bs-validation-name">مبلغ</label>
                    <input class="form-control"  placeholder="مبلغ" type="number" wire:model="sharedAmount" style="background: unset">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="bs-validation-name">توضیح</label>
                    <input class="form-control"  placeholder="توضیح" type="text" wire:model="sharedDesc" style="background: unset">
                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-primary waves-effect waves-light" wire:click="addSharedExpense" >ثبت</button>
                    </div>
                </div>
            </div>
        </div>
        <ul class="list-disc ml-5">
            @foreach($sharedExpenses as $index => $exp)
                <li>{{ $exp['user'] }} پرداخت {{ $exp['amount'] }} ({{ $exp['description'] }}) - باقی‌مانده: {{ $exp['remaining'] }}</li>
            @endforeach
        </ul>
    </div>

    <!-- خرج شخصی -->
                    <div class="col-md mb-4 mb-md-0 mt-3">
                        <div class="card">
                            <div class="card-header">
                                🍔 خرج شخصی
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-country">انتخاب کاربر</label>
                                    <select class="form-select" id="bs-validation-country" wire:model="personalUser" style="background: unset">
                                        <option value="">انتخاب کاربر</option>
                                        @foreach($users as $u)
                                            <option value="{{ $u }}">{{ $u }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name">مبلغ</label>
                                    <input class="form-control"  placeholder="مبلغ" type="number" wire:model="personalAmount" style="background: unset">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-country">انتخاب خرج مشترک</label>
                                    <select class="form-select" id="bs-validation-country" wire:model="personalSharedExpense" style="background: unset">
                                        <option value="">انتخاب خرج مشترک</option>
                                        @foreach($sharedExpenses as $index => $exp)
                                            <option value="{{ $index }}">{{ $exp['description'] }} ({{ $exp['remaining'] }} باقی‌مانده)</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name">توضیح</label>
                                    <input class="form-control"  placeholder="توضیح" type="text" wire:model="personalDesc" style="background: unset">
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-primary waves-effect waves-light" wire:click="addPersonalExpense" >ثبت</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-disc ml-5">
                            @foreach($personalExpenses as $exp)
                                <li>{{ $exp['user'] }} سهم شخصی {{ $exp['amount'] }} از "{{ $sharedExpenses[$exp['sharedExpenseIndex']]['description'] ?? '' }}" ({{ $exp['description'] }})</li>
                            @endforeach
                        </ul>
                    </div>

    <!-- محاسبه -->
    <div class="mt-2">
        <button wire:click="calculate" class="bg-red-500 text-white px-4 py-2 rounded">📊 محاسبه</button>
    </div>

    <!-- نتایج -->
    @if($finalDebts)
        <div class="mt-4">
            <h2 class="text-lg font-bold">نتیجه تسویه نهایی</h2>
            <ul class="list-disc ml-5">
                @foreach($finalDebts as $d)
                    <li>{{ $d }}</li>
                @endforeach
            </ul>
        </div>
    @endif

                </div>
            </div>
</div>
</div>
