<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    SmartVillage
                </div>

                <div class="links">
                    <a href="/data/KartuKeluarga/create">Kartu Keluarga</a>
                    <a href="/data/Penduduk/create">Data Penduduk</a>
                    <a href="/data/PerizinanKTP/create">Perizinan KTP</a>
                    <br><br><br>
                    <a href="/data/JenisKeuanganDesa/create">Jenis Keuangan Desa</a>
                    <a href="/data/KeuanganDesa/create">Keuangan Desa</a>
                    <a href="/data/Informasi/create">Informasi Kegiatan</a>
                    <br><br><br>
                    <a href="/data/LayananSurat/create">Layanan Surat</a>
                    <a href="/data/SuratUmum/create">Surat Umum</a>
                    <a href="/data/SuratMiskin/create">Surat Miskin</a>
                    <a href="/data/SuratTidakMampu/create">Surat Tidak Mampu</a>
                    <br><br><br>
                    <a href="/data/Kependudukan/create">Kependudukan</a>
                    <a href="/data/SuratKelahiran/create">Surat Kelahiran</a>
                    <a href="/data/SuratKematian/create">Surat Kematian</a>


                </div>
            </div>
        </div>
    </body>
</html>
