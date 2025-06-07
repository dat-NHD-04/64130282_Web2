<a href="{{ route('category.show', $category) }}" wire:navigate class="no-underline">
    <x-mary-badge class="btn" value="{{ $category->title }}"
        style="background-color: {{ $category->background_color }}; color: {{ $category->text_color }};" />
</a>
