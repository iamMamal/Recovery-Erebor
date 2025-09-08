@push('styles')
    <Style>
        .parent input {
            background: unset; /* یا none */
        }
    </Style>
@endpush
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-0">
        <span class="text-muted fw-light">
            پنل کاربری /قسط و بدهی  /
        </span>
        ثبت اقساط
    </h4>
    <div class="app-ecommerce">
        <!-- Add Product -->
        <div class="row">
            <!-- First column-->
            <div class="col-12">
                <!-- Product Information -->

                <form wire:submit.prevent="save" class="mb-3">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-tile mb-0">ثبت اقساط</h5>
                        </div>
                        <div class="card-body">

                            <div class="mb-3"
                                 x-data="{

                                            balance: '',
                                            resultText: '',
                                            formatNumber(value) {
                                                const raw = value.toString().replace(/,/g, '').replace(/[^\d]/g, '');
                                                return raw ? Number(raw).toLocaleString('en-US') : '';
                                            },
                                            init() {
                                                this.$watch('balance', value => {
                                                    testLog(value, (result2, result) => {
                                                        this.balance = result;
                                                        this.resultText = result2;

                                                    });
                                                });
                                            }
                                        }"
                            >
                                <label class="form-label">مبلغ هر قسط</label>
                                <input
                                    @input="balance = formatNumber($event.target.value)"
                                    @blur="@this.set('balance', balance.replace(/,/g, ''))"
                                    x-model="balance"  wire:model.live="balance"
                                    class="form-control"
                                    placeholder="مبلغ اقساط" type="text"
                                    style="background-color: unset">
                                <p class="mt-2 text-green-400">مبلغ وارد شده: <span x-text="resultText"></span> تومان</p>
                                <x-input-error :messages="$errors->get('balance')" class="mt-2"/>
                            </div>


                        </div>

                        <div class="col">
                            <div class="card">
                                <h5 class="card-header">انتخاب بدهی یا طلب</h5>
                                <div class="card-body">
                                    <div class="row">
                                        @foreach($debts as $debt)
                                            <div class="col-md-2 mb-md-0 mb-2">
                                                <div class="form-check custom-option custom-option-icon {{ $debtChose == $debt->id ? 'checked' : '' }}  ">
                                                    <label class="form-check-label custom-option-content" for="customRadioBank{{$debt->id}}">
                                                    <span class="custom-option-body">
                                                        <i class="las la-credit-card"></i>
                                                        <span class="custom-option-title">{{$debt->title}}</span>
                                                        <small> مبلغ کل  : {{ number_format($debt->total_amount) }} تومان</small>
                                                    </span>
                                                        <input  wire:model.live="debtChose" class="form-check-input" id="customRadioBank{{$debt->id}}" name="customRadioBank{{$debt->id}}" type="radio" value="{{$debt->id}}">
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                        <x-input-error :messages="$errors->get('debtChose')" class="mt-2"/>
                                    </div>
                                </div>





                            </div>
                        </div>

                        <br/>
                        <div class="col-md-6 col-12 mb-4 mx-auto parent">
                            <label class="form-label" > انتخاب تاریخ شروع قسط اول</label>

                            <x-persian-datepicker
                                wirePropertyName="careerDate"
                                showFormat="jYYYY/jMM/jDD"
                                returnFormat="X"
                                :required="true"
                                :defaultDate="date('Y-m-d H:i:s')"
                                :setNullInput="true"
                                :withTime="true"
                                :ignoreWire="true"
                                :withTimeSeconds="false"
                            />
                            <x-input-error :messages="$errors->get('careerDate')" class="mt-2"/>

                        </div>

                        <br/>
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">بازه روزانه بین اقساط</label>
                                                <input wire:model="period" class="form-control" placeholder="مثلا 30"
                                                       type="number" style="background-color: unset">
                                                <x-input-error :messages="$errors->get('period')" class="mt-2"/>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">تعداد اقساط این بدهی</label>
                                                <input wire:model="count" class="form-control" placeholder="مثلا 10"
                                                       type="number" style="background-color: unset">
                                                <x-input-error :messages="$errors->get('count')" class="mt-2"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <br/>
                    <div class="d-flex align-content-center flex-wrap gap-3">
                        <button  type="submit" wire:loading.attr='disabled'
                                 class="btn btn-primary waves-effect waves-light">ثبت
                        </button>
                        <div
                            class="d-flex gap-3">
                            <a href="{{route('dashboard.debt-manager')}}" wire:navigate>
                                <button class="btn btn-danger waves-effect">برگشت</button>
                            </a>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>




</div>



