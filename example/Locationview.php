<?php
include("Header.php")
?>
    

<section class="pcoded-main-container">
    <div class="pcoded-content">
    <div class="row">

    <div class="col-xl-12">
                <div class="card">
                <div class="card-body">
                        
                        <form action="" method="POST">
                            <?php
                          
                                        include_once("dboperation.php");
                                        $obj=new dboperation();
                                            $sql="select * from tbldistrict";
                                            $res = $obj->executequery($sql);
                                            ?>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Category</label>
                                   
                                    <select class="form-control" name="seldistrictid"  id="seldistrictid"  onchange="this.form.submit()">
                                        <option>--------Select District-----------</option>
                                       <?php
                                            while($display= mysqli_fetch_array($res))
                                            {
                                        ?>
                                        <option value="<?php echo $display["districtid"]?>">
                                        <?php echo $display["districtname"]?>
                                        </option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                </div>
                        </form>
                </div>

                 <?php
                        if(isset($_POST["seldistrictid"]))
                        {
                          
                         $district_id1=$_POST["seldistrictid"];
                      ?>
                    <div class="card-header">
                        <h5>Location View</h5>
                       
                            <script>
  
                            document.getElementById("seldistrictid").value=<?php echo $district_id1; ?>;
                            
                            </script>
                        <a href="Locationreg.php?district_id=<?php echo $district_id1?>" class="btn btn-outline-primary" style="margin-left: 717px;">Add Location</a>
              
                    ?>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Location Name</th>
                                  
                                        <th colspan="2">Actions</th>
                                     
                                    </tr>
                                </thead>

                                <?php
                                	
	//if(isset($_POST["seldistrictid"]))
	//{
           
        $district_id=$_POST["seldistrictid"];
        //include_once("dboperation.php");
                                 //   $obj =  new dboperation();
                                  $sql = "SELECT * FROM `tbllocation` where district_id='$district_id' ";

                                    $res = $obj->executequery($sql);
                                    $s=1;
                                ?>
                                <tbody>
                                    <?php
                                    while($display=mysqli_fetch_array($res))
                                    {
                                    ?>
                                    <tr>
                                        <td><?php echo $s++ ?></td>
                                        <td><?php echo $display["location_name"] ; ?></td>
                                      <td>
                                        <a href="Categoryedit.php?location_id=<?php echo $display["location_id"]; ?>">
                                      <button type="button" class="btn  btn-icon btn-primary"><i class="feather icon-edit"></i></button>
                                    </a>
                                    <a href="Categorydelete.php?location_id=<?php echo $display["location_id"]; ?>">
                                      <button type="button" class="btn  btn-icon btn-danger"><i class="feather icon-delete"></i></button>
                                    </a>
                                    </td>
                                    </tr>
                                   <?php
                                    }
                
                                }
                            
                                   ?>
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
</div>
</div>
</section>

<?php
include("Footer.php")
?>
  