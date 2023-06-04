

<?php $__env->startSection('container'); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Product</h4>
        <h5 class="h5">Add Product</h5>
    </div>
    <form action="<?php echo e(route('product.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="row mb-1 p-lg-3">
            <div class="row">
                <label for="">Insert Name Product</label>
                <input type="text" name="nama_barang" class="form-control" placeholder="" aria-label="First">
            </div>
            <div class="row">
                <label for="">Purchase Price</label>
                <input type="number" name="harga_beli" class="form-control" placeholder="" aria-label="First">
            </div>
            <div class="row">
                <label for="">Selling Price</label>
                <input type="number" name="harga_jual" class="form-control" placeholder="" aria-label="First">
            </div>
            <div class="row">
                <label for="">Stock</label>
                <input type="number" name="stok" class="form-control" placeholder="" aria-label="First">
            </div>

            <div class="row">
                <label for="">Supplier Name</label>
                <select name="id_supplier" class="form-control">
                    <option selected disabled>Choose Supplier</option>
                    <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($supplier->id_supplier); ?>"> <?php echo e($supplier->nama_supplier); ?></option>
                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <br />

        </div>
        <div>
            <div>
                <button class="btn btn-primary">INSERT</button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SIAKUNTANSI\resources\views/dashboard/product/create.blade.php ENDPATH**/ ?>