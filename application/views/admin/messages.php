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
                                                <th>S/N</th>
                                                <th>Message</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $r=0;  if($list !=''){ foreach($list as $i){ ?>
                                            <tr>
                                                <td><?=++$r;?></td>
                                                <td><?=$i->message?></td>
                                                <td><?=$i->dateadded?></td>
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