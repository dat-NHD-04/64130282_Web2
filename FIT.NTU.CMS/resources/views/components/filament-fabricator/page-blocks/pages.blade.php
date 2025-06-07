@aware(['page'])
@props(['heading', 'content'])
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
        <h2 class="text-2xl text-gray-900 font-bold md:text-4xl md:leading-tight">
            {{ $heading }}
        </h2>
        @if ($content > 0)
            <p class="pt-5">
                {!! tiptap_converter()->asHTML($content ?? '', toc: true, maxDepth: 4) !!}
            </p>
        @endif
    </div>
</div>
