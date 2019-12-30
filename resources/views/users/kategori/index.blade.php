@extends('layouts.app')

@section('content')

            {{-- @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif

            @if(Session::has('fail'))
                <div class="alert alert-danger">
                {{Session::get('fail')}}
                </div>
            @endif --}}

    <br> <h2 align="center">List Kategori</h2> <br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <button type="button" class="btn btn-outline-primary col-md-12 " data-toggle="modal" data-target="#exampleModalKategori" style="margin: 1%;padding: 1%"> ADD </button>

                        <table align="center" class="table table-striped" style="margin: 1% ; padding: 1%">
                            <thead align="center">
                                <tr>
                                    <th>Nomor</th>
                                    <th>Kode Kategori</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
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
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a class="btn btn-warning text-white" data-toggle="modal" data-target="#modaledit{{$kategories -> KdKategori}}"><i class="fa fa-edit fa-lg"></i> Ubah Data</a>
                                                        <a class="btn btn-danger text-white" href="/users/kategori/delete/{{ $kategories->KdKategori }}" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');"><i class="fa fa-trash fa-lg"></i> Hapus Data</a>
                                                    </div>

                                                     <!-- Modal Edit -->
                                                    <div class="modal fade " id="modaledit{{$kategories -> KdKategori}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content modal-lg">
                                                                <div class="modal-header"> Update Kategori </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST" action="{{ route('prosesubahkategori') }}">
                                                                            {{ csrf_field() }}
                                                                            <input type="hidden" value="{{ $kategories->KdKategori }}" name="id">
                                                                            <div class="form-group row">
                                                                                <label for="KdKategori{{$nomor}}" class="col-md-4 col-form-label text-md-right">Kode Kategori</label>
                                                                                <div class="col-md-6">
                                                                                    <input id="KdKategori{{$nomor}}" type="text" value="{{ $kategories->KdKategori }}" class="form-control{{ $errors->has('KdKategori') ? ' is-invalid' : '' }}" name="KdKategori" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="NmKategori{{$nomor}}" class="col-md-4 col-form-label text-md-right">Nama Kategori</label>
                                                                                <div class="col-md-6">
                                                                                    <input id="NmKategori{{$nomor}}"  type="text" value="{{ $kategories->NmKategori }}" class="form-control{{ $errors->has('NmKategori') ? ' is-invalid' : '' }}" maxlength="50" name="NmKategori" required autofocus>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row mb-0">
                                                                                <div class="col-md-6 offset-md-4">
                                                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
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


    <!-- Modal Add -->
    <div class="modal fade " id="exampleModalKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
        @endif

            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-lg">
                    <div class="modal-header"> Input Kategori </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('tambahkategori') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="KdKategori" class="col-md-4 col-form-label text-md-right">Kode Kategori</label>
                                    <div class="col-md-6">
                                        <input id="KdKategori" type="text" class="form-control{{ $errors->has('KdKategori') ? ' is-invalid' : '' }}" name="KdKategori" value="{{ $kd }}" required readonly >
                                        @if ($errors->has('KdKategori'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('KdKategori') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="NmKategori" class="col-md-4 col-form-label text-md-right">Nama Kategori</label>
                                    <div class="col-md-6">
                                        <input id="NmKategori" type="text" class="form-control{{ $errors->has('NmKategori') ? ' is-invalid' : '' }}" name="NmKategori" value="{{ old('NmKategori') }}" maxlength="50" onkeypress="return huruf(event)" required autofocus>
                                        @if ($errors->has('NmKategori'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('NmKategori') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('ADD') }}
                                        </button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <div class="container">
            <div class="row" style="margin: 1% ; padding: 1%">
                {{ $kategori->links() }}
            </div>
        </div>


@endsection
