<?php

namespace App;

enum ArticleStatus: string
{
    case DRAFT = 'Bản nháp';
    case PUBLISHED = 'Xuất bản';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function options(): array
    {
        return [
            self::DRAFT->value => self::DRAFT->value,
            self::PUBLISHED->value => self::PUBLISHED->value,
        ];
    }
}
