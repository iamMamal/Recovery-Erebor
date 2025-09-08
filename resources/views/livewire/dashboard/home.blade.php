<div class="container-xxl flex-grow-1 container-p-y">


    <div class="row">
        <!-- View sales -->
        <div class="col-xl-4 mb-4 col-lg-5 col-12">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-7">
                        <div class="card-body text-nowrap">
                            <h5 class="card-title mb-0">سلام {{ $user->name }} ! 🎉</h5>
                            <p class="mb-2">ثبت خرج کرد جدید</p>
                            <a wire:navigate href="{{route('dashboard.bardasht-transaction')}}" class="btn btn-primary waves-effect waves-light" >ثبت تراکنش</a>
                        </div>
                    </div>
                    <div class="col-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img  height="140" src="{{ asset('images/card-advance-sale.png') }}" >
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8 mb-4 col-lg-7 col-12">
            <div class="card h-100">
                <div class="card-header">
                    <div class="d-flex justify-content-between mb-3">
                        <h5 class="card-title mb-0">آمار</h5>
                        <small class="text-muted">آخرین تراکنش 1 ماه پیش</small>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                    <i class="icon-size las la-wallet"></i>
                                </div>
                                <div class="card-info">
                                    @if($totalBalance)
                                    <h4 class="mb-0">{{number_format($totalBalance)}} تومان</h4>
                                    @else
                                        <h4 class="mb-0"> 0 تومان</h4>
                                    @endif
                                    <p>کل موجودی</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-info me-3 p-2">
                                    <i class="icon-size las la-wallet"></i>
                                </div>
                                <div class="card-info">
                                    @if($highest)
                                    <h4 class="mb-0">{{number_format($highest->balance)}} تومان </h4>
                                        <p>بیشترین موجودی حساب {{$highest->title}}</p>
                                    @else
                                        <h4 class="mb-0">0 تومان </h4>
                                    <p>بیشترین موجودی حساب </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-success me-3 p-2">
                                    <i class="icon-size las la-wallet"></i>
                                </div>
                                <div class="card-info">
                                    <h4 class="mb-0">{{number_format($totalDeposits)}} تومان</h4>
                                    <p>درآمد ماه جاری</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-warning me-3 p-2">
                                    <i class="icon-size las la-wallet"></i>
                                </div>
                                <div class="card-info">
                                    @if($totalBardasht)
                                    <h4 class="mb-0">{{number_format($totalBardasht)}} تومان</h4>
                                    @else
                                        <h4 class="mb-0">0</h4>
                                    @endif
                                    <p>هزینه ماه جاری</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <livewire:Dashboard.tips />
            <div class="col-xl-4 mb-4 col-lg-5 col-12">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body text-nowrap">
                                <h5 class="card-title mb-0"> مشاهده تراکنش ها </h5>
                                <p class="mb-2">مدیریت حساب ها</p>
                                <a wire:navigate href="{{route('dashboard.bank-manager')}}" class="btn btn-info waves-effect waves-light" >مشاهده حساب ها</a>
                            </div>
                        </div>
                        <div class="col-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img  height="140" src="{{ asset('images/girl-with-laptop.png') }}" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>



    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
