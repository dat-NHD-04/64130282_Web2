<div>
    <a class="bg-white group max-h-[500px] flex flex-col h-full border border-gray-200 hover:border-transparent hover:shadow-lg transition-all duration-300 rounded-xl p-5"
        wire:navigate href="{{ route('article.show', $article) }}">
        <div class="aspect-w-16 aspect-h-11">
            <img class="w-full object-cover rounded-xl"
                src="{{ $article?->image?->path ? asset('storage/' . $article->image->path) : 'https://placehold.co/600x400' }}"
                alt="{{ $article?->image?->alt_text ?? 'Ko có nội dung' }}" style="height: 150px;" />
        </div>
        <div class="my-6">
            <h3 class="text-xl font-semibold text-gray-800">
                {{ $article->title }}
            </h3>

            @if ($article->content)
                <p class="mt-5 text-gray-600">
                    {!! Str::limit(tiptap_converter()->asText($article?->content, 100)) !!}
                </p>
            @endif
        </div>
        <div class="mt-auto flex items-center gap-x-3">
            <img class="size-8 rounded-full" src="{{ $article?->user?->profile_photo_url }}" alt="Image Description">
            <div>
                <h5 class="text-sm text-gray-800"><b>Đăng bởi:</b> {{ $article?->user?->name }}</h5>
            </div>
        </div>
    </a>
</div>
