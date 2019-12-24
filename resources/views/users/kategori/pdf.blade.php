

<!DOCTYPE html>
<html>
<head>
	<title>Report PDF</title>
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('../../css/bootstrap.min.css') }}"> --}}
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Penjualan</h4>

	</center>

	<table class='table table-bordered'>
		<thead align="center">
            <tr>
                <th>Nomor </th>
                <th>Kode Kategori </th>
                <th>Nama Kategori </th>
            </tr>
        </thead>

        <tbody align="center">
            @php
                $nomor = 1;
            @endphp
                @if(!empty($kategori) && $kategori->count())
                @foreach($kategori as $key => $kategories)

                        <tr>
                            <td>{{ $nomor }}</td>
                            <td>{{ $kategories -> KdKategori }}</td>
                            <td>{{ $kategories -> NmKategori }}</td>

                        </tr>

            @php
                $nomor++;
            @endphp

        @endforeach
        @else
            <tr>
                <td colspan="10">There are no data.</td>
            </tr>
        @endif
        </tbody>
	</table>
    {{-- <script type="text/javascript" src="{{ asset('../../js/bootstrap.min.js') }}"></script> --}}
</body>
</html>
