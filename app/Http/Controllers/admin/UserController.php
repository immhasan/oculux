<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use phpDocumentor\Reflection\Types\True_;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{

    function index()
    {

        $content['title'] = request()->segment(2);

        if (request()->ajax()) {

            return datatables()->of(User::latest()->get())
                ->addColumn('image', function ($data) {
                    return '<img src="'.asset($data->profile_image).'" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="w35 h35 rounded" data-original-title="Avatar Name">';
                })->addColumn('user', function ($data) {
                    return '<h6 class="mb-0">' . $data->first_name . ' ' . $data->last_name . '</h6><span>' . $data->email . '</span>';
                })->addColumn('role', function ($data) {
                    if ($data->role_id == 1) {
                        return '<span class="badge badge-primary">Admin</span>';
                    } else {
                        return '<span class="badge badge-warning">Vendor</span>';
                    }

                })->addColumn('phone', function ($data) {
                    return $data->phone;
                })->addColumn('status', function ($data) {
                    if ($data->status == 'enable') {
                        return '<span class="badge badge-success">Enable</span>';
                    } else {
                        return '<span class="badge badge-disable">Disable</span>';
                    }
                })->addColumn('action', function ($data) {
                    return '<button type="button" onclick="edit(' . $data->id . ')" class="btn btn-sm btn-default" title="Edit"><i class="fa fa-edit"></i></button>
                                            <button type="button"  onclick="del(' . $data->id . ')" class="btn btn-sm btn-default js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>';
                })->rawColumns(['image', 'user', 'role', 'phone', 'status', 'action'])->make(true);

        }
        return view('admin.user.list')->with($content);
    }


    function edit($id)
    {
        if (request()->ajax()) {
            return response()->json(['data' => User::findOrFail($id)]);
        }
    }

    function add(Request $request)
    {

        if (request()->ajax()) {

            $validator = Validator::make(request()->all(), [
                "first_name" => 'required',
                "last_name" => 'required',
                "gender" => "required",
                "email" => "required|unique:users,email",
                "phone" => "required|numeric|min:6| min:16",
                "password" => "required",
                "confirm_password" => "required",
                "designation" => "required",
                "address" => "required|max:255",
                "role_id" => "required",
            ],
            [
                'first_name.required' => 'Please enter first name',
                'last_name.required' => 'Please enter last name',
                'gender.required' => 'Please select gender',
                'email.required' => 'Please enter email',
                'email.unique' => 'Email must be unique',
                'phone.required' => 'Please enter phone',
                'phone.numeric' => 'Phone must be numeric',
                'phone.min' => 'Invalid phone length',
                'phone.max' => 'Invalid phone length',
                'password.required' => 'Please enter password',
                'confirm_password.required' => 'Please confirm password',
                'designation.required' => 'Please enter designation',
                'address.required' => 'Please enter address',
                'address.max' => 'Invalid Address length',
                'role_id' => 'Please select role'


            ]
            );
            if ($validator->fails()) {
                return response()->json($validator->getMessageBag()->toArray());
            } else {

                if (request()->get('_token')) {
                    $request->request->remove('_token');
                    $request->request->remove('confirm_password');
                    $request->request->remove('current_password');
                    $request->request->remove('confrim_new_password');
                    $request->request->remove('new_password');

                 /*   $request->request->remove('profile_image');*/


                }


                if (!empty($request->file('profile_img'))) {

                    $profile_picture = $request->file('profile_img');
                    $image = rand().'.'.$profile_picture->getClientOriginalExtension();
                    $profile_picture->move(public_path('uploads/users/'),$image);
                    $profile_picture = 'uploads/users/'.$image;
                    $request->request->add(['profile_image' => $profile_picture]);

                }



                 $resp = User::insert($request->except('profile_img') );


                if($resp){
                    return json_encode(['status'=>true]);
                }else{
                    return json_encode(['status'=>false]);

                }

            }
        }
    }

}
