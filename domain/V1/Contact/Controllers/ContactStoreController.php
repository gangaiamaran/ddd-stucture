<?php

namespace Domain\V1\Contact\Controllers;

use App\Http\Controllers\Controller;
use Domain\V1\Contact\Actions\ContactStoreAction;
use Domain\v1\Contact\Requests\ContactStoreRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ContactStoreController extends Controller
{
    public function __invoke(ContactStoreRequest $request): JsonResponse
    {
        ContactStoreAction::initiate($request->validated())
            ->execute()
            ->log()
            ->emit()
            ->complete();

        return response()->json([
            'message' => 'Contact created successfully.',
        ], Response::HTTP_CREATED);
    }
}
