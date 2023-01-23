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
                            <input type="text" name="name" class="form-control" value="<?=$profile->name?>">
                        </div>
                        <div class="form-group">
                            <label class="text-label">Email*</label>
                            <input type="email" name="email" class="form-control" value="<?=$profile->email?>">
                        </div>
                        <div class="form-group">
                            <label class="text-label">Phone*</label>
                            <input type="text" name="phone" value="<?=$profile->phone?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="text-label">password*</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                       
                        
                        <input type="submit" class="btn btn-primary btn-form mr-2" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
