<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container-fluid py-4">
            <?php echo $__env->make('layouts.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row">
                <div class="col-md-<?php echo e(Auth::user()->is_admin ? '8' : '12'); ?>">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Crime Scene List</h4>
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
                                                <th><small>Investigator</small></th>
                                                <th class="text-end"><small>Action</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <?php if(!Auth::user()->is_admin && $record->investigatorsData && $record->investigatorsData->investigator != Auth::user()->id): ?>
                                                <?php
                                                    continue;
                                                ?>
                                            <?php endif; ?>
                                                <tr>
                                                    <td><?php echo e($key + 1); ?></td>
                                                    <td><?php echo e($record->name); ?></td>
                                                    <td><?php echo e($record->investigatorsData->userData->name ?? ''); ?></td>
                                                    <td class="text-end">
                                                        <a href="<?php echo e(route('admin.attachments.index', ['id' => $record->id])); ?>"
                                                            class="btn btn-success btn-sm"><small>Evidences</small></a>
                                                        <button onclick="doView(<?php echo e($record->id); ?>)"
                                                            class="btn btn-info btn-sm"><small>History</small></button>
                                                        <button onclick="doEdit(<?php echo e($record->id); ?>)"
                                                            class="btn btn-warning btn-sm"><small>Edit</small></button>
                                                        <a onclick="doDelete(<?php echo e($record->id); ?>)"
                                                            class="btn btn-danger btn-sm"><small>Delete</small></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-end">
                                                        <a href="<?php echo e(route('admin.history.data2', ['id' => $record->id])); ?>"
                                                            class="btn btn-outline-success btn-sm"><small>Browser Analytics</small></a>
                                                        <a href="<?php echo e(route('admin.history.data3', ['id' => $record->id])); ?>"
                                                            class="btn btn-outline-success btn-sm"><small>Router Analytics</small></a>
                                                        <a href="<?php echo e(route('admin.history.data4', ['id' => $record->id])); ?>"
                                                            class="btn btn-outline-success btn-sm"><small>Document Analytics</small></a>
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
                <?php if(Auth::user()->is_admin): ?>
                    <div class="col-md-4">
                        <form autocomplete="off" action="<?php echo e(route('admin.crime-scene.enroll')); ?>" method="POST"
                            id="user_form">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" id="isnew" name="isnew"
                                value="<?php echo e(old('isnew') ? old('isnew') : '1'); ?>">
                            <input type="hidden" id="record" name="record"
                                value="<?php echo e(old('record') ? old('record') : ''); ?>">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add/Edit Crime Scenes</h4>
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
                                                        <label for="nic"><small
                                                                class="text-dark">Investigator</small></label>
                                                        <select class="form-control" name="investigator" id="investigator">
                                                            <option disabled selected value="">- Select -</option>
                                                            <?php $__currentLoopData = $investigators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $investigator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($investigator->id); ?>">
                                                                    <?php echo e($investigator->name); ?> (<?php echo e($investigator->email); ?>)
                                                                </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
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
                                                <hr class="my-2">
                                                <div class="row">
                                                    <div class="col-md-6"> <input id="submitbtn"
                                                            class="btn btn-success w-100" type="submit" value="Submit">
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
                <?php endif; ?>

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
                    url: "<?php echo e(route('admin.crime-scene.get.one')); ?>",
                    data: {
                        'id': id
                    },
                    success: function(response) {
                        if (response.investigators_data) {
                            $('#investigator').val(response.investigators_data.investigator);
                        }


                        $('#name').val(response.name);
                        $('#description').val(response.description);
                        $('#record').val(response.id);
                        $('#isnew').val('2').trigger('change');
                    }
                });
            });
        }

        function doView(id) {
            showAlert('Are you sure to view history of this record ?', function() {
                $.ajax({
                    type: "GET",
                    url: "<?php echo e(route('admin.crime-scene.get.one')); ?>",
                    data: {
                        'id': id
                    },
                    success: function(response) {

                        var content = '';

                        for (let index = 0; index < response.history.length; index++) {
                            const element = response.history[index];
                            console.log(element);
                            content = content + '<tr><th>' + element.user_data.name + '</th><td>' +
                                element.from + '</td><td>' + ((response.history[index + 1]) ? response
                                    .history[index + 1].to : 'Current') + '</td></tr>';
                        }

                        $.alert({
                            title: 'Investigators History',
                            content: '<table class="table table-active"><tbody>' + content +
                                '</tbody></table>',
                        });
                    }
                });
            });
        }

        function doDelete(id) {
            showAlert('Are you sure to delete this record ?', function() {
                window.location = "<?php echo e(route('admin.crime-scene.delete.one')); ?>?id=" + id;
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Gethmi Rathnayaka\Desktop\Forenshield\Forenshield Final Update\Forenshield\resources\views/pages/crime-scenes.blade.php ENDPATH**/ ?>