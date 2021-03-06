<?php

declare(strict_types=1);

namespace Grocelivery\IdentityProvider\Models;

use Carbon\Carbon;
use Grocelivery\IdentityProvider\Models\Traits\UsesUuid;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * Class User
 * @package Grocelivery\IdentityProvider\Models
 * @property string $id
 * @property string $email
 * @property string $name
 * @property string $password
 * @property VerificationToken $verificationToken
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use UsesUuid, HasApiTokens, Notifiable;

    /** @var array */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /** @var array */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /** @var array */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @param string $email
     * @return User
     */
    public static function findByEmail(string $email): User
    {
        /** @var User $user */
        return self::query()->where('email', $email)->firstOrFail();
    }

    public function generateNameFromEmail(): void
    {
        $this->name = head(explode("@", $this->email));
    }

    /**
     * @return HasOne
     */
    public function verificationToken(): HasOne
    {
        return $this->hasOne(VerificationToken::class);
    }
}
