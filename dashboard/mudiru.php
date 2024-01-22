<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="support-box text-center cyan">
            <div class="icon m-b-10">
                <div class="chart chart-bar"><canvas style="display: inline-block; width: 109px; height: 45px; vertical-align: top;" width="109" height="45"></canvas></div>
            </div>
            <div class="text m-b-10">Total Income</div>
            <h3 class="m-b-0">$1512
                <i class="material-icons">trending_up</i>
            </h3>
            <small class="displayblock">21% Higher Than Average </small>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="support-box text-center purple">
            <div class="icon m-b-10">
                <span class="chart chart-line"><canvas style="display: inline-block; width: 60px; height: 45px; vertical-align: top;" width="60" height="45"></canvas></span>
            </div>
            <div class="text m-b-10">Orders Received</div>
            <h3 class="m-b-0">1236
                <i class="material-icons">trending_up</i>
            </h3>
            <small class="displayblock">13% Highr Than Average </small>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="support-box text-center blue">
            <div class="icon m-b-10">
                <div class="chart chart-pie"><canvas style="display: inline-block; width: 45px; height: 45px; vertical-align: top;" width="45" height="45"></canvas></div>
            </div>
            <div class="text m-b-10">Total Sales</div>
            <h3 class="m-b-0">1107
                <i class="material-icons">trending_down</i>
            </h3>
            <small class="displayblock">34% Lower Than Average </small>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="support-box text-center green">
            <div class="icon m-b-10">
                <div class="chart chart-bar"><canvas style="display: inline-block; width: 109px; height: 45px; vertical-align: top;" width="109" height="45"></canvas></div>
            </div>
            <div class="text m-b-10">Total Active Users</div>
            <h3 class="m-b-0">167
                <i class="material-icons">trending_down</i>
            </h3>
            <small class="displayblock">06% Lower Than Average </small>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="support-box text-center blue">
            <div class="icon m-b-10">
                <div class="chart chart-bar"><canvas style="display: inline-block; width: 109px; height: 45px; vertical-align: top;" width="109" height="45"></canvas></div>
            </div>
            <div class="text m-b-10">Total Ticket</div>
            <h3 class="m-b-0">1512
                <i class="material-icons">trending_up</i>
            </h3>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="support-box text-center l-bg-red">
            <div class="icon m-b-10">
                <span class="chart chart-line"><canvas style="display: inline-block; width: 60px; height: 45px; vertical-align: top;" width="60" height="45"></canvas></span>
            </div>
            <div class="text m-b-10">Reply</div>
            <h3 class="m-b-0">1236
                <i class="material-icons">trending_up</i>
            </h3>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="support-box text-center l-bg-orange">
            <div class="icon m-b-10">
                <div class="chart chart-pie"><canvas style="display: inline-block; width: 45px; height: 45px; vertical-align: top;" width="45" height="45"></canvas></div>
            </div>
            <div class="text m-b-10">Resolve</div>
            <h3 class="m-b-0">1107
                <i class="material-icons">trending_down</i>
            </h3>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="support-box text-center l-bg-cyan">
            <div class="icon m-b-10">
                <div class="chart chart-bar"><canvas style="display: inline-block; width: 119px; height: 45px; vertical-align: top;" width="119" height="45"></canvas></div>
            </div>
            <div class="text m-b-10">Pending</div>
            <h3 class="m-b-0">167
                <i class="material-icons">trending_down</i>
            </h3>
        </div>
    </div>
</div>



<div class="row clearfix">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="header">
                <h2>
                    <strong>Employee</strong> Report</h2><br>
                <ul class="header-dropdown m-r--5">

                </ul>
            </div>
            <div class="body">
                <ul class="timeline">
                    <?php $call->latestUserReport(); ?>
                </ul>
                <div class="text-center  m-b-5">
                    <a href="#" class="b-b-primary text-primary bold">View all User Report</a>
                </div>
            </div>
        </div>
    </div>



    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="header">
                <h2>
                    <strong>New</strong> Employee</h2><br>
                <ul class="header-dropdown m-r--5">
                    
                </ul>
            </div>
            <div class="tableBody">
                <div class="table-responsive">
                    <table class="table table-hover dashboard-task-infos">
                        <thead>
                            <tr>
                                <th class="center">Stamp</th>
                                <th>Full_Name</th>
                                <th class="center">Gender</th>
                                <th class="center">Role</th>
                                <th class="center">Registered</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $call->latestRegisteredUser(); ?>
                            
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="text-center  m-b-5">
                    <a href="view-user.php" class="b-b-primary text-primary bold">View all Employee</a>
                </div><br>
            </div>
        </div>
    </div>


</div>