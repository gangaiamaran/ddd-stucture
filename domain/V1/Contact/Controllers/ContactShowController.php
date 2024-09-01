<?php

namespace Domain\V1\Contact\Controllers;

use App\Http\Controllers\Controller;
use Domain\V1\Contact\Queries\ContactShowQuery;
use Domain\V1\Contact\Resources\ContactResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactShowController extends Controller
{
    public function __invoke(Request $request, ContactShowQuery $query): ContactResource
    {
        $data = $query->fetch(['id' => $request->id]);
        abort_unless((bool) $data, Response::HTTP_NOT_FOUND, 'Requested resource identifier not found.');

        return new ContactResource($data);
    }
}
