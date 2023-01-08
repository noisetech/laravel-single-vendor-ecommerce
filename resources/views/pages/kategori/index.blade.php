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
                            <li class="breadcrumb-item"><a href="#!">Kategori</a>
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
                                    <h5>List Kategori</h5>
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
                                                <th>Kategori</th>
                                                <th>Gambar</th>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Kategori</h5>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" id="create_kategori" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <input type="file" name="gambar" class="form-control">
                            <span class="text-danger error-text gambar_error"></span>
                        </div>

                        <div class="form-group">
                            <input type="text" name="nama" class="form-control" placeholder="Input Nama Kategori">
                            <span class="text-danger error-text nama_error"></span>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Form Edit Kategori</h5>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" id="edit_kategori" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" id="id">

                        <div class="form-group">
                            <input type="file" name="gambar" class="form-control">
                            <span class="text-danger error-text gambar_error"></span>
                        </div>

                        <div class="form-group">
                            <input type="text" name="nama" class="form-control" placeholder="Input Nama Kategori"
                                id="nama">
                            <span class="text-danger error-text nama_error"></span>
                        </div>



                        <div class="modal-footer">
                            <button type="submit" class="btn btn-sm btn-primary" id="edit_kategori_btn">Save</button>
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
            $('#example').DataTable({
                "responsive": true,
                processing: true,
                serverSide: true,
                pageLength: 5,
                lengthMenu: [
                    [5, 10, 20, -1],
                    [5, 10, 20, "50"]
                ],
                // responsive: true,
                order: [],
                ajax: {
                    url: "{{ route('kategori.data') }}"
                },
                columns: [{
                        data: 'nama',
                        name: 'nama'
                    },

                    {
                        data: 'gambar',
                        name: 'gambar'
                    },

                    {
                        data: 'aksi',
                        name: 'aksi'
                    },
                ]
            });
        });


        $('#exampleModal').on('hidden.bs.modal', function(e) {
            $('#create_kategori')[0].reset();
            $("#create_kategori_btn").text('Simpan');
            $(document).find('span.error-text').empty();
            $("#exampleModal").modal('hide');
        });

        $("#create_kategori").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $("#create_kategori_btn").text('Menyimpan...');
            $.ajax({
                url: '{{ route('katgori.index') }}',
                method: 'post',
                data: fd,
                cache: false,
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {
                    if (data.status == 'error') {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        Swal.fire({
                            icon: 'success',
                            text: data.message,
                            title: data.title,
                            toast: true,
                            position: 'top-end',
                            timer: 1500,
                            showConfirmButton: false,
                        });
                        $('#create_kategori')[0].reset();
                        $("#create_kategori_btn").text('Simpan');
                        $("#exampleModal").modal('hide');
                        $('#example').DataTable().ajax.reload();
                    }
                }
            });
        });


        $(document).on('click', '.edit', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            $.ajax({
                url: '{{ route('kategori.dataByid') }}',
                method: 'get',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log(data);
                    $('#id').val(data.id);
                    $('#nama').val(data.nama);
                }
            });
        });

        $("#edit_kategori").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $("#edit_kategori_btn").text('Process updating...');
            $.ajax({
                url: '{{ route('kategori.update') }}',
                method: 'post',
                data: fd,
                cache: false,
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {
                    if (data.status == 'error') {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        Swal.fire({
                            icon: 'success',
                            text: data.message,
                            title: data.title,
                            toast: true,
                            position: 'top-end',
                            timer: 1500,
                            showConfirmButton: false,
                        });
                        $('#edit_kategori')[0].reset();
                        $("#edit_kategori_btn").text('Simpan');
                        $("#exampleModal2").modal('hide');
                        $('#example').DataTable().ajax.reload();
                    }
                }
            });
        });



        $(document).on('click', '.hapus', function(e) {
            e.preventDefault();
            let id = $(this).attr('id')
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                confirmButton: true,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('kategori.destroy') }}",
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            if (data.status == 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    text: data.message,
                                    title: data.title,
                                    toast: true,
                                    position: 'top-end',
                                    timer: 1500,
                                    showConfirmButton: false,
                                });
                                $('#example').DataTable().ajax.reload();
                            }
                        },
                    })
                }
            })
        });
    </script>
@endpush
