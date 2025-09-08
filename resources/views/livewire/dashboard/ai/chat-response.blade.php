<div class="flex justify-start">
    <div class="max-w-[80%]">
        <div class="inline-block bg-rose-500 text-white rounded-xl rounded-br-none px-4 py-2 shadow">
            <div  class="text-sm leading-relaxed whitespace-pre-line">
                {{$response}}
                @if (session()->has('error'))
                    <p>متاسفانه واسه امروز خسته شدم ، فردا بیا بقیه سوالاتت رو بپرس</p>
                @endif
            </div>
        </div>
    </div>
</div>
