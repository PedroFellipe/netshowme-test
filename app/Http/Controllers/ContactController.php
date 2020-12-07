<?php

namespace App\Http\Controllers;

use App\Repositories\ContactRepository;
use App\Http\Resources\ContactResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Mail\Contact;
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

        $extension = $request->attachment->getClientOriginalExtension();

        try {
            DB::beginTransaction();

            $data['attachment'] = $this->contactRepository->uploadAttachment($data['attachment']);

            $contact = $this->contactRepository->create($data);

            Mail::send(new Contact($contact));

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        return new JsonResponse(new ContactResource($contact), JsonResponse::HTTP_CREATED);
    }

    /**
     * Download an attachment
     * @param $id
     * @return JsonResponse
     */
    public function downloadAttachment($id)
    {
        $contact = $this->contactRepository->find($id);

        return Storage::download('messages/' . $contact->attachment);
    }
}
