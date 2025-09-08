<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">پنل کاربری /</span>
        هدف پس انداز
    </h4>

    <div class="row col-12">
        <div class="col my-3">
            <a wire:navigate href="{{route('dashboard.add-goal')}}">
                <button class="btn rounded-pill btn-outline-reddit waves-effect my-2" type="button">
                    ثبت یا ویرایش هدف پس انداز
                </button>
            </a>
            @if($details!==null)
                    <button wire:click.prevent="deleteConfirmation({{ $details->id }})" class="mx-2 my-2 btn rounded-pill btn-outline-youtube waves-effect" type="button">
                         حذف هدف پس انداز
                    </button>
                <a wire:navigate href="{{route('dashboard.add-saving-transaction')}}">
                    <button class="btn rounded-pill btn-primary waves-effect my-2" type="button">
                        ثبت تراکنش برای پس انداز
                    </button>
                </a>
            @endif
        </div>
        <a  href="{{route('dashboard.saving-manager')}}">
        <button class="btn rounded-pill btn-info waves-effect my-2" >به روزرسانی چارت</button>
        </a>

    </div>
    <!-- Card Border Shadow -->


    <div class="col-12 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between pb-0">
                <div class="card-title mb-0">
                    <h5 class="mb-0">گزارش هدف پس انداز -
                        @empty($details->title)
                           <span class="text-danger"> هیچ هدفی ثبت نشده هنوز</span>
                        @else
                            {{ $details->title }}
                        @endempty
                    </h5>
                    <small class="text-muted">آخرین واریزی 7 روز گذشته </small>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-4 col-md-12 col-lg-4">
                        <div class="mt-lg-4 mt-lg-2 mb-lg-4 mb-2 pt-3 border-b-2 border-yellow-500">
                            @if($details !==null && $details->transactions->count())
                                <h1 class="mb-0 lh-80p">{{$details->transactions->count()}}</h1>
                            @else
                                <h1 class="mb-0 lh-80p">0</h1>
                            @endif
                            <p class="mb-0">کل تراکنش ها برای پس انداز</p>
                        </div>
                        <div class="mt-lg-4 mt-lg-2 mb-lg-4 mb-2 pt-3 border-b-2 border-cyan-500">
                            <h1 class="mb-0 lh-80p">
                                @empty($details->target_date)
                                    <span class="text-danger"> هیچ هدفی ثبت نشده هنوز</span>
                                @else
                                {{jalaliDiffForHumans($details->target_date)}}
                                @endempty
                            </h1>
                            <p class="mb-0">تاریخ برنامه ریزی شده برای رسیدن به هدف</p>
                        </div>
                        <div class="mt-lg-4 mt-lg-2 mb-lg-4 mb-2 pt-3 border-b-2 border-red-900">
                            <h1 class="mb-0 lh-80p">
                                @empty($details->target_amount)
                                    <span class="text-danger"> هیچ هدفی ثبت نشده هنوز</span>
                                @else
                                    {{number_format($details->target_amount)}}
                                    تومان
                                @endempty
                            </h1>
                            <p class="mb-0">مبلغ هدف مورد نظر</p>
                        </div>
                        <div class="mt-lg-4 mt-lg-2 mb-lg-4 mb-2 pt-3 border-b-2 border-purple-600 ">
                            <h1 class="mb-0 lh-80p">
                                @empty($details->target_amount)
                                    <span class="text-danger"> هیچ واریزی ثبت نشده هنوز</span>
                                @else
                                    {{number_format($details->amount)}}
                                    تومان
                                @endempty
                            </h1>
                            <p class="mb-0">مبلغ تا کنون پس انداز شده </p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-8 col-md-12 col-lg-8" style="position: relative;">
                        <div id="goal-progress-1" >
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="col-12 order-5">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-title mb-0">
                    <h5 class="m-0 me-2">پس انداز های ثبت شده</h5>
                </div>
            </div>
            <div class="card-datatable table-responsive ">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="table-responsive">
                        <table class="dt-route-vehicles table dataTable no-footer dtr-column" id="DataTables_Table_0"
                               aria-describedby="DataTables_Table_0_info" style="width: 100%;">
                            <thead class="border-top">
                            <tr>
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0"
                                    rowspan="1" colspan="1">شماره
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1">مبلغ
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1">تاریخ
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1">توضیحات
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1">ویرایش
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1">حذف
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($details !==null && $transactionPage !==null)
                            @foreach ($transactionPage as  $index => $transaction)
                            <tr>
                                <td>
                                    <div class="text-body">{{$index+1}}</div>
                                </td>
                                <td>

                                    @if($transaction->type==1)
                                        <div class="text-body">{{$transaction->amount}}</div>
                                        <p class="text-success">واریز</p>
                                    @else
                                        <div class="text-body">{{$transaction->amount}}</div>
                                        <p class="text-danger">برداشت</p>
                                    @endif


                                </td>
                                <td><span> {{toJalaliDatetime($transaction->created_at)}}</span></td>
                                <td><span>  {{$transaction->description}}</span></td>
                                <td>
                                    <button wire:navigate href="{{ route('dashboard.edit-saving-transaction', ['id' => $transaction->id]) }}" class="btn btn-warning mx-2">ویرایش</button>

                                </td>
                                <td>   <button wire:click.prevent="deleteConfirmation1({{ $transaction->id }})" class="btn btn-danger"> حذف </button></td>
                            </tr>

                            @endforeach
                            @else
                                <tr>
                                    <td>
                            <p class="text-danger">هیچ تراکنشی ثبت نشده</p>
                                    </td>
                                </tr>
                            @endif
                            </tbody>

                        </table>

                    </div>
                    @if($details !==null && $transactionPage !==null)
                    <div class="row d-flex align-items-center">
                        <div class="col-sm-12 col-md-6 my-4">
                            <div class="dataTables_info pt-0" id="DataTables_Table_0_info" role="status"
                                 aria-live="polite">{{ $transactionPage->links() }}
                            </div>
                        </div>
                        <!-- دکمه‌های صفحه بندی -->

                    </div>
                    @endif

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

@if (session()->has('success1'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'خطا!',
                text: '{{ session('success1') }}',
                confirmButtonText: 'باشه'
            });
        });
    </script>
@endif


@push('scripts')

    <script>
        document.addEventListener('livewire:navigated', () => {
            const el = document.querySelector("#goal-progress-1");
            if (!el) return; // المنت هنوز نیست، خطا نمی‌ده

            // اگر می‌خوای بررسی innerHTML انجام بدی
            if (el.innerHTML.trim() !== '') return;

            var options = {
                series: [@json($progress)],
                chart: {
                    height: 350,
                    type: 'radialBar',
                    offsetY: -10,
                },
                plotOptions: {
                    radialBar: {
                        startAngle: -135,
                        endAngle: 135,
                        dataLabels: {
                            name: {
                                fontSize: '16px',
                                color: '#e2be00',
                                offsetY: 120
                            },
                            value: {
                                offsetY: 76,
                                fontSize: '22px',
                                color: '#e2be00',
                                formatter: function (val) {
                                    return val + "%";
                                }
                            }
                        }
                    }
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'light',
                        shadeIntensity: 0.8,
                        gradientToColors: ['#5e44a1'],
                        inverseColors: false,
                        opacityFrom: 0.9,
                        opacityTo: 1,
                        stops: [0, 70, 100]
                    },
                    colors: ['#5809cf']
                },
                stroke: {
                    dashArray: 7
                },
                labels: ['درصد پیشرفت هدف'],
            };

            chartInstance = new ApexCharts(el, options);
            chartInstance.render();
        });

    </script>

@endpush
