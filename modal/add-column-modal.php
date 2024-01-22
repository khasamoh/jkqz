                <!-- #START# Add production Modal -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="modal fade" id="addColumnModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Jaji Columns</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" autocomplete="off">
                                        <div class="body">
                                            <div class="row clearfix column-form">
                                                <div class="col-sm-6 col-md-4 col-lg-2">
                                                    <div class="form-group form-float m-t-30">
                                                        <div class="form-line focused">
                                                            <input type="text" class="form-control" name="columnName[]" required />
                                                            <label class="form-label active">Column Name *</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-2">
                                                    <div class="form-group form-float m-t-30">
                                                        <div class="form-line">
                                                            <input type="number" class="form-control" value="1" name="columnMark[]" required />
                                                            <label class="form-label">Column Mark *</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <textarea class="form-control" name="columnTitle[]"></textarea>
                                                            <label class="form-label">Column Title</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-2">
                                                    <div class="form-group form-float m-t-20">
                                                        <div class="form-line default-select select2Style select-padding">
                                                            <select class="form-control select2" name="columnSequence[]" data-placeholder="Select">
                                                                <?php
                                                                for ($i=1; $i <= 15; $i++) { 
                                                                    print"<option>".$i."</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                            <label class="form-label">Sequence</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-2">
                                                    <div class="form-group form-float m-t-20">
                                                        <div class="form-line default-select select2Style select-padding">
                                                            <select class="form-control select2" name="columnPrivellege[]" data-placeholder="Select">
                                                                <option>jaji hifdhi</option>
                                                                <option>jaji makharij</option>
                                                                <option>jaji tajwid</option>
                                                                <option>jaji tashjii</option>
                                                                <option>jaji kiongozi</option>
                                                                <option>mudiru</option>
                                                            </select>
                                                            <label class="form-label">Accessed</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4 col-lg-1">
                                                    <a href="javascript:void(0)" class="float-right m-t-30 add-column-row">
                                                        <i class="material-icons">add_circle_outline</i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="column-row"></div>
                                            <div class="col-md-12">
                                                <button type="submit" name="addColumn" class="btn btn-primary waves-effect btn-hover color-8 float-right"><i class="fa fa-save"></i> Save</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Add production Modal -->