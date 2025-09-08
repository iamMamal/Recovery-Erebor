<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card bg-transparent shadow-none my-4 border-0">
        <div class="card-body row p-0 pb-3">
            <div class="col-12 col-md-8 card-separator">
                <p class="text-xl">به بخش اقساط خوش آمدید، {{$user->name}} 👋🏻</p>
                <div class="col-12 my-4">
                    <p class="text-base">اینجا می‌تونی همه‌ی قسط‌ها و موعدهای مالی‌ت رو مدیریت کنی؛ چه قسط‌هایی که باید
                        بدی مثل وام و قسط خونه، چه پول‌هایی که قراره بهت برسه مثل اجاره یا سود بانکی.

                        هر قسط رو با مبلغ و تاریخش ثبت کن تا یادت نره و به‌موقع پرداخت یا دریافتش کنی. اینطوری همیشه
                        حواست به پول‌هات هست و چیزی از قلم نمی‌افته.</p>
                </div>
                <br>
                <div class="d-flex justify-content-between flex-wrap gap-3 me-5">
                    <div class="d-flex align-items-center gap-3 me-4 me-sm-0">
                        <span class="bg-label-primary p-2 rounded">
                            <i class="icon-size las la-laptop-code ti-xl"></i>
                        </span>
                        <div class="content-right">
                            <p class="mb-0">اقساط ثبت شده</p>
                            <h4 class="text-primary mb-0 text-xl">{{$installmentsCount}}
                            </h4>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <span class="bg-label-info p-2 rounded">
                            <i class="lab la-tripadvisor icon-size ti-xl"></i>
                        </span>
                        <div class="content-right">
                            <p class="mb-0">مبلغ کل اقساط پرداخت ‌نشده</p>
                            <h4 class="text-info mb-0 text-xl">{{number_format($totalUnpaidDebt)}}</h4>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <span class="bg-label-warning p-2 rounded">
                            <i class="las la-chart-bar icon-size ti-xl"></i>
                        </span>
                        <div class="content-right">
                            <p class="mb-0">بیشترین طلب فعال</p>
                            <h4 class="text-warning mb-0 text-xl">{{$titleClaim}}-{{number_format($amountClaim)}}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 ps-md-3 ps-lg-4 pt-3 pt-md-0">
                <div class="d-flex justify-content-center align-items-center" style="position: relative;">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="bg-label-primary rounded-3 text-center mb-3 pt-4 flex justify-center">
                                <img class="img-fluid" src="{{ asset('images/girl-with-laptop.png') }}" width="140"/>
                            </div>
                            <p class="mb-2 pb-1 text-lg">اقساط رو مدیریت کن</p>
                            <p class="small"> ثبت ورودی و خروجی های مالی با تاریخ مشخص</p>
                        </div>
                        <a href="{{route('dashboard.add-debt')}}" wire:navigate
                           class="btn btn-primary w-100 waves-effect waves-light">ثبت بدهی یا طلب</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body row p-0 pb-3">


        <div class="col-12 col-md-8 mb-4 mb-lg-0">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title m-0 me-2 text-lg">10 قسط آینده</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderless border-top">
                        <thead class="border-bottom">
                        <tr>
                            <th>شماره</th>
                            <th>نام قسط</th>
                            <th>تاریخ</th>
                            <th>وضعیت</th>
                            <th>مبلغ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($nextInstallments as $installment)
                            <tr class="border" >
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $installment->debt->title }}</td>
                                <td>{{ toJalaliDatetimeWithoutHour($installment->due_date) }}</td>
                                <td class="badge {{ $installment->debt->type == 0 ? ' bg-label-warning' : 'bg-label-success' }}">{{ $installment->debt->type == 0 ? 'بدهی' : 'طلب' }}</td>
                                <td>{{ number_format($installment->amount) }} تومان</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">قسط آینده‌ای وجود ندارد</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title mb-0 content-around">
                        <span class="mb-0 text-lg">بدهی یا طلب فعال</span>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        @forelse($allDebts as $debt)
                            @php
                                $totalInstallments = $debt->installments()->count();
                                $paidInstallments  = $debt->installments()->where('is_paid', true)->count();
                                $progress = $totalInstallments > 0 ? ($paidInstallments / $totalInstallments) * 100 : 0;
                            @endphp
                            <li class="mb-3 pb-1 d-flex">
                                <div class="d-flex w-50 align-items-center me-3">
                                    <div>
                                        <h6 class="mb-0">{{$debt->title}}</h6>
                                        <small class="text-muted m-0 text-base">تعداد
                                            قسط {{$debt->installments()->count()}}</small>
                                    </div>
                                </div>
                                <div class="d-flex flex-grow-1 align-items-center">
                                    <div class="progress w-100 me-3" style="height: 8px">
                                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="54"
                                             class="progress-bar bg-danger" role="progressbar"
                                             style="width: {{$progress}}%"></div>
                                    </div>
                                    <span class="text-muted">{{$progress}}%</span>
                                </div>
                            </li>
                        @empty
                            <li class="mb-3 pb-1 d-flex">
                                <div class="d-flex w-50 align-items-center me-3">
                                    <div>
                                        <h6 class="mb-0">هیچ بدهی یا طلب فعالی نیست</h6>
                                    </div>
                                </div>
                                <div class="d-flex flex-grow-1 align-items-center">
                                    <div class="progress w-100 me-3" style="height: 8px">
                                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="54"
                                             class="progress-bar bg-danger" role="progressbar"
                                             style="width: 100%"></div>
                                    </div>
                                    <span class="text-muted">100%</span>
                                </div>
                            </li>
                        @endforelse


                    </ul>
                </div>
                <div class="card-footer text-center">
                        <a wire:navigate href="{{route('dashboard.add-installment')}}">
                    <button class="btn btn-primary w-100 waves-effect waves-light">

                            افزودن تعداد اقساط
                    </button>
                        </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <h5 class="card-header text-lg">تمامی ورودی خروجی های ثابت</h5>
        <div class="card-datatable text-nowrap">
            <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                    <div id="DataTables_Table_1_filter" class="dataTables_filter">
                        <label>جستجو:<input type="text" wire:model.live.debounce.300ms="search" placeholder="جستجو بر اساس نام..."
                                            style="background: unset"></label>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="dt-complex-header table table-bordered dataTable no-footer" id="DataTables_Table_1"
                           aria-describedby="DataTables_Table_1_info">
                        <thead>
                        <tr>
                            <th rowspan="2" class="sorting sorting_asc" tabindex="0"
                                colspan="1" aria-label="نام: activate to sort column descending"
                            >نام
                            </th>
                            <th colspan="3" rowspan="1">اطلاعات</th>
                            <th colspan="2" rowspan="1">عملیات</th>
                            <th colspan="3" rowspan="1">تنظیمات</th>

                        </tr>
                        <tr>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1">
                                مبلغ کل
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                            >مبلغ هر قسط
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                            >تعداد قسط - پرداخت شده
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                            >وضعیت
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                            >نوع
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                            >تغییر وضعیت
                            </th>
                            <th class="text-center" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                            >حذف بدهی یا طلب
                            </th>
                            <th class="text-center" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                            >مشاهده اقساط
                            </th>


                        </tr>
                        </thead>
                        <tbody >
                        @forelse($searchDebts as $debtsearch)
                            <tr class="odd" wire:key="{{ $debtsearch->id }}">
                                <td class="sorting_1">{{$debtsearch->title}}</td>
                                <td>{{number_format($debtsearch->total_amount)}}
                                <td>{{ number_format(optional($debtsearch->installments->first())->amount ?? 0) }} </td>
                                <td>{{$debtsearch->paid_installments_count}} از {{$debtsearch->installments_count}}</td>
                                <td>
                                  <span class="{{ $debtsearch->is_settled ? 'text-green-600' : 'text-orange-500' }}">
                                    {{ $debtsearch->is_settled ? 'تسویه شده' : 'در حال انجام' }}
                                 </span>
                                </td>
                                <td>
                                  <span class="badge {{ $debtsearch->type ==1 ? 'bg-label-success' : 'bg-label-warning' }}">
                                    {{ $debtsearch->type ==1 ? 'طلب' : 'بدهی' }}
                                 </span>
                                </td>
                                <td>
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect1">انتخاب تغییر
                                            وضعیت</label>

                                        <select wire:model="status.{{ $debtsearch->id }}" wire:change="updateStatus({{ $debtsearch->id }})" style="background: unset" class="form-select">
                                            <option value="0">در حال انجام</option>
                                            <option value="1">تسویه شده</option>
                                        </select>

                                    </div>
                                </td>
                                <td class="text-center">
                                    <button wire:click.prevent="deleteConfirmation({{ $debtsearch->id }})" class="btn btn-outline-dribbble ">حذف</button>
                                </td>
                                <td class="text-center">
                                    <button wire:navigate href="{{ route('dashboard.show-installment', ['id' => $debtsearch->id]) }}" class="btn btn-outline-google-plus">مشاهده اقساط</button>
                                </td>
                            </tr>
                        @empty
                            <p>اطلاعات وارد کنید ، داده بدهید تا این جداول فعال بشوند</p>
                        @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="footer">
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>


@if (session()->has('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'موفقیت!',
                text: '{{ session('success') }}',
                confirmButtonText: 'باشه'
            });
        });
    </script>
@endif
