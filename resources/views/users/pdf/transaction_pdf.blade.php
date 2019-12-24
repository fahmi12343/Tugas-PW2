@extends('layouts.app')

@section('content')

<br> <h2 align="center">List Kategori</h2> <br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <button type="button" class="btn btn-outline-primary col-md-12 " data-toggle="modal" data-target="#exampleModalKategori" style="margin: 1%;padding: 1%"> ADD </button>

                        <table align="center" class="table table-striped" style="margin: 1% ; padding: 1%">
                            <thead align="center">
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nomor Pesan</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Kode Pelanggan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody align="center">
                                @php
                                    $nomor = 1;
                                @endphp
                                    @if(!empty($transaction) && $transaction->count())
                                    @foreach($transaction as $key => $transactions)

                                            <tr>
                                                <td>{{ $nomor }}</td>
                                                <td>{{ $transactions -> KdKategori }}</td>
                                                <td>{{ $transactions -> NmKategori }}</td>
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

                </div>
            </div>
        </div>

        @endsection
