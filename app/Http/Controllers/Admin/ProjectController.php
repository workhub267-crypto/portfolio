<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    public function projects()
    {
        return view('admin.pages.project');
    }

    public function projectsData(Request $request)
    {
        if ($request->ajax()) {
            $data = Project::latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" class="edit btn btn-primary btn-sm editProject"><i class="ri-edit-2-line"></i></a>';
                    $btn .= ' <a href="javascript:void(0)" data-id="' . $row->id . '" class="delete btn btn-danger btn-sm deleteProject"><i class="ri-delete-bin-line"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'tech_stack' => 'nullable|string',
            'github_link' => 'nullable|url',
            'live_link' => 'nullable|url',
            'status' => 'required|in:active,inactive,completed,ongoing',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }

        $projectId = $request->project_id;
        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'tech_stack' => $request->tech_stack,
            'github_link' => $request->github_link,
            'live_link' => $request->live_link,
            'status' => $request->status,
        ];

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage/projects'), $imageName);
            $data['image'] = 'projects/' . $imageName;
        }

        Project::updateOrCreate(['id' => $projectId], $data);

        return response()->json(['status' => true, 'message' => 'Project saved successfully.']);
    }

    public function edit($id)
    {
        $project = Project::find($id);
        if ($project) {
            return response()->json(['status' => true, 'data' => $project]);
        }
        return response()->json(['status' => false, 'message' => 'Project not found.']);
    }

    public function delete(Request $request)
    {
        $project = Project::find($request->id);
        if ($project) {
            $project->delete();
            return response()->json(['status' => true, 'message' => 'Project deleted successfully.']);
        }
        return response()->json(['status' => false, 'message' => 'Project not found.']);
    }
}
