<?php

namespace App\Http\Controllers;

use App\Models\Domains;
use App\Models\Emails;
use App\Models\FilterHistory;
use App\Models\Found;

class EmailsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(int $id = 1)
    {

        $id < 0 ? die('Error') : 1;
        $perPage = 100; // Number of items per page
        $offset = ($id - 1) * $perPage;
        if (isset($_POST['search']))
            if(strlen($_POST['search'])==0)
                $emails=[];
            else
                $emails = Emails::where('email', 'LIKE', '%' . $_POST['search'] . '%')->limit(500)->get();
        else
            $emails = Emails::offset($offset)->limit($perPage)->get();
        return view('emails', ['emails' => $emails, 'count' => Emails::count(), 'next' => (bool)count($emails), 'prev' => $id > 1, 'current' => $id]);
    }

    public function filter()
    {
        $emails = array();
        $pattern = '/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/';
        preg_match_all($pattern, $_POST['emails'], $matches);
        foreach ($matches[0] as $match) {
            $emails[] = $match;
        }
        $emails = array_map('strtolower', array_values(array_unique($emails)));
        if (count($emails))
            FilterHistory::create(['count' => count($emails)]);
        $new_emails = array();
        $exist_emails = array();
        $invalid_emails = 0;
        foreach ($emails as $email) {
            $domain = substr($email, strpos($email, '@') + 1);
            $check_domain = Domains::where('type', $domain)->first();
            if (!$check_domain)
                Domains::create(['type' => $domain]);
            else if (!$check_domain->valid) {
                $invalid_emails++;
                continue;
            }
            $email_object = Emails::where('email', $email)->first();
            if ($email_object) {
                $exist_emails[] = $email;
                $email_object->found = $email_object->found + 1;
                $email_object->save();
                Found::create(['email' => $email_object->id]);
            } else {
                $new_emails[] = $email;
                Emails::create(['email' => $email]);
            }
        }
        return view('filter', ['count' => count($emails), 'new_emails' => $new_emails, 'exist_emails' => $exist_emails, 'invalid_emails' => $invalid_emails]);
    }

    public function destroy(int $id)
    {
        Emails::destroy($id);
        return redirect('/emails')->with(['success' => 'Email is deleted successfully']);
    }
}
