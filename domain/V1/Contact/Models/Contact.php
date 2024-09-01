<?php

namespace Domain\V1\Contact\Models;

use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;

#[ScopedBy([TenantScope::class])]
class Contact extends Model
{
    public $incrementing = false;

    protected $casts = [
        'id' => 'string',
        'tenant_id' => 'string',
        'user_id' => 'string',
        'name' => 'string',
        'email' => 'string',
        'tag' => 'string',
        'status' => 'int',
        'linked_in_url' => 'string',
        'twitter_url' => 'string',
        'created_by_type' => 'string',
        'created_by_id' => 'string',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_by_type' => 'string',
        'updated_by_id' => 'string',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    protected $fillable = [
        'tenant_id',
        'user_id',
        'name',
        'email',
        'tag',
        'status',
        'linked_in_url',
        'twitter_url',
        'created_by_type',
        'created_by_id',
        'updated_by_type',
        'updated_by_id',
    ];
}
