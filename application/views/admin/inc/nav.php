
<div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">App</li>
                    <li class="mega-menu mega-menu-lg">
                        <a  href="<?=site_url('agent')?>" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard"></i><span class="nav-text">Dashboard</span>
                        </a>
                        
                    </li>
                    <li class="mega-menu mega-menu-lg">
                        <a  href="<?=site_url('agent/uploadAccommodation')?>" aria-expanded="false">
                            <i class="mdi mdi-page-layout-body"></i><span class="nav-text">Upload Accommodation</span>
                        </a>
                        
                    </li>
                    <li class="mega-menu mega-menu-lg">
                        <a  href="<?=site_url('agent/profile')?>" aria-expanded="false">
                            <i class="mdi mdi-application"></i><span class="nav-text">Update Profile</span>
                        </a>
                        
                    </li>
                    <li class="mega-menu mega-menu-lg">
                        <a  href="<?=site_url('agent/messages')?>" aria-expanded="false">
                            <i class="mdi mdi-application"></i><span class="nav-text">Messages</span>
                        </a>
                        
                    </li>
                    <li class="mega-menu mega-menu-lg">
                        <a  href="<?=site_url('agent/accommodation')?>" aria-expanded="false">
                            <i class="mdi mdi-email-outline"></i><span class="nav-text">Accommodations</span>
                        </a>
                        
                    </li>
                    <li class="mega-menu mega-menu-lg">
                        <a  href="<?=site_url('agent/logout')?>" aria-expanded="false">
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