
                <!-- #START# Add production Modal -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="modal fade" id="importSetting" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Import Setting</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" autocomplete="off">
                                        <div class="body">
                                            <div class="row clearfix">
                                                <div class="col-md-12">
                                                    <div class="form-group form-float m-t-20">
                                                        <div class="form-line default-select select2Style select-padding">
                                                            <select class="form-control select2" name="fromId" data-placeholder="Select">
                                                                <?php $call->fetchCompertitionOption(); ?>
                                                            </select>
                                                            <label class="form-label">Import All Setting From *</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group form-float m-t-20">
                                                        <div class="form-line focused">
                                                            <input type="hidden" id="toId" class="form-control" name="toId" required />
                                                            <input type="text" id="name" class="form-control" name="toName" readonly />
                                                            <label class="form-label active">Import To *</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" name="importSetting" class="btn btn-primary waves-effect btn-hover color-8 float-right"><i class="fa fa-clipboard"></i> Import</button>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Add production Modal -->