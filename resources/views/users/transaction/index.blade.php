@extends('layouts.app')

@section('content')

    <br> <h2 align="center">Pesan Barang</h2> <br>
            <div class="container">
                <form method="POST" action="{{route('tambahtransaction')}}">
                    <div class="row justify-content-center">
                        <div class="col-md-6">



                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="NoPesan" class="col-md-4 col-form-label ">Kode Pesanan</label>
                                <div class="col-md-12">
                                    <input id="NoPesan" type="text" class="form-control{{ $errors->has('NoPesan') ? ' is-invalid' : '' }}" name="NoPesan" value="{{ $kd }}" required readonly >
                                    @if ($errors->has('NoPesan'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('NoPesan') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <label for="KdBrg" class="col-md-4 col-form-label ">Barang</label>
                                <div class="col-md-12">
                                    <select class="form-control" name="KdBrg" id="listBrg" required>
                                            <option value="">--Pilih Barang--</option>
                                        @foreach ($barang as $barangs)
                                            <option value="{{ $barangs -> KdBrg }}"> {{ $barangs -> NmBrg}} - {{ $barangs -> KdBrg }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Satuan" class="col-md-4 col-form-label ">Satuan</label>
                                <div class="col-md-12">
                                    <input id="Satuan" type="text" value="" class="form-control" name="Satuan" readonly required >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="HargaBrg" class="col-md-4 col-form-label ">Harga Barang</label>
                                <div class="col-md-12">
                                    <input id="HargaBrg" type="text" value="" class="form-control" name="HargaBrg" readonly readonly >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Stok" class="col-md-4 col-form-label ">Stok</label>
                                <div class="col-md-12">
                                    <input id="Stok" type="text" value="" class="form-control" name="Stok" readonly required >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="NmKategori" class="col-md-4 col-form-label ">Nama Kategori</label>
                                <div class="col-md-12">
                                    <input id="NmKategori" type="text" value="" class="form-control" name="NmKategori" readonly required >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="JmlPesan" class="col-md-4 col-form-label ">JmlPesan    </label>
                                <div class="col-md-12">
                                    <input id="JmlPesan" type="text" value="" class="form-control{{ $errors->has('JmlPesan  ') ? ' is-invalid' : '' }}" name="JmlPesan" value="{{ old('JmlPesan   ') }}" onkeypress="return angka(event)" maxlength="2" required >
                                    @if ($errors->has('JmlPesan'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('JmlPesan') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group row">
                                <label for="TglPesan" class="col-md-4 col-form-label ">Tanggal Pesan</label>
                                <div class="col-md-12">
                                    <input id="TglPesan" type="text" value="{{ date('Y-m-d') }}" class="form-control{{ $errors->has('TglPesan') ? ' is-invalid' : '' }}" name="TglPesan" value="{{ old('TglPesan') }}" maxlength="15" readonly required >
                                    @if ($errors->has('TglPesan'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('TglPesan') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <label for="KdPlg" class="col-md-4 col-form-label ">Pelanggan</label>
                                <div class="col-md-12">
                                    <select class="form-control" name="KdPlg" id="listPlg" required>
                                            <option value="">--Pilih Pelanggan--</option>
                                        @foreach ($pelanggan as $pelanggans)
                                            <option value="{{ $pelanggans -> KdPlg }}">{{ $pelanggans -> NmPlg}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="AlamatPlg" class="col-md-4 col-form-label ">Alamat Pelanggan</label>
                                <div class="col-md-12">
                                    <textarea maxlength="50" id="AlamatPlg" type="text" class="form-control" name="AlamatPlg" readonly required autofocus cols="10" rows="6"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="TelpPlg" class="col-md-4 col-form-label ">Telfon Pelanggan</label>
                                <div class="col-md-12">
                                    <input id="TelpPlg" type="text" class="form-control" name="TelpPlg" maxlength="15" readonly onkeypress="return angka(event)" required >
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-12 offset-md-10">
                                    <button type="submit" class="btn btn-primary">ADD</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>




@endsection
