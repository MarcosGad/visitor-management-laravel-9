<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DataTables;


class SubUserController extends Controller
{
    public function construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('sub_user');
    }

    function fetch_all(Request $request)
    {
        if($request->ajax())
        {
            $data = User::where('type', '=', 'User')->get();

            return DataTables::of($data)
                    ->editColumn('created_at', function ($request) {
                        return $request->created_at->format('Y-m-d');
                    })
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return '<a href="/sub_user/edit/'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>&nbsp;<button type="button" class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }
}
