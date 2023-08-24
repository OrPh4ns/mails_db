<?php

namespace App\Http\Controllers;

use App\Models\Domains;
use App\Models\Emails;
use App\Models\Found;
use Illuminate\Http\Request;
use PharIo\Manifest\Email;

class DomainController extends Controller
{
    public function index()
    {
        if (!isset($_POST['check']))
            return view('domains', ['domains' => Domains::where('valid', true)->orderBy('count', 'desc')->orderBy('country', 'desc')->get()]);
        else {
            foreach (Domains::all() as $domain) {
                Domains::where('id', $domain->id)->update(['count' => Emails::where('email', 'LIKE', '%' . $domain->type . '%')->count()]);
            }
            return redirect('/domains')->with(['success' => 'Update created successfully']);
        }
    }
    public function show_invalid()
    {
        return view('invalid_domains', ['domains' => Domains::where('valid', false)->get()]);
    }

    public function update_show(int $id)
    {
        return view('domain_update', ['domain'=>Domains::findOrFail($id)]);
    }

    public function update(int $id)
    {
        if(strlen($_POST['domain'])==0)
        {
            back()->withErrors(['Domain should not be empty']);
            die();
        }

        Domains::where('id',$id)->update(['']);
        return view('domain_update', ['domain'=>Domains::findOrFail($id)]);
    }
    public function delete(int $id)
    {
        Domains::destroy($id);
        redirect('/domains')->with(['success' => 'Domain is deleted successfully']);
    }

    public function invalid(int $id)
    {
        Domains::where('id',$id)->update(['valid'=>false, 'count'=>0]);
        Emails::where('email', 'LIKE', '%' . Domains::where('id', $id)->pluck('type')[0] . '%')->delete();
        return redirect('/domains')->with(['success' => 'Doamin marked as invalid successfully']);
    }

    public function valid(int $id)
    {
        Domains::where('id',$id)->update(['valid'=>true, 'count'=>0]);
        return redirect('/domains')->with(['success' => 'Doamin marked as valid successfully']);
    }

    public function store()
    {
        if(isset($_POST['domain']) && strlen($_POST['domain'])==0)
            return redirect('/domain_add')->withErrors("Please enter domain");
        $domain = $_POST['domain'];
        $country = strlen($_POST['country'])>0?$_POST['country']:0;
        if (!Domains::where('type', $domain)->exists()) {
            Domains::create(['type' => $domain, 'country'=>$country]);
            return redirect('/domains')->with(['success' => 'Domain is created successfully']);
        } else
            return redirect('/domain_add')->withErrors("Domain $domain exists already");
    }
}
