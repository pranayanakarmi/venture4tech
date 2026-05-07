<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;
class ContactController extends Controller {
    public function index(): Response {
        return Inertia::render('Admin/Contacts/Index', [
            'contacts' => Contact::latest()->paginate(20),
        ]);
    }
    public function show(Contact $contact): Response {
        $contact->update(['is_read' => true]);
        return Inertia::render('Admin/Contacts/Show', ['contact' => $contact]);
    }
    public function destroy(Contact $contact): RedirectResponse {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Contact deleted.');
    }
}
