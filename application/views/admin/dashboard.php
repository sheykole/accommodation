
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body rounded stat-widget-seven gradient-7">
                                <div class="media pl-xl-5 align-items-center">
                                    <img class="mr-3 mt-2" src="<?=base_url()?>public/assets/images/icons/12.png" alt="">
                                    <div class="media-body pl-3">
                                        <h2 class="mt-0 mb-2"><?=$all?></h2>
                                        <h6 class="text-uppercase text-white">ALL PROPERTIES</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body rounded stat-widget-seven gradient-6">
                                <div class="media pl-xl-5 align-items-center">
                                    <img class="mr-3 mt-2" src="<?=base_url()?>public/assets/images/icons/13.png" alt="">
                                    <div class="media-body pl-3">
                                        <h2 class="mt-0 mb-2"><?=$active?></h2>
                                        <h6 class="text-uppercase text-white">PROPERTIES FOR SALE</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body rounded stat-widget-seven gradient-5">
                                <div class="media pl-xl-5 align-items-center">
                                    <img class="mr-3 mt-2" src="<?=base_url()?>public/assets/images/icons/14.png" alt="">
                                    <div class="media-body pl-3">
                                        <h2 class="mt-0 mb-2"><?=$sold?></h2>
                                        <h6 class="text-uppercase text-white">SOLD PROPERTIES</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body rounded stat-widget-seven gradient-4">
                                <div class="media pl-xl-5 align-items-center">
                                    <img class="mr-3 mt-2" src="<?=base_url()?>public/assets/images/icons/15.png" alt="">
                                    <div class="media-body pl-3">
                                        <h2 class="mt-0 mb-2"><?=$inactive?></h2>
                                        <h6 class="text-uppercase text-white">INACTIVE PROPERTIES</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card transparent-card m-b-0">
                            <div class="card-header">
                                <h4 class="card-title">Property Overview</h4>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-padded table-responsive-fix-big property-overview-table">
                                        <thead>
                                            <tr>
                                                <th>Property ID</th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $r=0;  if($list !=''){ foreach($list as $i){ ?>
                                            <tr>
                                                <td><?=++$r?></td>
                                                <td><?=$i->info?></td>
                                                <td>
                                                    <span class="text-muted"><?=date('d/m/Y',strtotime($i->created_at))?></span>
                                                </td>
                                                <td><?=$i->status=='active'? '<span class="label label-success">'.$i->status.'</span>': '<span class="label label-danger">'.$i->status.'</span>'?>
                                                </td>
                                            </tr>
                                        <?php } } ?>
                                            
                                         
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>