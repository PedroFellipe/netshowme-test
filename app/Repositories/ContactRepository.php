<?php

namespace App\Repositories;

use App\Models\Contact;
use Illuminate\Http\UploadedFile;

class ContactRepository extends BaseRepository
{

    public function __construct(Contact $contact)
    {
        $this->model = $contact;
    }

    /**
     * Upload an attachment
     * @param UploadedFile $attachment
     * @return string
     */
    public function uploadAttachment(UploadedFile $attachment)
    {
        // attachment
        $extension = $attachment->getClientOriginalExtension();
        $name = uniqid();
        $nameFile = "{$name}.{$extension}";
        $attachment->storeAs('messages', $nameFile);

        return $nameFile;
    }
}
