@extends('panitia.layout')
@section('content')
<div class="body mt-5">
    <div class="table-responsive">
        <table class="table table-hover js-basic dataTable table-custom spacing5">
            <thead>
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    @if ($panitia == "pondok putra" || $panitia == "pondok putri" || $panitia == "tahfidz putra" || $panitia == "tahfidz putri")
                    <th>Jenjang</th>
                    @else
                    <th>Jenis Kelamin</th>
                    @endif
                    <th>Alamat</th>
                    <th>WhatsApp</th>
                    <th>Tanggal Daftar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pendaftar as $item)    
                <tr>
                    <td>{{ $item->nis }}</td>
                    <td>{{ $item->nama }}</td>
                    @if ($panitia == "pondok putra" || $panitia == "pondok putri" || $panitia == "tahfidz putra" || $panitia == "tahfidz putri")
                    <td>{{ $item->jenjang->nama }}</td>
                    @else
                        @if ($item->kelamin == "L")
                        <td>Laki - Laki</td>
                        @else
                        <td>Perempuan</td>
                        @endif
                    @endif
                    <td>{{ $item->data->alamat }}</td>
                    <td><a href="https://wa.me/{{ $item->wa }}" class="btn btn-success" target="_blank">Hubungi</a></td>
                    <td>{{ date('d-m-Y', strtotime($item->data->tanggal)) }}</td>
                    <td>
                        <a href="/pendaftar/{{ $item->nis }}" class="btn btn-primary edit-btn">Edit</a> 
                        | 
                        <button class="btn btn-danger delete-btn" data-toggle="modal" data-target="#delete" data-nis="{{ $item->nis }}" data-jenjang="{{ $item->jenjang_id }}">Hapus</button>
                    </td>
                </tr>
                @endforeach
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
                <p>Apakah Anda yakin ingin menghapus data atas nama <span id="NISdeleting"></span>?</p>
                <div class="mt-2">
                    <label for="">Apa alasannya?</label>
                    <select class="form-control" name="alasan_id" id="alasan">
                        <option value="">Pilih Alasan</option>
                        @foreach ($alasan as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
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
<script>
    // Validasi Hapus Pendaftar
    $(document).on('click', '.delete-btn', function() {
        let nis = $(this).data('nis');
        let jenjang_id = $(this).data('jenjang');
        $.ajax({
            url: `/hapus/${nis}`,
            method: 'GET',
            success: function(data) {
                $('#NISdeleting').text(data.nama);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
        $('#confirmDelete').data('nis', nis).data('jenjang', jenjang_id);;
    });
    // Konfirmasi Hapus Pendaftar
    $(document).on('click', '#confirmDelete', function() {
        let nis = $(this).data('nis');
        let jenjang_id = $(this).data('jenjang');
        const row = $('.delete-btn').closest('tr');
        $.ajax({
            url: `/pendaftar/${nis}`,
            method: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}',
                alasan_id: $('#alasan').val(),
                jenjang_id: jenjang_id,
            },
            success: function(data) {
                row.remove();
                $('#delete').modal('hide');
                $('.modal-backdrop').remove();
                $('body').removeClass('modal-open');
                let alertType = data.status === 'success' ? 'success-alert' : 'danger-alert';
                let alertMessage = `
                    <div class="alert ${alertType}">
                        <p>${data.message}</p>
                        <a class="close">&times;</a>
                    </div>`;
                $('#main-content').prepend(alertMessage);
                $('.alert .close').on('click', function() {
                    $(this).parent('.alert').fadeOut();
                });
            },
            error: function(xhr) {
                alert('Terjadi kesalahan. Data gagal dihapus.');
                console.log(xhr.responseText);
            }
        });
    });
</script>
@endsection