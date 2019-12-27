

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
        <h3>Report Pembelian</h3>
        <h5>Menampilkan Report Berdasarkan Nomor Pesan dan Pembelian Barang</h5>

	</center>

	<table class='table table-bordered'>
		<thead align="center">
            <tr>
                <th>Nomor </th>
                <th>Nomor Pesan </th>
                <th>Tanggal Pesan` </th>
                <th>Nama Barang </th>
                <th>Jumlah Pesan </th>
                <th>Harga Barang </th>
                <th>Nama Pelanggan </th>
            </tr>
        </thead>

        <tbody align="center">
            @php
                $nomor = 1;
            @endphp
                @if(!empty($view) && $view->count())
                @foreach($view as $key => $views)

                        <tr>
                            <td>{{ $nomor }}</td>
                            <td>{{ $views -> NoPesan }}</td>
                            <td>{{ $views -> TglPesan }}</td>
                            <td>{{ $views -> NmBrg }}</td>
                            <td>{{ $views -> JmlPesan }}</td>
                            <td>{{ $views -> HargaBrg }}</td>
                            <td>{{ $views -> NmPlg }}</td>

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
