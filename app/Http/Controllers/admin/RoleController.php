<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class RoleController extends Controller
{

    function index()
    {

        
        $content['title'] = request()->segment(2);
        
        if (request()->ajax()) {

            return datatables()->of(Role::latest()->get())
                ->addColumn('id', function ($data) {
                    return $data->id;
                })->addColumn('name', function ($data) {
                    return $data->name;
                })->addColumn('action', function ($data) {


                        $action = '';
                        if(\Illuminate\Support\Facades\Auth::user()->can('roles.update')){
                            $action .= '<button type="button" onclick="edit(' . $data->id . ')" class="btn btn-sm btn-default" title="Edit"><i class="fa fa-edit"></i></button>';
                        }
                         if(\Illuminate\Support\Facades\Auth::user()->can('roles.delete')){
                             $action .=  '<button type="button"   onclick="del(' . $data->id . ')" class="btn btn-sm btn-default js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>';
                         }

                        return $action;

                           
                })->rawColumns(['image', 'user', 'role', 'phone', 'status', 'action'])->make(true);

        }

        return view('admin.role.list');
    }


    function edit($id)
    {
        if (request()->ajax()) {
            return response()->json(['data' => Role::findOrFail($id)]);
        }
    }

    function delete(Request $request)
    {
        if (request()->ajax()) {
            if(Role::where(['id'=>$request->id])->delete()){
              return response()->json(['status'=>true]);
            }else{
                return response()->json(['status'=>false]);
            }
        }
    }


    function add(Request $request)
    {
        if (request()->ajax()) {


            $validator = Validator::make(request()->all(), [
                "name" => 'required|unique:roles,name'
            ],
                [
                    'name.required' => 'Please enter Role Name',
                    'name.unique' => 'Role must be unique',
                ]
            );
            if ($validator->fails()) {
                return response()->json($validator->getMessageBag()->toArray());
            } else {

                if (request()->get('_token')) {
                    $request->request->remove('_token');
                }

                $request->request->add(['created_by' => 1]);
                $request->request->add(['updated_by' => 1]);
                $resp = Role::insert($request->all());


                if ($resp) {
                    return json_encode(['status' => true]);
                } else {
                    return json_encode(['status' => false]);

                }

            }
        }
    }





}
