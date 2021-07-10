<?php function main() { 
    $mainObj = new MainClass;
    ?>
<div class="row">
    <div class="col-xl-3 col-md-4 curser">
        <div class="card bg-c-yellow update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-12">
                        <h6 class="text-white m-b-10">Total Users</h6>
                        <h4 class="text-white">
                            <?php $useCount = $mainObj->get_user_details(); echo $useCount->total; ?>
                        </h4>
                    </div>
             
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-4 curser">
        <div class="card bg-c-green update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-12">
                        <h6 class="text-white m-b-10">Active Users</h6>
                        <h4 class="text-white">
                            <?php $useCount = $mainObj->get_user_details(); echo $useCount->active_users; ?>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-4 curser">
        <div class="card bg-c-lite-green update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-12">
                        <h6 class="text-white m-b-10">Closed Users</h6>
                        <h4 class="text-white">
                            <?php $useCount = $mainObj->get_user_details(); echo $useCount->closed_users; ?>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-4 curser">
        <div class="card bg-c-pink update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-12">
                        <h6 class="text-white m-b-10">Waiting Users</h6>
                        <h4 class="text-white">
                            <?php $useCount = $mainObj->get_user_details(); echo $useCount->waiting_users; ?>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Customer Table</h5>
            </div>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="users-table" class="table table-striped table-bordered nowrap display" style="width:100%">
                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Name</th>
                                <th>User id</th>
                                <th>Mobile</th>
                                <th>E-Mail</th>
                                <th>Details</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } include 'admin_template.php';?>