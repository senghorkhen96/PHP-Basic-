<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<div class="container mt-5">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">Add New</div>
                <div class="card-body">
                <?php 
                  // Your PHP code here...
                  include_once "connect.php";
                  $id = $_GET['id'];
                  $query = "SELECT * FROM student WHERE id = $id";
                  $result = mysqli_query($connection, $query);
                  foreach ($result as $user) {

                 
                ?>
                    <form action="#" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $user['name'];?>">
                        </div>
                        <div class="form-group">
                            <label>Province</label>
                            <input type="text" name="province" class="form-control" value="<?php echo $user['province'];?>">
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control">
                                <option></option>
                                <option  value="Female"<?php if($user['gender'] == "Female") { ?> selected="selected" <?php } ?>>Female</option>
                                <option  value="Male"<?php if($user['gender'] == "Male") { ?> selected="selected" <?php } ?> >Male</option>
                            </select>
                           
                        </div>
                        <button class="btn btn-info btn-block" type="submit" name="add">Update</button>
                    </form>
                </div>
            </div>
            <?php 
                // Your PHP code here...
            }
            if(isset($_POST['add'])) {
                $name = $_POST['username'];
                $province = $_POST['province'];
                $gender = $_POST['gender'];

                $query = "UPDATE student SET name='$name', province='$province', gender='$gender' WHERE id = $id";
                $result = mysqli_query($connection, $query);
                if($result) {
                    header('location: index.php');
                }else {
                    echo "Cannot update data!!!";
                }
            }
            ?>
        </div>
        <div class="col-4"></div>
    </div>
</div>
