                <!-- #START# delete Modal -->
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="modal fade" id="finishParticipantModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="" method="post">
                                    <div class="modal-body" autocomplete="off">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">Confirm finish Participant</h3>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <h4 class="center">Are you sure you want finish participant?
                                            </div>
                                        </div>
                                        <input type="hidden" id="envelope_id" class="form-control" value="" name="envelope_id"/>
                                        <input type="hidden" id="participant_id" class="form-control" value="" name="participant_id"/>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning waves-effect" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-info" name="finishParticipant">Finish <i class="fa fa-user-check"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# delete Modal -->