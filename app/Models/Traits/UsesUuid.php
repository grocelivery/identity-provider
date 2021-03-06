<?php

declare(strict_types=1);

namespace Grocelivery\IdentityProvider\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Trait UsesUuid
 * @package Grocelivery\IdentityProvider\Models\Traits
 */
trait UsesUuid
{
    protected static function bootUsesUuid(): void
    {
        static::creating(function (Model $model): void {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

    /**
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }
}
