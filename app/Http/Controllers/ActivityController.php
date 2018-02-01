<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Activity\ActivityRepository;
use App\Support\Logger\LoggerTrait;
use App\Repositories\User\UserRepository;

class ActivityController extends Controller
{
    use LoggerTrait;

    /**
     * @var ActivityRepository
     */
    private $activities;

    /**
     * ActivityController constructor.
     * @param ActivityRepository $activities
     */
    public function __construct(ActivityRepository $activities)
    {
        $this->middleware('auth');
        $this->middleware('locale'); 
        $this->middleware('timezone');
        $this->activities = $activities;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, UserRepository $users)
    {
        $user = ($request->user) ? $users->find($request->user) : null;
        $activities = $this->activities->paginate_search(10, $request->user, $request->search, $request->status);
        $status = ['' => trans('app.all_type_register')] + $this->activities->list_log_type();
        if ( $request->ajax() ) {
            if (count($activities)) {
                return response()->json([
                    'success' => true,
                    'view' => view('activities.list', compact('activities', 'status', 'user'))->render(),
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => trans('app.no_records_found')
                ]);
            }
        }

        return view('activities.index', compact('activities', 'status', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
