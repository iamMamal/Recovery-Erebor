<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-0">
        <span class="text-muted fw-light">
            پنل کاربری /هدف پس انداز /
        </span>
        ویرایش تراکنش
    </h4>
    <div class="app-ecommerce">
        <!-- Add Product -->
        <div class="row">
            <!-- First column-->
            <div class="col-12">
                <!-- Product Information -->

                <form wire:submit.prevent="update" class="mb-3">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-tile mb-0">تراکنش هدف پس انداز</h5>
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
                                <label class="form-label">مبلغ</label>
                                <input
                                    @input="balance = formatNumber($event.target.value)"
                                    @blur="@this.set('balance', balance.replace(/,/g, ''))"
                                    x-model="balance"  wire:model.live="balance"
                                    class="form-control"
                                    placeholder="مبلغ واریزی به حساب" type="text"
                                    style="background-color: unset">
                                <p class="mt-2 text-green-400">مبلغ وارد شده: <span x-text="resultText"></span> تومان</p>
                                <x-input-error :messages="$errors->get('balance')" class="mt-2"/>
                            </div>


                        </div>

                        <div class="col">
                            <div class="card">
                                <h5 class="card-header">انتخاب نوع تراکنش</h5>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-2 mb-md-0 mb-2">
                                            <div class="form-check custom-option custom-option-icon {{ $selectedOption === 'option2' ? 'checked' : '' }}"
                                                 wire:click="selectOption('option2')">
                                                <label class="form-check-label custom-option-content " for="customRadioVarizi" >
                                                    <span class="custom-option-body">
                                                        <i class="las la-credit-card"></i>
                                                        <span class="custom-option-title">واریز به پس انداز</span>
                                                    </span>
                                                    <input  wire:model.live="type" class="form-check-input" id="customRadioVarizi" name="customRadio" type="radio" value=1>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-md-0 mb-2">
                                            <div class="form-check custom-option custom-option-icon {{ $selectedOption === 'option1' ? 'checked' : '' }}"
                                                 wire:click="selectOption('option1')" >
                                                <label class="form-check-label custom-option-content" for="customRadioBardasht" >
                                                    <span class="custom-option-body">
                                                        <i class="las la-credit-card"></i>
                                                        <span class="custom-option-title">برداشت از پس انداز</span>
                                                    </span>
                                                    <input  wire:model.live="type" class="form-check-input" id="customRadioBardasht" name="customRadio" type="radio" value=0>
                                                </label>
                                            </div>
                                        </div>
                                        <x-input-error :messages="$errors->get('type')" class="mt-2"/>
                                    </div>
                                </div>


                            </div>
                        </div>


                        <br/>
                        <div class="col-12">
                            <div class="card mb-4">
                                <h5 class="card-header"> توضیحات برای واریزی (اختیاری ، فقط جهت یادآوری است )</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <textarea wire:model="description" class="form-control bootstrap-maxlength-example"  maxlength="255" rows="3"></textarea>
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
                            <a href="{{route('dashboard.saving-manager')}}" wire:navigate>
                                <button class="btn btn-danger waves-effect">برگشت</button>
                            </a>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>




</div>



