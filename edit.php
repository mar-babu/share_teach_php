<?php require_once('header.php')?>
<?php require_once('Handle/database/db.php');

$edit_id = $_GET['id'];
$sql = "SELECT employee.*,age.age FROM employee LEFT JOIN age ON age.id = employee.age WHERE employee.id='$edit_id'";

$query = mysqli_query($mysqli, $sql);
$result = mysqli_fetch_assoc($query);
//print_r($result);


/* get data from age table */
$sql = "SELECT * FROM age";
$query1 = mysqli_query($mysqli, $sql);
?>

<div class="container">
    <div class="row">
        <div class="col-lg-10 offset-md-1" style="margin-top: 100px;">
            <div class="card card-body bg-light">
                <form action="update.php?id=<?php echo $result['id']; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label" for="exampleFormControlInput1">Email address</label>
                        <div class="col-lg-10">
                            <input type="email" name="email" class="form-control" value="<?php echo $result['email'];?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label" for="exampleFormControlSelect1">Age</label>
                        <div class="col-lg-10">
                            <select class="form-control"  name="age" id="exampleFormControlSelect1">
                                <option selected disabled>Select your age</option>
                                <?php while ($data=mysqli_fetch_assoc($query1)) { ?>
                                    <option  value="<?php echo $data['id'];?>" <?php echo $result['age'] == $data['age'] ? "selected" : "" ;?>><?php echo $data['age'];?></option>
                                <?php } ?>
                            </select>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label" for="exampleFormControlTextarea1">Address</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" name="address" rows="1" required><?php echo $result['address'];?></textarea>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="offset-lg-2 col-lg-10">
                            <input type="submit" name="update" value="Update" class="btn btn-success btn-block">
                        </div>
                    </div>

                </form>


            </div>


        </div>

    </div>

</div>