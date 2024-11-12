<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>PSB An-Nur II</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="css/montserrat-font.css">
    <link rel="stylesheet" type="text/css"
        href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>

<body>
    <div class="row">
        <div class="d-flex justify-content-between mt-5 mb-5">
            <button id="print" class="btn btn-info"><i class="fa fa-print"></i></button>
            <a href="/logout" class="btn btn-danger"><i class="fa fa-power-off"></i></a>
        </div>
        <div id="content">
            <div class="text-center">
                <h3>Data Pendaftar PSB An-Nur II</h3>
            </div>
            <table class="table">
            <tbody>
                <tr class="space-row">
                    <th>Asrama</th>
                    <td>{{ $pendaftar->data->asrama->nama }}</td>
                </tr>
                <tr class="space-row">
                    <th>Nama</th>
                    <td>{{ $pendaftar->nama }}</td>
                </tr>
                <tr class="space-row">
                    <th>Jenis Kelamin</th>
                    @if ($pendaftar->kelamin == "L")
                    <td>Laki - Laki</td>
                    @else
                    <td>Perempuan</td>
                    @endif
                </tr>
                <tr class="space-row">
                    <th>Jenjang Pendidikan</th>
                    <td>{{ $pendaftar->jenjang->nama }}</td>
                </tr>
                <tr class="space-row">
                    <th>NIK</th>
                    <td>{{ $pendaftar->id }}</td>
                </tr>
                <tr class="space-row">
                    <th>NISN</th>
                    <td>{{ $pendaftar->data->nisn }}</td>
                </tr>
                <tr class="space-row">
                    <th>No. Akte Kelahiran</th>
                    <td>{{ $pendaftar->data->akte }}</td>
                </tr>
                <tr class="space-row">
                    <th>No. Kartu Keluarga</th>
                    <td>{{ $pendaftar->data->kk }}</td>
                </tr>
                <tr class="space-row">
                    <th>Anak ke -</th>
                    <td>{{ $pendaftar->data->anakke }}</td>
                </tr>
                <tr class="space-row">
                    <th>Tempat Lahir</th>
                    <td>{{ $pendaftar->data->tempat }}</td>
                </tr>
                <tr class="space-row">
                    <th>Tanggal Lahir</th>
                    <td>{{ $pendaftar->data->tl }}</td>
                </tr>
                <tr class="space-row">
                    <th>Alamat</th>
                    <td>{{ $pendaftar->data->alamat }}</td>
                </tr>
                <tr class="space-row">
                    <th>Provinsi</th>
                    <td>{{ $pendaftar->data->prov->nama }}</td>
                </tr>
                <tr class="space-row">
                    <th>Kabupaten</th>
                    <td>{{ $pendaftar->data->kab->nama }}</td>
                </tr>
                <tr class="space-row">
                    <th>Kecamatan</th>
                    <td>{{ $pendaftar->data->kec->nama }}</td>
                </tr>
                <tr class="space-row">
                    <th>Desa</th>
                    <td>{{ $pendaftar->data->kel->nama }}</td>
                </tr>
                <tr class="space-row">
                    <th>RT</th>
                    <td>{{ $pendaftar->data->rt }}</td>
                </tr>
                <tr class="space-row">
                    <th>RW</th>
                    <td>{{ $pendaftar->data->rw }}</td>
                </tr>
                <tr class="space-row">
                    <th>Nama saudara/saudari di An-Nur II</th>
                    <td>{{ $pendaftar->data->saudara }}</td>
                </tr>
                <tr class="space-row">
                    <th>Nama Ayah</th>
                    <td>{{ $pendaftar->wali->ayah }}</td>
                </tr>
                <tr class="space-row">
                    <th>NIK Ayah</th>
                    @if ($pendaftar->wali->a_nik != NULL)
                    <td>{{ $pendaftar->wali->a_nik }}</td>
                    @else
                    <td>-</td>
                    @endif
                </tr>
                <tr class="space-row">
                    <th>Tanggal Lahir Ayah</th>
                    @if ($pendaftar->wali->a_tl != NULL)
                    <td>{{ $pendaftar->wali->a_tl }}</td>
                    @else
                    <td>-</td>
                    @endif
                </tr>
                <tr class="space-row">
                    <th>Pendidikan Ayah</th>
                    @if ($pendaftar->wali->a_pend != NULL)
                    <td>{{ $pendaftar->wali->pend_ayah->nama }}</td>
                    @else
                    <td>-</td>
                    @endif
                </tr>
                <tr class="space-row">
                    <th>Telepon/WhatsApp Ayah</th>
                    @if ($pendaftar->wali->a_telp != NULL)
                    <td>{{ $pendaftar->wali->a_telp }}</td>
                    @else
                    <td>-</td>
                    @endif
                </tr>
                <tr class="space-row">
                    <th>Pekerjaan Ayah</th>
                    @if ($pendaftar->wali->a_ker != NULL)
                    <td>{{ $pendaftar->wali->ker_ayah->nama }}</td>
                    @else
                    <td>-</td>
                    @endif
                </tr>
                <tr class="space-row">
                    <th>Penghasilan Ayah</th>
                    @if ($pendaftar->wali->a_has != NULL)
                    <td>{{ $pendaftar->wali->has_ayah->keterangan }}</td>
                    @else
                    <td>-</td>
                    @endif
                </tr>
                <tr class="space-row">
                    <th>Nama ibu</th>
                    <td>{{ $pendaftar->wali->ibu }}</td>
                </tr>
                <tr class="space-row">
                    <th>NIK ibu</th>
                    @if ($pendaftar->wali->i_nik != NULL)
                    <td>{{ $pendaftar->wali->i_nik }}</td>
                    @else
                    <td>-</td>
                    @endif
                </tr>
                <tr class="space-row">
                    <th>Tanggal Lahir ibu</th>
                    @if ($pendaftar->wali->i_tl != NULL)
                    <td>{{ $pendaftar->wali->i_tl }}</td>
                    @else
                    <td>-</td>
                    @endif
                </tr>
                <tr class="space-row">
                    <th>Pendidikan ibu</th>
                    @if ($pendaftar->wali->i_pend != NULL)
                    <td>{{ $pendaftar->wali->pend_ibu->nama }}</td>
                    @else
                    <td>-</td>
                    @endif
                </tr>
                <tr class="space-row">
                    <th>Telepon/WhatsApp ibu</th>
                    @if ($pendaftar->wali->i_telp != NULL)
                    <td>{{ $pendaftar->wali->i_telp }}</td>
                    @else
                    <td>-</td>
                    @endif
                </tr>
                <tr class="space-row">
                    <th>Pekerjaan ibu</th>
                    @if ($pendaftar->wali->i_ker != NULL)
                    <td>{{ $pendaftar->wali->ker_ibu->nama }}</td>
                    @else
                    <td>-</td>
                    @endif
                </tr>
                <tr class="space-row">
                    <th>Penghasilan ibu</th>
                    @if ($pendaftar->wali->i_has != NULL)
                    <td>{{ $pendaftar->wali->has_ibu->keterangan }}</td>
                    @else
                    <td>-</td>
                    @endif
                </tr>
                <tr class="space-row">
                    <th>Nama Wali</th>
                    @if ($pendaftar->wali->wali != NULL)
                    <td>{{ $pendaftar->wali->wali }}</td>
                    @else
                    <td>-</td>
                    @endif
                </tr>
                <tr class="space-row">
                    <th>Telepon/WhatsApp Wali</th>
                    @if ($pendaftar->wali->w_telp != NULL)
                    <td>{{ $pendaftar->wali->w_telp }}</td>
                    @else
                    <td>-</td>
                    @endif
                </tr>
                <tr class="space-row">
                    <th>Pekerjaan Wali</th>
                    @if ($pendaftar->wali->w_ker != NULL)
                    <td>{{ $pendaftar->wali->ker_wali->nama }}</td>
                    @else
                    <td>-</td>
                    @endif
                </tr>
                <tr class="space-row">
                    <th>Penghasilan Wali</th>
                    @if ($pendaftar->wali->w_has != NULL)
                    <td>{{ $pendaftar->wali->has_wali->nama }}</td>
                    @else
                    <td>-</td>
                    @endif
                </tr>
                <tr class="space-row">
                    <th>Nama Sekolah Asal</th>
                    <td>{{ $pendaftar->data->s_nama }}</td>
                </tr>
                <tr class="space-row">
                    <th>Alamat Sekolah Asal</th>
                    <td>{{ $pendaftar->data->s_alamat }}</td>
                </tr>
                <tr class="space-row">
                    <th>Provinsi Sekolah Asal</th>
                    <td>{{ $pendaftar->data->prov_sekolah->nama }}</td>
                </tr>
                <tr class="space-row">
                    <th>Kabupaten Sekolah Asal</th>
                    <td>{{ $pendaftar->data->kab_sekolah->nama }}</td>
                </tr>
                <tr class="space-row">
                    <th>Kecamatan Sekolah Asal</th>
                    <td>{{ $pendaftar->data->kec_sekolah->nama }}</td>
                </tr>
                <tr class="space-row">
                    <th>Tahun Lulus</th>
                    <td>{{ $pendaftar->data->lulus }}</td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>