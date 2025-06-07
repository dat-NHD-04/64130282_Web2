<?php

namespace App\Filament\Resources;

use App\ArticleStatus;
use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Support\Str;
use RalphJSmit\Filament\SEO\SEO;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Wizard::make([
                    Forms\Components\Wizard\Step::make('Nội dung')
                        ->schema([
                            Forms\Components\TextInput::make('title')->label('Tiêu đề')
                                ->required()
                                ->lazy()
                                ->afterStateUpdated(function (Set $set, $state) {
                                    $set('slug', Str::slug($state));
                                }),
                            Forms\Components\TextInput::make('slug')->required()->readOnly(),
                            TiptapEditor::make('content')->label('Nội dung')->required(),
                            Forms\Components\Select::make('category')->label('Danh mục bài viết')
                                ->multiple()
                                ->preload()
                                ->relationship('categories', 'title')
                                ->searchable(),
                            Forms\Components\Hidden::make('status')
                                ->default('Bản nháp'),
                            Forms\Components\Hidden::make('user_id')->dehydrateStateUsing(fn($state) => auth()->id()),
                        ]),
                    Forms\Components\Wizard\Step::make('Hình ảnh')
                        ->schema([
                            CuratorPicker::make('media_id')->label('Thumbnail')
                        ]),
                    Forms\Components\Wizard\Step::make('SEO')
                        ->schema([
                            SEO::make(),
                        ]),
                ]),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                CuratorColumn::make('media_id')->size(40)->label('Thumbnail'),
                TextColumn::make('title')->searchable()->label('Tiêu đề')->sortable(),
                Tables\Columns\TextColumn::make('categories.title')
                    ->label('Danh mục bài viết')
                    ->sortable()
                    ->badge()
                    ->searchable(),
                Tables\Columns\SelectColumn::make('status')
                    ->label('Trạng thái')
                    ->sortable()
                    ->options(ArticleStatus::options()),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('categories')->label('Danh mục')
                    ->multiple()
                    ->searchable()
                    ->relationship('categories', 'title'),
                Tables\Filters\SelectFilter::make('status')->label('Trạng thái')
                    ->options([
                        'Bản nháp' => 'Bản nháp',
                        'Xuất bản' => 'Xuất bản',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Bài viết';
    }
}
