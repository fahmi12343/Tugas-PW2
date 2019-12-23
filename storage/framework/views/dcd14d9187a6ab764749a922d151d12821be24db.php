<?php $__env->startSection('content'); ?>

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
                                <?php
                                    $nomor = 1;
                                ?>

                                            <?php if(!empty($pelanggan) && $pelanggan->count()): ?>
                                            <?php $__currentLoopData = $pelanggan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pelanggans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <tr>
                                                <td><?php echo e($nomor); ?></td>
                                                <td><?php echo e($pelanggans -> KdPlg); ?></td>
                                                <td><?php echo e($pelanggans -> NmPlg); ?></td>
                                                <td><?php echo e($pelanggans -> AlamatPlg); ?></td>
                                                <td><?php echo e($pelanggans -> TelpPlg); ?></td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a class="btn btn-warning text-white" data-toggle="modal" data-target="#modaledit<?php echo e($pelanggans->KdPlg); ?>"><i class="fa fa-edit fa-lg"></i> Ubah Data</a>
                                                        <a class="btn btn-danger text-white" href="/users/pelanggan/delete/<?php echo e($pelanggans->KdPlg); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');"><i class="fa fa-trash fa-lg"></i> Hapus Data</a>
                                                    </div>

                                                    <!-- Modal Edit -->
                                                    <div class="modal fade " id="modaledit<?php echo e($pelanggans->KdPlg); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">


                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content modal-lg">
                                                                <div class="modal-header"> Update Pelanggan </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST" action="<?php echo e(route('prosesubahpelanggan')); ?>">
                                                                        <?php echo e(csrf_field()); ?>

                                                                            <input type="hidden" value="<?php echo e($pelanggans->KdPlg); ?>" name="id">

                                                                            <div class="form-group row">
                                                                                <label for="KdPlg<?php echo e($nomor); ?>" class="col-md-4 col-form-label text-md-right">Kode Pelanggan</label>
                                                                                <div class="col-md-6">
                                                                                    <input id="KdPlg<?php echo e($nomor); ?>" type="text" class="form-control<?php echo e($errors->has('KdPlg') ? ' is-invalid' : ''); ?>" name="KdPlg" value="<?php echo e($pelanggans->KdPlg); ?>" required readonly >
                                                                                    <?php if($errors->has('KdPlg')): ?>
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong><?php echo e($errors->first('KdPlg')); ?></strong>
                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                            <label for="NmPlg<?php echo e($nomor); ?>" class="col-md-4 col-form-label text-md-right">Nama Pelanggan</label>
                                                                                <div class="col-md-6">
                                                                                    <input id="NmPlg<?php echo e($nomor); ?>" type="text" value="<?php echo e($pelanggans->NmPlg); ?>" class="form-control<?php echo e($errors->has('NmPlg') ? ' is-invalid' : ''); ?>" name="NmPlg" value="<?php echo e(old('NmPlg')); ?>" maxlength="50" required autofocus>
                                                                                    <?php if($errors->has('NmPlg')): ?>
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong><?php echo e($errors->first('NmPlg')); ?></strong>
                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="AlamatPlg<?php echo e($nomor); ?>" class="col-md-4 col-form-label text-md-right">Alamat Pelanggan</label>
                                                                                <div class="col-md-6">
                                                                                    <textarea maxlength="50" id="AlamatPlg<?php echo e($nomor); ?>" type="text" class="form-control<?php echo e($errors->has('AlamatPlg') ? ' is-invalid' : ''); ?>" name="AlamatPlg" value="<?php echo e(old('AlamatPlg')); ?>"  required autofocus cols="15" rows="10"><?php echo e($pelanggans -> AlamatPlg); ?></textarea>
                                                                                    <?php if($errors->has('AlamatPlg')): ?>
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong><?php echo e($errors->first('AlamatPlg')); ?></strong>
                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="TelpPlg<?php echo e($nomor); ?>" class="col-md-4 col-form-label text-md-right">Telfon Pelanggan</label>
                                                                                <div class="col-md-6">
                                                                                    <input id="TelpPlg<?php echo e($nomor); ?>" type="text" value="<?php echo e($pelanggans->TelpPlg); ?>" class="form-control<?php echo e($errors->has('TelpPlg') ? ' is-invalid' : ''); ?>" name="TelpPlg" value="<?php echo e(old('TelpPlg')); ?>" maxlength="15" onkeypress="return angka(event)" required >
                                                                                    <?php if($errors->has('TelpPlg')): ?>
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong><?php echo e($errors->first('TelpPlg')); ?></strong>
                                                                                        </span>
                                                                                    <?php endif; ?>
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
    <div class="modal fade " id="exampleModalPelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

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
                    <div class="modal-header"> Input Pelanggan </div>
                        <div class="modal-body">
                            <form method="POST" action="<?php echo e(route('tambahpelanggan')); ?>">
                                    <?php echo csrf_field(); ?>

                                    <div class="form-group row">
                                        <label for="KdPlg" class="col-md-4 col-form-label text-md-right">Kode Pelanggan</label>
                                        <div class="col-md-6">
                                            <input id="KdPlg" type="text" class="form-control<?php echo e($errors->has('KdPlg') ? ' is-invalid' : ''); ?>" name="KdPlg" value="<?php echo e($kd); ?>" required readonly >
                                            <?php if($errors->has('KdPlg')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('KdPlg')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="NmPlg" class="col-md-4 col-form-label text-md-right">Nama Pelanggan</label>
                                        <div class="col-md-6">
                                            <input id="NmPlg" type="text" class="form-control<?php echo e($errors->has('NmPlg') ? ' is-invalid' : ''); ?>" name="NmPlg" value="<?php echo e(old('NmPlg')); ?>" maxlength="50" onkeypress="return huruf(event)" required autofocus>
                                            <?php if($errors->has('NmPlg')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('NmPlg')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="AlamatPlg" class="col-md-4 col-form-label text-md-right">Alamat Pelanggan</label>
                                        <div class="col-md-6">
                                            <textarea maxlength="50" id="AlamatPlg" type="text" class="form-control<?php echo e($errors->has('AlamatPlg') ? ' is-invalid' : ''); ?>" name="AlamatPlg" value="<?php echo e(old('AlamatPlg')); ?>"  required autofocus cols="15" rows="10"></textarea>
                                            <?php if($errors->has('AlamatPlg')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('AlamatPlg')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="TelpPlg" class="col-md-4 col-form-label text-md-right">Telfon Pelanggan</label>
                                        <div class="col-md-6">
                                            <input id="TelpPlg" type="text" class="form-control<?php echo e($errors->has('TelpPlg') ? ' is-invalid' : ''); ?>" name="TelpPlg" value="<?php echo e(old('TelpPlg')); ?>" maxlength="15" onkeypress="return angka(event)" required >
                                            <?php if($errors->has('TelpPlg')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('TelpPlg')); ?></strong>
                                                </span>
                                            <?php endif; ?>
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
            <?php echo e($pelanggan->links()); ?>

        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\barang_0369\resources\views/users/Pelanggan/index.blade.php ENDPATH**/ ?>