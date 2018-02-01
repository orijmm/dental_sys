<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Support\User\UserStatus;
use App\Repositories\User\UserRepository;

class HomeController extends Controller
{
    /**
     * @var UserRepository
     */
    private $users;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->middleware('auth');
        $this->middleware('locale'); 
        $this->middleware('timezone'); 
        $this->users = $users;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserRepository $users)
    {
        if (Auth::user()->hasRole('admin')) {
            return $this->adminDashboard();
        }
    }

    /**
     * Displays dashboard for admin users.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function adminDashboard()
    {
        $stats = [
            'total' => $this->users->all()->count(),
            'new' => $this->users->where('created_at', [Carbon::now()->firstOfMonth(), Carbon::now()])->count(),
            'banned' => $this->users->where('status', UserStatus::BANNED)->count(),
            'unconfirmed' => $this->users->where('status', UserStatus::UNCONFIRMED)->count()
        ];

        return view('dashboard.admin', compact('stats'));
    }

    /**
     * Displays default dashboard for non-admin users.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function defaultDashboard()
    {
        return view('dashboard.default');
    }
}
