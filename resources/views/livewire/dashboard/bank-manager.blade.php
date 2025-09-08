<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-2">
            <span class="text-muted fw-light">پنل کاربری /</span>
            لیست حساب های بانکی
        </h4>
        <!-- Order List Widget -->
        <div class="card mb-4">
            <div class="card-widget-separator-wrapper">
                <div class="card-body card-widget-separator">
                    <div class="row gy-4 gy-sm-1">
                        <div class="col-sm-6 col-lg-3">
                            <div
                                class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                                <div>
                                    @if ($count == 0)
                                        <p class="mb-0 fw-medium text-red-500">شما هنوز حسابی ثبت نکرده اید</p>
                                    @else
                                        <div class="p-4">
                                            <h4 class="mb-2">{{$count}}</h4>
                                        </div>
                                    @endif
                                    <p class="mb-0 fw-medium">تعداد حساب های بانکی</p>
                                </div>
                                <span class="avatar me-sm-4">
                                                <span class="text-4xl">
                                                    💳
                                                </span>
                                            </span>
                            </div>
                            <hr class="d-none d-sm-block d-lg-none me-4">
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div
                                class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                                <div>
                                    @if ($totalBalance == 0)
                                        <p class="mb-0 fw-medium text-red-500">موجودی شما صفر است!</p>
                                    @else
                                        <div class="p-4">
                                            <h4 class="mb-2">{{ number_format($totalBalance) }} تومان</h4>
                                        </div>
                                    @endif
                                    <p class="mb-0 fw-medium"> موجودی حساب ها</p>
                                </div>
                                <span class="avatar p-2 me-lg-4">
                                                <span class="text-4xl">
                                                    💸
                                                </span>
                                            </span>
                            </div>
                            <hr class="d-none d-sm-block d-lg-none">
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div
                                class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
                                <div>

                                    @if (!$lastAccount)
                                        <p class="mb-0 fw-medium text-red-500">شما هنوز حسابی ثبت نکرده اید</p>
                                    @else
                                        <div class="p-4">
                                            <h4 class="mb-2">  آخرین حساب شما: {{ $lastAccount->title }} (موجودی: {{ number_format($lastAccount->balance) }} تومان)</h4>
                                        </div>
                                    @endif
                                    <p class="mb-0 fw-medium">اخرین حساب ثبت شده</p>
                                </div>
                                <span class="avatar p-2 me-sm-4">
                                                <span class="text-4xl">
                                                    🏦
                                                </span>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 my-auto">
                            <div class="d-flex justify-content-center align-items-center">
                                <div>
                                    <a wire:navigate href="{{route('dashboard.add-bank')}}">
                                   <button class="btn btn-primary">افزودن حساب جدید</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Order List Table -->
        <div class="card">
            <div class="card-datatable table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div
                        class="card-header pb-md-2 d-flex flex-column flex-md-row align-items-start align-items-md-center">
                    </div>
                    <table class="datatables-order table border-top dataTable no-footer dtr-column text-center"
                           id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1394px;">
                        <thead>
                        <tr>
                            <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1"
                                style="width: 0px; display: none;" aria-label=""></th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                style="width: 68px;" >شماره
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                style="width: 314px;">نام بانک
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                style="width: 133px;">موجودی
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                style="width: 127px;" >عملیات
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                style="width: 176px;" >ویرایش
                            </th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 60px;"
                                aria-label="عملیات">حذف حساب
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($accounts as $index => $account)
                        <tr class="odd">
                            <td class="  control" tabindex="0" style="display: none;"></td>
                            <td><span>{{ $index + 1 }}</span></td>
                            <td class="sorting_1"><span class="text-nowrap"><bdi>{{ $account->title }}</bdi></span></td>
                            <td>
                                <p>{{ number_format($account->balance) }} تومان</p>
                            </td>
                            <td>
                                    <button wire:navigate href="{{ route('dashboard.show-transaction-bank', ['id' => $account->id]) }}" class="btn btn-success"> تراکنش ها</button>
                            </td>
                            <td>
                                <button wire:navigate href="{{ route('dashboard.edit-bank', ['id' => $account->id]) }}" class="btn btn-warning">ویرایش</button>
                            </td>
                            <td>
                                <button wire:click.prevent="deleteConfirmation({{ $account->id }})" class="btn btn-danger"> حذف </button>
                            </td>

                        </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">هیچ حسابی ثبت نشده است.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <br/>
                    <br/>
                    <br/>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
    <!-- Footer -->

    <!-- / Footer -->
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

@if (session()->has('error'))
    <script src="{{ asset('js/sweetalert2.all.js') }}"></script>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'خطا!',
            text: {!! json_encode(session('error')) !!},
            confirmButtonText: 'باشه'
        });
    </script>
@endif





