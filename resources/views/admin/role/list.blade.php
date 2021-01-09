@extends('admin.layout.webapp')

@section('pageCss')


    <link rel="stylesheet" href="{{asset('assets/vendor/sweetalert/sweetalert.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
@endsection


@section('content')   <div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Role List</h2>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Users">Roles</a></li>

                        @can('role.create', \Illuminate\Support\Facades\Auth::user())
                        @endcan
                        <li class="nav-item"><a class="nav-link addLink" data-toggle="tab" href="#addForm">Add Role</a></li>

                        <li class="nav-item"><a class="nav-link editLink" data-toggle="tab" href="#editForm">Edit Role</a></li>

                    </ul>
                    <div class="tab-content mt-0">

                        <div class="tab-pane active show" id="Users">

                            <div class="table-responsive">
                                <br><br>
                                <table id="userRole" class="table table-striped table-hover dataTable table-custom js-exportable spacing5"> <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                                @php
                                                    $v=0;
                                                @endphp
                                        @can('users.delete', \Illuminate\Support\Facades\Auth::user())
                                            @php
                                                $v++;
                                            @endphp
                                        @endcan

                                        @can('users.update', \Illuminate\Support\Facades\Auth::user())
                                            @php
                                                $v++;
                                            @endphp
                                        @endcan
                                        @if($v != 0)
                                        @endif
                                    </tr>
                                    </tfoot>

                                    <tbody id="action-buttons">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="addForm">
                            <div class="body mt-2">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Role Name *">
                                            <span style="margin-left: 20px"  class="text-danger " id="nameDiv"> </span>

                                        </div>

                                    </div>


                                    <div class="col-12">
                                        <h6>Module Permission</h6>
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Add</th>
                                                    <th>Edit</th>
                                                    <th>View</th>
                                                    <th>Delete</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Dashboard</td>
                                                    <td>-
                                                    </td>
                                                    <td>-
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="viewDashboard" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>

                                                    <td>-
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Settings</td>
                                                    <td>-
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="editSetting" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="viewSetting" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>

                                                    <td>-
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Roles</td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="addRole" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="editRole" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="viewRole" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="deleteRole" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Users</td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="addUser" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="editUser" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="viewUser" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="deleteUser" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Clients</td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="addClient" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="editClient" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="viewClient" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="deleteClient" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Products</td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="addProduct" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="editProduct" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="viewProduct" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="deleteProduct" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Category</td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="addCategory" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="editCategory" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="viewCategory" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="deleteCategory" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Sub Category</td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="addSubCategory" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="editSubCategory" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="viewSubCategory" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="deleteSubCategory" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Contacts</td>
                                                    <td>-
                                                    </td>
                                                    <td>-
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="viewContact" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="deleteContact" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Newsletter</td>
                                                    <td>-
                                                    </td>
                                                    <td>-
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="viewNewsletter" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="deleteNewsletter" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Enquiry</td>
                                                    <td>-
                                                    </td>
                                                    <td>-
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="viewEnquiry" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="deleteEnquiry" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                </tr>


                                                </tbody>
                                            </table>
                                        </div>
                                        <button type="button" class="btn btn-primary addBtn">Add</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="editForm">
                            <div class="body mt-2">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Role Name *">
                                            <span style="margin-left: 20px"  class="text-danger " id="nameDiv"> </span>

                                        </div>

                                    </div>


                                    <div class="col-12">
                                        <h6>Module Permission</h6>
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Add</th>
                                                    <th>Edit</th>
                                                    <th>View</th>
                                                    <th>Delete</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Dashboard</td>
                                                    <td>-
                                                    </td>
                                                    <td>-
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="viewDashboard" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>

                                                    <td>-
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Settings</td>
                                                    <td>-
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="editSetting" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="viewSetting" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>

                                                    <td>-
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Roles</td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="addRole" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="editRole" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="viewRole" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="deleteRole" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Users</td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="addUser" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="editUser" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="viewUser" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="deleteUser" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Clients</td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="addClient" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="editClient" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="viewClient" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="deleteClient" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Products</td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="addProduct" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="editProduct" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="viewProduct" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="deleteProduct" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Category</td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="addCategory" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="editCategory" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="viewCategory" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="deleteCategory" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Sub Category</td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="addSubCategory" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="editSubCategory" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="viewSubCategory" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="deleteSubCategory" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Contacts</td>
                                                    <td>-
                                                    </td>
                                                    <td>-
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="viewContact" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="deleteContact" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Newsletter</td>
                                                    <td>-
                                                    </td>
                                                    <td>-
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="viewNewsletter" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="deleteNewsletter" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Enquiry</td>
                                                    <td>-
                                                    </td>
                                                    <td>-
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="viewEnquiry" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" value="deleteEnquiry" name="permission[]" id="permission" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                </tr>


                                                </tbody>
                                            </table>
                                        </div>
                                        <button type="button" class="btn btn-primary addBtn">Add</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                                    </div>
                                </div>
                            </div>
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





        <script>



            $(document).ready(function () {
                var DataTable = $("#userRole").DataTable({
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
                        url: `http://127.0.0.1:8000/admin/roles`,
                    },
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'action', name: 'action', orderable: false}
                    ]
                });
            });



        $('.addBtn').click(function(){

            var permission = $("input[name='permission[]']")
                .map(function(){
                if($(this).is(':checked')){
                    return $(this).val();
                }
                }).get();
            var name = $("#name").val();



            $.ajax({
                    url:"add-role/",
                method:"post",
                data: "permission="+permission+"&name="+name,
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token() }}'
                },
                dataType:"json",
                success: function(data){
                    $('#nameDiv').html(data.name);

                    if(data.status == true){
                        swal("Good job!", "Added Successfully!", "success");

                        $('#addForm').trigger("reset");

                    }else{

                        //swal("Error", "Something went wrong", "error");
                    }

                }
            })
        });


            function del(id) {
                swal({
                    title: "Are you sure?",
                    text: "Are you sure you want to delete this record!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#dc3545",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                }, function () {

                             $.ajax({
                                url:"{{route('delete-role')}}",
                                method:"POST",
                                data:{id:id},
                                 dataType:"json",
                                headers: {
                                     'X-CSRF-TOKEN': '{{csrf_token() }}'
                                 },
                                success: function(data){
                                    if(data.status == true){
                                        swal("Deleted!", "Your record has been deleted successfully.", "success");
                                        $('.sorting').click();
                                    }else{
                                        Swal("Error", "Something went wrong", "error");
                                    }
                                }
                            })
                });
            }

            function edit(id){
                $(".addLink").text('Edit Role');
                $(".addLink").click();
                $('#pdiv').css('display','none');
                $('#cpdiv').css('display','none');
                $('#puDiv').css('display','block');
                $('.addBtn').text('Update');
                $('#addDisplayBtn').css('display','block');
                $('#formType').val('edit');
                $.ajax({
                    url:"edit-role/"+id,
                    dataType:"json",
                    success: function(html){
                        $('#name').val(html.name);
                    }
                })
            }


    </script>


@endsection
