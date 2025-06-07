<?php

namespace App\Filament\Resources\ArticleResource\Pages;

use App\ArticleStatus;
use App\Filament\Resources\ArticleResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListArticles extends ListRecords
{
    protected static string $resource = ArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Tất cả bài viết'),
            'draft' => Tab::make('Bản nháp')->modifyQueryUsing(function ($query) {
                return $query->where('status', ArticleStatus::DRAFT);
            }),
            'published' => Tab::make('Xuất bản')->modifyQueryUsing(function ($query) {
                return $query->where('status', ArticleStatus::PUBLISHED);
            }),
        ];
    }
}
