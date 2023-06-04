

<?php $__env->startSection('container'); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Employee</h4>
        <h5 class="h5">Update Employee</h5>
    </div>
    <form action="<?php echo e(route('employee.update', $employee->id_pegawai)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="row mb-3 p-lg-2">
            <div class="row">
                <label for="">Insert Name Employee</label>
                <input type="text" name="nama_pegawai" class="form-control" value="<?php echo e($employee->nama_pegawai); ?>">
            </div>
            <div class="row">
                <label for="">Address</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo e($employee->alamat); ?>">
            </div>
            <div class="row">
                <label for="">No Phone</label>
                <input type="number" name="no_tlp" class="form-control" value="<?php echo e($employee->no_tlp); ?>">
            </div>
            <div class="row">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo e($employee->email); ?>">
            </div>
            <div class="row">
                <label for="">Salary</label>
                <input type="number" name="gaji" class="form-control" value="<?php echo e($employee->gaji); ?>">
            </div>
            <br />
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">UPDATE</button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SIAKUNTANSI\resources\views/dashboard/employee/edit.blade.php ENDPATH**/ ?>