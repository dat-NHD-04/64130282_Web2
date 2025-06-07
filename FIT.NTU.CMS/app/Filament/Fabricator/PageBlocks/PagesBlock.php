<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use FilamentTiptapEditor\TiptapEditor;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class PagesBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('pages')->label('Trang')
            ->schema([
                TextInput::make('heading')->required()->label('Tiêu đề'),
                TiptapEditor::make('content')->label('Nhập nội dung'),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
