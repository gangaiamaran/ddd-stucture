<?php

namespace Domain\V1\Contact\Controllers;

use App\Http\Controllers\Controller;
use Domain\V1\Contact\Actions\ContactUpdateAction;
use Domain\v1\Contact\Requests\ContactUpdateRequest;
use Illuminate\Http\JsonResponse;

class ContactUpdateController extends Controller
{
    public function __invoke(ContactUpdateRequest $request): JsonResponse
    {
        ContactUpdateAction::initiate($request->id, $request->validated())
            ->execute()
            ->log()
            ->emit()
            ->complete();

        return response()->json([
            'message' => 'Contact updated successfully!',
        ]);
    }
}
