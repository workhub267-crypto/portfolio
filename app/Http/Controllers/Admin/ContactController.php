<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.pages.contacts');
    }

    public function contactsData(Request $request)
    {
        if ($request->ajax()) {
            $data = Contact::select(['id', 'name', 'email', 'subject', 'message', 'is_read', 'created_at']);

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('is_read', function ($row) {
                    if ($row->is_read) {
                        return '<span class="badge bg-success">Read</span>';
                    } else {
                        return '<span class="badge bg-danger">Unread</span>';
                    }
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at ? $row->created_at->format('d M Y H:i') : '';
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex gap-2">
                                <button class="btn btn-sm btn-info view-contact-btn" data-id="' . $row->id . '">
                                    <i class="ri-eye-fill"></i>
                                </button>
                                <button class="btn btn-sm btn-danger remove-contact-btn" data-id="' . $row->id . '">
                                    <i class="ri-delete-bin-fill"></i>
                                </button>
                            </div>';
                    return $btn;
                })
                ->rawColumns(['is_read', 'action'])
                ->make(true);
        }
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            $contact->update(['is_read' => true]);
        }
        return response()->json($contact);
    }

    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return response()->json(['message' => 'Message deleted successfully!']);
    }
}
