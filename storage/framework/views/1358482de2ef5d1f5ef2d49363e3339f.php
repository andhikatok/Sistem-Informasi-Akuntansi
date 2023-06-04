

<?php $__env->startSection('container'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4 class="h4">Bills</h4>
    <h5 class="h5">Your Bills ,<?php echo e(Auth::user()-> name); ?> </h5>
  </div>

  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Date</th>
          <th scope="col">Product Name</th>
          <th scope="col">Total Price</th>
          <th scope="col">Due Date</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1,001</td>
          <td>12-2-2023</td>
          <td>Pencil</td>
          <td>Rp.10.000</td>
          <td>13-2-2023</td>
        </tr>
        <tr>
          <td>1,002</td>
          <td>13-2-2023</td>
          <td>Level Rj406</td>
          <td>Rp.10.000.000</td>
          <td>19-2-2023</td>
        </tr>
      </tbody>
    </table>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SIAKUNTANSI\resources\views/dashboard/bills/index.blade.php ENDPATH**/ ?>