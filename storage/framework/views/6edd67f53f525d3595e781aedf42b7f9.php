<nav class=" navbar navbar-expand-lg navbar-light fixed-top bg-light">
    <div class="container">
        <a class="navbar-brand " href="/"> <img src="img/LB.png" width="150" height="60" alt="navbar-brand"
                href="/"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php echo e($title === 'Home' ? 'active' : ''); ?> " href="/">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link   <?php echo e($title === 'Pricing' ? 'active' : ''); ?>" href="/pricing">PRICING</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  <?php echo e($title === 'Company' ? 'active' : ''); ?>" href="/company">COMPANY</a>
                </li>
            </ul>


            <ul class="navbar-nav ms-auto">
                <?php if(auth()->guard()->check()): ?>
                    <li class="nav-item">
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-expanded="false">
                            Welcome Back, <?php echo e(Auth::user()->name); ?> </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/dashboard/home"><i class="bi bi-house-door"></i></i> My
                                    Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Log
                                        Out</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="/login" class="nav-link <?php echo e($title === 'Login' ? 'active' : ''); ?>""><i
                                class=" bi bi-box-arrow-in-right"></i> LOGIN</a>
                    </li>
                <?php endif; ?>
            </ul>


        </div>
    </div>
</nav>
</nav>
<?php /**PATH D:\SIAKUNTANSI\resources\views/partials/navbar.blade.php ENDPATH**/ ?>