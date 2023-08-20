<?php

namespace App\Http\Controllers;

use App\Models\Emails;
use App\Models\FilterHistory;
use Illuminate\Http\Request;
use Symfony\Component\Console\Helper\Table;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index()
    {
        return view('home', ['emails_count'=>Emails::count(),'last_filter'=>FilterHistory::latest()->pluck('created_at')->first(), 'filters_count'=>FilterHistory::count()
        ,'canva_history_date'=>FilterHistory::pluck('created_at'), 'canva_history_count'=>FilterHistory::pluck('count')]);
    }
}
