<div class="container-xxl flex-grow-1 container-p-y">


    <div class="card">
        <h5 class="card-header text-lg">تمامی اقساط برای مورد {{$debt->title}} </h5>
        <div class="card-datatable text-nowrap">
            <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="table-responsive">
                    <table class="dt-complex-header table table-bordered dataTable no-footer" id="DataTables_Table_1"
                           aria-describedby="DataTables_Table_1_info">
                        <thead>
                        <tr>
                            <th colspan="3" rowspan="1">اطلاعات</th>
                            <th colspan="2" rowspan="1">تنظیمات</th>

                        </tr>
                        <tr>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1">
                                شماره
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                            >مبلغ
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                            >تاریخ
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                            >وضعیت قسط
                            </th>
                            <th class="text-center" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                            >تغییر وضعیت
                            </th>
                        </tr>
                        </thead>
                        <tbody >
                        @forelse($installments as $installment)
                            <tr class="odd" wire:key="{{ $installment->id }}">
                                <td>{{$loop->iteration}}</td>
                                <td>{{number_format($installment->amount)}}
                                <td>{{toJalaliDatetimeWithoutHour($installment->due_date)}} </td>
                                <td>
                                  <span class="badge {{ $installment->is_paid ==1 ? 'bg-label-success' : 'bg-label-warning' }}">
                                    {{ $installment->is_paid ==1 ? 'پرداخت شده' : 'پرداخت نشده' }}
                                 </span>
                                </td>
                                <td>
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect1">انتخاب تغییر
                                            وضعیت پرداخت</label>

                                        <select wire:model="status.{{ $installment->id }}" wire:change="updateStatus({{ $installment->id }})" style="background: unset" class="form-select">
                                            <option value="0">پرداخت نشده هنوز</option>
                                            <option value="1">تسویه شد</option>
                                        </select>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <p>هیچ قسطی برای این بدهی ثبت نشده است</p>
                        @endforelse

                        </tbody>
                    </table>

                </div>
                <br>
                <p class="text-center text-xl">{{$debt->description}}</p>
                <div
                    class="d-flex gap-3 mx-5">
                    <a href="{{route('dashboard.debt-manager')}}" wire:navigate>
                        <button class="btn btn-danger waves-effect">برگشت</button>
                    </a>
                </div>
                <div class="footer">
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
