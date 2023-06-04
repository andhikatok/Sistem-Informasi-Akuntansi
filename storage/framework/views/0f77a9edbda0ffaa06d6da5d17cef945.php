

<?php $__env->startSection('container'); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">REPORT</h4>
        <h5 class="h5">Add REPORT</h5>
    </div>
    <form action="<?php echo e(route('reports.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="row mb-1 p-lg-3">
            <div class="row">
                <label for="">Debit</label>
                <input type="number" name="debit" class="form-control" placeholder="" aria-label="First">
            </div>
            <div class="row">
                <label for="">Credit</label>
                <input type="number" name="kredit" class="form-control" placeholder="" aria-label="First">
            </div>
            <div class="row">
                <label for="">Total Debit</label>
                <input type="number" name="saldodebit" class="form-control" placeholder="" aria-label="First">
            </div>
            <div class="row">
                <label for="">Total Credit</label>
                <input type="number" name="saldokredit" class="form-control" placeholder="" aria-label="First">
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

<?php echo $__env->make('dashboard.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SIAKUNTANSI\resources\views/dashboard/reports/create.blade.php ENDPATH**/ ?>