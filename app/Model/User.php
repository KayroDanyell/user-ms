<?php

declare(strict_types=1);

namespace App\Model;

use Hyperf\Collection\Collection;
use Hyperf\DbConnection\Model\Model;

/**
 */
class User extends Model
{
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'User';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = [];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = [];

    public static function fromUserInfo(Collection $userInfo) : self
    {
        $user = new self();
        $userInfo->each(function ($item) use (&$user) {
            $user->{$item->field} = $item->value;
        });
        $user->fields = $userInfo->pluck('field')->toArray();
        return $user;
    }
}
