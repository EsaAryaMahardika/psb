@extends('panitia.putri.layout')
@section('content')
<div class="body mt-5">
    <div class="table-responsive">
        <table class="table table-hover js-basic dataTable table-custom spacing5">
            <thead>
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Jenjang</th>
                    <th>Alamat</th>
                    <th>WhatsApp</th>
                    <th>Tanggal Daftar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                    <td>
                        <a href="/pendaftar/{{ nis }}" class="btn btn-primary edit-btn">Edit</a> 
                        | 
                        <button class="btn btn-danger delete-btn" data-toggle="modal" data-target="#delete" data-nis="">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus data atas nama <p id="NISdeleting"></p>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="js/datatablescripts.bundle.js"></script>
<script src="vendor/dropify/js/dropify.js"></script>
<script>
    // Validasi Hapus Pendaftar
    $(document).on('click', '.delete-btn', function() {
        let deleteId = $(this).data('nis');
        $.ajax({
            url: `/pendaftar/${nis}`,
            method: 'GET',
            success: function(data) {
                $('#NISdeleting').val(data.nama);
            }
        });
        $('#confirmDelete').data('nis', deleteId);
    });
    // Konfirmasi Hapus Pendaftar
    $('#confirmDelete').on('click', function() {
        e.preventDefault();
        let nis = $(this).data('nis');
        const row = $(this).closest('tr');
        $.ajax({
            url: `/pendaftar/${nis}`,
            method: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                // Session flash
                row.remove();
            },
            error: function(xhr) {
                alert('Terjadi kesalahan. Data gagal dihapus.');
            }
        });
    });
</script>
@endsection