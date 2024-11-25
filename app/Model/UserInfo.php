<?php

declare(strict_types=1);

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

/**
 */
class UserInfo extends Model
{
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'user_info';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = [
        'user_id',
        'field',
        'value',
        'created_at',
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = [];

    public function saveUserInfo(array $data)
    {
        $user = new UserInfo();
        $user->user_id = $data['user_id'];
        $user->field   = $data['field'];
        $user->value   = $data['value'];
        $user->save();
    }
}
