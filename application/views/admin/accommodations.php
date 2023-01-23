
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
                                                <th>Address</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $r=0;  if($list !=''){ foreach($list as $i){ ?>
                                            <tr>
                                                <td><?=++$r;?></td>
                                                <td><?=$i->info?></td>
                                                <td><?=$i->hostel_address   ?></td>
                                                <td>
                                                    <span class="text-muted"><?=date('d/m/Y',strtotime($i->created_at))?></span>
                                                </td>
                                                <td><?=$i->status=='active'? '<span class="label label-success">'.$i->status.'</span>': '<span class="label label-danger">'.$i->status.'</span>'?>
                                                </td>
                                                <td><a href="<?=site_url('agent/getaccommodation/'.$i->id)?>" class="label label-success">View</a>
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