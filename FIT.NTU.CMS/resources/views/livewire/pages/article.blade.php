<div class="py-12 space-y-5">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <article class="p-10 prose mx-auto max-w-5xl">
                <h2>
                    {{ $article?->title }}
                </h2>

                <img class="rounded-sm"
                    src="{{ $article?->image?->path ? asset('storage/' . $article->image->path) : 'https://placehold.co/600x400' }}"
                    alt="{{ $article?->image?->alt_text ?? 'Ko có nội dung' }}" width="100%">

                {!! tiptap_converter()->asHTML($article?->content ?? '', toc: true, maxDepth: 4) !!}

                <hr class="my-6 border-gray-300">

                <b>Tags:</b>
                @foreach ($article->categories as $category)
                    <x-tag-component :category="$category" />
                @endforeach
            </article>
        </div>
    </div>
</div>
