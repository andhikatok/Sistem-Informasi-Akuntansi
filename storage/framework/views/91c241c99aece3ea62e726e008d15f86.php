

<?php $__env->startSection('container'); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Outlet</h4>
        <h5 class="h5">Add Outlet</h5>
    </div>
    <form action="<?php echo e(route('outlet.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="row mb-1 p-lg-3">
            <div class="row">
                <label for="">Insert Name Outlet</label>
                <input type="text" name="nama_outlet" class="form-control" placeholder="" aria-label="First">
            </div>
            <div class="row">
                <label for="">Address</label>
                <input type="text" name="alamat" class="form-control" placeholder="" aria-label="First">
            </div>
            <div class="row">
                <label for="">City</label>
                <input type="text" name="kota" class="form-control" placeholder="" aria-label="First">
            </div>
            <div class="row">
                <label for="">No Phone</label>
                <input type="number" name="no_tlp" class="form-control" placeholder="" aria-label="First">
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

<?php echo $__env->make('dashboard.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SIAKUNTANSI\resources\views/dashboard/outlet/create.blade.php ENDPATH**/ ?>