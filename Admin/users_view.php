<title>Scholarship Management System| Grantee's info</title>
<?php 
    include 'navbar.php';

    if(isset($_GET['user_Id'])) {
    $user_Id = $_GET['user_Id'];
    $fetch = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id'");
    $row = mysqli_fetch_array($fetch);
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Grantee's info</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Grantee's info</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">      
              <div class="card-body">
                  <div class="row p-2">
                    <div class="col-lg-12 mt-1 mb-2">
                      <a class="h5 text-primary"><b>Basic information</b></a>
                      <div class="dropdown-divider"></div>
                    </div>
                    <div class="col-lg-9 col-md-6 col-12">
                      <div class="row">
                        <div class="col-lg-8 col col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                              <small class="text-muted"><b>Full name:</b></small>
                              <h6><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <small class="text-muted"><b>Status:</b></small>
                              <h6><?php if($row['user_status'] == 0) { echo 'Pending'; } else { echo 'Verified'; } ?></h6>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                              <small class="text-muted"><b>Date of Birth:</b></small>
                              <h6><?php echo date("F d, Y", strtotime($row['dob'])); ?></h6>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                              <small class="text-muted"><b>Age:</b></small>
                              <h6><?php echo $row['age']; ?></h6>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                              <small class="text-muted"><b>Sex:</b></small>
                              <h6><?php echo $row['gender']; ?></h6>
                            </div>
                        </div>
                        <div class="col-lg-8 col col-md-8 col-sm-6 col-12">
                          <div class="form-group">
                              <small class="text-muted"><b>Place of Birth:</b></small>
                              <h6><?php echo $row['birthplace']; ?></h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                              <small class="text-muted"><b>Civil Status:</b></small>
                              <h6><?php echo $row['civilstatus']; ?></h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                              <small class="text-muted"><b>Profession/ Occupation:</b></small>
                              <h6><?php echo $row['occupation']; ?></h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col col-md-4 col-sm-6 col-12">
                          <div class="form-group">
                              <small class="text-muted"><b>Religion:</b></small>
                              <h6><?php echo $row['religion']; ?></h6>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 text-dark">
                      <div class=" d-flex justify-content-center bg-dark d-block m-auto" style="max-height: 120px; min-height: 120px; width: 120px; border: 3px solid darkgray;">
                        <img src="../images-users/<?php echo $row['image']; ?>" alt="" class="img-fluid d-block m-auto">
                      </div>
                      <p class="text-center text-sm text-muted">Grantee's photo</p>
                    </div>  
                  </div>


                  <div class="row p-2">
                    <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                      <a class="h5 text-primary"><b>Contact details</b></a>
                      <div class="dropdown-divider"></div>
                    </div>
                      <div class="col-lg-12 col-md-6 col-12">
                          <div class="row">
                            <div class="col-lg-6 col col-md-6 col-sm-6 col-12">
                              <div class="form-group">
                                  <small class="text-muted"><b>Email:</b></small>
                                  <h6><?php echo $row['email']; ?></h6>
                                </div>
                            </div>
                            <div class="col-lg-6 col col-md-6 col-sm-6 col-12">
                              <div class="form-group">
                                  <small class="text-muted"><b>Contact number:</b></small>
                                  <h6><?php if($row['contact'] !== '') { echo '+63 '.$row['contact']; } ?></h6>
                                </div>
                            </div>
                          
                          </div>
                      </div>
                      
                  </div> 

                      
                  <div class="row p-2">
                    <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                      <a class="h5 text-primary"><b>Grantee's address</b></a>
                      <div class="dropdown-divider"></div>
                    </div>
                      <div class="col-lg-12 col-md-6 col-12">
                          <div class="row">
                            <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                              <div class="form-group">
                                  <small class="text-muted"><b>House No:</b></small>
                                  <h6><?php echo $row['house_no']; ?></h6>
                                </div>
                            </div>
                            <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                              <div class="form-group">
                                  <small class="text-muted"><b>Street name:</b></small>
                                  <h6><?php echo $row['street_name']; ?></h6>
                                </div>
                            </div>
                            <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                              <div class="form-group">
                                  <small class="text-muted"><b>Sitio/Purok:</b></small>
                                  <h6><?php echo $row['purok']; ?></h6>
                                </div>
                            </div>
                            <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                              <div class="form-group">
                                  <small class="text-muted"><b>Zone:</b></small>
                                  <h6><?php echo $row['zone']; ?></h6>
                                </div>
                            </div>
                            <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                              <div class="form-group">
                                  <small class="text-muted"><b>Barangay:</b></small>
                                  <h6><?php echo $row['barangay']; ?></h6>
                                </div>
                            </div>
                            <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                              <div class="form-group">
                                  <small class="text-muted"><b>Municipality:</b></small>
                                  <h6><?php echo $row['municipality']; ?></h6>
                                </div>
                            </div>
                            <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                              <div class="form-group">
                                  <small class="text-muted"><b>Province:</b></small>
                                  <h6><?php echo $row['province']; ?></h6>
                                </div>
                            </div>
                            <div class="col-lg-3 col col-md-3 col-sm-6 col-12">
                              <div class="form-group">
                                  <small class="text-muted"><b>Region:</b></small>
                                  <h6><?php echo $row['region']; ?></h6>
                                </div>
                            </div>
                          </div>
                      </div>
                      
                  </div> 


                  <div class="row p-2">
                    <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                      <a class="h5 text-primary"><b>Other information</b></a>
                      <div class="dropdown-divider"></div>
                    </div>
                      <div class="col-lg-12 col-md-6 col-12">
                          <div class="row">
                            <div class="col-lg-4 col col-md-4 col-sm-6 col-12">
                              <div class="form-group">
                                  <small class="text-muted"><b>Higher Education Status:</b></small>
                                  <h6><?php echo $row['HigherEducationStatus']; ?></h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col col-md-4 col-sm-6 col-12">
                              <div class="form-group">
                                  <small class="text-muted"><b>Subsidy type:</b></small>
                                  <h6><?php echo $row['SubsidyType']; ?></h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col col-md-4 col-sm-6 col-12">
                              <div class="form-group">
                                  <small class="text-muted"><b>Specified Subsidy type:</b></small>
                                  <h6><?php echo $row['otherSubsidyType']; ?></h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col col-md-4 col-sm-6 col-12">
                              <div class="form-group">
                                  <small class="text-muted"><b>Student Status:</b></small>
                                  <h6><?php echo $row['studentStatus']; ?></h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col col-md-4 col-sm-6 col-12">
                              <div class="form-group">
                                  <small class="text-muted"><b>Course- Year level:</b></small>
                                  <h6><?php echo $row['course'].' - '.$row['yearLevel']; ?></h6>
                                </div>
                            </div>
                            <div class="col-lg-6 col col-md-6 col-sm-6 col-12">
                              <div class="form-group">
                                  <small class="text-muted"><b>Disability:</b></small>
                                  <h6><?php echo $row['disability']; ?></h6>
                                </div>
                            </div>
                            <div class="col-lg-6 col col-md-6 col-sm-6 col-12">
                              <div class="form-group">
                                  <small class="text-muted"><b>Indigenous people:</b></small>
                                  <h6><?php echo $row['indigenousPeople']; ?></h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col col-md-4 col-sm-6 col-12">
                              <div class="form-group">
                                  <small class="text-muted"><b>Parent's Name:</b></small>
                                  <h6><?php echo $row['parentName']; ?></h6>
                                </div>
                            </div> 
                            <div class="col-lg-4 col col-md-4 col-sm-6 col-12">
                              <div class="form-group">
                                  <small class="text-muted"><b>Parent's Contact:</b></small>
                                  <h6><?php echo $row['parentContact']; ?></h6>
                                </div>
                            </div> 


                          </div>
                      </div>
                      
                  </div> 


                  
                 
              </div>
              <div class="card-footer">
                <div class="float-right">
                  <a href="users.php" class="btn bg-secondary"><i class="fa-solid fa-circle-left"></i> Back to list</a>
                </div>
                <?php if($row['user_status'] == 0): ?>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#approve<?php echo $row['user_Id']; ?>"><i class="fa-solid fa-circle-check"></i> Approve</button>
                <?php endif; ?>
                <a class="btn btn-info" href="users_mgmt.php?page=<?php echo $row['user_Id']; ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
              </div>



              <!-- APPROVE MODAL-->
              <div class="modal fade" id="approve<?php echo $row['user_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                     <div class="modal-header bg-light">
                      <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-large"></i> Approve Grantee</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="process_update.php" method="POST">
                        <input type="hidden" class="form-control" value="<?php echo $row['user_Id']; ?>" name="user_Id">
                        <h6 class="text-center">Approve grantee account?</h6>
                    </div>
                    <div class="modal-footer alert-light">
                      <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
                      <button type="submit" class="btn bg-success" name="approve_user"><i class="fa-solid fa-circle-check"></i> Approve</button>
                    </div>
                      </form>
                  </div>
                </div>



            </div>
          </div>
        </div>
      </div>
    </section>


  </div>









  <?php } else { include '404.php'; } ?>
<?php include 'footer.php';  ?>

