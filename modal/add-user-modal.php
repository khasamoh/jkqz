                <!-- #START# Add User Modal -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" autocomplete="off">
                                            <div class="row clearfix">
                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="fname" required/>
                                                            <label class="form-label">First Name *</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="mname">
                                                            <label class="form-label">Middle Name</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="lname" required/>
                                                            <label class="form-label">Last Name *</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line default-select select2Style select-padding">
                                                            <select class="form-control select2" name="gender" data-placeholder="Select">
                                                                <option value="male">Male</option>
                                                                <option value="female">Female</option>
                                                            </select>
                                                            <label class="form-label">Gender *</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="phone" />
                                                            <label class="form-label">Phone Number</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="address"/>
                                                            <label class="form-label">Address</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="nationality" />
                                                            <label class="form-label">Nationality</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="email" class="form-control" name="email"/>
                                                            <label class="form-label">Email</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line default-select select2Style select-padding">
                                                            <select class="form-control select2" name="compertition" data-placeholder="Select">
                                                                <?php $call->fetchCompertitionOption(); ?>
                                                            </select>
                                                            <label class="form-label">Compertition *</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line default-select select2Style select-padding">
                                                            <select class="form-control select2" name="privellege" data-placeholder="Select">
                                                                <?php $call->fetchPrivellegeOption(); ?>
                                                            </select>
                                                            <label class="form-label">Privellege *</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="username" required/>
                                                            <label class="form-label">Username *</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="password" class="form-control" name="password" required/>
                                                            <label class="form-label">Password *</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                    <input type="hidden" class="form-control" name="addedDate" value="<?php echo time(); ?>" required/>
                                                    <button type="submit" name="adduser" class="btn btn-primary waves-effect btn-hover color-8"><i class="fa fa-save"></i> Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Add user Modal -->