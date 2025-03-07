<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Timesheet;
use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    public function store(Request $request)
    {
        return Timesheet::create($request->validate([
            'task_name' => 'required|string',
            'date' => 'required|date',
            'hours' => 'required|integer',
            'user_id' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
        ]));
    }

    public function show($id)
    {
        return Timesheet::findOrFail($id);
    }

    public function index(Request $request)
    {
        return Timesheet::where($request->all())->get();
    }

    public function update(Request $request, $id)
    {
        $timesheet = Timesheet::findOrFail($id);
        $timesheet->update($request->all());
        return $timesheet;
    }

    public function destroy($id)
    {
        Timesheet::destroy($id);
        return response()->json(['message' => 'Timesheet deleted']);
    }

    public function index(Request $request)
    {
        $query = Timesheet::query();

        if ($request->has('task_name')) {
            $query->where('task_name', 'LIKE', "%{$request->task_name}%");
        }
        if ($request->has('date')) {
            $query->whereDate('date', $request->date);
        }
        if ($request->has('hours')) {
            $query->where('hours', $request->hours);
        }
        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }
        if ($request->has('project_id')) {
            $query->where('project_id', $request->project_id);
        }

        return response()->json($query->get());
    }

}

