<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\ResponseTrait;
use Illuminate\Http\Request;
use App\Models\Service;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    use ResponseTrait;
    public function services()
    {
        return view('admin.pages.service');
    }

    public function servicesData(Request $request)
    {
        if ($request->ajax()) {

            $data = Service::select(['id', 'icon', 'title', 'description', 'created_at']);

            return DataTables::of($data)

                ->addIndexColumn()

                ->editColumn('icon', function ($row) {
                    return '<i class="' . $row->icon . ' fs-20"></i>';
                })

                ->editColumn('created_at', function ($row) {
                    return $row->created_at
                        ? $row->created_at->format('d M Y H:i')
                        : '';
                })

                ->addColumn('action', function ($row) {

                    $btn = '<div class="d-flex gap-2">
                                <button class="btn btn-sm btn-info edit-item-btn" data-id="' . $row->id . '">
                                    <i class="ri-pencil-fill"></i>
                                </button>
                                <button class="btn btn-sm btn-danger remove-item-btn" data-id="' . $row->id . '">
                                    <i class="ri-delete-bin-fill"></i>
                                </button>
                            </div>';

                    return $btn;
                })

                ->rawColumns(['icon', 'action'])

                ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'icon' => 'required|string',
            ],
            [
                'title.required' => 'Title is required.',
                'description.required' => 'Description is required.',
                'icon.required' => 'Icon class is required.',
            ]
        );

        if ($validator->fails()) {
            return $this->sendValidationError($validator->errors());
        }

        try {
            Service::updateOrCreate(
                ['id' => $request->id],
                [
                    'title' => $request->title,
                    'description' => $request->description,
                    'icon' => $request->icon,
                    'service_number' => $request->service_number ?? rand(1000, 9999),
                ]
            );

            return $this->sendSuccess('Service saved successfully!');
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    public function edit($id)
    {
        $service = Service::find($id);
        return response()->json($service);
    }

    public function delete(Request $request)
    {
        try {
            Service::find($request->id)->delete();
            return $this->sendSuccess('Service deleted successfully!');
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }
}