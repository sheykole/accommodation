<div class="row">
                    <div class="col-lg-12">
                       
                        <div class="card recent-properties-area">
                            <div class="card-header pb-0">
                                <h4 class="card-title mt-3"><?=$list->info?></h4>                                
                            </div>
                            <div class="card-body">
                                <div class="media">
                                    <img src="../../assets/images/property/1.jpg" alt="">
                                    <div class="media-body ml-4 mt-sm-3">

                                        <h5 class="mb-1">Amount: $<?=number_format($list->amount)?></h5>
                                        <h5 class="mb-1">Address: <?=($list->hostel_address)?></h5>
                                        <h5 class="mb-1">State: <?=($list->state)?></h5>
                                        <h5 class="mb-1">Town: <?=($list->town)?></h5>
                                        <h5 class="mb-1">Created: <?=date('d/m/Y',strtotime($list->created_at))?></h5>
                                        <hr>
                                        <h2>Features</h2><hr>
                                        <?php if($images){ foreach ($faetures as $k ) {?>
                                            <h4><?=dbInfo('feature_m','id',$k->feature,'name')?></h4>
                                        <?php } } ?>
                                    </div>
                                    <a href="javascript:void()" class="label label-warning label-rounded"><?=$list->status?></a>
                                </div>

                                <div class="row">
                                    <?php if($images){ foreach ($images as $key ) {?>
                                        <div class="col-xl-3 col-lg-4 col-xxl-4 col-sm-6">
                                        <div class="card card-portfolio-widget">
                                            <img class="img-fluid" src="<?=base_url();?>upload/apartments/<?=$key->path?>" alt="">                                            
                                        </div>
                                    </div>
                                <?php } } ?>
                                    
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>