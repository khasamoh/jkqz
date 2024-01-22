                <!-- #START# Add User Modal -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="modal fade" id="addEnvelopeModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Envelope</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="add-envelope-question.php" method="post" autocomplete="off">
                                            <div class="row clearfix">
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="envelopeno" required/>
                                                            <label class="form-label">Envelope Number *</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line default-select select2Style select-padding">
                                                            <select class="form-control select2" name="juzuu" data-placeholder="Select">
                                                                <?php $call->fetchJuzuuOption(); ?>
                                                            </select>
                                                            <label class="form-label">Juzuu</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line default-select select2Style select-padding">
                                                            <select class="form-control select2" name="type" data-placeholder="Select">
                                                                <option>hifdhi</option>
                                                                <option>tashjii</option>
                                                            </select>
                                                            <label class="form-label">Type</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line default-select select2Style select-padding">
                                                            <select class="form-control select2" name="compertition" data-placeholder="Select">
                                                                <?php $call->fetchCompertitionOption(); ?>
                                                            </select>
                                                            <label class="form-label">Compertition *</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                    <input type="hidden" class="form-control" name="addedDate" value="<?php echo time(); ?>" required/>
                                                    <button type="submit" name="addenvelope" class="btn btn-primary waves-effect btn-hover color-8"><i class="fa fa-save"></i> Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Add user Modal -->