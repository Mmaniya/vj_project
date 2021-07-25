<?php function main() {     ?>
    <h2>Closed Users</h2>
    <hr>
<div class="customerstatics"></div>

<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Customer Table</h5>
            </div>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="active-users-table" class="table table-striped table-bordered nowrap display" style="width:100%">
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