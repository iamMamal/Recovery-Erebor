<ul
    class="overflow-auto menu-inner " >
    <!-- Dashboards -->
                    <li
                         class="{{ $activeRoute == 'dashboard' ?  'menu-item btn-primary' : 'menu-item' }}">
                        <a  class="menu-link"  wire:navigate href="{{ route('dashboard') }}">
                            <i class="menu-icon las la-home"></i>
                            <div data-i18n="Dashboards">صفحه اصلی</div>
                        </a>
                    </li>

                    <li
                          class="{{ $activeRoute == 'dashboard.bank-manager' ?  'menu-item btn-primary' : 'menu-item' }}">
                        <a  class="menu-link" wire:navigate href="{{route('dashboard.bank-manager')}}">
                            <i class="menu-icon las la-university"></i>
                            <div data-i18n="Dashboards">حساب ها</div>
                        </a>
                    </li>
                    <li
                        class="{{ $activeRoute == 'dashboard.transactions' ?  'menu-item btn-primary' : 'menu-item' }}">
                        <a  class="menu-link" wire:navigate href="{{route('dashboard.transactions')}}">
                            <i class="menu-icon las la-exchange-alt"></i>
                            <div data-i18n="Dashboards">تراکنش ها</div>
                        </a>
                    </li>
    <li
        class="{{ $activeRoute == 'dashboard.saving-manager' ?  'menu-item btn-primary' : 'menu-item' }}">
        <a  class="menu-link" wire:navigate href="{{route('dashboard.saving-manager')}}">
            <i class="menu-icon las la-piggy-bank"></i>
            <div data-i18n="Dashboards">هدف پس انداز</div>
        </a>
    </li>
    <li
        class="{{ $activeRoute == 'dashboard.debt-manager' ?  'menu-item btn-primary' : 'menu-item' }}">
        <a  class="menu-link" wire:navigate href="{{route('dashboard.debt-manager')}}">
            <i class="menu-icon las la-calendar"></i>
            <div data-i18n="Dashboards">قسط و بدهی ها</div>
        </a>
    </li>
    <li
        class="{{ $activeRoute == 'dashboard.elibot' ?  'menu-item btn-primary' : 'menu-item' }}">
        <a  class="menu-link" wire:navigate href="{{route('dashboard.elibot')}}">
            <i class="menu-icon las la-robot"></i>
            <div data-i18n="Dashboards">الی بات</div>
        </a>
    </li>
    <li
        class="{{ $activeRoute == 'dashboard.dangodong' ?  'menu-item btn-primary' : 'menu-item' }}">
        <a  class="menu-link" wire:navigate href="{{route('dashboard.dangodong')}}">
            <i class="menu-icon las la-compress-arrows-alt"></i>
            <div data-i18n="Dashboards">دنگ و دونگ</div>
        </a>
    </li>
    <li
        class="{{ $activeRoute == 'dashboard.update' ?  'menu-item btn-primary' : 'menu-item' }}">
        <a  class="menu-link" wire:navigate href="{{route('dashboard.update')}}">
            <i class="menu-icon las la-sliders-h"></i>
            <div data-i18n="Dashboards">تنظیمات حساب کاربری</div>
        </a>
    </li>
    <li
        class="{{ $activeRoute == 'logout' ?  'menu-item btn-primary' : 'menu-item' }}">
            <form method="POST" action="{{ route('logout') }}">
        <button type="submit" class="menu-link">
                @csrf
                <i class="menu-icon las la-sign-out-alt"></i>
            <div data-i18n="Dashboards">خروج از برنامه</div>
        </button>
            </form>
    </li>
    @auth
        @if(auth()->user()->isAdmin)
            <li
                class="{{ $activeRoute == 'dashboard.show-users' ?  'menu-item btn-primary' : 'menu-item' }}">
                <a  class="menu-link" wire:navigate href="{{route('dashboard.show-users')}}">
                    <i class="menu-icon las la-lock"></i>
                    <div data-i18n="Dashboards">مشاهده تمام کاربران</div>
                </a>
            </li>
        @endif
    @endauth

</ul>
