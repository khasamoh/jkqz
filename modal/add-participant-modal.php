                <!-- #START# Add User Modal -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="modal fade" id="addParticipantModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Participant</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
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
                                                            <input type="text" class="form-control" name="mname"/>
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
                                                            <label class="form-label">Gender</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="datepicker form-control"
                                                                placeholder="Date Of Birth *" name="dob">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line focused select-padding">
                                                            <input type="file" class="form-control" name="picture" />
                                                            <label class="form-label active">Choose Picture</label>
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
                                                        <div class="form-line default-select select2Style select-padding">
                                                            <select class="form-control select2" name="juzuu" data-placeholder="Select">
                                                                <?php $call->fetchJuzuuOption(); ?>
                                                            </select>
                                                            <label class="form-label">Juzuu</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line default-select select2Style select-padding">
                                                            <select class="form-control select2" name="type" data-placeholder="Select">
                                                                <option value="hifdhi">Hifdhi</option>
                                                                <option value="tashjii">Tashjii</option>
                                                            </select>
                                                            <label class="form-label">Type</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="school"/>
                                                            <label class="form-label">School</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="eduLevel"/>
                                                            <label class="form-label">Education Level</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="madrasa"/>
                                                            <label class="form-label">Madrasa</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="country" required/>
                                                            <label class="form-label">Country *</label>
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
                                                    <input type="hidden" class="form-control" name="addedDate" value="<?php echo time(); ?>" required/>
                                                    <button type="submit" name="addparticipant" class="btn btn-primary waves-effect btn-hover color-8"><i class="fa fa-save"></i> Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Add user Modal -->