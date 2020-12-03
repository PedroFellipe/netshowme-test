<?php

namespace App\Http\Controllers;

use App\Repositories\ContactRepository;
use App\Http\Resources\ContactResource;
use App\Http\Requests\ContactRequest;
use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;
use DB;

class ContactController extends Controller
{
    protected $contactRepository;

    public function __construct(ContactRepository $contact)
    {
        $this->contactRepository = $contact;

    }

    /**
     * Lists all the contacts requests
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $contacts = $this->contactRepository->all();

        return new JsonResponse(ContactResource::collection($contacts), JsonResponse::HTTP_OK);
    }

    /**
     * Store a contact request
     * @param ContactRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function store(ContactRequest $request)
    {
        $data = $request->validated();
        $data['ip'] = $request->ip();

        try {
            DB::beginTransaction();

            $contact = $this->contactRepository->create($data);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        return new JsonResponse(new ContactResource($contact), JsonResponse::HTTP_CREATED);
    }
}
