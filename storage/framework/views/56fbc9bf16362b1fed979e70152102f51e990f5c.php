<?php $__env->startSection('content'); ?>

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
                                <?php
                                    $nomor = 1;
                                ?>
                                    <?php if(!empty($kategori) && $kategori->count()): ?>
                                    <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $kategories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <tr>
                                                <td><?php echo e($nomor); ?></td>
                                                <td><?php echo e($kategories -> KdKategori); ?></td>
                                                <td><?php echo e($kategories -> NmKategori); ?></td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a class="btn btn-warning text-white" data-toggle="modal" data-target="#modaledit<?php echo e($kategories -> KdKategori); ?>"><i class="fa fa-edit fa-lg"></i> Ubah Data</a>
                                                        <a class="btn btn-danger text-white" href="/users/kategori/delete/<?php echo e($kategories->KdKategori); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');"><i class="fa fa-trash fa-lg"></i> Hapus Data</a>
                                                    </div>

                                                     <!-- Modal Edit -->
                                                    <div class="modal fade " id="modaledit<?php echo e($kategories -> KdKategori); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content modal-lg">
                                                                <div class="modal-header"> Update Kategori </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST" action="<?php echo e(route('prosesubahkategori')); ?>">
                                                                            <?php echo e(csrf_field()); ?>

                                                                            <input type="hidden" value="<?php echo e($kategories->KdKategori); ?>" name="id">
                                                                            <div class="form-group row">
                                                                                <label for="KdKategori<?php echo e($nomor); ?>" class="col-md-4 col-form-label text-md-right">Kode Kategori</label>
                                                                                <div class="col-md-6">
                                                                                    <input id="KdKategori<?php echo e($nomor); ?>" type="text" value="<?php echo e($kategories->KdKategori); ?>" class="form-control<?php echo e($errors->has('KdKategori') ? ' is-invalid' : ''); ?>" name="KdKategori" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="NmKategori<?php echo e($nomor); ?>" class="col-md-4 col-form-label text-md-right">Nama Kategori</label>
                                                                                <div class="col-md-6">
                                                                                    <input id="NmKategori<?php echo e($nomor); ?>" type="text" value="<?php echo e($kategories->NmKategori); ?>" class="form-control<?php echo e($errors->has('NmKategori') ? ' is-invalid' : ''); ?>" maxlength="50" name="NmKategori" required autofocus>
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


    <!-- Modal Add -->
    <div class="modal fade " id="exampleModalKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

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
                    <div class="modal-header"> Input Kategori </div>
                    <div class="modal-body">
                        <form method="POST" action="<?php echo e(route('tambahkategori')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group row">
                                    <label for="KdKategori" class="col-md-4 col-form-label text-md-right">Kode Kategori</label>
                                    <div class="col-md-6">
                                        <input id="KdKategori" type="text" class="form-control<?php echo e($errors->has('KdKategori') ? ' is-invalid' : ''); ?>" name="KdKategori" value="<?php echo e($kd); ?>" required readonly >
                                        <?php if($errors->has('KdKategori')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('KdKategori')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="NmKategori" class="col-md-4 col-form-label text-md-right">Nama Kategori</label>
                                    <div class="col-md-6">
                                        <input id="NmKategori" type="text" class="form-control<?php echo e($errors->has('NmKategori') ? ' is-invalid' : ''); ?>" name="NmKategori" value="<?php echo e(old('NmKategori')); ?>" onkeypress="return huruf(event)" required autofocus>
                                        <?php if($errors->has('NmKategori')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('NmKategori')); ?></strong>
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

        <div class="container">
            <div class="row" style="margin: 1% ; padding: 1%">
                <?php echo e($kategori->links()); ?>

            </div>
        </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\barang_0369\resources\views/users/kategori/index.blade.php ENDPATH**/ ?>