<?php

namespace App\repositories;

use App\Models\ContactModel;

class ContactRepository
{
    private $contactModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
    }

    public function newContact($request)
    {
        $this->contactModel::create([
            "email" => $request->get("email"),
            "subject" => $request->get("subject"),
            "message" => $request->get("message")
        ]);
    }

    public function editContact($request, $contact)
    {
        $contact->email = $request->get("email");
        $contact->subject =$request->get("subject");
        $contact->message = $request->get("message");
        $contact->save();
    }

    public function singleContactInstance($contactId)
    {
        return $this->contactModel::where(['id' => $contactId])->first();
    }
}
