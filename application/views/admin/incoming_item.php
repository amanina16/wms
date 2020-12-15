      
	  
	  <!--main content start-->
      <section id="main-content">
	 
          <section class="wrapper">
              <!-- page start-->
             <div class="row">
                <div class="col-sm-12">
              <section class="card">
			 <header class="card-header">
			 
			   <?php if ($this->session->flashdata('edit_success')) { ?>
			   <div class="alert alert-success alert-dismissible">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>Success!</strong> <?= $this->session->flashdata('edit_success') ?>
					</div>
			   <?php } ?>
              
                 <strong> Incoming List </strong>
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
              </header>
              <div class="card-body">
              <div class="adv-table">
			  
              <table  class="display table table-bordered table-striped" id="dynamic-table">
              <thead>
              <tr>
			  <th>No</th>
				  <th>No Resi</th>
				  <th>Entry Date</th>
				  <th>Out Date</th>
                  <th>Category</th>
				  <th>Type of Delivery</th>
                  <th>Droppoint</th>
                  <th>Sector</th>
				  <th>Rack Row</th>
				  <th>Rack Column</th>
				  <th>Item Description</th>
				  <th>Status</th>
				  <th>Action</th>
              </tr>
              </thead>
              <tbody>
			   <?php if (is_array($item) || is_object($item))
			{ $i = 1; foreach($item as $row):?>
                <tr>
				 <td width="5">
					<?php
						echo $i;
						$i++;
					?>

				 </td>
                    <td><?= $row->item_no_resi;?></td>
					<td><?= $row->item_entry_date;?></td>
					<td><?= $row->item_out_date;?></td>
                    <td><?= $row->category_name;?></td>
                    <td><?= $row->tod_name;?></td>
					<td><?= $row->dp_code;?></td>
                    <td><?= $row->sector_name;?></td>
					<td><?= $row->item_rack_row;?></td>
					<td><?= $row->item_rack_col;?></td>
					<td><?= $row->item_desc;?></td>
					<td><?= $row->item_status;?></td>
					<td>
                        <a href="#" class="btn btn-info btn-sm btn-edit" data-id="<?= $row->item_id;?>" data-no_resi="<?= $row->item_no_resi;?>" data-category_name="<?= $row->category_name;?>" 
						data-tod_name="<?= $row->tod_name;?>" data-dp_code="<?= $row->dp_code;?>" data-sector_name="<?= $row->sector_name;?>" data-rack_row="<?= $row->rack_row;?>"
						data-rack_col="<?= $row->rack_col;?>" data-desc="<?= $row->desc;?>"
						><i class="fa fa-pencil-square-o"></i> Edit</a>
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
			              
                 <strong> Add Item </strong>
				 
			 <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
              </header>
               <div class="card-body">
                              <form action="<?php echo base_url('Item/save')?>" method="post">
                                  <h4> <label><b>Sender</b></label> </h4>
								  <hr/>
								   <div class="row">
                                  <div class="col-sm-6 form-group">
                                      <label><b>Name</b></label>
                                      <input type="text" class="form-control" name="item_sender_name" placeholder="Name" required>
                                  </div>
								  <div class="col-sm-6 form-group">
                                      <label><b>Telp</b></label>
                                      <input type="text" class="form-control" name="item_sender_telp" placeholder="Telp" required>
                                  </div>
								  </div>
								   <div class="row">
								  <div class="col-sm-12 form-group">
                                      <label><b>Address</b></label>
                                      <input type="text" class="form-control" name="item_sender_address" placeholder="Address" required>
                                  </div>
								  </div>
								   <div class="row">
								    <div class="col-sm-4 form-group">
									<label><b>City</b></label>
									<select name="item_sender_city" class="form-control">
										<option value="">-Select-</option>
										<?php foreach($city as $row):?>
										<option value="<?= $row->city_id;?>"><?= $row->city_name;?></option>
										<?php endforeach;?>
									</select>
									</div>
								  <div class="col-sm-4 form-group">
                                      <label><b>Province</b></label>
                                      <input type="text" class="form-control" name="item_sender_province" placeholder="Province" required>
                                  </div>
								  <div class=" col-sm-4 form-group">
                                      <label><b>Postal Code</b></label>
                                      <input type="text" class="form-control" name="item_sender_postal_code" placeholder="Postal Code" required>
                                  </div>
								  </div>
								  
								  <h4> <label><b>Receiver</b></label> </h4>
								  <hr/>
								   <div class="row">
                                  <div class="col-sm-6 form-group">
                                      <label><b>Name</b></label>
                                      <input type="text" class="form-control" name="item_receiver_name" placeholder="Name" required>
                                  </div>
								   <div class="col-sm-6 form-group">
                                      <label><b>Telp</b></label>
                                      <input type="text" class="form-control" name="item_receiver_telp" placeholder="Telp" required>
                                  </div>
								  </div>
								   <div class="row">
								  <div class="col-sm-12 form-group">
                                      <label><b>Address</b></label>
                                      <input type="text" class="form-control" name="item_receiver_address" placeholder="Address" required>
                                  </div>
								  </div>
								   <div class="row">
								  
								   <div class="col-sm-4 form-group">
									<label><b>City</b></label>
									<select name="item_receiver_city" class="form-control">
										<option value="">-Select-</option>
										<?php foreach($city as $row):?>
										<option value="<?= $row->city_id;?>"><?= $row->city_name;?></option>
										<?php endforeach;?>
									</select>
									
								</div>
								  <div class="col-sm-4 form-group">
                                      <label><b>Province</b></label>
                                      <input type="text" class="form-control" name="item_receiver_province" placeholder="Province" required>
                                  </div>
								  <div class="col-sm-4 form-group">
                                      <label><b>Postal Code</b></label>
                                      <input type="text" class="form-control" name="item_receiver_postal_code" placeholder="Postal Code" required>
                                  </div>
								  </div>
								 
                                   <h4> <label><b>Item Information</b></label> </h4>
								  <hr/>
                                  <div class="row form-group">
								  <div class="col-sm-3">
                                      <label><b>Weight (Kg)</b></label>
                                      <input type="text" class="form-control" name="item_weight" placeholder="Weight" required>
								  </div>
								  <div class="col-sm-3">
                                      <label><b>Length (cm)</b></label>
                                      <input type="text" class="form-control" name="item_length" placeholder="Length" required>
								  </div>
								  <div class="col-sm-3">
                                      <label><b>Width (cm)</b></label>
                                      <input type="text" class="form-control" name="item_width" placeholder="Width" required>
								  </div>
								  <div class="col-sm-3">
                                      <label><b>Height (cm)</b></label>
                                      <input type="text" class="form-control" name="item_height" placeholder="Height" required>
								  </div>
                                  </div>
								  <div class="row">
								 <div class="col-sm-6 form-group">
									<label><b>Category</b></label>
									<select name="category_id" class="form-control">
										<option value="">-Select-</option>
										<?php foreach($category as $row):?>
										<option value="<?= $row->category_id;?>"><?= $row->category_name;?></option>
										<?php endforeach;?>
									</select>
									
								</div>
								 <div class="col-sm-6 form-group">
									<label><b>Type of Delivery</b></label>
									<select name="tod_id" class="form-control">
										<option value="">-Select-</option>
										<?php foreach($tod as $row):?>
										<option value="<?= $row->tod_id;?>"><?= $row->tod_name;?></option>
										<?php endforeach;?>
									</select>
									
								</div>
								</div>
								<div class="form-group">
                                      <label><b>Item Description</b></label>
                                      <input type="text" class="form-control" name="item_desc" placeholder="Description" required>
                                  </div>
								
                                  <button type="submit" class="btn btn-primary">Submit</button>
                              </form>

                          </div>
              </div>
              </section>
              </div>
              
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
	  

	 
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
            //const id = $(this).data('id');
            //const no_resi = $(this).data('no_resi');
            //const category_name = $(this).data('category_name');
            //const tod_name = $(this).data('tod_name');
			//const dp_code = $(this).data('dp_code');
			//const sector_name = $(this).data('sector_name');
			//const rack_row = $(this).data('rack_row');
			//const rack_col = $(this).data('rack_col');
			//const desc = $(this).data('desc');
            // Set data to Form Edit
           // $('.item_id').val(id);
            //$('.no_resi').val(no_resi);
            //$('.category_name').val(category_name).trigger('change');
            //$('.tod_name').val(tod_name).trigger('change');
			//$('.user_email').val(email);
			//$('.user_telp').val(telp);
            // Call Modal Edit
            //$('#editModal').modal('show');
        });
 
   
         
    });
</script>
   
  </body>
</html>
     