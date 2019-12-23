<?php $__env->startSection('content'); ?>

    <br> <h2 align="center">Pesan Barang</h2> <br>

            <div class="container">
                <form method="POST" action="<?php echo e(route('tambahtransaction')); ?>">
                    <div class="row justify-content-center">
                        <div class="col-md-6">



                            <?php echo e(csrf_field()); ?>


                            <div class="form-group row">
                                <label for="NoPesan" class="col-md-4 col-form-label text-md-right">Kode Pesanan</label>
                                <div class="col-md-12">
                                    <input id="NoPesan" type="text" class="form-control<?php echo e($errors->has('NoPesan') ? ' is-invalid' : ''); ?>" name="NoPesan" value="<?php echo e($kd); ?>" required readonly >
                                    <?php if($errors->has('NoPesan')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('NoPesan')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <label for="KdBrg" class="col-md-4 col-form-label text-md-right">Barang</label>
                                <div class="col-md-12">
                                    <select class="form-control" name="KdBrg" id="listBrg" required>
                                            <option value="">--Pilih Barang--</option>
                                        <?php $__currentLoopData = $barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barangs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($barangs -> KdBrg); ?>"> <?php echo e($barangs -> NmBrg); ?> - <?php echo e($barangs -> KdBrg); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Satuan" class="col-md-4 col-form-label text-md-right">Satuan</label>
                                <div class="col-md-12">
                                    <input id="Satuan" type="text" value="" class="form-control" name="Satuan" readonly required >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="HargaBrg" class="col-md-4 col-form-label text-md-right">Harga Barang</label>
                                <div class="col-md-12">
                                    <input id="HargaBrg" type="text" value="" class="form-control" name="HargaBrg" readonly readonly >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Stok" class="col-md-4 col-form-label text-md-right">Stok</label>
                                <div class="col-md-12">
                                    <input id="Stok" type="text" value="" class="form-control" name="Stok" readonly required >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="NmKategori" class="col-md-4 col-form-label text-md-right">Nama Kategori</label>
                                <div class="col-md-12">
                                    <input id="NmKategori" type="text" value="" class="form-control" name="NmKategori" readonly required >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="JmlPesan" class="col-md-4 col-form-label text-md-right">JmlPesan    </label>
                                <div class="col-md-12">
                                    <input id="JmlPesan" type="text" value="" class="form-control<?php echo e($errors->has('JmlPesan  ') ? ' is-invalid' : ''); ?>" name="JmlPesan" value="<?php echo e(old('JmlPesan   ')); ?>" onkeypress="return angka(event)" maxlength="2" required >
                                    <?php if($errors->has('JmlPesan')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('JmlPesan')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group row">
                                <label for="TglPesan" class="col-md-4 col-form-label text-md-right">Tanggal Pesan</label>
                                <div class="col-md-12">
                                    <input id="TglPesan" type="text" value="<?php echo e(date('Y-m-d')); ?>" class="form-control<?php echo e($errors->has('TglPesan') ? ' is-invalid' : ''); ?>" name="TglPesan" value="<?php echo e(old('TglPesan')); ?>" maxlength="15" readonly required >
                                    <?php if($errors->has('TglPesan')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('TglPesan')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <label for="KdPlg" class="col-md-4 col-form-label text-md-right">Pelanggan</label>
                                <div class="col-md-12">
                                    <select class="form-control" name="KdPlg" id="listPlg" required>
                                            <option value="">--Pilih Pelanggan--</option>
                                        <?php $__currentLoopData = $pelanggan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pelanggans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($pelanggans -> KdPlg); ?>"><?php echo e($pelanggans -> NmPlg); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="AlamatPlg" class="col-md-4 col-form-label text-md-right">Alamat Pelanggan</label>
                                <div class="col-md-12">
                                    <textarea maxlength="50" id="AlamatPlg" type="text" class="form-control" name="AlamatPlg" readonly required autofocus cols="10" rows="6"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="TelpPlg" class="col-md-4 col-form-label text-md-right">Telfon Pelanggan</label>
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




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\barang_0369\resources\views/users/transaction/index.blade.php ENDPATH**/ ?>