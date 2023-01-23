<div class="row">
    <div class="col-6 offset-3">
        <div class="card">
            <div class="card-header pb-0">
                <h4 class="card-title"><?=$title?></h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <?=validation_errors()?>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="text-label">Name*</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="text-label">Address*</label>
                            <input type="text" name="addr" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="text-label">Amount*</label>
                            <input type="text" name="amount" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="text-label">Description*</label>
                            <textarea name="desc" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="text-label">Town*</label>
                            <input type="text" name="town" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="text-label">State*</label>
                            <input type="text" name="state" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="text-label">Status*</label>
                            <select name="status" class="form-control">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="sold">Sold</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="text-label">Picture 1*</label>
                            <input type="file" name="pix1" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="text-label">Picture 2*</label>
                            <input type="file" name="pix2" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="text-label">Picture 3*</label>
                            <input type="file" name="pix3" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="text-label">Features*</label>
                            <select name="f1" class="form-control">
                                <option value="">--SELECT--</option>
                                <?php foreach ($features as $key ) { ?>
                                 <option value="<?=$key->id?>"><?=$key->name?></option>
                               <?php } ?>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="text-label">Features*</label>
                            <select name="f2" class="form-control">
                                <option value="">--SELECT--</option>
                                <?php foreach ($features as $key ) { ?>
                                 <option value="<?=$key->id?>"><?=$key->name?></option>
                               <?php } ?>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="text-label">Features*</label>
                            <select name="f3" class="form-control">
                                <option value="">--SELECT--</option>
                                <?php foreach ($features as $key ) { ?>
                                 <option value="<?=$key->id?>"><?=$key->name?></option>
                               <?php } ?>
                                
                            </select>
                        </div>
                        
                        <input type="submit" class="btn btn-primary btn-form mr-2" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
