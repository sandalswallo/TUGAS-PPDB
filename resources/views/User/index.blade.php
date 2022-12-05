@extends('template.layout')

@section('title')
    User
@endsection

@section('content')
<section class="section">

    <div class="section-body">
        <div class="row">

            {{-- Data Siswa --}}
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    {{-- Judul --}}
                    <div class="card-header">
                        <div class="col-12 col-md-10 col-lg-10">
                            <h4>Data User</h4>
                        </div>
                        <div class="col-12 col-md-2 col-lg-2">
                        </div>
                    </div>

                    {{-- Tabel --}}
                    <div class="card-body" style="width: 100%;">
                        <table class="table table-striped text-nowrap">
                            <thead>
                                <tr>
                                    <td scope="col" style="width: 50px;">No</td>
                                    <td scope="col">Nama</td>
                                    <td scope="col">Jurusan</td>
                                    <td scope="col">Jenis Kelamin</td>
                                    <td scope="col">Email</td>
                                    <td scope="col">NISN</td>
                                    <td scope="col">Alamat</td>
                                    <!-- <td scope="col" style="width: 84px;">Aksi</td> -->
                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@push('script')
    <script>
        // Data Tables
        let table;

        $(function() {
            table = $('.table').DataTable({
                proccesing: true,
                autowidth: false,
                ajax: {
                    url: '{{ route('siswa.data') }}'
                },
                columns: [
                    {data: 'DT_RowIndex'},
                    {data: 'nama'},
                    {data: 'jurusan_id'},
                    {data: 'jenis_kelamin'},
                    {data: 'email'},
                    {data: 'nisn'},
                    {data: 'alamat'},
                    
                ]
            });
        })

        $('#modalForm').on('submit', function(e){
            if(! e.preventDefault()){
                $.post($('#modalForm form').attr('action'), $('#modalForm form').serialize())
                .done((response) => {
                    $('#modalForm').modal('hide');
                    table.ajax.reload();
                    iziToast.success({
                        title: 'Sukses',
                        message: 'Data berhasil disimpan',
                        position: 'topRight'
                    })
                })
                .fail((errors) => {
                    iziToast.error({
                        title: 'Gagal',
                        message: 'Data gagal disimpan',
                        position: 'topRight'
                    })
                    return;
                })
            }
        })

        function addForm(url){
            $('#modalForm').modal('show');
            $('#modalForm .modal-title').text('Tambah Data Jurusan');
            $('#modalForm form')[0].reset();

            $('#modalForm form').attr('action', url);
            $('#modalForm [name=_method]').val('post');
        }

        function editData(url){
            $('#modalForm').modal('show');
            $('#modalForm .modal-title').text('Edit Data Jurusan');

            $('#modalForm form')[0].reset();
            $('#modalForm form').attr('action', url);
            $('#modalForm [name=_method]').val('put');

            $.get (url)
                .done((response) => {
                    $('#modalForm [name=nama]').val(response.nama);
                    $('#modalForm [name=jurusan_id]').val(response.jurusan_id);
                    $('#modalForm [name=jenis_kelamin]').val(response.jenis_kelamin);
                    $('#modalForm [name=agama]').val(response.agama);
                    $('#modalForm [name=email]').val(response.email);
                    $('#modalForm [name=telepon]').val(response.telepon);
                    $('#modalForm [name=nisn]').val(response.nisn);
                    $('#modalForm [name=tempat_lahir]').val(response.tempat_lahir);
                    $('#modalForm [name=tanggal_lahir]').val(response.tanggal_lahir);
                    $('#modalForm [name=alamat]').val(response.alamat);
                    $('#modalForm [name=asal_sekolah]').val(response.asal_sekolah);
                    $('#modalForm [name=nama_wali]').val(response.nama_wali);
                    // console.log(response.nama);
                })
                .fail((errors) => {
                    alert('Tidak Dapat Menampilkan Data');
                    return;
                })
        }

        function deleteData(url){
            swal({
                title: "Apa anda yakin menghapus data ini?",
                text: "Jika anda klik OK, maka data akan terhapus",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    $.post(url, {
                    '_token' : $('[name=csrf-token]').attr('content'),
                    '_method' : 'delete'
                })
                .done((response) => {
                    swal({
                    title: "Sukses",
                    text: "Data berhasil dihapus!",
                    icon: "success",
                    });
                })
                .fail((errors) => {
                    swal({
                    title: "Gagal",
                    text: "Data gagal dihapus!",
                    icon: "error",
                    });
                })
                table.ajax.reload();
                }
            });

        }
    </script>
@endpush