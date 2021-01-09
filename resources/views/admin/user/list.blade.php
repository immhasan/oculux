@extends('admin.layout.webapp')


@section('pageCss')


    <link rel="stylesheet" href="{{asset('assets/vendor/sweetalert/sweetalert.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
@endsection




@section('content')
<div id="main-content">
    <div class="container-fluid">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>User List</h2>

                </div>


                <!-- <div class="col-md-6 col-sm-12 text-right hidden-xs">
                    <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-round" title="">Add New</a>
                </div> -->
            
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active show viewLink" data-toggle="tab" href="#Users">Users</a></li>

                        @can('users.create', \Illuminate\Support\Facades\Auth::user())
                        @endcan

                        <li class="nav-item"><a class="nav-link actionLink addLink" data-toggle="tab" href="#addUser">Add User</a></li>              
                        <!-- <li class="nav-item"><a class="nav-link actionLink editLink" data-toggle="tab" href="#addUser">Edit User</a></li>              
                         -->


                    </ul>
                    <div class="tab-content mt-0">
                        <div class="tab-pane active show" id="Users">

                            <div class="table-responsive">
                                <br><br>
                                <table id="userTable" class="table table-striped table-hover dataTable table-custom js-exportable spacing5"> <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>User</th>
                                        <th>Role</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Image</th>
                                        <th>User</th>
                                        <th>Role</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>

                                    <tbody id="action-buttons">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="addUser">
                        <form id="addForm"   enctype="multipart/form-data">
                                @csrf
                            <div style="background-color:#343a40" class="body mt-2">
                                <div class="container-fluid">
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="card">
                                            <div class="body">
                                                <div class="card c_grid c_blue">
                                                    <div class="body text-center p-3">
                                                        <label for="profile_img">
                                                        <div class="circle">
                                                            <img class="rounded-circle" src="../assets/images/sm/avatar1.jpg" alt="">
                                                        </div>
                                                        </label>
                                                        <h6 class="mt-3 mb-0">Upload Image</h6>
                                                        <input type="file" hidden id="profile_img" name="profile_img"  accept=".jpg,.png">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                                <ul class="list-group mb-3 tp-setting">
                                                    <li class="list-group-item">
                                                        Email Notification
                                                        <div class="float-right">
                                                            <label class="switch">
                                                                <input type="checkbox" checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                          </div>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="card">
                                            <div class="body">
                                                <div class="row clearfix">
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">

                                                            <span class="text-danger" id="first_nameDiv"> </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                                                            <span class="text-danger" id="last_nameDiv"></span>      </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="form-group">
                                                            <select id="gender" name="gender" class="form-control">
                                                                <option value="">Gender</option>
                                                                <option value="male">Male</option>
                                                                <option value="female">Female</option>
                                                            </select>
                                                            <span class="text-danger" id="genderDiv">  </span>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="form-group">
                                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">

                                                            <span class="text-danger" id="emailDiv"> </span>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="form-group">
                                                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone">

                                                            <span class="text-danger" id="phoneDiv" > </span>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="form-group">
                                                            <input  class="form-control" id="designation" name="designation" placeholder="Designation">

                                                            <span class="text-danger" id="designationDiv"> </span>
                                                        </div>
                                                    </div>
                                                    <div id="pdiv" class="col-lg-6 col-md-12">
                                                        <div class="form-group">
                                                            <input type="password" class="form-control" id="password" name="password"  placeholder="Password">
                                                            <span class="text-danger" id="passwordDiv">  </span>

                                                        </div>
                                                    </div>
                                                    <div id="cpdiv" class="col-lg-6 col-md-12">
                                                        <div class="form-group">
                                                            <input type="password" class="form-control" id="confirm_password" name="confirm_password"  placeholder="Confirm Password">
                                                            <span class="text-danger" id="confrim_passwordDiv">  </span>

                                                        </div>
                                                    </div>


                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="form-group">
                                                            <select id="role_id" name="role_id" class="form-control">
                                                                <option value="">Role</option>
                                                                <option value="1">Admin</option>
                                                                <option value="2">Vendor</option>

                                                            </select>
                                                            <span class="text-danger" id="role_idDiv">  </span>

                                                        </div>

                                                        <span class="text-danger"  >  </span>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <textarea rows="4" type="text"  id="address" name="address" class="form-control" placeholder="Address"></textarea>
                                                            <span class="text-danger" id="addressDiv" ></span>

                                                        </div>

                                                    </div>
                                                    <input type="text" id="formType" hidden value="add">
                                                </div>
                                                <div id="addDisplayBtn">
                                                <button type="button"  class="btn btn-round btn-primary addBtn">Add</button> &nbsp;&nbsp;
                                                <button type="button" class="btn btn-round btn-default cancBtn">Cancel</button>

                                                </div>
                                            </div>

                                        </div>


                                        <div id="puDiv" style="display: none " class="card">
                                            <div class="header">
                                                <h2>Password Update</h2>
                                            </div>
                                            <div class="body">
                                                <div class="row clearfix">

                                                    <div class="col-lg-12 col-md-12">

                                                        <h6>Change Password</h6>
                                                        <hr>
                                                        <div class="form-group">
                                                            <input type="password" id="current_password" name="current_password" class="form-control" placeholder="Current Password">
                                                        </div>
                                                        <span class="text-danger" id="current_passwordDiv"> </span>
                                                        <div class="form-group">
                                                            <input type="password" id="new_password" name="new_password" class="form-control" placeholder="New Password">
                                                            <span class="text-danger" id="new_passwordDiv"> </span>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="password" id="confrim_new_password" name="confrim_new_password" class="form-control" placeholder="Confirm New Password">
                                                            <span class="text-danger" id="confrim_new_passwordDiv"> </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-round btn-primary">Update</button> &nbsp;&nbsp;
                                                <button type="button" class="btn btn-round btn-default">Cancel</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                </div>
                            </div>

                        </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('pageJs')


    <script src="{{asset('assets/bundles/datatablescripts.bundle.js')}}"></script>
    <script src="{{asset('/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
    <script src="{{asset('/assets/vendor/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
    <script src="{{asset('/assets/vendor/sweetalert/sweetalert.min.js')}}"></script><!-- SweetAlert Plugin Js -->
{{--
    <script src="{{asset('assets/js/pages/tables/jquery-datatable.js')}}"></script>
--}}






    <script>
        $(document).ready(function () {
    var DataTable = $('#userTable').DataTable({
        dom: "Blfrtip",
        buttons: [{
            extend: "copy",
            className: "btn-sm"
        }, {
            extend: "csv",
            className: "btn-sm"
        }, {
            extend: "excel",
            className: "btn-sm"
        }, {
            extend: "pdfHtml5",
            className: "btn-sm"
        }, {
            extend: "print",
            className: "btn-sm"
        }],
        responsive: true,
        processing: true,
        serverSide: true,
        pageLength: 10,
        ajax: {
            url: `http://127.0.0.1:8000/admin/users`,
        },
        columns: [
            {
                data: 'image',
                name: 'Image',
                orderable: false
            },
            {
                data: 'user',
                name: 'User'
            },
            {
                data: 'role',
                name: 'Role'
            },
            {
                data: 'phone',
                name: 'Phone'
            },
            {
                data: 'status',
                name: 'Status'
            },
            {
                data: 'action',
                name: 'Action',
                orderable: false
            }
        ]

    });
            });
    </script>

        <script type="text/javascript">

            function del(id){
                alert(id);
            }

            function edit(id){
                $(".addLink").text('Edit User');
                $(".addLink").click();
                $('#pdiv').css('display','none');
                $('#cpdiv').css('display','none');
                $('#puDiv').css('display','block');
                $('.addBtn').text('Update');
                $('#addDisplayBtn').css('display','block');
                $('#formType').val('edit');
                $.ajax({
                    url:"edit-user/"+id,
                    dataType:"json",
                    success: function(html){
                        $('#first_name').val(html.first_name);
                        $('#first_name').val(html.last_name);
                    }
                })
            }


            $('.viewLink').click(function(){
                $('#pdiv').css('display','block');
                $('#cpdiv').css('display','block');
                $('#puDiv').css('display','none');
                $(".addLink").text('Add User');
                $('.addBtn').text('Add');
                $('#addDisplayBtn').css('display','block');
                $('#formType').val('edit');
            });


            $('.addBtn').click(function(){


                $('#first_nameDiv').html('');
                $('#last_nameDiv').html('');
                $('#genderDiv').html('');
                $('#emailDiv').html('');
                $('#phoneDiv').html('');
                $('#designationDiv').html('');
                $('#passwordDiv').html('');
                $('#confrim_passwordDiv').html('');
                $('#role_idDiv').html('');
                $('#addressDiv').html('');
                $('#current_passwordDiv').html('');
                $('#new_passwordDiv').html('');
                $('#confrim_new_passwordDiv').html('');


                let myForm = document.getElementById('addForm');
                let formData = new FormData(myForm);
                $.ajax({
                    url:"add-user/",
                    method:"post",
                    data:formData,
                    dataType:"json",
                    contentType:false,
                    processData:false,
                    success: function(data){
                        $('#first_nameDiv').html(data.first_name);
                        $('#last_nameDiv').html(data.last_name);
                        $('#genderDiv').html(data.gender);
                        $('#emailDiv').html(data.email);
                        $('#phoneDiv').html(data.phone);
                        $('#designationDiv').html(data.designation);
                        $('#passwordDiv').html(data.password);
                        $('#confrim_passwordDiv').html(data.confrim_password);
                        $('#role_idDiv').html(data.role_id);
                        $('#addressDiv').html(data.address);
                        $('#current_passwordDiv').html(data.current_password);
                        $('#new_passwordDiv').html(data.new_password);
                        $('#confrim_new_passwordDiv').html(data.confrim_new_password);

                        if(data.status == true){
                            swal("Good job!", "Added Successfully!", "success");

                            $('#addForm').trigger("reset");

                        }else{

                            swal("Error", "Something went wrong", "error");
                        }

                    }
                })
            });







            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {

                        $('.circle').html("<img class='rounded-circle' src="+e.target.result+" alt=''>");
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }


            $("#profile_img").change(function() {
                readURL(this);
            });


        </script>


@endsection
