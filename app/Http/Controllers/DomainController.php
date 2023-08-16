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
        $domains = array();
        return view('domains', ['domains'=>Domains::all()]);
        //return Domains::all();
    }

    public function check(){
        $domains = Domains::all();
        return $domains;
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
    }
}
