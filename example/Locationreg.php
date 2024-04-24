<?php
include("Header.php")
?>
     
<section class="pcoded-main-container">
    <div class="pcoded-content">
    <div class="row">
    <div class="col-sm-12">
        <br>
        <br>
                <div class="card">
                    <div class="card-header">
                        <h5>Category Registration</h5>
                        <a href="Locationview.php" class="btn btn-outline-primary" style="margin-left: 717px;">View Subategory</a>
                    </div>
                    <div class="card-body">
                        
                    <form action="Locationregaction.php" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">District</label>
                                   
                               
                                        <?php
                                        include_once("dboperation.php");
                                        $obj=new dboperation();
                                        $district_id = $_GET["district_id"];
                                            $sql="select * from tbldistrict where districtid='$district_id ' ";
                                            $res = $obj->executequery($sql);
                                            $display= mysqli_fetch_array($res); 
                                          ?>
                                
                                    <input type="text" class="form-control" placeholder="Enter Location Name " name="locationname" value="<?php echo  $display["districtname"] ?>">

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Location Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Location Name " name="locationname">
                                </div>
                            </div>
                            
                            <button type="submit" class="btn  btn-primary" name="Submit">Save</button>
                        </form>

</div>
</div>
</div>
</div>
</div>
</section>
     
     <?php
include("Footer.php")
?>
     