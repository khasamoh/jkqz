
                <!-- #START# Add production Modal -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="modal fade" id="addQuestionsModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Questions</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" autocomplete="off">
                                        <div class="body">
                                            <div class="row clearfix question-form">
                                                <div class="col-sm-4">
                                                    <div class="form-group form-float m-t-20">
                                                        <div class="form-line default-select select2Style select-padding">
                                                            <select class="form-control select2" name="type[]" data-placeholder="Select">
                                                               <option value="hifdhi">Hifdhi</option>
                                                               <option value="tashjii">Tashjii</option>
                                                            </select>
                                                            <label class="form-label">Hifdhi Type</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group form-float m-t-20">
                                                        <div class="form-line default-select select2Style select-padding">
                                                            <select class="form-control select2" name="juzuu[]" data-placeholder="Select">
                                                                <?php
                                                                for ($i=1; $i <= 30; $i++) { 
                                                                    print"<option>".$i."</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                            <label class="form-label">Juzuu</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group form-float m-t-20">
                                                        <div class="form-line default-select select2Style select-padding">
                                                            <select class="form-control select2" name="question[]" data-placeholder="Select">
                                                                <?php
                                                                for ($i=1; $i <= 30; $i++) { 
                                                                    print"<option>".$i."</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                            <label class="form-label">No_of_Questions</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <a href="javascript:void(0)" class="float-right m-t-30 add-question-row">
                                                        <i class="material-icons">add_circle_outline</i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="question-row"></div>
                                            <div class="col-md-12">
                                                <button type="submit" name="addQuestion" class="btn btn-primary waves-effect btn-hover color-8 float-right"><i class="fa fa-save"></i> Save</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Add production Modal -->