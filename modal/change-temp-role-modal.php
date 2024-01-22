                <!-- #START# delete Modal -->
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="modal fade" id="chRoleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="" method="post">
                                <div class="modal-body" autocomplete="off">
                                    <div class="modal-header">
                                        <h2 class="modal-title" id="exampleModalLabel">Confirm change user role</h2>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line2">
                                            <h4 class="center">Change role to user <span id="uname"></span>?</h4>
                                            <input type="hidden" name="prv" id="pid" class="form-control">
                                            <input type="hidden" name="user_id" id="uid" class="form-control">
                                        </div><br><br>
                                        <div class="col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line default-select select2Style select-padding">
                                                    <select class="form-control select2" id="privellege" onchange="chPrv(this);" name="privellege" data-placeholder="Select">
                                                        <option>---</option>
                                                        <?php $call->fetchPrivellegeOption(); ?>
                                                        <option>logout</option>
                                                    </select>
                                                    <label class="form-label">Privellege *</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success waves-effect" name="save"><i class="fa fa-save"></i> Save</button>
                                        <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# delete Modal -->