

<?php $__env->startSection('container'); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Invoice</h4>
        <h5 class="h5">Your Invoice, <?php echo e(Auth::user()->name); ?></h5>
    </div>

    
    <?php if(Session::has('success')): ?>
        <div id="successAlert" class="alert alert-success" role="alert">
            Invoice added successfully
            <button id="closeButton" class="close-button" onclick="closeAlert()">&times;</button>
        </div>
    <?php endif; ?>

    <script>
        function closeAlert() {
            document.getElementById('successAlert').style.display = 'none';
        }
    </script>

    <div class="mt-1 mb-5">
        <table class="table table-hover">
            <a href="<?php echo e(route('invoice.create')); ?>" class="btn btn-primary">Add Invoice</a>
            <a href="/exportinvoicepdf" class="btn btn-outline-dark m-1">EXPORT</a>
            <br><br>
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Date</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Name Product</th>
                    <th scope="col">Purchase</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="align-middle"><?php echo e($loop->iteration); ?></td>
                        <td class="align-middle"><?php echo e($invoice->tanggal_invoice); ?></td>
                        <td class="align-middle"><?php echo e($invoice->jatuh_tempo); ?></td>

                        <td class="align-middle">
                            <?php if($invoice->product): ?>
                                <?php echo e($invoice->product->nama_barang); ?>

                            <?php endif; ?>
                        </td>

                        <td class="align-middle">
                            <?php if($invoice->product): ?>
                                <?php echo e($invoice->product->harga_beli); ?>

                            <?php endif; ?>
                        </td>
                        <td class="align-middle"><?php echo e($invoice->jumlah); ?></td>
                        <td class="align-middle"><?php echo e($invoice->total_harga); ?></td>

                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="<?php echo e(route('invoice.edit', $invoice->id_invoice)); ?>" type="button"
                                    class="btn btn-warning">UPDATE</a>
                                <form action="<?php echo e(route('invoice.destroy', $invoice->id_invoice)); ?>" method="POST"
                                    class="btn btn-danger"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger p-0 mb-1">DELETE</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SIAKUNTANSI\resources\views/dashboard/invoice/index.blade.php ENDPATH**/ ?>