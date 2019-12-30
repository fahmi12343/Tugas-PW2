

<!DOCTYPE html>
<html>
<head>
	<title>Report PDF</title>
    
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
        <h3>Report Pembelian</h3>
        <h5>Menampilkan Report Berdasarkan Nomor Pesan dan Pembelian Barang</h5>

	</center>

	<table class='table table-bordered'>
		<thead align="center">
            <tr>
                <th>Nomor </th>
                <th>Nomor Pesan </th>
                <th>Tanggal Pesan` </th>
                <th>Nama Barang </th>
                <th>Jumlah Pesan </th>
                <th>Harga Barang </th>
                <th>Nama Pelanggan </th>
            </tr>
        </thead>

        <tbody align="center">
            <?php
                $nomor = 1;
            ?>
                <?php if(!empty($view) && $view->count()): ?>
                <?php $__currentLoopData = $view; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $views): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td><?php echo e($nomor); ?></td>
                            <td><?php echo e($views -> NoPesan); ?></td>
                            <td><?php echo e($views -> TglPesan); ?></td>
                            <td><?php echo e($views -> NmBrg); ?></td>
                            <td><?php echo e($views -> JmlPesan); ?></td>
                            <td><?php echo e($views -> HargaBrg); ?></td>
                            <td><?php echo e($views -> NmPlg); ?></td>

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
    
</body>
</html>
<?php /**PATH C:\laragon\www\barang_0369\resources\views/users/pdf/pdf.blade.php ENDPATH**/ ?>