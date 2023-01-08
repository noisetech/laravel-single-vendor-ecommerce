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
                            <li class="breadcrumb-item"><a href="#!">Produk</a>
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
                                    <h5>List Produk</h5>
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
                                                <th>Produk</th>
                                                <th>Slug</th>
                                                <th>Gambar</th>
                                                <th>Kategori</th>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Produk</h5>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" id="create_produk" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <label for="">Gambar Produk:</label> <sup class="text-danger px-1"
                                style="font-size: 8px !important;">*inputan gambar</sup>
                            <input type="file" name="gambar" class="form-control">
                            <span class="text-danger error-text gambar_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="">Nama Produk:</label>
                            <input type="text" name="nama" class="form-control" placeholder="Input Nama Produk">
                            <span class="text-danger error-text nama_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="">Kategori Produk:</label>
                            <select name="kategori_id" id="kategori" class="form-control">
                            </select>
                            <span class="text-danger error-text kategori_id_error" style="font-size: 12px;"></span>
                        </div>


                        <div class="form-group">
                            <label for="">Deskripsi Produk:</label>
                            <textarea type="text" name="deskripsi" class="form-control" placeholder="Input Deskripsi"></textarea>
                            <span class="text-danger error-text deskripsi_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="">Berat Produk:</label> <sup class="text-danger px-1"
                                style="font-size: 8px !important;">*inputan anggka</sup>
                            <input type="number" name="berat" class="form-control" placeholder="Input Berat Produk">
                            <span class="text-danger error-text berat_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="">Harga Produk</label> <sup class="text-danger px-1"
                                style="font-size: 8px !important;">*inputan anggka</sup>
                            <input type="number" name="harga" class="form-control" placeholder="Input Harga Produk">
                            <span class="text-danger error-text harga_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="">Ketersediaan Produk</label><sup class="text-danger px-1"
                                style="font-size: 8px !important;">*inputan anggka</sup>
                            <input type="number" name="ketersediaan" class="form-control"
                                placeholder="Input Ketersediaan Produk">
                            <span class="text-danger error-text ketersediaan_error"></span>
                        </div>


                        <div class="form-group">
                            <label for="">Potongan Harga</label><sup class="text-danger px-1"
                                style="font-size: 8px !important;">*inputan anggka awal persen</sup>
                            <input type="number" name="potongan_harga" class="form-control"
                                placeholder="Input Potongan Harga">
                            <span class="text-danger error-text potongan_harga_error"></span>
                        </div>




                        <div class="modal-footer">
                            <button type="submit" class=" btn label label-primary" id="create_role_btn">Simpan</button>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Form Edit Produk</h5>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" id="edit_produk" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" id="id">

                        <div class="form-group">
                            <label for="">Gambar Sebelumnya</label>
                            <div id="avatar">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Gambar Produk</label>
                            <input type="file" name="gambar" class="form-control">
                            <span class="text-danger error-text gambar_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="">Nama Produk</label>
                            <input type="text" name="nama" class="form-control" placeholder="Input Nama Produk"
                                id="nama_produk">
                            <span class="text-danger error-text nama_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="">Kategori Produk</label>
                            <select name="kategori_id" id="kategori_edit" class="form-control">
                            </select>
                            <span class="text-danger error-text kategori_id_error" style="font-size: 12px;"></span>
                        </div>


                        <div class="form-group">
                            <label for="">Deskripsi Produk:</label>
                            <textarea type="text" name="deskripsi" class="form-control" placeholder="Input Deskripsi" id="deskripsi"></textarea>
                            <span class="text-danger error-text deskripsi_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="">Berat Produk</label> <sup class="text-danger"
                                style="font-size: 10px !important;">*inputan anggka</sup>
                            <input type="number" name="berat" class="form-control" placeholder="Input Berat Produk"
                                id="berat">
                            <span class="text-danger error-text berat_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="">Harga Produk</label><sup class="text-danger px-1"
                                style="font-size: 10px !important;">*inputan anggka</sup>
                            <input type="number" name="harga" class="form-control" placeholder="Input Harga Produk"
                                id="harga">
                            <span class="text-danger error-text harga_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="">Ketersediaan Produk</label> <sup class="text-danger"
                                style="font-size: 10px !important;">*inputan anggka</sup>
                            <input type="number" name="ketersediaan" class="form-control"
                                placeholder="Input Ketersediaan Produk" id="ketersediaan">
                            <span class="text-danger error-text ketersediaan_error"></span>
                        </div>


                        <div class="form-group">
                            <label for="">Potongan Harga</label><sup class="text-danger px-1"
                                style="font-size: 10px !important;">* anggka awal persen</sup>
                            <input type="number" name="potongan_harga" class="form-control"
                                placeholder="Input Potongan Harga" id="potongan_harga">
                            <span class="text-danger error-text potongan_harga_error"></span>
                        </div>


                        <div class="modal-footer">
                            <button type="submit" class="btn label label-primary" id="edit_produk_btn">Simpan</button>
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
                    url: "{{ route('produk.data') }}"
                },
                columns: [{
                        data: 'nama',
                        name: 'nama'
                    },

                    {
                        data: 'slug',
                        name: 'slug'
                    },

                    {
                        data: 'gambar',
                        name: 'gambar'
                    },

                    {
                        data: 'kategori',
                        name: 'kategori'
                    },

                    {
                        data: 'aksi',
                        name: 'aksi'
                    },
                ]
            });
        });

        $('#exampleModal').on('hidden.bs.modal', function(e) {
            $('#create_produk')[0].reset();
            $("#create_produk_btn").text('Simpan');
            $(document).find('span.error-text').empty();
            $("#exampleModal").modal('hide');
        });

        $('#exampleModal2').on('hidden.bs.modal', function(e) {
            $('#edit_produk')[0].reset();
            $("#edit_produk_btn").text('Simpan');
            $(document).find('span.error-text').empty();
            $("#exampleModal").modal('hide');
        });




        $("#create_produk").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $("#create_produk_btn").text('Menyimpan...');
            $.ajax({
                url: '{{ route('produk.store') }}',
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
                        $('#create_produk')[0].reset();
                        $("#create_produk_btn").text('Simpan');
                        $("#exampleModal").modal('hide');
                        $('#example').DataTable().ajax.reload();
                    }
                }
            });
        });


        $('#kategori').select2({
            dropdownParent: $('#exampleModal'),
            minimumInputLength: 1,
            // dropdownParent: $('#exampleModal'),
            maximumInputLength: 50,
            allowClear: true,
            placeholder: '-- Pilih Kategori--',
            width: '100%',
            ajax: {
                url: "{{ route('list_kategori') }}",
                dataType: 'json',
                delay: 500,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.nama,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });

        $('#kategori_edit').select2({
            dropdownParent: $('#exampleModal2'),
            minimumInputLength: 1,
            maximumInputLength: 50,
            allowClear: true,
            width: '100%',
            ajax: {
                url: "{{ route('list_kategori') }}",
                dataType: 'json',
                delay: 500,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.nama,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });

        $(document).on('click', '.hapus', function(e) {
            e.preventDefault();
            let id = $(this).attr('id')
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Data yang terhapus tidak bisa di kembalikan!",
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
                        url: "{{ route('produk.destroy') }}",
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



        $(document).on('click', '.edit', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            $.ajax({
                url: '{{ route('produk.dataById') }}',
                method: 'get',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    $("#avatar").html(
                        `'<img src="{{ asset('gambar_produk/${data.gambar}') }}" width="100" class="img-fluid img-thumbnail">`
                    );
                    $("#id").val(data.id);
                    $("#nama_produk").val(data.nama);
                    $("#deskripsi").val(data.deskripsi);
                    $("#berat").val(data.berat);
                    $("#harga").val(data.harga);
                    $("#ketersediaan").val(data.ketersediaan);
                    $("#potongan_harga").val(data.potongan_harga);

                    var kategori_id = data.kategori_id;
                    $.ajax({
                        type: 'GET',
                        url: "{{ route('kategoriByProduk') }}",
                        data: {
                            id: kategori_id
                        }
                    }).then(function(data) {
                        console.log(data);
                        for (i = 0; i < data.length; i++) {
                            // selected
                            var newOption = new Option(data[i].nama, data[i].id, true,
                                true);
                            $('#kategori_edit').append(newOption).trigger('change');
                        }
                    });
                }
            });
        });


        $("#edit_produk").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $("#edit_produk_btn").text('Menyimpan...');
            $.ajax({
                url: '{{ route('produk.update') }}',
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
                        $('#edit_produk')[0].reset();
                        $("#edit_produk_btn").text('Simpan');
                        $("#exampleModal2").modal('hide');
                        $('#example').DataTable().ajax.reload();
                    }
                }
            });
        });
    </script>
@endpush
