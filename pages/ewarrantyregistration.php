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

        if (imei == '') {
        	alert('Please enter IMEI!');
        	event.preventDefault();
        } else if (mobile_no == '') {
        	alert('Please enter Mobile No!');
        	event.preventDefault();
        } else if (model_code == '') {
        	alert('Please enter Model Code!');
        	event.preventDefault();
        }
     });
  });
</script>

<?php

if (isset($_REQUEST['btn-search-ewarranty'])) {
	
}

?>

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
                                        <input id="txt-imei" class="form-control" placeholder="IMEI">
                                    </div>
                                    <div class="form-group">
                                    	<label>Mobile No.</label>
                                        <input id="txt-mobile-no" class="form-control" placeholder="Mobile No.">
                                    </div>
	                    		</div>
	                    		<div class="col-lg-6">
                    				<div class="form-group">
                    					<label>Model Code</label>
                                        <input id="txt-model-code" class="form-control" placeholder="Model Code">
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
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Result
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
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
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php
include('footer.php');
?>
