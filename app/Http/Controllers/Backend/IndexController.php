<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activitylog;

class IndexController extends Controller
{
    public function index()
    {
        return view('backend.index');
    }

    public function ListActivity(Activitylog $activitylog)
    {
        $this->authorize('view', $activitylog);
        $activity = Activitylog::all();
        return view('backend.activity.index')->with(compact('activity'));
    }
}
