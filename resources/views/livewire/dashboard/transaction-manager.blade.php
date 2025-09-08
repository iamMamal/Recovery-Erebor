<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">پنل کاربری /</span>
        تراکنش ها
    </h4>

    <div class="row col-12">
        <div class="col my-3">
            <a wire:navigate href="{{route('dashboard.add-transaction')}}">
                <button class="btn btn-primary">واریز به حساب </button>
            </a>
        </div>
        <div class="col my-3">
            <a wire:navigate href="{{route('dashboard.bardasht-transaction')}}">
                <button class="btn btn-danger">برداشت از حساب </button>
            </a>
        </div>
    </div>

    <!-- Card Border Shadow -->

    <div class="row" >
        <div class="col-md-3 col-sm-6  mb-4">
            <div class="card card-border-shadow-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                                            <span class="avatar-initial rounded bg-label-primary">
                                                <i class="icon-size las la-wallet"></i>
                                            </span>
                        </div>
                        <h4 class="ms-1 mb-0 mx-2">{{number_format($totalDeposits)}}</h4>
                        <p>تومان</p>
                    </div>
                    <p class="mb-1">مجموع واریزی این ماه</p>
                    <p class="mb-0">
                                        <span class="fw-medium me-1">
                                           از تعداد حساب {{$accountsCount}}
                                        </span>
                    </p>
                </div>
            </div>
        </div>


        <div class="col-md-3 col-sm-6  mb-4">
            <div class="card card-border-shadow-info">
                @if($lastDeposit)
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                                            <span class="avatar-initial rounded bg-label-info">
                                                <i class="icon-size las la-coins"></i>
                                            </span>
                        </div>
                        <h4 class="ms-1 mb-0 mx-2">{{number_format($lastDeposit->amount)}}</h4>
                        <p>تومان</p>
                    </div>
                    <p class="mb-1">مبلغ آخرین واریزی</p>
                    <p class="mb-0">
                                        <span class="fw-medium me-1">
                                            به حساب {{$lastDeposit->account->title}}
                                        </span>
                    </p>
                </div>
                    @else
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                            <span class="avatar-initial rounded bg-label-info">
                                                <i class="icon-size las la-coins"></i>
                                            </span>
                            </div>
                            <h4 class="ms-1 mb-0 mx-2">0</h4>
                            <p>تومان</p>
                        </div>
                        <p class="mb-1">مبلغ آخرین واریزی</p>
                        <p class="mb-0">
                                        <span class="fw-medium me-1">
                                           هیچ واریزی ثبت نشده
                                        </span>
                        </p>
                    </div>
                @endif
            </div>
        </div>


        <div class="col-md-3 col-sm-6  mb-4">
            <div class="card card-border-shadow-warning">
                @if($lastBardasht)
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                                            <span class="avatar-initial rounded bg-label-warning">
                                                <i class="icon-size las la-money-bill-wave"></i>
                                            </span>
                        </div>
                        <h4 class="ms-1 mb-0 mx-2">{{number_format($lastBardasht->amount)}}</h4>
                        <p>تومان</p>
                    </div>
                    <p class="mb-1">آخرین برداشت</p>
                    <p class="mb-0">
                                        <span class="fw-medium me-1">
                                            از حساب {{$lastBardasht->account->title}}
                                        </span>
                    </p>
                </div>
                @else
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                            <span class="avatar-initial rounded bg-label-warning">
                                                <i class="icon-size las la-money-bill-wave"></i>
                                            </span>
                            </div>
                            <h4 class="ms-1 mb-0 mx-2">0</h4>
                            <p>تومان</p>
                        </div>
                        <p class="mb-1">آخرین برداشت</p>
                        <p class="mb-0">
                                        <span class="fw-medium me-1">
                                            هیچ برداشتی ثبت نشده
                                        </span>
                        </p>
                    </div>
                @endif
            </div>
        </div>


        <div class="col-md-3 col-sm-6  mb-4">
            <div class="card card-border-shadow-danger">
                @if($totalBardasht)
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                                            <span class="avatar-initial rounded bg-label-danger">
                                                <i class="icon-size las la-credit-card"></i>
                                            </span>
                        </div>
                        <h4 class="ms-1 mb-0 mx-2">{{number_format($totalBardasht)}}</h4>
                        <p>تومان</p>
                    </div>
                    <p class="mb-1">برداشت های این ماه</p>
                    <p class="mb-0">
                                        <span class="fw-medium me-1">
                                            تعداد برداشت {{$countBardasht}}
                                        </span>
                    </p>
                </div>
                @else
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                            <span class="avatar-initial rounded bg-label-danger">
                                                <i class="icon-size las la-credit-card"></i>
                                            </span>
                            </div>
                            <h4 class="ms-1 mb-0 mx-2">0</h4>
                            <p>تومان</p>
                        </div>
                        <p class="mb-1">برداشت های این ماه</p>
                        <p class="mb-0">
                                        <span class="fw-medium me-1">
                                            هیچ برداشتی نشده است
                                        </span>
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>



    <div class="row ">
        <div class="col-md-6 col-sm-12  mb-4">
            <div class="card">
                <div class="card-header header-elements">
                    <div class="card-action-element ms-auto py-0 mx-auto">
                        <p>خرج کرد کلی این ماه</p>
                    </div>
                </div>
                <div class="card-body">
                    <canvas class="mx-auto" id="horizontalBarChart" ></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12  mb-4">
            <div class="card">
                <div class="card-header header-elements">
                    <div class="card-action-element ms-auto py-0 mx-auto">
                        <p>10 خرج کرد آخر</p>
                    </div>
                </div>
                <div class="card-body">
                    <canvas class="mx-auto" id="horizontalBarChart2" ></canvas>
                </div>
            </div>
        </div>
    </div>


    <div class="col-12 order-5">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-title mb-0">
                    <h5 class="m-0 me-2"> تراکنش های اخیر ثبت شده</h5>
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
                                    rowspan="1" colspan="1">تراکنش
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1">از حساب
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1">مبلغ
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1">تاریخ
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lastTransactions as $trx)
                            <tr>

                                <td>
                                    <div class="d-flex align-items-center mb-2 pb-1">
                                        <div class="avatar me-2">
                                            <span class="avatar-initial rounded bg-label-dark">
                                                <i class="icon-size {{$trx->category->icon}}"></i>
                                            </span>
                                        </div>
                                        <h4 class="ms-1 mb-0 mx-2">{{$trx->category->name}}</h4>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-body">{{$trx->account->title}}</div>
                                </td>
                                <td>
                                    <div class="text-body">{{number_format($trx->amount)}}</div>
                                    <p>تومان</p>
                                </td>
                                <td><span>  {{ toJalaliDatetime($trx->transaction_date) }}</span></td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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


