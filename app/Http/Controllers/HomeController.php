<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use \App\Jobs\SendEmailJob;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $user = $users->find(1);
        //----- send email without jobs -----------

//        Mail::to("mujtabanaseer.pakistan@gmail.com")
//            ->send(new SendTestMail());

        //---- send email with jobs ----------

        SendEmailJob::dispatch($user)->delay(now()->addSeconds(10));

        return view('home');
    }
}
