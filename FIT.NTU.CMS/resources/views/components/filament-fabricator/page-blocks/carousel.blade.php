@aware(['page'])
@props(['images', 'title'])
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="max-w-7xl mx-auto text-center mb-10 lg:mb-14">
        <h2 class="text-2xl text-center mb-5 text-gray-900 font-bold md:text-4xl md:leading-tight">
            {{ $title }}
        </h2>

        <div class="max-w-7xl mt-2 mx-auto">
            <div class="h-[400px]">
                <x-mary-carousel autoplay interval="3000" :slides="array_map(function ($item) {
                    return [
                        'image' => '/storage/' . $item['image'],
                    ];
                }, $images)" />
            </div>
        </div>
    </div>
</div>
