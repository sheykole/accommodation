
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
                                                <th> ID</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $r=0;  if($list !=''){ foreach($list as $i){ ?>
                                            <tr>
                                                <td><?=++$r;?></td>
                                                <td><?=$i->name?></td>
                                                <td><?=$i->username   ?></td>
                                                <td><?=$i->email   ?></td>
                                                <td><?=$i->phone   ?></td>
                                                <td><?=$i->status=='active'? '<span class="label label-success">'.$i->status.'</span>': '<span class="label label-danger">'.$i->status.'</span>'?>
                                                </td>
                                                <td><a href="<?=site_url('administrator/profile/'.$i->id)?>" class="label label-success">View</a>
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