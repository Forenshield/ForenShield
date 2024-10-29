<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container-fluid py-4">
            <?php echo $__env->make('layouts.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row">
                <div class="col-md-12 mb-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo e(route('admin.history.data3', ['id', $id])); ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="start"><small class="text-dark">Start
                                                Date<?php echo required_mark(); ?></small></label>
                                        <input value="<?php echo e(request()->start ?? ''); ?>" type="datetime-local" name="start"
                                            id="start" class="form-control" placeholder="Start Date">
                                        <?php $__errorArgs = ['start'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><small class="text-xs"><?php echo e($message); ?></small></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="end"><small class="text-dark">End
                                                Date<?php echo required_mark(); ?></small></label>
                                        <input value="<?php echo e(request()->end ?? ''); ?>" type="datetime-local" name="end"
                                            id="end" class="form-control" placeholder="End Date">
                                        <?php $__errorArgs = ['end'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><small class="text-xs"><?php echo e($message); ?></small></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <center>
                                            <button type="reset"
                                                class="btn btn-outline-danger pull-right mr-5">Clear</button>
                                            <button type="submit" class="btn btn-primary pull-right ml-5">Filter</button>
                                        </center>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Router Analytics</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a onclick="refreshTable()" data-action="reload"><i class="ft-rotate-cw"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table w-100" id="usersTable">
                                        <thead>
                                            <tr>
                                                <th><small>#</small></th>
                                                <th><small>IP</small></th>
                                                <th><small>MAC</small></th>
                                                <th><small>Host Name</small></th>
                                                <th><small>Vendor</small></th>
                                                <th><small>Latency</small></th>
                                                <th><small>Open Ports</small></th>
                                                <th><small>OS Guess</small></th>
                                                <th><small>First Seen</small></th>
                                                <th><small>Result</small></th>
                                                <th><small>Created At</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td><?php echo e($key + 1); ?></td>
                                                    <td><?php echo e($record->ip); ?></td>
                                                    <td><?php echo e($record->mac); ?></td>
                                                    <td><?php echo e($record->hostname); ?></td>
                                                    <td><?php echo e($record->vendor); ?></td>
                                                    <td><?php echo e($record->latency); ?></td>
                                                    <td><?php echo e($record->open_ports); ?></td>
                                                    <td><?php echo e($record->os_guess); ?></td>
                                                    <td><?php echo e($record->first_seen); ?></td>
                                                    <td><?php echo e($record->result); ?></td>
                                                    <td><?php echo e($record->created_at); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr>
                                                    <td colspan="11" class="text-danger text-center"><small>No
                                                            Data</small></td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php echo e($data->links('pagination::bootstrap-5')); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('layouts.footer2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\DJI\SLIIT Forenshield\Forenshield\resources\views/pages/data3.blade.php ENDPATH**/ ?>