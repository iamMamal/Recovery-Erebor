<div class="col-xl-8 mb-4 col-lg-7 col-12">
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col">
                <div class="card-body text-nowrap">
                    <h5 class="card-title mb-2">💡 نکته‌ی مالی</h5>
                    <p class="my-4" style="white-space:pre-wrap; word-wrap:break-word"> {{ $tip }}</p>
                    <button  wire:click="loadRandomTip"  class="btn btn-warning waves-effect waves-light" >نکته بعدی</button>
                </div>
            </div>
        </div>
    </div>
</div>
