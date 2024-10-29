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
                                <h4 class="card-title">User List</h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a onclick="refreshTable()" data-action="reload"><i
                                                    class="ft-rotate-cw"></i></a></li>
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
                                                    <th><small>Email</small></th>
                                                    <th><small>NIC</small></th>
                                                    <th><small>Action</small></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td><?php echo e($key+1); ?></td>
                                                    <td><?php echo e($record->name); ?></td>
                                                    <td><?php echo e($record->email); ?></td>
                                                    <td><?php echo e($record->nic); ?></td>
                                                    <td>
                                                        <button onclick="doEdit(<?php echo e($record->id); ?>)" class="btn btn-warning btn-sm">Edit</button>
                                                        <a onclick="doDelete(<?php echo e($record->id); ?>)" class="btn btn-danger btn-sm">Delete</a>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr>
                                                    <td colspan="5" class="text-danger text-center"><small>No Data</small></td>
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
                        <form autocomplete="off" action="<?php echo e(route('admin.users.enroll')); ?>" method="POST"
                            id="user_form">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" id="isnew" name="isnew"
                                value="<?php echo e(old('isnew') ? old('isnew') : '1'); ?>">
                            <input type="hidden" id="record" name="record"
                                value="<?php echo e(old('record') ? old('record') : ''); ?>">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add/Edit Users</h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
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
                                                        <input value="<?php echo e(old('name')); ?>" type="text"
                                                            name="name" id="name" class="form-control"
                                                            placeholder="Your Name ..">
                                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span
                                                                class="text-danger"><small><?php echo e($message); ?></small></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                                <div class="row mt-1">
                                                    <div class="col-md-12">
                                                        <label for="nic"><small
                                                                class="text-dark">NIC<?php echo required_mark(); ?></small></label>
                                                        <input value="<?php echo e(old('nic')); ?>" type="text"
                                                            name="nic" id="nic" class="form-control"
                                                            placeholder="Your NIC ..">
                                                        <?php $__errorArgs = ['nic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span
                                                                class="text-danger"><small><?php echo e($message); ?></small></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                                <div class="row mt-1">
                                                    <div class="col-md-12">
                                                        <label for="email"><small
                                                                class="text-dark">Email<?php echo required_mark(); ?></small></label>
                                                        <input autocomplete="false" value="<?php echo e(old('email')); ?>"
                                                            type="text" name="email" id="email"
                                                            class="readonly form-control" placeholder="Email">
                                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span
                                                                class="text-danger"><small><?php echo e($message); ?></small></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>

                                                <div class="row mt-1">
                                                    <div class="col-md-12">
                                                        <label for="password"><small class="text-dark">Password
                                                                (Min 8
                                                                Characters)<?php echo required_mark(); ?></small></label>
                                                        <input autocomplete="false"
                                                            value="<?php echo e(old('password')); ?>" type="password"
                                                            name="password" id="password" class="form-control"
                                                            placeholder="Password">
                                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span
                                                                class="text-danger"><small><?php echo e($message); ?></small></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>

                                                <div class="row mt-1">
                                                    <div class="col-md-12">
                                                        <label for="password_confirmation"><small
                                                                class="text-dark">Password
                                                                Confirmation<?php echo required_mark(); ?></small></label>
                                                        <input value="<?php echo e(old('password_confirmation')); ?>"
                                                            type="password" name="password_confirmation"
                                                            id="password_confirmation" class="form-control"
                                                            placeholder="Confirmation">
                                                        <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span
                                                                class="text-danger"><small><?php echo e($message); ?></small></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                                <hr class="my-2">
                                                <div class="row">
                                                    <div class="col-md-6"> <input id="submitbtn"
                                                            class="btn btn-success w-100" type="submit"
                                                            value="Submit">
                                                    </div>
                                                    <div class="col-md-6 mt-md-0 mt-1"><input
                                                            class="btn btn-danger w-100" type="button"
                                                            form="user_form" id="resetbtn" value="Reset">
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
        function doEdit(id) {
            showAlert('Are you sure to edit this record ?', function() {
                $.ajax({
                    type: "GET",
                    url: "<?php echo e(route('admin.users.get.one')); ?>",
                    data: {
                        'id': id
                    },
                    success: function(response) {
                        $('#name').val(response.name);
                        $('#nic').val(response.nic);
                        $('#email').val(response.email);
                        $('#email').attr('readonly', '');
                        $('#password').val('');
                        $('#password_confirmation').val('');
                        $('#record').val(response.id);
                        $('#isnew').val('2').trigger('change');
                    }
                });
            });
        }

        function doDelete(id) {
            showAlert('Are you sure to delete this record ?', function() {
                window.location = "<?php echo e(route('admin.users.delete.one')); ?>?id=" + id;
            });
        }

        <?php if(old('record')): ?>
            $('#record').val(<?php echo e(old('record')); ?>);
        <?php endif; ?>

        <?php if(old('isnew')): ?>
            $('#isnew').val(<?php echo e(old('isnew')); ?>).trigger('change');
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\DJI\SLIIT Forenshield\Forenshield\resources\views/pages/users.blade.php ENDPATH**/ ?>