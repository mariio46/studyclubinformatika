<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata</title>
    <style>
        body {
            font-family: arial;
        }
    </style>
</head>

<body>
    <center>
        <table width="600" class="kop">
            <tr>
                <td><img src="{{ asset('storage/image/biodata/kop.png') }}" style="width: 100%;" alt=""></td>
            </tr>

        </table>
        <h2>Formulir Pendaftaran</h2>
        <table width="600" class="tabel">
            <tr>
                <td width="150">Nama Lengkap</td>
                <td width="10" style="text-align:center ;">:</td>
                <td width="340">{{ $user->biodata->fullname }}</td>
            </tr>
            <tr>
                <td width="150">Email</td>
                <td width="10" style="text-align:center ;">:</td>
                <td width="340">{{ $user->email }}</td>
            </tr>
            <tr>
                <td width="150">No. WhatsApp</td>
                <td width="10" style="text-align:center ;">:</td>
                <td width="340">{{ $user->biodata->whatsapp }}</td>
            </tr>
            <tr>
                <td width="150">Agama</td>
                <td width="10" style="text-align:center ;">:</td>
                <td width="340">{{ $user->biodata->religion }}</td>
            </tr>
            <tr>
                <td width="150">Jenis Kelamin</td>
                <td width="10" style="text-align:center ;">:</td>
                <td width="340">{{ $user->biodata->sex }}</td>
            </tr>
            <tr>
                <td width="150">Tempat, Tanggal Lahir</td>
                <td width="10" style="text-align:center ;">:</td>
                <td width="340">
                    {{ $user->biodata->city . ', ' . date('d F Y', strtotime($user->biodata->birthday)) }}
                </td>
            </tr>
            <tr>
                <td width="150">Alamat</td>
                <td width="10" style="text-align:center ;">:</td>
                <td width="340">{{ $user->biodata->address }}</td>
            </tr>
            <tr>
                <td width="150">Asal Kampus</td>
                <td width="10" style="text-align:center ;">:</td>
                <td width="340">{{ $user->biodata->university }}</td>
            </tr>
            <tr>
                <td width="150">Fakultas</td>
                <td width="10" style="text-align:center ;">:</td>
                <td width="340">{{ $user->biodata->faculty }}</td>
            </tr>
            <tr>
                <td width="150">Jurusan</td>
                <td width="10" style="text-align:center ;">:</td>
                <td width="340">{{ $user->biodata->major }}</td>
            </tr>
            <tr>
                <td width="150">Semester</td>
                <td width="10" style="text-align:center ;">:</td>
                <td width="340">{{ $user->biodata->semester }}</td>
            </tr>
            <tr>
                <td width="150">Nama Ayah</td>
                <td width="10" style="text-align:center ;">:</td>
                <td width="340">{{ $user->biodata->father }}</td>
            </tr>
            <tr>
                <td width="150">Nomor Telepon Ayah</td>
                <td width="10" style="text-align:center ;">:</td>
                <td width="340">{{ $user->biodata->fatherWhatsapp }}</td>
            </tr>
            <tr>
                <td width="150">Nama Ibu</td>
                <td width="10" style="text-align:center ;">:</td>
                <td width="340">{{ $user->biodata->mother }}</td>
            </tr>
            <tr>
                <td width="150">Nomor Telepon Ibu</td>
                <td width="10" style="text-align:center ;">:</td>
                <td width="340">{{ $user->biodata->motherWhatsapp }}</td>
            </tr>
            <tr>
                <td width="150">Status Kendaraan Pribadi</td>
                <td width="10" style="text-align:center ;">:</td>
                <td width="340">{{ $user->biodata->vehicle }}</td>
            </tr>
            <tr>
                <td width="150">Penyakit yang diderita</td>
                <td width="10" style="text-align:center ;">:</td>
                <td width="340">{{ $user->biodata->disease }}</td>
            </tr>
            <tr>
                <td width="175">Pengalaman Organisasi</td>
                <td width="10" style="text-align:center ;">:</td>
                <td width="340">{{ $user->biodata->organizationsExp }}</td>
            </tr>
            <tr>
                <td width="150">Tujuan Masuk SCI</td>
                <td width="10" style="text-align:center ;">:</td>
                <td width="340">{{ $user->biodata->goals }}</td>
            </tr>

        </table>
        <br><br>
        <table width="600">
            <tr>
                <td><img src="{{ asset('storage/' . $user->picture) }}" alt="{{ $user->name }}" width="150">
                </td>
                <td style="text-align: right ;" align="center">
                    <font size="2">Parepare, {{ now()->format('d F Y') }} </font><br>
                    <font size="2">Calon Peserta,</font><br><br><br><br>
                    <font size="3">{{ $user->biodata->fullname }}</font>
                </td>
            </tr>
        </table>
        <br><br><br><br><br><br><br>
        <table width="600">
            <tr>
                <td>
                    <font size="2">Catatan :</font><br>
                    <font size="1">1. Pengembalian Formulir Tidak Dapat Diwakili</font><br>
                    {{-- <font size="1">2. Apabila terdapat kesalahan data, laporkan saat pengembalian formulir atau
                        hubungi Contact Person (083137980289)</font> --}}
                </td>
            </tr>
        </table>
    </center>
    <p style="page-break-before: always ;">
        <center>

            </table>
            <div class=""><img src="{{ asset('storage/image/biodata/kop.png') }}" style="width: 600px;"
                    alt=""></div>
            <h2 style="text-decoration: underline ;">SURAT PERNYATAAN</h2>
            <table width="600" class="tabel">
                <tr>
                    <td width="150">Nama</td>
                    <td width="10" style="text-align:center ;">:</td>
                    <td width="340">{{ $user->biodata->fullname }}</td>
                </tr>
                <tr>
                    <td width="150">Calon Angkatan</td>
                    <td width="10" style="text-align:center ;">:</td>
                    <td width="340">012</td>
                </tr>
                <tr>
                    <td width="160">Tempat, Tanggal Lahir</td>
                    <td width="10" style="text-align:center ;">:</td>
                    <td width="340">
                        {{ $user->biodata->city . ', ' . date('d F Y', strtotime($user->biodata->birthday)) }}</td>
                </tr>
                <tr>
                    <td width="150">Jenis Kelamin</td>
                    <td width="10" style="text-align:center ;">:</td>
                    <td width="340">{{ $user->biodata->sex }}</td>
                </tr>
                <tr>
                    <td width="150">Agama</td>
                    <td width="10" style="text-align:center ;">:</td>
                    <td width="340">{{ $user->biodata->religion }}</td>
                </tr>
                <tr>
                    <td width="150">Alamat</td>
                    <td width="10" style="text-align:center ;">:</td>
                    <td width="340">{{ $user->biodata->address }}</td>
                </tr>
                <tr>
                    <td width="150">Asal Kampus</td>
                    <td width="10" style="text-align:center ;">:</td>
                    <td width="340">{{ $user->biodata->university }}</td>
                </tr>
                <tr>
                    <td width="150">No. WhatsApp</td>
                    <td width="10" style="text-align:center ;">:</td>
                    <td width="340">{{ $user->biodata->whatsapp }}</td>
                </tr>
            </table>
            <br><br>
            <table width="600">
                <tr>
                    <td>
                        <font size="3">Dengan ini menyatakan bahwa :</font>
    </p>
    </td>
    </tr>
    <tr>
        <td>
            <ol>
                <li>
                    <font size="3">Bersedia menjunjung tinggi nama baik SCI.</font>
                </li>
                <br>
                <li>
                    <font size="3">Bersedia mematuhi anggaran dasar dan anggaran rumah tangga serta aturan SCI
                        lainnya.</font>
                </li>
                <br>
                <li>
                    <font size="3">Bersedia berkontribusi dalam segala kegiatan SCI.</font>
                </li>
                <br>
                <li>
                    <font size="3">Bersedia aktif dan mengaktifkan kesekretariatan SCI.</font>
                </li>
            </ol>
        </td>
    </tr>
    </table>
    <!-- <br> -->
    <table width="600">
        <tr>
            <td>
                Demikian surat pernyataan ini saya buat dengan sebenar-benarnya dan tanpa adanya paksaan dari pihak
                manapun. Apabila kelak saya melanggar salah satu pdari pernyataan diatas, maka saya bersedia menerima
                sanksi berupa SP (Surat Peringatan), atau dikeluarkan dari keanggotaan SCI.
            </td>
        </tr>
    </table>
    <br><br><br>
    <table width="600">
        <tr>

            <td style="text-align: right ;">
                <font size="2">Parepare, {{ now()->format('d F Y') }}</font><br>
                <font size="2">Hormat Saya,</font>
            </td>
        </tr>
    </table>
    <table width="400">
        <tr>
            <td style="text-align: right ;">
                <font size="1">materai</font><br>
                <font size="1">10000</font>
                <br><br>
            </td>
        </tr>
        <br>
        <table width="600">

            <tr>
                <td style="text-align: right ;">
                    <font size="3">{{ $user->biodata->fullname }}</font>
                </td>
            </tr>
        </table>
        <br>
        <table width="600">
            <tr>
                <td>
                    <font size="1">Catatan : Penandatanganan harus mengenai materai 10000</font><br>
                </td>
            </tr>
        </table>
        </center>
        <p style="page-break-before: always ;">
            <center>
                <table width="600" class="kop">
                    <tr>
                        <td><img src="{{ asset('storage/image/biodata/kop.png') }}" style="width: 100%;"
                                alt=""></td>
                    </tr>
                </table>
                <table width="600">
                    <tr>
                        <td style="text-align:right ">
                            <font size="2">Parepare, {{ now()->format('d F Y') }}</font>
                        </td>
                    </tr>
                </table>
                <br><br>
                <table width="600">
                    <tr>
                        <td width="50">Hal</td>
                        <td width="50" style="text-align:center ;">:</td>
                        <td width="340">Permohonan izin</td>
                    </tr>
                </table>
                <table width="600">
                    <tr>
                        <td width="500"></td>
                        <td width="100">Yth. Orang Tua / Wali</td>
                    </tr>
                    <tr>
                        <td width="500"></td>
                        <td width="100">di-</td>
                    </tr>
                    <tr>
                        <td width="500"></td>
                        <td width="200" style="text-align:center ;">Tempat</td>
                    </tr>
                </table>
                <table width="600">
                    <tr>
                        <td colspan="3">Assalamualaikum Wr. Wb</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            Sehubungan dengan akan dilaksanakan kegiatan pengkaderan anggota baru Study Club
                            Informatika, yang insya Allah akan dilaksanakan pada :
                        </td>
                    </tr>
                    <tr>
                        <td width="150"><strong>
                                <p>Hari / Tanggal</p>
                            </strong></td>
                        <td width="50"><strong>:</strong></td>
                        <td><strong>Jum'at - Minggu / 19 - 21 Mei 2023</strong></td>
                    </tr>
                    <tr>
                        <td width="150"><strong>
                                <p>Pukul</p>
                            </strong></td>
                        <td width="50"><strong>:</strong></td>
                        <td><strong>16.00 WITA</strong></td>
                    </tr>
                    <tr>
                        <td width="150"><strong>
                                <p>Tempat</p>
                            </strong></td>
                        <td width="50"><strong>:</strong></td>
                        <td><strong>Lowita (tempat bisa saja berubah)</strong></td>
                    </tr>
                    <tr>
                        <td colspan="3">Maka dengan ini kami selaku panitia pelaksana mengharapkan kepada Bapak/Ibu
                            agar memberikan izin mengikuti kegiatan pengkaderan anggota SCI kepada anak Bapak/Ibu :</td>
                    </tr>
                    <tr>
                        <td width="200"><strong>
                                <p>Nama</p>
                            </strong></td>
                        <td width="50"><strong>:</strong></td>
                        <td><strong>{{ $user->biodata->fullname }}</strong></td>
                    </tr>
                    <tr>
                        <td width="200"><strong>
                                <p>Tempat, Tanggal Lahir</p>
                            </strong></td>
                        <td width="50"><strong>:</strong></td>
                        <td><strong>{{ $user->biodata->city . ', ' . date('d F Y', strtotime($user->biodata->birthday)) }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td width="200"><strong>
                                <p>Alamat</p>
                            </strong></td>
                        <td width="50"><strong>:</strong></td>
                        <td><strong>{{ $user->biodata->address }}</strong></td>
                    </tr>
                    <tr>
                        <td colspan="3">Demikian permohonan izin ini kami sampaikan, atas perhatian bapak/ibu kami
                            mengucapkan banyak terima kasih.</td>
                    </tr>
                    <tr>
                        <td colspan="3">Wassalamualaikum Wr. Wb.</td>
                    </tr>
                </table>
                <br>
                <table width="600">
                    <tr>
                        <td width="450"></td>
                        <td style="text-align: center;">
                            <font> Orang Tua/Wali</font>
                            <br><br><br><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td width="450"></td>
                        <td>
                            <hr>
                        </td>
                    </tr>
                </table>
            </center>
            <script>
                window.print();
            </script>

</body>

</html>
