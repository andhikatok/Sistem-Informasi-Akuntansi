

<?php $__env->startSection('container'); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Sales</h4>
        <h5 class="h5">Edit Sales</h5>
    </div>
    <form action="<?php echo e(route('sales.update', $sales->id_transaksi_penjualan)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="row mb-1 p-lg-3">
            <div class="row">
                <label for="">Insert Date</label>
                <input type="date" name="tanggal_transaksi" class="form-control" placeholder="" aria-label="First"
                    value="<?php echo e($sales->tanggal_transaksi); ?>">
            </div>
            <div class="row">
                <label for="">Name Customer</label>
                <select name="id_customer" class="form-control">
                    <option selected disabled>Choose Customer</option>
                    <?php $__currentLoopData = $contact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($contact->id_customer); ?>"
                            <?php echo e($contact->id_customer == $sales->id_customer ? 'selected' : ''); ?>>
                            <?php echo e($contact->nama_customer); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="row">
                <label for="">Name Outlet</label>
                <select name="id_outlet" class="form-control">
                    <option selected disabled>Choose Outlet</option>
                    <?php $__currentLoopData = $outlet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $outlet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($outlet->id_outlet); ?>"
                            <?php echo e($outlet->id_outlet == $sales->id_outlet ? 'selected' : ''); ?>>
                            <?php echo e($outlet->nama_outlet); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="row">
                <label for="">Name Product</label>
                <select name="id_barang" class="form-control">
                    <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($product->id_barang); ?>" data-harga="<?php echo e($product->harga_jual); ?>"
                            <?php echo e($product->id_barang == $sales->id_barang ? 'selected' : ''); ?>>
                            <?php echo e($product->nama_barang); ?> - <?php echo e($product->harga_jual); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <input type="hidden" name="harga_barang" id="harga_barang" value="<?php echo e($sales->harga_barang); ?>">
            </div>
            <br />
        </div>
        <div>
            <div>
                <button class="btn btn-primary">UPDATE</button>
            </div>
        </div>
    </form>

    <script>
        document.querySelector('select[name="id_barang"]').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var hargaBarangInput = document.getElementById('harga_barang');
            hargaBarangInput.value = selectedOption.getAttribute('data-harga');
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SIAKUNTANSI\resources\views/dashboard/sales/edit.blade.php ENDPATH**/ ?>