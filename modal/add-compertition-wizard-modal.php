                <!-- #START# Add production Modal -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="modal fade" id="addCompertitionWizard" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Compertition Wizard</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" autocomplete="off">
                                        <div class="body">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs noborder" role="tablist">
                                                <li role="presentation" class="test" id="tab1">
                                                    <a href="#compertition" data-toggle="tab" class="active">
                                                        <i class="material-icons">place</i> COMPERTITION
                                                    </a>
                                                </li>
                                                <li role="presentation" class="" id="tab2">
                                                    <a href="#question" data-toggle="tab" class="">
                                                        <i class="material-icons">assignment</i> QUESTIONS
                                                    </a>
                                                </li>
                                                <li role="presentation" class="" id="tab3">
                                                    <a href="#column" data-toggle="tab" class="">
                                                        <i class="material-icons">format_line_spacing</i> COLUMNS
                                                    </a>
                                                </li>
                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade in active show" id="compertition">
                                                    <div class="row clearfix">
                                                        <div class="col-md-12">
                                                            <div class="form-group form-float m-t-20">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="compertitionName" required />
                                                                    <input type="hidden" class="form-control" name="addedDate" required value="<?php echo time(); ?>" />
                                                                    <label class="form-label">Compertition Name *</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group form-float m-t-20">
                                                                <div class="form-line">
                                                                    <input type="text" class="datepicker form-control"
                                                                        placeholder="Compertition Date *" name="compertitionDate">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group form-float m-t-20">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="compertitionAddress" required />
                                                                    <label class="form-label">Compertition Address *</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div role="tabpanel" class="tab-pane fade" id="question">
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
                                                </div>

                                                <div role="tabpanel" class="tab-pane fade" id="column">
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
                                                                <?php
                                                                    $call->fetchPrivellegeOption();
                                                                ?>
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
                                                        <button type="submit" name="addCompertitionWizard" class="btn btn-primary waves-effect btn-hover color-8 float-right"><i class="fa fa-save"></i> Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                             <!-- End Tab panes -->
                                        </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Add production Modal -->
