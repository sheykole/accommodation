
<div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">App</li>
                    <li class="mega-menu mega-menu-lg">
                        <a  href="<?=site_url('administrator')?>" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard"></i><span class="nav-text">Dashboard</span>
                        </a>
                        
                    </li>
                    <li class="mega-menu mega-menu-lg">
                        <a  href="<?=site_url('administrator/agents')?>" aria-expanded="false">
                            <i class="mdi mdi-page-layout-body"></i><span class="nav-text">Agents</span>
                        </a>
                        
                    </li>
                    <li class="mega-menu mega-menu-lg">
                        <a  href="<?=site_url('administrator/students')?>" aria-expanded="false">
                            <i class="mdi mdi-page-layout-body"></i><span class="nav-text">Students</span>
                        </a>
                        
                    </li>
                    <li class="mega-menu mega-menu-lg">
                        <a  href="<?=site_url('administrator/updateprofile')?>" aria-expanded="false">
                            <i class="mdi mdi-application"></i><span class="nav-text">Update Profile</span>
                        </a>
                        
                    </li>
                    <li class="mega-menu mega-menu-lg">
                        <a  href="<?=site_url('administrator/accommodation')?>" aria-expanded="false">
                            <i class="mdi mdi-email-outline"></i><span class="nav-text">Accommodations</span>
                        </a>
                        
                    </li>
                    <li class="mega-menu mega-menu-lg">
                        <a  href="<?=site_url('administrator/logout')?>" aria-expanded="false">
                            <i class="mdi mdi-gradient"></i><span class="nav-text">Logout</span>
                        </a>
                        
                    </li>
                  
                            
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        <div class="content-body">
            <div class="container-fluid mt-5">
                <?php if($this->session->flashdata('item')){ ?> 
                    <div class="alert alert-primary alert-dismissible fade show">
                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button> 
                        <?=$this->session->flashdata('item');?>
                    </div>
                    <?php } if($this->session->flashdata('warn')){ ?>
                    <div class="alert alert-warning alert-dismissible fade show">
                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button> 
                        <?=$this->session->flashdata('warn');?>
                    </div>
                    <?php } ?>