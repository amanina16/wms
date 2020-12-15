      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a class="active" href="href="<?php echo base_url('admin'); ?>">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-laptop"></i>
                          <span>Master Data</span>
                      </a>
                      <ul class="sub">
						  <li><a  href="<?php echo base_url('User'); ?>">User</a></li>
                          <li><a  href="<?php echo base_url('Category'); ?>">Category</a></li>
                          <li><a  href="<?php echo base_url('Rack'); ?>">Rack</a></li>
                          <li><a  href="<?php echo base_url('Sector'); ?>">Sector</a></li>
                          <li><a  href="<?php echo base_url('TypeDelivery'); ?>">Type of Delivery</a></li>
						  <li><a  href="<?php echo base_url('City'); ?>">City</a></li>
						  <li><a  href="<?php echo base_url('Droppoint'); ?>">Droppoint</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
				  <a class="active" href="<?php echo base_url('Item'); ?>">
                          <i class="fa fa-th-large"></i>
                          <span>Incoming Item</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-truck"></i>
                          <span>Pick Up Barang</span>
                      </a>
                  </li>
				  
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-map-marker"></i>
                          <span>Tracking Barang</span>
                      </a>
                  </li>
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
   

     