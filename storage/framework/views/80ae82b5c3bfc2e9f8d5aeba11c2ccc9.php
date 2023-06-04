

<?php $__env->startSection('container'); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Contact</h4>
        <h5 class="h5">Update Contact, <?php echo e(Auth::user()->name); ?></h5>
    </div>
    <form action="<?php echo e(route('contact.update', $contact->id_customer)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="row mb-3 p-lg-2">
            <div class="row">
                <label for="">Name Contact</label>
                <input type="text" name="nama_customer" class="form-control" value="<?php echo e($contact->nama_customer); ?>">
            </div>
            <div class="row">
                <label for="">Address</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo e($contact->alamat); ?>">
            </div>
            <div class="row">
                <label for="">City</label>
                <input type="text" name="kota" class="form-control" value="<?php echo e($contact->kota); ?>">
            </div>
            <div class="row">
                <label for="">No Phone</label>
                <input type="number" name="no_tlp" class="form-control" value="<?php echo e($contact->no_tlp); ?>">
            </div>
            <div class="row">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo e($contact->email); ?>">
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

<?php echo $__env->make('dashboard.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SIAKUNTANSI\resources\views/dashboard/contact/edit.blade.php ENDPATH**/ ?>