<?php

namespace App\Livewire\Public\Section;

use App\Models\Contact;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class ContactFormSection extends Component
{
    public $firstName;
    public $lastName;
    public $email;
    public $phone;
    public $contactReason;
    public $message;
    public $subject;

    // Validation rules
    protected $rules = [
        'firstName' => 'required|string|max:255',
        'lastName' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'contactReason' => 'required|string|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'nullable|string|max:1000',
    ];

    // Custom validation messages (optional)
    protected $messages = [
        'firstName.required' => 'الرجاء إدخال الاسم الأول',
        'lastName.required' => 'الرجاء إدخال الاسم الأخير',
        'email.required' => 'الرجاء إدخال البريد الإلكتروني',
        'email.email' => 'الرجاء إدخال بريد إلكتروني صحيح',
        'phone.required' => 'الرجاء إدخال رقم الهاتف',
        'contactReason.required' => 'الرجاء اختيار سبب الاتصال',
    ];

    // Submit the form
    public function submitForm()
    {
        // Validate the form data
        $validatedData = $this->validate();

        // Create a new contact entry in the database
        $contact = Contact::create([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'phone' => $this->phone,
            'type' => $this->contactReason,
            'subject' => $this->subject,
            'description' => $this->message,
        ]);

        // Optionally, log the data (for demonstration purposes)
        // Log::info('Contact Form Submitted', $contact);

        // Reset form fields after submission
        $this->reset();

        // Provide feedback to the user
        session()->flash('message', 'تم إرسال النموذج بنجاح!');
    }

    public function render()
    {
        return view('livewire.public.section.contact-form-section');
    }
}