<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\repositories\ContactRepository;
use Illuminate\Http\Request;
use App\Models\ContactModel;


class ContactController extends Controller
{

    private $contactRepo;

    public function __construct()
    {
        $this->contactRepo = new ContactRepository();
    }
    public function index()
    {
        return view("contact");
    }

    public function get_all_contacts()
    {
        $all_contacts = ContactModel::all();
        return view("all_contacts", compact('all_contacts'));
    }

    public function sendContact(ContactRequest $request)
    {
        echo "Email: ".$request->get("email")." Naslov: ".$request->get("subject")." Poruka:" .$request->get("description");

        $this->contactRepo->newContact($request);

        return redirect("/admin/all-contacts");

    }

    public function delete($contact)
    {
        $single_contact = $this->contactRepo->singleContactInstance($contact);

        if($single_contact === null)
        {
            die("THIS CONTACT DOES NOT EXIST!");
        }
        else
        {
            $single_contact->delete();
        }

        return redirect()->back();
    }

    public function single_contact(Request $request, $id)
    {
        $contact = $this->contactRepo->singleContactInstance($id);

        if($contact === null)
        {
            die("Ovaj proizvod ne postoji");
        }

        return view("contacts.edit", compact('contact'));
    }

    public function edit(Request $request, $id)
    {
        //question for consultations
        $contact = $this->contactRepo->singleContactInstance($id);

        if($contact === null)
        {
            die("Ovaj kontakt ne postoji");
        }

        $this->contactRepo->editContact($request, $contact);



        return redirect("/admin/all-contacts");



    }
}
