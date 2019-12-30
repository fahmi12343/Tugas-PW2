<?php $__env->startSection('content'); ?>

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
                                <?php
                                    $nomor = 1;
                                ?>
                                    <?php if(!empty($join) && $join->count()): ?>
                                        <?php $__currentLoopData = $join; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $joins): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <tr>
                                                    <td><?php echo e($nomor); ?></td>
                                                    <td><?php echo e($joins -> KdBrg); ?></td>
                                                    <td><?php echo e($joins -> NmBrg); ?></td>
                                                    <td><?php echo e($joins -> Satuan); ?></td>
                                                    <td><?php echo e($joins -> HargaBrg); ?></td>
                                                    <td><?php echo e($joins -> Stok); ?></td>
                                                    <td><?php echo e($joins -> NmKategori); ?></td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a class="btn btn-warning text-white" data-toggle="modal" data-target="#modaledit<?php echo e($joins->KdBrg); ?>"><i class="fa fa-edit fa-lg"></i> Ubah Data</a>
                                                            <a class="btn btn-danger text-white" href="/users/barang/delete/<?php echo e($joins->KdBrg); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');"><i class="fa fa-trash fa-lg"></i> Hapus Data</a>
                                                        </div>

                                                        <!-- Modal Edit -->
                                                        <div class="modal fade " id="modaledit<?php echo e($joins->KdBrg); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">


                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content modal-lg">
                                                                    <div class="modal-header"> Update Barang </div>
                                                                        <div class="modal-body">
                                                                            <form method="POST" action="<?php echo e(route('prosesubahbarang')); ?>">
                                                                            <?php echo e(csrf_field()); ?>

                                                                                <input type="hidden" value="<?php echo e($joins->KdBrg); ?>" name="id">

                                                                                <div class="form-group row">
                                                                                    <label for="KdBrg" class="col-md-4 col-form-label text-md-right">Kode Barang</label>
                                                                                    <div class="col-md-6">
                                                                                        <input id="KdBrg" type="text" value="<?php echo e($joins->KdBrg); ?>"class="form-control<?php echo e($errors->has('KdBrg') ? ' is-invalid' : ''); ?>" name="KdBrg" value="<?php echo e($kd); ?>" required readonly >
                                                                                        <?php if($errors->has('KdBrg')): ?>
                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                <strong><?php echo e($errors->first('KdBrg')); ?></strong>
                                                                                            </span>
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label for="NmBrg" class="col-md-4 col-form-label text-md-right">Nama Barang</label>
                                                                                    <div class="col-md-6">
                                                                                        <input id="NmBrg" type="text" value="<?php echo e($joins->NmBrg); ?>" class="form-control<?php echo e($errors->has('NmBrg') ? ' is-invalid' : ''); ?>" name="NmBrg" value="<?php echo e(old('NmBrg')); ?>" maxlength="50" onkeypress="return huruf(event)" required autofocus>
                                                                                        <?php if($errors->has('NmBrg')): ?>
                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                <strong><?php echo e($errors->first('NmBrg')); ?></strong>
                                                                                            </span>
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label for="Satuan" class="col-md-4 col-form-label text-md-right">Satuan</label>
                                                                                    <div class="col-md-6">
                                                                                        <input id="Satuan" type="text" value="<?php echo e($joins->Satuan); ?>" class="form-control<?php echo e($errors->has('Satuan') ? ' is-invalid' : ''); ?>" name="Satuan" value="<?php echo e(old('Satuan')); ?>" maxlength="10" onkeypress="return huruf(event)" required autofocus>
                                                                                        <?php if($errors->has('Satuan')): ?>
                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                <strong><?php echo e($errors->first('Satuan')); ?></strong>
                                                                                            </span>
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label for="HargaBrg" class="col-md-4 col-form-label text-md-right">Harga Barang</label>
                                                                                    <div class="col-md-6">
                                                                                        <input id="HargaBrg" type="text" value="<?php echo e($joins->HargaBrg); ?>" class="form-control<?php echo e($errors->has('HargaBrg') ? ' is-invalid' : ''); ?>" name="HargaBrg" value="<?php echo e(old('HargaBrg')); ?>" maxlength="6" onkeypress="return angka(event)" required autofocus>
                                                                                        <?php if($errors->has('HargaBrg')): ?>
                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                <strong><?php echo e($errors->first('HargaBrg')); ?></strong>
                                                                                            </span>
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label for="Stok" class="col-md-4 col-form-label text-md-right">Stok</label>
                                                                                    <div class="col-md-6">
                                                                                        <input id="Stok" type="text" value="<?php echo e($joins->Stok); ?>" class="form-control<?php echo e($errors->has('Stok') ? ' is-invalid' : ''); ?>" name="Stok" value="<?php echo e(old('Stok')); ?>" maxlength="3" onkeypress="return angka(event)" required autofocus>
                                                                                        <?php if($errors->has('Stok')): ?>
                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                <strong><?php echo e($errors->first('Stok')); ?></strong>
                                                                                            </span>
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label for="Stok" class="col-md-4 col-form-label text-md-right">Nama Kategori</label>
                                                                                    <div class="col-md-6">
                                                                                        <select class="form-control" name="KdKategori" required>
                                                                                            <option value="" selected disabled>--Pilih Pelanggan--</option>

                                                                                            <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <option value="<?php echo e($kategories -> KdKategori); ?>"  <?php echo e(($joins -> KdKategori ==  $kategories -> KdKategori) ? 'selected' : ''); ?>><?php echo e($kategories -> NmKategori); ?></option>
                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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




                                    <?php
                                        $nomor++;
                                    ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="10">There are no data.</td>
                                </tr>
                            <?php endif; ?>
							</tbody>

                        </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add -->
    <div class="modal fade " id="exampleModalBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
        <?php endif; ?>

            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-lg">
                    <div class="modal-header"> Input Barang </div>
                        <div class="modal-body">
                            <form method="POST" action="<?php echo e(route('tambahbarang')); ?>">
                                    <?php echo csrf_field(); ?>

                                    <div class="form-group row">
                                        <label for="KdBrg" class="col-md-4 col-form-label text-md-right">Kode Barang</label>
                                        <div class="col-md-6">
                                            <input id="KdBrg" type="text" class="form-control<?php echo e($errors->has('KdBrg') ? ' is-invalid' : ''); ?>" name="KdBrg" value="<?php echo e($kd); ?>" required readonly >
                                            <?php if($errors->has('KdBrg')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('KdBrg')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="NmBrg" class="col-md-4 col-form-label text-md-right">Nama Barang</label>
                                        <div class="col-md-6">
                                            <input id="NmBrg" type="text" class="form-control<?php echo e($errors->has('NmBrg') ? ' is-invalid' : ''); ?>" name="NmBrg" value="<?php echo e(old('NmBrg')); ?>" maxlength="50" onkeypress="return huruf(event)" required autofocus>
                                            <?php if($errors->has('NmBrg')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('NmBrg')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Satuan" class="col-md-4 col-form-label text-md-right">Satuan</label>
                                        <div class="col-md-6">
                                            <input id="Satuan" type="text" class="form-control<?php echo e($errors->has('Satuan') ? ' is-invalid' : ''); ?>" name="Satuan" value="<?php echo e(old('Satuan')); ?>" maxlength="10" onkeypress="return huruf(event)" required autofocus>
                                            <?php if($errors->has('Satuan')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('Satuan')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="HargaBrg" class="col-md-4 col-form-label text-md-right">Harga Barang</label>
                                        <div class="col-md-6">
                                            <input id="HargaBrg" type="text" class="form-control<?php echo e($errors->has('HargaBrg') ? ' is-invalid' : ''); ?>" name="HargaBrg" value="<?php echo e(old('HargaBrg')); ?>" maxlength="6" onkeypress="return angka(event)" required autofocus>
                                            <?php if($errors->has('HargaBrg')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('HargaBrg')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Stok" class="col-md-4 col-form-label text-md-right">Stok</label>
                                        <div class="col-md-6">
                                            <input id="Stok" type="text" class="form-control<?php echo e($errors->has('Stok') ? ' is-invalid' : ''); ?>" name="Stok" value="<?php echo e(old('Stok')); ?>" maxlength="3" onkeypress="return angka(event)" required autofocus>
                                            <?php if($errors->has('Stok')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('Stok')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Stok" class="col-md-4 col-form-label text-md-right">Nama Kategori</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="KdKategori" required>
                                                <option value="" selected disabled>--Pilih Pelanggan--</option>

                                                <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($kategories -> KdKategori); ?>"><?php echo e($kategories -> NmKategori); ?> </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                <?php echo e(__('ADD')); ?>

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
            <?php echo e($join->links()); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\barang_0369\resources\views/users/barang/index.blade.php ENDPATH**/ ?>