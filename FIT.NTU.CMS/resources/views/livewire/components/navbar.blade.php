<div class="navbar bg-base-100 shadow-sm">
    <div class="navbar-start">
        <div aria-label="Mobile Menu Button" tabindex="0" wire:click="toggleDrawer" role="button"
            class="lg:hidden btn btn-ghost btn-circle">
            <x-mary-icon name="heroicon.o.bars.3" />
        </div>
        <a href="{{ route('home') }}" wire:navigate class="btn btn-ghost text-xl">
            {{ config('app.name') }}
        </a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            @foreach ($menu->menuItems as $item)
                <li>
                    <a href="{{ $item->url }}" wire:navigate>
                        @if ($item->icon)
                            <x-mary-icon name="{{ $item->icon }}" />
                        @endif
                        {{ $item->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="navbar-end space-x-3">
        @guest
            <a href="{{ route('login') }}" wire:navigate class="btn btn-primary">Đăng nhập</a>
            <a href="{{ route('register') }}" wire:navigate class="btn btn-secondary">Đăng ký</a>
        @endguest

        @auth
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img alt="{{ auth()->user()->name }} avatar" src="{{ auth()->user()->profile_photo_url }}" />
                    </div>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                    @foreach ($dropdown->menuItems as $item)
                        <li>
                            <a href="{{ $item->url }}" {{ $item->use_navigate ? 'wire:navigate' : '' }}>
                                {{ $item->title }}
                            </a>
                        </li>
                    @endforeach

                    @if (Auth::check() && Auth::user()->hasRole('super_admin'))
                        <li><a href="/admin">Trang quản trị</a></li>
                    @endif

                    <li>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <a href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                Đăng xuất
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth
    </div>

    <x-mary-drawer wire:model="responsiveMenu" class="w-11/12 lg:w-1/3">
        <x-mary-menu class="p-0 m-0">
            @foreach ($menu->menuItems as $item)
                <x-mary-menu-item title="{{ $item->title }}" link="{{ $item->url }}"
                    icon="{{ $item->icon }}" />
            @endforeach
        </x-mary-menu>
    </x-mary-drawer>
</div>
