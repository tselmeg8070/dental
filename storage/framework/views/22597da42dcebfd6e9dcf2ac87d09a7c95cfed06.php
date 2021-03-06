<?php $__env->startSection('header'); ?>



    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/fullcalendar.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/dataTables.bootstrap4.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/datatables.responsive.bootstrap4.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/select2.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/owl.carousel.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/bootstrap-stars.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/nouislider.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/bootstrap-datepicker3.min.css')); ?>"/>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('menu'); ?>
    <li>
        <a href="<?php echo e(url('/admin')); ?>">
            <i class="iconsmind-Digital-Drawing"></i>
            <span>Самбар</span>
        </a>
    </li>
    <li>
        <a href="<?php echo e(url('/admin/add_staff')); ?>">
            <i class="iconsmind-Administrator"></i> Ажилчид
        </a>
    </li>
    <li>
        <a href="<?php echo e(url('/admin/time')); ?>">
            <i class="iconsmind-Alarm"></i> Цаг
        </a>
    </li>
    <li class="active">
        <a href="<?php echo e(url('/admin/product')); ?>">
            <i class="iconsmind-Medicine-2"></i> Материал
        </a>
    </li>
    <li>
        <a href="<?php echo e(url('/admin/transaction')); ?>">
            <i class="iconsmind-Space-Needle"></i> Санхүү
        </a>
    </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-4">Шинэ бараа нэмэх</h5>

                    <form class="form-inline" action="<?php echo e(url('/admin/add_product')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class=" mb-2 mr-sm-2">
                            <input name="name" type="text" class="form-control" id="inlineFormInputGroupUsername2"
                                   placeholder="Барааны нэр">
                        </div>
                        <button type="submit" class="btn btn-outline-primary mb-2" style="border-radius: 0px">
                            Шинэ бараа нэмэх
                        </button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="btn-group float-right float-none-xs mt-2">
                        <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top">
                            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Хайх...">
                        </div>
                    </div>
                    <h5 class="card-title">Барааны жагсаалт
                        <br> <span class="text-muted text-small d-block">Барааны нэрэн дээр даран тоо болон үнийг өөрчилнө үү</span>
                    </h5>


                    <table id="myTable" class="data-table responsive nowrap" data-order="[[ 1, &quot;desc&quot; ]]">

                        <thead>
                        <tr>
                            <th>Дугаар</th>
                            <th>Барааны нэр</th>
                            <th>Ширхэг</th>
                            <th>Үйлдэл</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1?>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i); ?></td>
                                <?php $i = $i + 1?>
                                <td>
                                    
                                            
                                    <a href="<?php echo e(url('admin/product/'.$product->id)); ?>">
                                        <?php echo e($product->name); ?>

                                    </a>
                                    
                                </td>
                                <td>
                                    <p class="text-muted"><?php echo e($product->quantity); ?></p>

                                <td>
                                    <a href="<?php echo e(url('/admin/delete_product').'/'.$product->id); ?>">
                                        <i class="simple-icon-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <script>
                            function onItemClick(id) {
                                document.getElementById('hidden').value = id;
                                return true;
                            }
                        </script>

                        <div id="exampleModalPopovers" class="modal fade show" tabindex="-1" role="dialog"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h5 class="modal-title" id="exampleModalPopoversLabel">Барааг нэмэж хасах</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>

                                    </div>

                                    <div class="col-md-12 ">

                                        <ul class="nav nav-tabs separator-tabs ml-0 mb-6" role="tablist">
                                            <li class="nav-item ">
                                                <a class="nav-link active " id="first-tab" data-toggle="tab"
                                                   href="#first" role="tab"
                                                   aria-controls="first" aria-selected="true">Бүтээгдэхүүн нэмэх</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link " id="second-tab" data-toggle="tab" href="#second"
                                                   role="tab"
                                                   aria-controls="second" aria-selected="false">Бүтээгдэхүүн хасах</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">

                                            <div class="tab-pane show active" id="first" role="tabpanel"
                                                 aria-labelledby="first-tab">
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <form action="<?php echo e(url('/admin/edit_product')); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <input name="id" type="hidden" value="0" id="hidden">

                                                            <input name="price" class="form-control mb-3" type="number"
                                                                   placeholder="Үнийн дүн">
                                                            <input name="quantity" class="form-control mb-3"
                                                                   type="number" placeholder="Тоо ширхэг">
                                                            <button class="btn btn-primary btn-block" type="submit">
                                                                Хадгалах
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="tab-pane" id="second" role="tabpane2"
                                                 aria-labelledby="second-tab">
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <form action="<?php echo e(url('/admin/add_transaction')); ?>" method="post">
                                                            <input name="id" type="hidden" value="0" id="hidden">
                                                            <?php echo csrf_field(); ?>
                                                            <input name="description" class="form-control mb-3"
                                                                   type="text" placeholder="Тайлбар">
                                                            <input class="form-control mb-3" name="price" type="number"
                                                                   placeholder="Тоо ширхэг">
                                                            <button class="btn btn-primary btn-block" type="submit">
                                                                Хадгалах
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </tbody>
                    </table>

                </div>
            </div>


        </div>

    </div>





<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script>
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>


    <script src="<?php echo e(asset('js/vendor/Chart.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/chartjs-plugin-datalabels.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/fullcalendar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/progressbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/jquery.barrating.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/select2.full.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/nouislider.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/bootstrap-datepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/Sortable.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>