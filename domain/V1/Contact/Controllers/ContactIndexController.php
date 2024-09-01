<?php

namespace Domain\V1\Contact\Controllers;

use App\Http\Controllers\Controller;
use Domain\V1\Contact\Queries\ContactIndexQuery;
use Domain\V1\Contact\Resources\ContactResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ContactIndexController extends Controller
{
    public function __invoke(Request $request, ContactIndexQuery $query): AnonymousResourceCollection
    {
        return ContactResource::collection($query->fetch($request->all()));
    }
}
