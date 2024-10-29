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
                            <form action="<?php echo e(route('admin.history.data4', ['id', $id])); ?>">
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
                                            <input class="btn btn-info align-bottom" id="exportPdfBtn"
                                                        value="Export" type="button">
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
                            <h4 class="card-title">Document Analytics</h4>
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
                                                <th><small>File</small></th>
                                                <th><small>Result</small></th>
                                                <th><small>Percentage</small></th>
                                                <th><small>Created At</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td><?php echo e($key + 1); ?></td>
                                                    <td><a target="_blank" href="<?php echo e(asset('storage/' . $record->file)); ?>">Open file in new tab</a></td>
                                                    <td><?php echo e($record->result); ?></td>
                                                    <td><?php echo e($record->percentage); ?></td>
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
<?php $__env->startSection('scripts'); ?>
    <script>
        // PDF Export Functionality
        document.addEventListener('DOMContentLoaded', function() {
            const exportPdfBtn = document.getElementById('exportPdfBtn');
            if (exportPdfBtn) {
                exportPdfBtn.addEventListener('click', function () {
                    const { jsPDF } = window.jspdf;
                    const doc = new jsPDF();

                    // Add title to the PDF
                    doc.text("Document Analytics", 14, 16);

                    // Convert the table to PDF
                    doc.autoTable({
                        html: '#usersTable',
                        startY: 20,
                        theme: 'grid',
                        styles: {
                            fontSize: 10
                        },
                        headStyles: {
                            fillColor: [41, 128, 185]
                        },
                        alternateRowStyles: {
                            fillColor: [240, 240, 240]
                        },
                        columnStyles: {
                            0: { cellWidth: 10 },   // "#"
                            1: { cellWidth: 30 },   // "File"
                            2: { cellWidth: 30 },   // "Result"
                            3: { cellWidth: 20 },   // "Percentage"
                            4: { cellWidth: 30 },   // "Created At"
                        },
                    });

                    // Save the PDF with a name
                    doc.save('document-analytics.pdf');
                });
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Gethmi Rathnayaka\Desktop\Forenshield\Forenshield Final Update\Forenshield\resources\views/pages/data4.blade.php ENDPATH**/ ?>