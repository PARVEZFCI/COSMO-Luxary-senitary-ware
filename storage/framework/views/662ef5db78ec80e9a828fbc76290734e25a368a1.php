<?php $__env->startSection('title', 'Medicine Phaymacy - '.$settingsinfo->company_name.' - '.$settingsinfo->soft_name.''); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('expert.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('expert.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="clearfix"></div>
  
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">

        <?php if (session('message')): ?>
          <div class="col-lg-12">
              <div class="alert alert-<?php echo e(session('class')); ?> alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <div class="alert-icon contrast-alert"><i class="icon-close"></i></div>
                <div class="alert-message"><span><?php echo e(session('message')); ?></span></div>
              </div>
            </div>
        <?php endif; ?>

        <div class="col-lg-8">

      

          <div class="card bg-dark">
          <div class="card-header border-0 bg-transparent text-white">
                <i class="fa fa-user-circle"></i><span>Expanse Manage  </span>
            </div>

            <div class="card">
            <div class="card-header">

              <div style="display:inline-block; padding-top:5px;">
                <i class="fa fa-table"></i> Expanse Manage List
              </div> 

             

            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="dataTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%">SN</th>
                        <th>Category Name</th>
                        <th>T. Title</th>
                       
                        <th>T. account</th>
                        
                        <th>Date & Time</th>
                        <th width="8%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                   <?php $__currentLoopData = $expanse_manage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <tr>
                        <td><?php echo e($i++); ?></td>
                        <td><?php echo e($row->cat_name); ?></td>
                        <td><?php echo e($row->title); ?></td>
                        
                        <td><?php echo e($row->amount); ?></td>
                        
                        <td><?php echo e($row->date_time); ?></td>
                        <td>
                          
                          <a href="" class="btn btn-warning btn-sm waves-effect waves-light"> <i class="fa fa-edit"></i> <span></span></s> 
                          
                          <a href="" class="btn btn-danger btn-sm waves-effect waves-light"> 
                            <i class="fa fa-times"></i> <span></span>
                          </a>

                        </td>
                    </tr>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            </div>
            </div>
          </div>
               
          </div>
        </div>



        <div class="col-lg-4">

          

          <div class="card bg-dark">
          <div class="card-header border-0 bg-transparent text-white">
                <i class="fa fa-user-circle"></i><span> New Expanse  Add</span>
            </div>

            <div class="card">
            <div class="card-header">

              <div style="display:inline-block; padding-top:5px;">
                <i class="fa fa-table"></i> New Expanse  Add
              </div> 

            </div>
            <div class="card-body">
             
              <form action="<?php echo e(url('admin/expansemanageadd')); ?>" id="qcat" method="post">
              <?php echo csrf_field(); ?>

              <div class="row">

                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="name">Accounts Category type </label>

                          <select name="cat_name" class="form-control">
                          <?php $__currentLoopData = $account_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option><?php echo e($row->category_name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                          <br>
                           <label for="name">Transaction  Title </label>
                          <input required="" type="text" class="form-control" id="title" name="title" placeholder="Enter Transaction Title">
                          <br>
                          <label> Transaction Details </label>
                          <!-- <input required="" type="text" class="form-control" id="details" name="details" placeholder="Enter Transaction details"> -->
                          <textarea required="" class="form-control" id="details" name="details" placeholder="Enter Transaction details"></textarea>
                          <br>
                          <label> Transaction Amount </label>
                          <input required="" type="text" class="form-control" id="amount" name="amount" placeholder="Enter Transaction amount">
                          <br>
                      </div>
                  </div>


                  

                  <div class="col-md-12">
                  </div>
                  
                  

                  <div class="col-md-12">
                    <button type="submit" class="btn btn-dark btn-block col-md-offset-2">
                      <i class="fa fa-check-square-o"></i> Save
                    </button>
                  </div>

              </div>

            </form>

            </div>
          </div>
               
          </div>
        </div>




      </div><!--End Row-->
    
       <!--End Dashboard Content-->

    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   

  <?php echo $__env->make('expert.copyright', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('js'); ?>
    <script>
    $(document).ready(function() {
        dataTableLoad({
            curUrl: "<?php echo e(route('Admin.userrole.index')); ?>",
            addUrl: "<?php echo e(route('Admin.userrole.create')); ?>"
        });
    });
    </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('expert.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Xampp\htdocs\MODERN-HOSPITAL-PRIVATE\resources\views/admin/office/expansemanage.blade.php ENDPATH**/ ?>