@push('scripts')

    <script>

        document.addEventListener('livewire:navigated', () => {
            if (window.myChart2) {
                window.myChart2.destroy();
            }
            let chartData = @json($chartData);

// اگر داده خالی بود، یه placeholder بگذار
            if (!chartData || chartData.length === 0) {
                chartData = [0]; // یا هر عدد پیش‌فرض
            }

            let chartLabels = @json($chartLabels); // اگر labels هم خالیه مشابه عمل کن
            if (!chartLabels || chartLabels.length === 0) {
                chartLabels = ['بدون داده'];
            }


            const canvas = document.getElementById('horizontalBarChart');
            if (canvas) {
                const ctx = canvas.getContext('2d');

                window.myChart2 = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: chartLabels,
                        datasets: [{
                            label: 'هزینه‌ها',
                            data: chartData,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: false,
                    }
                });
            }
        });
    </script>
    <script>
        document.addEventListener('livewire:navigated', () => {

            if (window.myChart) {
                window.myChart.destroy();
            }


            let chartData = @json($data2);

// اگر داده خالی بود، یه placeholder بگذار
            if (!chartData || chartData.length === 0) {
                chartData = [0]; // یا هر عدد پیش‌فرض
            }

            let chartLabels = @json($labels2); // اگر labels هم خالیه مشابه عمل کن
            if (!chartLabels || chartLabels.length === 0) {
                chartLabels = ['بدون داده'];
            }

            const canvas = document.getElementById('horizontalBarChart2');
            if (canvas){
                const ctx = canvas.getContext('2d');

                window.myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: chartLabels,
                        datasets: [{
                            label: 'تراکنش‌ها به تومان',
                            data: chartData,
                            borderWidth: 1,
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.6)',
                                'rgba(255, 99, 132, 0.6)',
                                'rgba(255, 206, 86, 0.6)',
                                'rgba(54, 162, 235, 0.6)',
                                'rgba(153, 102, 255, 0.6)'
                            ]
                        }]
                    },
                    options: {
                        indexAxis: 'y', // 👉 این باعث میشه افقی بشه
                        responsive: false,

                    }
                });
            }


        });
    </script>
@endpush
