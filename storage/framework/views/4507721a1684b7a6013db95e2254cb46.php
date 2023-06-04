

<?php $__env->startSection('container'); ?>

<div class="row justify-content-center">
    <div class="col-lg-4">
        
        
        <?php if(session()->has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close">
        </button>
        </div>  
        <?php endif; ?>

        <?php if(session()->has('LoginError')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo e(session('LoginError')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close">
        </button>
        </div>  
        <?php endif; ?>
        

        <main class="form-login w-100 m-auto">
            <br>
            <br>
            <br>
            <br>
            <div class="text-center"> 
                <h1 class="h2 mb-3 fw-font-font-weight-normal text-center col">Login</h1>
                <h1 class="h6 mb-2 fw-font-weight-normal col-m-auto mt-auto">Welcome To Prosepera</h1>
            </div>

            <form action="/login" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-floating mb-1">
                    <input type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " id="email" placeholder="email@example.com" autofocus required  value="<?php echo e(old('email')); ?>">
                    <label for="email">Email Address</label>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                
                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                <small class="d-block text-center mt-3">
                    Not Register? <a href="/register">Register Now</a>
                </small>
            </form>

        </main>
    </div>
</div>
<p class="text-justify-left-0 mt-3">&copy; Prospera 2023</p>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SIAKUNTANSI\resources\views/login/index.blade.php ENDPATH**/ ?>