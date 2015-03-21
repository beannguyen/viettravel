@extends('backend.backend')
@section('page-content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-user-follow font-green-sharp"></i>
                        <span class="caption-subject font-green-sharp bold uppercase">Add New User</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse">
                        </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form role="form">
                        <div class="form-body">
                            <div class="form-group">
                                <label>Username</label>
                                <div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-user"></i>
											</span>
                                    <input type="text" class="form-control" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-envelope"></i>
											</span>
                                    <input type="text" class="form-control" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Fullname</label>
                                <div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-info"></i>
											</span>
                                    <input type="text" class="form-control" placeholder="Username">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn blue">Submit</button>
                            <button type="button" class="btn default">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection