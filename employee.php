<?php require_once('header.php')?>
<?php require_once('Handle/database/db.php');

if (isset($_POST['submit'])){

    $email = $_POST['email'];
    $age = $_POST['age'];
    $address = $_POST['address'];


    $sql = "INSERT INTO `employee`(`email`, `age`, `address`) VALUES ('$email','$age','$address')";
    if (mysqli_query($mysqli,$sql)){
        echo "<h2 class='text-center text-success'>Succuss</h2>";
    }
    else{
        echo "Failed";
    }
}


/* get data from age table */
$sql = "SELECT * FROM age";
$query = mysqli_query($mysqli, $sql);
?>



    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-md-1" style="margin-top: 100px;">
                <div class="card card-body bg-light">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label" for="exampleFormControlInput1">Email address</label>
                            <div class="col-lg-10">
                                <input type="email" name="email" class="form-control"
                                       placeholder="name@example.com" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label" for="exampleFormControlSelect1">Age</label>
                            <div class="col-lg-10">
                                <select class="form-control" name="age">
                                    <option value="">Select your age</option>
                                    <?php while ($data = mysqli_fetch_array($query)) { ?>
                                    <option value="<?php echo $data['id'] ?>"><?php echo $data['age'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label" for="exampleFormControlTextarea1">Address</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" name="address" rows="1" required></textarea>
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="offset-lg-2 col-lg-10">
                                <input type="submit" name="submit" class="btn btn-success btn-block">
                            </div>
                        </div>

                    </form>


                </div>


            </div>

        </div>

    </div>


<?php require_once('footer.php') ?>