<div class="py-12 space-y-5">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <article class="p-6 prose mx-auto max-w-6xl">
                <h2>
                    Danh mục tìm kiếm: <span class="text-red-600">{{ $category?->title }}</span>
                </h2>
            </article>
        </div>
    </div>

    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="max-w-6xl mx-auto text-center mb-10 lg:mb-14">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight">
                Bài viết liên quan
            </h2>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($category->articles as $article)
                <livewire:components.article-card :article="$article" :key="$article->id" />
            @endforeach
        </div>
    </div>
</div>
