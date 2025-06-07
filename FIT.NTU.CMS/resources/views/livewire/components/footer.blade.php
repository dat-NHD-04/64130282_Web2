<footer class="footer footer-horizontal footer-center bg-white text-base-content rounded p-10 mt-10">
    <nav class="grid grid-flow-col gap-4">
        @foreach ($menu->menuItems as $item)
            <a href="{{ $item->url }}" wire:navigate class="link link-hover">{{ $item->title }}</a>
        @endforeach
    </nav>
    <nav>
        <div class="grid grid-flow-col gap-4">
            <a href="{{ get_settings('social_media.facebook_url') }}" target="_blank">
                <x-mary-icon name="fab.facebook" style="width: 25px; height: 25px;" />
            </a>
            <a href="{{ get_settings('social_media.youtube_url') }}" target="_blank">
                <x-mary-icon name="fab.youtube" style="width: 25px; height: 25px;" />
            </a>
            <a href="{{ get_settings('social_media.zalo_url') }}" target="_blank">
                {{-- <x-mary-icon name="fab.x.phone" style="width: 25px; height: 25px;" /> --}}
            </a>
        </div>
    </nav>
    <aside>
        <p>NoCopyright © {{ now()->year }} - Design and Build by <b>{{ get_settings('app.app_name') }}</b></p>
    </aside>
</footer>
