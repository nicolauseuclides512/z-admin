<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-3 card">
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group row">
                    <input id="email"
                           type="email"
                           class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                           name="email"
                           placeholder="Email Address"
                           value="<?php echo e(old('email')); ?>"
                           required autofocus>

                    <?php if($errors->has('email')): ?>
                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                    <?php endif; ?>
                </div>

                <div class="form-group row">
                    <input id="password"
                           type="password"
                           placeholder="Password"
                           class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>"
                           name="password"
                           required>

                    <?php if($errors->has('password')): ?>
                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                    <?php endif; ?>
                </div>

                <div class="form-group row">
                    <div class="form-check">
                        <input class="form-check-input"
                               type="checkbox"
                               name="remember"
                               id="remember"
                               <?php echo e(old('remember') ? 'checked' : ''); ?>

                        >

                        <label class="form-check-label" for="remember">
                            <?php echo e(__('Remember Me')); ?>

                        </label>
                    </div>
                    <!--                            </div>-->
                </div>

                <div class="form-group row mb-0">
                    <button type="submit" class="btn btn-primary btn-block">
                        <?php echo e(__('Login')); ?>

                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>