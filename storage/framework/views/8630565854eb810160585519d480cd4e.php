

<?php $__env->startSection('container'); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Purchases</h4>
        <h5 class="h5">Add Purchases, <?php echo e(Auth::user()->name); ?></h5>
    </div>

    
    <?php if(Session::has('success')): ?>
        <div id="successAlert" class="alert alert-success mb-4" role="alert">
            Purchases added successfully
            <button id="closeButton" class="close-button" onclick="closeAlert()">&times;</button>
        </div>
    <?php endif; ?>

    <script>
        function closeAlert() {
            document.getElementById('successAlert').style.display = 'none';
        }
    </script>

    <form action="<?php echo e(route('purchases.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label for="tanggal_transaksi">Date</label>
            <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi">
        </div>

        <div class="form-group">
            <label for="id_invoice">Name Product</label>
            <select class="form-control" id="id_invoice" name="id_invoice">
                <option value="">Pilih Produk</option>
                <?php $__currentLoopData = $invoice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($invoice->id_invoice); ?>">
                        <?php echo e($invoice->product->nama_barang); ?> (Jumlah: <?php echo e($invoice->jumlah); ?>), Total Harga:
                        <?php echo e($invoice->total_harga); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SIAKUNTANSI\resources\views/dashboard/purchases/create.blade.php ENDPATH**/ ?>