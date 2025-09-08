<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-0">
        <span class="text-muted fw-light">
            پنل کاربری /الی بات
        </span>
    </h4>
    <div class="app-ecommerce">
        <!-- Add Product -->
        <div class="row">
            <!-- First column-->
            <div class="col-12">
                <!-- Product Information -->
                <div class="app-chat card ">
                    <div class="row g-0">
                        <!-- Chat & Contacts -->
                        <div class="col-md-3 col-12  app-chat-contacts app-sidebar flex-grow-0"
                             id="app-chat-contacts">
                            <hr class="container-m-nx m-0">
                            <div class="sidebar-body ps ps__rtl ps--active-y">
                                <!-- Chats -->
                                <ul class="list-unstyled chat-contact-list" id="chat-list">
                                    <li class="chat-contact-list-item active">
                                        <a class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar avatar-online">
                                                <span class="avatar-initial rounded-circle bg-label-success">EB</span>
                                            </div>
                                            <div class="chat-contact-info flex-grow-1 ms-2">
                                                <h6 class="chat-contact-name text-truncate m-0">الی بات</h6>
                                            </div>
                                            <small class="text-muted mb-auto">انلاین</small>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <!-- /Chat contacts -->
                        <!-- Chat History -->
                        <div class="col-md-9 col-12 app-chat-history bg-body">
                            <div class="chat-history-wrapper">
                                <div class="chat-history-header border-bottom">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex overflow-hidden align-items-center">
                                            <i class="ti ti-menu-2 ti-sm cursor-pointer d-lg-none d-block me-2"
                                               data-bs-toggle="sidebar" data-overlay=""
                                               data-target="#app-chat-contacts"></i>
                                            <div class="flex-shrink-0 avatar">
                                                <span class="avatar-initial rounded-circle bg-label-success">EB</span>
                                            </div>
                                            <div class="chat-contact-info flex-grow-1 ms-2">
                                                <h6 class="m-0">الی بات</h6>
                                                <small class="user-status text-muted">دستیار هوشمند</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-history-body bg-body ps ps__rtl ps--active-y">
                                    <div class="ps__rail-x" style="left: 0px; bottom: -263px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 263px; height: 0px; right: 1043px;">
                                        <div class="ps__thumb-y" tabindex="0" style="top: 206px; height: 0px;"></div>
                                    </div>


                                    <div class=" mx-auto p-4">
                                        <!-- Chat box -->

                                            <!-- User message (right) -->
                                        @foreach($messages as $key => $message)

                                            @if($message['role']==='user')
                                        <div class="flex justify-end">
                                            <div class="max-w-[80%]">
                                                <div class="inline-block bg-blue-600 text-white rounded-xl rounded-br-none px-4 py-4 shadow">
                                                    <div class="text-sm leading-relaxed whitespace-pre-line">
                                                        {{ $message['content'] }}
                                                    </div>
                                                </div>
{{--                                                <div class="text-xs text-gray-400 mt-1 text-right">{{ $msg->created_at->diffForHumans() }}</div>--}}
                                            </div>
                                        </div>
                                            @endif

                                                @if($message['role']==='assistant')
                                                    <livewire:Dashboard.Ai.chat-response  :key="$key" :messages="$messages" :prompt="$messages[$key - 1]"/>
                                                @endif
                                        @endforeach



                                        <!-- Input -->
                                    </div>


                                </div>
                                <!-- Chat message form -->
                                <div class="chat-history-footer shadow-sm p-3">
                                    <form wire:submit.prevent="send" class="form-send-message d-flex justify-content-between align-items-center">
                                        <input   wire:model="body" class="m-2 form-control message-input border-0 me-3 shadow-none"
                                               style="height: 60px"
                                               placeholder="پیام خود را اینجا تایپ کنید">
                                        <div class="message-actions d-flex align-items-center">
                                            <button  type="submit"
                                                    wire:loading.attr="disabled" wire:target="sendMessage"
                                                class="btn btn-primary d-flex send-msg-btn waves-effect waves-light">
                                                <span class="align-middle d-md-inline-block d-none">ارسال</span>
                                                <i class="lab la-telegram ms-md-1 ms-0 ic-mirror"></i>
                                            </button>
                                        </div>
                                        <!-- لودینگ GIF -->
                                        <div wire:loading wire:target="send"
                                             style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;">
                                            <img src="{{ asset('images/giphy.webp') }}"
                                                 alt="loading"
                                                 style="width:250px; height:250px;">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /Chat History -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
