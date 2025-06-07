<?php

namespace App\Factories\Social;

use App\Actions\Social\CreateXUser;

class CreateUserFactory
{
    /**
     * @throws \Exception
     */
    public function forService(string $service): CreateXUser
    {
        return match ($service) {
            'google' => new CreateXUser,
            default => throw new \Exception('Không hỗ trợ dịch vụ!')
        };
    }
}
