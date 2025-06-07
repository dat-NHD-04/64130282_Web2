<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class CarouselBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('carousel')->label('Thumnail carousel')
            ->schema([
                TextInput::make('title')->label('Tiêu đề')->required(),
                Repeater::make('images')
                    ->schema([
                        FileUpload::make('image')->required()
                            ->image()
                            ->imageEditor(),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
