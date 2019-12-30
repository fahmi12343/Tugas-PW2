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
                                    <th>Nomor Pesan</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Kode Pelanggan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody align="center">
                                <?php
                                    $nomor = 1;
                                ?>
                                    <?php if(!empty($transaction) && $transaction->count()): ?>
                                    <?php $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $transactions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <tr>
                                                <td><?php echo e($nomor); ?></td>
                                                <td><?php echo e($transactions -> KdKategori); ?></td>
                                                <td><?php echo e($transactions -> NmKategori); ?></td>
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

        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\barang_0369\resources\views/users/pdf/transaction_pdf.blade.php ENDPATH**/ ?>