<?php

namespace App\Http\Controllers;

use App\Models\Domains;
use App\Models\Emails;
use Illuminate\Http\Request;
use PharIo\Manifest\Email;

class DomainController extends Controller
{
    public function index()
    {
        if (!isset($_POST['check']))
            return view('domains', ['domains' => Domains::orderBy('count', 'desc')->get()]);
        else {

            foreach (Emails::pluck('email') as $email) {
                $domain = substr($email, strpos($email, '@') + 1);
                if (!Domains::where('type', $domain)->exists())
                    Domains::create(['type' => $domain]);
            }
            foreach (Domains::all() as $domain) {
                Domains::where('id', $domain->id)->update(['count' => Emails::where('email', 'LIKE', '%' . $domain->type . '%')->count()]);
            }
            //return redirect('/domains')->with(['success' => 'Update created successfully']);
        }
    }

    public function delete(int $id)
    {
        Domains::destroy($id);
        redirect('/domains')->with(['success' => 'Domain is deleted successfully']);
    }

    public function update()
    {

    }

    public function store()
    {
        $domain = $_POST['domain'];
        if (!Domains::where('type', $domain)->exists()) {
            Domains::create(['type' => $domain, 'count'=>0]);
            return redirect('/domains')->with(['success' => 'Domain is created successfully']);
        } else
            return redirect('/domain_add')->withErrors("Domain $domain exists already");
    }
}
