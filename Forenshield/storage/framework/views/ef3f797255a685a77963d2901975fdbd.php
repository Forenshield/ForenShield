<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container-fluid py-4">
            <?php echo $__env->make('layouts.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Crime Scene Evidences</h4>
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
                                                <th><small>Name</small></th>
                                                <th><small>Description</small></th>
                                                <th class="text-end"><small>Action</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td><?php echo e($key + 1); ?></td>
                                                    <td><?php echo e($record->name); ?></td>
                                                    <td><?php echo e($record->description); ?></td>
                                                    <td class="text-end">
                                                        <a target="_blank"
                                                            href="<?php echo e(route('admin.attachments.view.one', $record->path)); ?>"
                                                            class="btn btn-info btn-sm">View</a>
                                                        <a onclick="remove(<?php echo e($record->id); ?>)"
                                                            class="btn btn-danger btn-sm">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr>
                                                    <td colspan="4" class="text-danger text-center"><small>No
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
                <div class="col-md-4">
                    <form autocomplete="off" enctype="multipart/form-data" action="<?php echo e(route('admin.attachments.enroll')); ?>"
                        method="POST" id="user_form">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" id="id" name="id" value="<?php echo e($id); ?>">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Evidence</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><label for="resetbtn"><a data-action="reload"><i
                                                        class="ft-rotate-cw"></i></a></label></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="name"><small
                                                            class="text-dark">Name<?php echo required_mark(); ?></small></label>
                                                    <input value="<?php echo e(old('name')); ?>" type="text" name="name"
                                                        id="name" class="form-control" placeholder="Your Name ..">
                                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger"><small><?php echo e($message); ?></small></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-12">
                                                    <label for="nic"><small
                                                            class="text-dark">Description</small></label>
                                                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"><?php echo e(old('description')); ?></textarea>
                                                    <?php $__errorArgs = ['nic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger"><small><?php echo e($message); ?></small></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-12">
                                                    <label for="attachment"><small
                                                            class="text-dark">Attachment</small></label>
                                                    <br>
                                                    <input type="file" name="attachment" id="attachment">
                                                    <?php $__errorArgs = ['attachment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger"><small><?php echo e($message); ?></small></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <hr class="my-2">
                                            <div class="row">
                                                <div class="col-md-6"> <input id="submitbtn" class="btn btn-success w-100"
                                                        type="submit" value="Submit">
                                                </div>
                                                <div class="col-md-6 mt-md-0 mt-1"><input class="btn btn-danger w-100"
                                                        type="button" form="user_form" id="resetbtn" value="Reset">
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <?php echo $__env->make('layouts.footer2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        function remove(id) {
            showAlert('Are you sure to delete this record ?', function() {
                window.location = "<?php echo e(route('admin.attachments.delete.one')); ?>?id=" + id +
                    "&cid=<?php echo e($id); ?>";
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\DJI\SLIIT Forenshield\Forenshield\resources\views/pages/attachments.blade.php ENDPATH**/ ?>