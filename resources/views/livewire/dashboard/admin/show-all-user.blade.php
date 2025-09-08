<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-0">
        <span class="text-muted fw-light">
            پنل کاربری /
        </span>
        مشاهده کاربران ثبت نام کرده
    </h4>
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
                            style="width: 314px;">نام
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            style="width: 133px;">ایمیل
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            style="width: 127px;" >تعداد حساب ها
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            style="width: 127px;" >حذف کاربر
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($users as $index => $user)
                        <tr class="odd">
                            <td class="  control" tabindex="0" style="display: none;"></td>
                            <td><span>{{ $index + 1 }}</span></td>
                            <td class="sorting_1"><span class="text-nowrap"><bdi>{{ $user->name }}</bdi></span></td>
                            <td>
                                <p>{{$user->email}}</p>
                            </td>
                            <td>
                                {{$user->accounts_count}}
                            </td>

                            <td>
                                <button wire:click.prevent="deleteConfirmation({{ $user->id }})" class="btn btn-danger"> حذف </button>
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
