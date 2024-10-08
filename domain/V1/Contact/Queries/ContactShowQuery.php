<?php

namespace Domain\V1\Contact\Queries;

use Domain\V1\Contact\Models\Contact;
use Illuminate\Support\Arr;

class ContactShowQuery
{
    /**
     * Fetch data based on parameters.
     *
     * @param  array<string, mixed>  $params  Parameters for fetching data.
     * @return object|null The fetched object, or null if not found.
     */
    public function fetch(array $params): ?object
    {
        return Contact::query()
            ->select([
                'id',
                'name',
                'email',
                'tag',
                'linked_in_url',
                'twitter_url',
                'created_at',
                'updated_at',
            ])
            ->orderBy('created_at')
            ->where('id', Arr::get($params, 'id'))
            ->first();
    }
}
