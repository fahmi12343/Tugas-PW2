@extends('layouts.app')

@section('content')

    <br> <h2 align="center">List Pelanggan</h2> <br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <button type="button" class="btn btn-outline-primary col-md-12 " data-toggle="modal" data-target="#exampleModalPelanggan" style="margin: 1%;padding: 1%"> ADD </button>

                        <table align="center" class="table table-striped" style="margin: 1% ; padding: 1%">
                            <thead align="center">
                                <tr>
                                    <th>Nomor</th>
                                    <th>Kode Pelanggan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat Pelanggan</th>
                                    <th>Telfon Pelanggan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody align="center">
                                @php
                                    $nomor = 1;
                                @endphp

                                            @if(!empty($pelanggan) && $pelanggan->count())
                                            @foreach($pelanggan as $key => $pelanggans)

                                            <tr>
                                                <td>{{ $nomor }}</td>
                                                <td>{{ $pelanggans -> KdPlg }}</td>
                                                <td>{{ $pelanggans -> NmPlg }}</td>
                                                <td>{{ $pelanggans -> AlamatPlg }}</td>
                                                <td>{{ $pelanggans -> TelpPlg }}</td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a class="btn btn-warning text-white" data-toggle="modal" data-target="#modaledit{{ $pelanggans->KdPlg }}"><i class="fa fa-edit fa-lg"></i> Ubah Data</a>
                                                        <a class="btn btn-danger text-white" href="/users/pelanggan/delete/{{ $pelanggans->KdPlg }}" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');"><i class="fa fa-trash fa-lg"></i> Hapus Data</a>
                                                    </div>

                                                    <!-- Modal Edit -->
                                                    <div class="modal fade " id="modaledit{{ $pelanggans->KdPlg }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">


                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content modal-lg">
                                                                <div class="modal-header"> Update Pelanggan </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST" action="{{route('prosesubahpelanggan')}}">
                                                                        {{ csrf_field() }}
                                                                            <input type="hidden" value="{{ $pelanggans->KdPlg }}" name="id">

                                                                            <div class="form-group row">
                                                                                <label for="KdPlg{{$nomor}}" class="col-md-4 col-form-label text-md-right">Kode Pelanggan</label>
                                                                                <div class="col-md-6">
                                                                                    <input id="KdPlg{{$nomor}}" type="text" class="form-control{{ $errors->has('KdPlg') ? ' is-invalid' : '' }}" name="KdPlg" value="{{ $pelanggans->KdPlg }}" required readonly >
                                                                                    @if ($errors->has('KdPlg'))
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $errors->first('KdPlg') }}</strong>
                                                                                        </span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                            <label for="NmPlg{{$nomor}}" class="col-md-4 col-form-label text-md-right">Nama Pelanggan</label>
                                                                                <div class="col-md-6">
                                                                                    <input id="NmPlg{{$nomor}}" type="text" value="{{ $pelanggans->NmPlg }}" class="form-control{{ $errors->has('NmPlg') ? ' is-invalid' : '' }}" name="NmPlg" value="{{ old('NmPlg') }}" maxlength="50" required autofocus>
                                                                                    @if ($errors->has('NmPlg'))
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $errors->first('NmPlg') }}</strong>
                                                                                        </span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="AlamatPlg{{$nomor}}" class="col-md-4 col-form-label text-md-right">Alamat Pelanggan</label>
                                                                                <div class="col-md-6">
                                                                                    <textarea maxlength="50" id="AlamatPlg{{$nomor}}" type="text" class="form-control{{ $errors->has('AlamatPlg') ? ' is-invalid' : '' }}" name="AlamatPlg" value="{{ old('AlamatPlg') }}"  required autofocus cols="15" rows="10">{{$pelanggans -> AlamatPlg}}</textarea>
                                                                                    @if ($errors->has('AlamatPlg'))
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $errors->first('AlamatPlg') }}</strong>
                                                                                        </span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="TelpPlg{{$nomor}}" class="col-md-4 col-form-label text-md-right">Telfon Pelanggan</label>
                                                                                <div class="col-md-6">
                                                                                    <input id="TelpPlg{{$nomor}}" type="text" value="{{ $pelanggans->TelpPlg }}" class="form-control{{ $errors->has('TelpPlg') ? ' is-invalid' : '' }}" name="TelpPlg" value="{{ old('TelpPlg') }}" maxlength="15" onkeypress="return angka(event)" required >
                                                                                    @if ($errors->has('TelpPlg'))
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $errors->first('TelpPlg') }}</strong>
                                                                                        </span>
                                                                                    @endif
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
    </div>

    <!-- Modal Add -->
    <div class="modal fade " id="exampleModalPelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

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
                    <div class="modal-header"> Input Pelanggan </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('tambahpelanggan') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="KdPlg" class="col-md-4 col-form-label text-md-right">Kode Pelanggan</label>
                                        <div class="col-md-6">
                                            <input id="KdPlg" type="text" class="form-control{{ $errors->has('KdPlg') ? ' is-invalid' : '' }}" name="KdPlg" value="{{ $kd }}" required readonly >
                                            @if ($errors->has('KdPlg'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('KdPlg') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="NmPlg" class="col-md-4 col-form-label text-md-right">Nama Pelanggan</label>
                                        <div class="col-md-6">
                                            <input id="NmPlg" type="text" class="form-control{{ $errors->has('NmPlg') ? ' is-invalid' : '' }}" name="NmPlg" value="{{ old('NmPlg') }}" maxlength="50" onkeypress="return huruf(event)" required autofocus>
                                            @if ($errors->has('NmPlg'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('NmPlg') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="AlamatPlg" class="col-md-4 col-form-label text-md-right">Alamat Pelanggan</label>
                                        <div class="col-md-6">
                                            <textarea maxlength="50" id="AlamatPlg" type="text" class="form-control{{ $errors->has('AlamatPlg') ? ' is-invalid' : '' }}" name="AlamatPlg" value="{{ old('AlamatPlg') }}"  required autofocus cols="15" rows="10"></textarea>
                                            @if ($errors->has('AlamatPlg'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('AlamatPlg') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="TelpPlg" class="col-md-4 col-form-label text-md-right">Telfon Pelanggan</label>
                                        <div class="col-md-6">
                                            <input id="TelpPlg" type="text" class="form-control{{ $errors->has('TelpPlg') ? ' is-invalid' : '' }}" name="TelpPlg" value="{{ old('TelpPlg') }}" maxlength="15" onkeypress="return angka(event)" required >
                                            @if ($errors->has('TelpPlg'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('TelpPlg') }}</strong>
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
    </div>

    <div class="container">
        <div class="row" style="margin: 1% ; padding: 1%">
            {{ $pelanggan->links() }}
        </div>
    </div>


@endsection
