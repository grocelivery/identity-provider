<?php

declare(strict_types=1);

namespace Grocelivery\IdentityProvider\Http\Resources;

use Grocelivery\IdentityProvider\Models\User;

/**
 * Class UserResource
 * @package Grocelivery\IdentityProvider\Http\Resources
 */
class UserResource extends Resource
{
    /**
     * @return array
     */
    public function toArray(): array
    {
        /** @var User $user */
        $user = $this->resource;

        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'verified' => $user->hasVerifiedEmail(),
            'createdAt' => $user->created_at->toDateTimeString(),
        ];
    }
}
