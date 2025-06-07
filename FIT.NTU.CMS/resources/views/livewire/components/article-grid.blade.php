<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    @if ($this->articles->count() > 0)
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($this->articles as $article)
                <livewire:components.article-card :article="$article" :key="$article->id" />
            @endforeach
        </div>
        @if ($this->show_load_more)
            <div>
                <div class="text-center mt-8">
                    <button wire:click="loadMore" class="px-4 py-2 bg-blue-600 text-white font-bold rounded">
                        Tải thêm
                    </button>
                </div>
            </div>
        @endif
    @endif
</div>
