<?php

namespace App\Filament\Fabricator\PageBlocks;

use App\Models\Category;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use FilamentTiptapEditor\TiptapEditor;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class ArticleBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('article')->label('Bài viết')
            ->schema([
                Select::make('limit')
                    ->label('Giới hạn bài viết')
                    ->required()
                    ->options([
                        '4' => '4',
                        '8' => '8',
                        '12' => '12',
                        '24' => '24',
                    ])
                    ->searchable(),
                Select::make('category')
                    ->options(Category::pluck('title', 'id')->toArray())
                    ->label('Danh mục')
                    ->multiple()
                    ->required()
                    ->searchable(),
                Select::make('sort_by')->required()->label('Sắp xếp theo')
                    ->options([
                        'created_at' => 'Ngày tạo',
                        'updated_at' => 'Ngày cập nhập',
                        'popular' => 'Phổ biến nhất',
                    ])->searchable(),
                Select::make('show_load_more')
                    ->label('Hiển thị nút tải thêm')
                    ->options([
                        'true' => 'Có',
                        'false' => 'Không',
                    ]),
                TextInput::make('heading')->required()->label('Tiêu đề'),
                TiptapEditor::make('description')->label('Mô tả ngắn'),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return [
            'limit' => $data['limit'],
            'category' => $data['category'],
            'sort_by' => $data['sort_by'],
            'heading' => $data['heading'],
            'show_load_more' => $data['show_load_more'],
            'description' => $data['description'],
        ];
    }
}
