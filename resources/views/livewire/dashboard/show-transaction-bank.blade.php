<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">پنل کاربری /</span>
        مشاهده تراکنش های حساب {{$account->title}}
    </h4>

    <div class="d-flex gap-3 my-4 ">
        <a href="{{route('dashboard.bank-manager')}}" wire:navigate>
            <button class=" btn btn-danger waves-effect">برگشت</button>
        </a>
    </div>

    <div class="col-12 order-5">

        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-title mb-0">
                    <h5 class="m-0 me-2">تراکنش های مربوطه حساب {{$account->title}}</h5>
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
                                    rowspan="1" colspan="1"
                                    aria-label="محل: activate to sort column descending" aria-sort="ascending">تراکنش
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1"
                                    aria-label="مقصد: activate to sort column ascending">مبلغ
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1"
                                    aria-label="هشدارها: activate to sort column ascending">تاریخ
                                </th>
                                <th class=" sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1"
                                    aria-label="درصد پیشروی: activate to sort column ascending">توضیحات
                                </th>
                                <th class=" sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1"
                                    aria-label="درصد پیشروی: activate to sort column ascending">ویرایش
                                </th>
                                <th class=" sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1"
                                    aria-label="درصد پیشروی: activate to sort column ascending">حذف
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($transactions as $transaction)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center mb-2 pb-1">
                                            <div class="avatar me-2">
                                                @if($transaction->category->id <=8 )
                                                    <span class="avatar-initial rounded bg-label-info">
                                                <i class="icon-size {{$transaction->category->icon}}"></i>
                                                     </span>
                                            </div>
                                            <p>واریز --{{$transaction->category->name}}  </p>
                                            @else
                                                <span class="avatar-initial rounded bg-label-warning">
                                                <i class="icon-size {{$transaction->category->icon}}"></i>
                                            </span>
                                        </div>
                                        <p>برداشت--{{$transaction->category->name}}  </p>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="text-body">{{number_format($transaction->amount)}} تومان</div>
                                    </td>
                                    <td>
                        <span>
                                            {{ toJalaliDatetime($transaction->transaction_date) }}

                        </span>
                                    </td>
                                    <td>
                                        <small>{{$transaction->description}}</small>
                                    </td>
                                    <td>
                                        <button wire:navigate href="{{ route('dashboard.edit-transaction', ['id' => $transaction->id]) }}" class="btn btn-warning mx-2">ویرایش</button>

                                    </td>
                                    <td>     <button wire:click.prevent="deleteConfirmation({{ $transaction->id }})" class="btn btn-danger"> حذف </button></td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">هیچ تراکنشی ثبت نشده است.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="row d-flex align-items-center">
                        <div class="col-sm-12 col-md-6 my-4">
                            <div class="dataTables_info pt-0" id="DataTables_Table_0_info" role="status"
                                 aria-live="polite">{{ $transactions->links() }}
                            </div>
                        </div>
                        <!-- دکمه‌های صفحه بندی -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
