<?php function main() { 
    $mainObj = new MainClass;
    ?>
<h3>Users Details</h3>
<hr>
<div class="row">
    <div class="col-xl-3 col-md-4">
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
    <div class="col-xl-3 col-md-4">
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
    <div class="col-xl-3 col-md-4">
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
    <div class="col-xl-3 col-md-4">
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
<br>
<h3>Account Details</h3>
<hr>
<div class="row">
    <div class="col-xl-3 col-md-4">
        <div class="card bg-c-yellow update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-12">
                        <h4 class="text-white">
                        <?php $useCount = $mainObj->get_user_details(); echo $useCount->total; ?>
                        </h4>
                        <h6 class="text-white m-b-0">Active Users</h6>
                    </div>
             
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-4">
        <div class="card bg-c-green update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-12">
                        <h4 class="text-white">30+</h4>
                        <h6 class="text-white m-b-0">Closed Users</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-4">
        <div class="card bg-c-lite-green update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-12">
                        <h4 class="text-white">13000</h4>
                        <h6 class="text-white m-b-0"> Total Credited</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-4">
        <div class="card bg-c-pink update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-12">
                        <h4 class="text-white">15000</h4>
                        <h6 class="text-white m-b-0"> Total Debited</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } include 'admin_template.php';?>