<?php

namespace App\Filament\Settings\Forms;

use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;

class SocialMedia
{
    /**
     * @return Tab
     */
    public static function getTab(): Tab
    {
        return Tab::make('social_media')
            ->label(__('Mạng xã hội'))
            ->icon('heroicon-o-share')
            ->schema(self::getFields())
            ->columns()
            ->statePath('social_media')
            ->visible(true);
    }

    public static function getFields(): array
    {
        return [
            TextInput::make('facebook_url')->label('Link Facebook'),
            TextInput::make('youtube_url')->label('Link Youtube'),
            TextInput::make('zalo_url')->label('Link Zalo'),
        ];
    }

    public static function getSortOrder(): int
    {
        return 1;
    }
}
