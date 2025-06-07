<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->label('Tên người dùng'),
                Forms\Components\TextInput::make('email'),
                Forms\Components\Select::make('roles')->label('Vai trò')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->label('Tên người dùng'),
                Tables\Columns\TextColumn::make('email')->copyable()
                    ->copyMessage('Email đã được sao chép vào clipboard!')
                    ->searchable(),
                Tables\Columns\TextColumn::make('roles.name')->label('Vai trò'),
                Tables\Columns\IconColumn::make('is_email_verified')
                    ->label('Tình trạng Email')
                    ->icon(fn($state): string => $state ? 'heroicon-o-check-circle' : 'heroicon-o-exclamation-circle')
                    ->color(fn($state): string => $state ? 'success' : 'danger')
                    ->tooltip(fn($state): string => $state ? 'Email đã được xác minh' : 'Email chưa được xác minh'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Người dùng';
    }
}
