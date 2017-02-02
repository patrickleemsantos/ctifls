<?php 
include('header.php'); 
include('dbconnection.php');
 ?>

<script type='text/javascript'>
  $(document).ready(function(){   
     $('#form-ewarranty-search').submit(function() {
        var imei = $('#txt-imei').val();
        var mobile_no = $('#txt-mobile-no').val();
        var model_code = $('#txt-model-code').val();

        if (imei == '' && mobile_no == '') {
        	alert('Please enter IMEI or Mobile no!');
        	event.preventDefault();
        }
     });
  });
</script>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">e-Warranty Registration</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
        	<div class="col-lg-12">
        		<div class="panel panel-default">
        			<div class="panel-heading">
                        Search
                    </div>
                    <div class="panel-body">
                    	<div class="row">
                    		<form id="form-ewarranty-search" role="form" method="post" action="ewarrantyregistration.php">
	                    		<div class="col-lg-6">
                    				<div class="form-group">
                                        <label>IMEI</label>
                                        <input id="txt-imei" name="txt-imei" class="form-control" placeholder="IMEI">
                                    </div>
                                    <div class="form-group">
                                    	<label>Mobile No.</label>
                                        <input id="txt-mobile-no" name="txt-mobile-no" class="form-control" placeholder="Mobile No.">
                                    </div>
	                    		</div>
	                    		<div class="col-lg-6">
                    				<div class="form-group">
                    					<label>Model Code</label>
                                        <input id="txt-model-code" name="txt-model-code" class="form-control" placeholder="Model Code">
                                    </div>
                                    <div class="form-group" style="text-align: right;">
                                        <button id="btn-search-ewarranty" name="btn-search-ewarranty" type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search"></i> Search</button>
                                    </div>
	                    		</div>
                    		</form>
                    	</div>
                    </div>
        		</div>
        	</div>
        </div>
        <!-- /.row -->
        <?php

            if (isset($_REQUEST['btn-search-ewarranty'])) {
                $imei = $_POST['txt-imei'];
                $mobile_no = $_POST['txt-mobile-no'];
                $model = $_POST['txt-model-code'];

                $sql_search = "SELECT * FROM tbl_ew_registration";

                if ($imei != '') {
                    $sql_search .= " WHERE imei = '$imei'";
                }

                if ($imei == '' && $mobile_no != '') {
                    $sql_search .= " WHERE msisdn = '$mobile_no'";
                } else if ($mobile_no != '') {
                    $sql_search .= " AND msisdn = '$mobile_no'"; 
                }

                if ($model != '') {
                    $sql_search .= " AND model = '$model'";
                }

                $result = mysqli_query($con, $sql_search) or die(mysqli_error($con));
                $total_rows = mysqli_num_rows($result);
                if ($total_rows > 0) {
                   echo '<div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Result: '.$total_rows.' row(s) found
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="ewarranty-search-table">
                                                <thead>
                                                    <tr>
                                                        <th>Frontliner</th>
                                                        <th>IMEI</th>
                                                        <th>Model</th>
                                                        <th>Name</th>
                                                        <th>Address</th>
                                                        <th>Location</th>
                                                        <th>Contact</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>';

                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo '<tr>
                                <td>'.$row['frontliner_code'].'</td>
                                <td>'.$row['imei'].'</td>
                                <td>'.$row['model'].'</td>
                                <td>'.$row['name'].'</td>
                                <td>'.$row['address'].'</td>
                                <td>'.$row['location'].'</td>
                                <td>'.$row['msisdn'].'</td>
                                <td>'.$row['timestamp'].'</td>
                                </tr>';
                    } 

                    echo'
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                    </div>
                                    <!-- /.panel-body -->
                                </div>
                                <!-- /.panel -->
                            </div>
                            <!-- /.col-lg-12 -->
                        </div>';
                } else {
                    echo '<div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Result: '.$total_rows.' row(s) found
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <p>No result found</p>
                                    </div>
                                    <!-- /.panel-body -->
                                </div>
                                <!-- /.panel -->
                            </div>
                            <!-- /.col-lg-12 -->
                        </div>';
                }
            }

        ?>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php
include('footer.php');
?>

<script>
$(document).ready(function() {
    $('#ewarranty-search-table').DataTable({
        responsive: true
    });
});
</script>
