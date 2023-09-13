<title>Attendance MS QR Code | Registered students</title>
<?php 
    include 'navbar.php'; 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Students</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Registered students</li>
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
              <form name="bulk_action_form" action="process_delete.php" method="post" onSubmit="return delete_confirm();"/>
                
              <div class="card-header">
                <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#add_user"><i class="bi bi-plus-circle"></i> Add</button>
                <input type="submit" class="btn btn-danger float-sm-right" name="bulk_delete_submit" value="Delete Selected"/>
              </div>
              <div class="card-body">
                
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="text-center" align="center"><input type="checkbox" id="select_all" value=""/></th>   
                    <th>Image</th>
                    <th>LRN</th>
                    <th>Full name</th>
                    <th>Gender</th>
                    <th>Grade and Section</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                    <tr>
                      <?php 
                        $fetch = mysqli_query($conn, "SELECT * FROM students LEFT JOIN section ON students.student_section_Id=section.section_Id LEFT JOIN grade ON section.section_grade_Id=grade.grade_Id WHERE DELETED='False'");
                        while ($row = mysqli_fetch_array($fetch)) {
                      ?>
                        <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['student_Id']; ?>"/></td> 
                        <td>
                            <img src="../images-users/<?php echo $row['image']; ?>" alt="" width="35" height="35" style="margin-left: auto;margin-right: auto;display: block;border-radius: 50%;">
                        </td>
                        <td><?php echo $row['LRN']; ?></td>
                        <td><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo ''.$row['grade'].' '.$row['strand'].' - '.$row['section'].''; ?></td>
                        <td>
                          <!-- <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#view<?php //echo $row['student_Id']; ?>"><i class="fa-solid fa-eye"></i></button> -->
                          <a type="button" class="btn bg-gradient-primary" href="students_update_view.php?viewstudent_Id=<?php echo $row['student_Id']; ?>"><i class="fa-solid fa-eye"></i></a>
                          <a type="button" class="btn bg-gradient-success" href="students_update_view.php?student_Id=<?php echo $row['student_Id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                          <!-- <button type="button" class="btn bg-gradient-success" data-toggle="modal" data-target="#update<?php //echo $row['student_Id']; ?>"><i class="fa-solid fa-pen-to-square"></i></button> -->
                          <button type="button" class="btn bg-gradient-warning" data-toggle="modal" data-target="#qr<?php echo $row['student_Id']; ?>"><i class="fa-solid fa-qrcode"></i></button>
                          <button type="button" class="btn bg-gradient-danger" data-toggle="modal" data-target="#delete<?php echo $row['student_Id']; ?>"><i class="fa-solid fa-trash-can"></i></button>
                        </td> 
                    </tr>

                    <?php include 'students_update_delete.php'; } ?>

                  </tbody>
                  <tfoot>
                      <tr>
                        <th></th>
                        <th>Image</th>
                        <th>LRN</th>
                        <th>Full name</th>
                        <th>Gender</th>
                        <th>Grade and Section</th>
                        <th>Actions</th>
                      </tr>
                  </tfoot>
                </table>
                
              </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


<?php include 'students_add.php'; ?>
<?php include 'footer.php';  ?>
<script>
  function delete_confirm(){
    if($('.checkbox:checked').length > 0){
        var result = confirm("Are you sure to delete selected users?");
        if(result){
            return true;
        }else{
            return false;
        }
    }else{
        alert('Select at least 1 record to delete.');
        return false;
    }
}


$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
  
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
</script>