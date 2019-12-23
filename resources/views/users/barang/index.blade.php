@extends('layouts.app')

@section('content')

    <br> <h2 align="center">List Barang</h2> <br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <button type="button" class="btn btn-outline-primary col-md-12 " data-toggle="modal" data-target="#exampleModalBarang" style="margin: 1%;padding: 1%"> ADD </button>

                        <table align="center" class="table table-striped" style="margin: 1% ; padding: 1%">
                            <thead align="center">
                                <tr>
                                    <th>Nomor</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>
                                    <th>Harga Barang</th>
                                    <th>Stok</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody align="center">
                                @php
                                    $nomor = 1;
                                @endphp
                                    @if(!empty($join) && $join->count())
                                        @foreach($join as $key => $joins)

                                                <tr>
                                                    <td>{{ $nomor }}</td>
                                                    <td>{{ $joins -> KdBrg }}</td>
                                                    <td>{{ $joins -> NmBrg }}</td>
                                                    <td>{{ $joins -> Satuan }}</td>
                                                    <td>{{ $joins -> HargaBrg }}</td>
                                                    <td>{{ $joins -> Stok }}</td>
                                                    <td>{{ $joins -> NmKategori }}</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a class="btn btn-warning text-white" data-toggle="modal" data-target="#modaledit{{ $joins->KdBrg }}"><i class="fa fa-edit fa-lg"></i> Ubah Data</a>
                                                            <a class="btn btn-danger text-white" href="/users/barang/delete/{{ $joins->KdBrg }}" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');"><i class="fa fa-trash fa-lg"></i> Hapus Data</a>
                                                        </div>

                                                        <!-- Modal Edit -->
                                                        <div class="modal fade " id="modaledit{{ $joins->KdBrg }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">


                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content modal-lg">
                                                                    <div class="modal-header"> Update Pelanggan </div>
                                                                        <div class="modal-body">
                                                                            <form method="POST" action="{{route('prosesubahbarang')}}">
                                                                            {{ csrf_field() }}
                                                                                <input type="hidden" value="{{ $joins->KdBrg }}" name="id">

                                                                                <div class="form-group row">
                                                                                    <label for="KdBrg" class="col-md-4 col-form-label text-md-right">Kode Barang</label>
                                                                                    <div class="col-md-6">
                                                                                        <input id="KdBrg" type="text" value="{{ $joins->KdBrg }}"class="form-control{{ $errors->has('KdBrg') ? ' is-invalid' : '' }}" name="KdBrg" value="{{ $kd }}" required readonly >
                                                                                        @if ($errors->has('KdBrg'))
                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                <strong>{{ $errors->first('KdBrg') }}</strong>
                                                                                            </span>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label for="NmBrg" class="col-md-4 col-form-label text-md-right">Nama Pelanggan</label>
                                                                                    <div class="col-md-6">
                                                                                        <input id="NmBrg" type="text" value="{{ $joins->NmBrg }}" class="form-control{{ $errors->has('NmBrg') ? ' is-invalid' : '' }}" name="NmBrg" value="{{ old('NmBrg') }}" maxlength="50" onkeypress="return huruf(event)" required autofocus>
                                                                                        @if ($errors->has('NmBrg'))
                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                <strong>{{ $errors->first('NmBrg') }}</strong>
                                                                                            </span>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label for="Satuan" class="col-md-4 col-form-label text-md-right">Satuan</label>
                                                                                    <div class="col-md-6">
                                                                                        <input id="Satuan" type="text" value="{{ $joins->Satuan }}" class="form-control{{ $errors->has('Satuan') ? ' is-invalid' : '' }}" name="Satuan" value="{{ old('Satuan') }}" maxlength="10" onkeypress="return huruf(event)" required autofocus>
                                                                                        @if ($errors->has('Satuan'))
                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                <strong>{{ $errors->first('Satuan') }}</strong>
                                                                                            </span>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label for="HargaBrg" class="col-md-4 col-form-label text-md-right">Harga Barang</label>
                                                                                    <div class="col-md-6">
                                                                                        <input id="HargaBrg" type="text" value="{{ $joins->HargaBrg }}" class="form-control{{ $errors->has('HargaBrg') ? ' is-invalid' : '' }}" name="HargaBrg" value="{{ old('HargaBrg') }}" maxlength="6" onkeypress="return angka(event)" required autofocus>
                                                                                        @if ($errors->has('HargaBrg'))
                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                <strong>{{ $errors->first('HargaBrg') }}</strong>
                                                                                            </span>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label for="Stok" class="col-md-4 col-form-label text-md-right">Stok</label>
                                                                                    <div class="col-md-6">
                                                                                        <input id="Stok" type="text" value="{{ $joins->Stok }}" class="form-control{{ $errors->has('Stok') ? ' is-invalid' : '' }}" name="Stok" value="{{ old('Stok') }}" maxlength="3" onkeypress="return angka(event)" required autofocus>
                                                                                        @if ($errors->has('Stok'))
                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                <strong>{{ $errors->first('Stok') }}</strong>
                                                                                            </span>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label for="Stok" class="col-md-4 col-form-label text-md-right">Nama Kategori</label>
                                                                                    <div class="col-md-6">
                                                                                        <select class="form-control" name="KdKategori" required>
                                                                                            @foreach ($kategori as $kategories)
                                                                                                <option value="{{ $kategories -> KdKategori }}"  {{ ($joins -> KdKategori ==  $kategories -> KdKategori) ? 'selected' : ''  }}>{{ $kategories -> NmKategori }}</option>
                                                                                            @endforeach
                                                                                        </select>
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
    <div class="modal fade " id="exampleModalBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

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
                    <div class="modal-header"> Input Barang </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('tambahbarang') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="KdBrg" class="col-md-4 col-form-label text-md-right">Kode Barang</label>
                                        <div class="col-md-6">
                                            <input id="KdBrg" type="text" class="form-control{{ $errors->has('KdBrg') ? ' is-invalid' : '' }}" name="KdBrg" value="{{ $kd }}" required readonly >
                                            @if ($errors->has('KdBrg'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('KdBrg') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="NmBrg" class="col-md-4 col-form-label text-md-right">Nama Pelanggan</label>
                                        <div class="col-md-6">
                                            <input id="NmBrg" type="text" class="form-control{{ $errors->has('NmBrg') ? ' is-invalid' : '' }}" name="NmBrg" value="{{ old('NmBrg') }}" maxlength="50" onkeypress="return huruf(event)" required autofocus>
                                            @if ($errors->has('NmBrg'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('NmBrg') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Satuan" class="col-md-4 col-form-label text-md-right">Satuan</label>
                                        <div class="col-md-6">
                                            <input id="Satuan" type="text" class="form-control{{ $errors->has('Satuan') ? ' is-invalid' : '' }}" name="Satuan" value="{{ old('Satuan') }}" maxlength="10" onkeypress="return huruf(event)" required autofocus>
                                            @if ($errors->has('Satuan'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('Satuan') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="HargaBrg" class="col-md-4 col-form-label text-md-right">Harga Barang</label>
                                        <div class="col-md-6">
                                            <input id="HargaBrg" type="text" class="form-control{{ $errors->has('HargaBrg') ? ' is-invalid' : '' }}" name="HargaBrg" value="{{ old('HargaBrg') }}" maxlength="6" onkeypress="return angka(event)" required autofocus>
                                            @if ($errors->has('HargaBrg'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('HargaBrg') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Stok" class="col-md-4 col-form-label text-md-right">Stok</label>
                                        <div class="col-md-6">
                                            <input id="Stok" type="text" class="form-control{{ $errors->has('Stok') ? ' is-invalid' : '' }}" name="Stok" value="{{ old('Stok') }}" maxlength="3" onkeypress="return angka(event)" required autofocus>
                                            @if ($errors->has('Stok'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('Stok') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Stok" class="col-md-4 col-form-label text-md-right">Nama Kategori</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="KdKategori" required>
                                                @foreach ($kategori as $kategories)
                                                    <option value="{{ $kategories -> KdKategori }}">{{ $kategories -> NmKategori }} </option>
                                                @endforeach
                                            </select>
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
            {{ $join->links() }}
        </div>
    </div>

@endsection
