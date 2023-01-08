@extends('layouts.main')
@section('content')
    <style>
        .cell_table {
            max-width: 250px;
        }
    </style>
    <div class="pcoded-content">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="page-header-title">
                            <h5 class="m-b-10"></h5>
                            <p class="m-b-0">Selamat datang di website MBATIK</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Users</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->
        <div class="pcoded-inner-content">
            <!-- Main-body start -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page-body start -->
                    <div class="page-body">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>List users</h5>
                                    <div class="label-main">
                                        <a href="#" data-toggle="modal"
                                            data-target="#exampleModal"class="label label-primary">
                                            Tambah
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <div class="card-block table-border-style">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped responsive nowrap" cellpadding="0"
                                        cellspacing="0" width="100%">

                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Role</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-body end -->
                </div>
            </div>
        </div>
    </div>


    {{-- modal tambah permission --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Form Create Role</h5>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" id="create_role">
                        @csrf

                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Input Role">
                            <span class="text-danger error-text name_error"></span>
                        </div>


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-sm btn-primary" id="create_role_btn">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    {{-- modal akhir tambah permission --}}




    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Form Edit Permission</h5>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" id="edit_role">
                        @csrf

                        <input type="hidden" name="id" id="id">

                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Input Role"
                                id="name">
                            <span class="text-danger error-text name_error"></span>
                        </div>


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-sm btn-primary" id="edit_role_btn">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection



@push('script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

        $('#exampleModal').on('hidden.bs.modal', function(e) {
            $('#create_permission')[0].reset();
            $("#create_permission_btn").text('Simpan');
            $(document).find('span.error-text').empty();
            $("#exampleModal").modal('hide');
        });

        $('#exampleModal2').on('hidden.bs.modal', function(e) {
            $('#edit_permission')[0].reset();
            $("#edit_permission_btn").text('Simpan');
            $(document).find('span.error-text').empty();
            $("#exampleModal2").modal('hide');
        });
    </script>
@endpush
