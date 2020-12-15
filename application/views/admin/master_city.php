      
	  
	  <!--main content start-->
      <section id="main-content">
	 
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                <div class="col-sm-12">
              <section class="card">
			 <header class="card-header">
			   <?php if ($this->session->flashdata('add_success')) { ?>
					<div class="alert alert-success alert-dismissible">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>Success!</strong> <?= $this->session->flashdata('add_success') ?>
					</div>
			   <?php } ?>
			   <?php if ($this->session->flashdata('edit_success')) { ?>
			   <div class="alert alert-success alert-dismissible">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>Success!</strong> <?= $this->session->flashdata('edit_success') ?>
					</div>
			   <?php } ?>
			   <?php if ($this->session->flashdata('active_success')) { ?>
					<div class="alert alert-success alert-dismissible">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>Success!</strong> <?= $this->session->flashdata('active_success') ?>
					</div>
			   <?php } ?>
              
                 <strong> City List </strong>
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
              </header>
              <div class="card-body">
              <div class="adv-table">
			  <button type="button" class="btn btn-secondary mb-2" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add New</button>
               <br/>
              <table  class="display table table-bordered table-striped" id="dynamic-table">
              <thead>
              <tr>
				  <th>No</th>
                  <th>Name</th>
                  <th>Code</th>
                  <th>Droppoint Code</th>
				  <th>Status</th>
				  <th>Action</th>
              </tr>
              </thead>
              <tbody>
			   <?php if (is_array($city) || is_object($city))
			{ $i = 1; foreach($city as $row):?>
                <tr>
				 <td width="5">
					<?php
						echo $i;
						$i++;
					?>

				 </td>
                    <td><?= $row->city_name;?></td>
                    <td><?= $row->city_code;?></td>
					<td><?= $row->dp_code;?></td>
					<td><center><?php $status = $row->city_status;
							if ($status  == "0")
							{ ?>
								<a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?= $row->city_id;?>" data-status="1" >Not Active</a>
                   
					<?php	}else if ($status == "1")
							{  ?>
								<a href="#" class="btn btn-success btn-sm btn-delete" data-id="<?= $row->city_id;?>" data-status="0">Active</a>
                   	<?php	}
					?></center></td>
					<td>
                        <a href="#" class="btn btn-info btn-sm btn-edit" data-id="<?= $row->city_id;?>" data-name="<?= $row->city_name;?>" data-code="<?= $row->city_code;?>" 
						data-dp_id="<?= $row->dp_id;?>"><i class="fa fa-pencil-square-o"></i> Edit</a>
                    </td>
                </tr>
            <?php endforeach; }?>
             
            
             </tbody>
             
              </table>
              </div>
              </div>
              </section>
              </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
	  
	   <!-- Modal Add-->
    <form action="<?php echo base_url('City/save')?>" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add City</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <div class="form-group">
                    <label><b>Name</b></label>
                    <input type="text" class="form-control" name="city_name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label><b>Code</b></label>
                    <input type="text" class="form-control" name="city_code" placeholder="Code" required>
                </div>
				<div class="form-group">
                    <label><b>Droppoint</b></label>
					<select name="dp_id" class="form-control">
                        <option value="">-Select-</option>
                        <?php foreach($dp as $row):?>
                        <option value="<?= $row->dp_id;?>"><?= $row->dp_name;?></option>
                        <?php endforeach;?>
                    </select>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Add -->
 
    <!-- Modal Edit -->
    <form action="<?php echo base_url('City/update')?>" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit City</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
				<div class="form-group">
                    <label><b>Name</b></label>
                    <input type="text" class="form-control city_name" name="city_name" placeholder="Name" required>
                </div>
                 <div class="form-group">
                    <label><b>Code</b></label>
                    <input type="text" class="form-control city_code" name="city_code" placeholder="Code" required>
                </div>
				<div class="form-group">
                    <label><b>Droppoint</b></label>
                    <select name="dp_id" class="form-control dp_id">
                        <option value="">-Select-</option>
                        <?php foreach($dp as $row):?>
                        <option value="<?= $row->dp_id;?>"><?= $row->dp_name;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                   
            </div>
            <div class="modal-footer">
                <input type="hidden" name="city_id" class="city_id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Edit Product-->
 
    <!-- Modal Delete Product-->
    <form action="<?php echo base_url('City/delete')?>" method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete City</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
			 <?php if ($status  == "0")
					{ ?>
						<h4>Are you sure want to Activated this city?</h4>
             <?php  }else if ($status == "1")
					{  ?>
						<h4>Are you sure want to Deactivated this city?</h4>
             <?php	}
			 ?>
               
            </div>
            <div class="modal-footer">
                <input type="hidden" name="city_id" class="cityID">
				<input type="hidden" name="status" class="cityStatus">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->
	

	  <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2020 &copy; WMS by Amanina Ulya Safira.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
	
	<script src="<?php echo base_url() ?>ui/js/jquery.js"></script>
    <script src="<?php echo base_url() ?>ui/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="<?php echo base_url() ?>ui/js/bootstrap.bundle.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url() ?>ui/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url() ?>ui/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url() ?>ui/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url() ?>ui/assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>ui/assets/data-tables/DT_bootstrap.js"></script>
    <script src="<?php echo base_url() ?>ui/js/respond.min.js" ></script>

    <!--right slidebar-->
    <script src="<?php echo base_url() ?>ui/js/slidebars.min.js"></script>

   
	<!--dynamic table initialization -->
    <script src="<?php echo base_url() ?>ui/js/dynamic_table_init.js"></script>
	
	 <!--common script for all pages-->
    <script src="<?php echo base_url() ?>ui/js/common-scripts.js"></script>

	 <!--script for this page only-->
    <script src="<?php echo base_url() ?>ui/js/gritter.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>ui/js/pulstate.js" type="text/javascript"></script>
	
  
<script>
    $(document).ready(function(){
 				
        // get Edit 
        $('.btn-edit').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            const name = $(this).data('name');
            const code = $(this).data('code');
			const sector = $(this).data('dp_id');
            // Set data to Form Edit
            $('.city_id').val(id);
            $('.city_name').val(name);
            $('.city_code').val(code);
			$('.dp_id').val(sector).trigger('change');
            // Call Modal Edit
            $('#editModal').modal('show');
        });
 
        // get Delete
        $('.btn-delete').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
			const status = $(this).data('status');
            // Set data to Form Edit
            $('.cityID').val(id);
			$('.cityStatus').val(status);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });
         
    });
</script>
   
  </body>
</html>
     