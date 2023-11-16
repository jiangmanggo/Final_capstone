<?php
session_start();

include 'includes/sidebar.php';
require '../logic/db_connection.php';
$seller_id = $_SESSION['id'];
try {
    $sql = mysqli_query($connect, "SELECT `fname`,`lname`,`address`,`association`,`email`,`phonenumber`,`farmers_identification_number`,`profile_image`,`username` FROM `farmer` WHERE `seller_id`= '$seller_id';");
    $row = mysqli_fetch_assoc($sql);
} catch (\Throwable $th) {
    echo $th;
}
?>
<?php

if (isset($_SESSION['error_message'])) {
    echo "<script>alert('{$_SESSION['error_message']}');</script>";

    unset($_SESSION['error_message']);
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>

    <title>Profile</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        .btn-rounded {
            width: 170px;
            height: 40px;
            margin-top: 15px;
        }
 
        .btn-save {
            width: 80px;
        }

        .container {
            width: 1000px;
            background-color: #7c9d8e;
            border-radius: 30px;
            height: 70vh;
            margin-top: 30px;
            display: flex;
        }

        .card {
            width: 30%;
            height: 55vh;
            margin-left: 40px;
            margin-top: 30px;
            background-color: #f9f6ee;
        }

        .upload {
            margin-top: 7px;
        }

        .details {
            margin-top: 30px;
            margin-left: 80px;
            width: 530px;
            height: 403px;
            background-color: #f5f5f5;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            background-color: #f9f6ee;
        }

        .button {
            width: 80px;
            height: 33px;
        }

        @media screen and (max-width:990px) {
            .counter {
                margin-bottom: 40px;
            }
        }

        .header {
            position: absolute;
            top: 0;
            top: 0;
            left: 250px;
            height: 100vh;
            width: calc(100% - 250px);
            background-color: var(--body-color);
            transition: var(--tran-05);
            font-family: 'Poppins', sans-serif;
        }

        .header .head {
            font-size: 20px;
            font-weight: 500;
            color: var(--text-color);
            padding: 12px 60px;
        }

        .sidebar.close~.header {
            left: 78px;
            height: 100vh;
            width: calc(100% - 78px);
        }

        .head {
            box-shadow: 0px 5px 5px -5px rgb(0 0 0 /100%);
        }

        .page-header {
            margin-top: 1em;
            margin-left: 60px;
            font-size: 1em;
            color: var(--text-color);
        }

        .details table td {
            padding: 7px;
        }
    </style>
</head>

<body>
    <section class="header">
        <div class="head">Bago City Agricultural Association Online Market System</div>
        <?php include 'includes/seller_indicator.php' ?>
        <div class="container">
            <div class="card" style="border-radius: 20px;">
                <div class="card-body text-center">
                    <div class="upload">
                        <img src="../uploads/<?=$row['profile_image'] ?>" class="rounded-circle"
                            style="width: 250px; height: 240px;" />
                    </div>
                    <button type="button" class="btn btn-primary btn-rounded btn-lg" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Upload Image</button>
                </div>
            </div>
            <div class="details">
                <form action="logic/edit_profile.php" method='post' enctype="multipart/form-data">
                    <table class='table table-hover table-bordered '>
                        <tr>
                            <td>Full Name</td>
                            <td><input type='text' name='fname' class='form-control'
                                    value="<?=$row['fname'] .' ' . $row['lname'] ?>" required disabled/></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><input type='text' name='address' class='form-control'
                                    value="<?=$row['address'] ?>" required disabled/></td>
                        </tr>
                        <tr>
                            <td>Association</td>
                            <td><input type='text' name='association' class='form-control'
                                    value="<?=$row['association'] ?>" required disabled/></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type='text' name='email' class='form-control' value="<?=$row['email'] ?>"
                                    required disabled/></td>
                        </tr>
                        <tr>
                            <td>Mobile Number</td>
                            <td><input type='number' name='phonenumber' class='form-control disable-on-edit'
                                    value="<?= '0' .$row['phonenumber'] ?>" required disabled/></td>
                        </tr>
                        <tr>
                            <td>Farmer's Identification Number</td>
                            <td><input type='number' name='farmers_identification_number'
                                    class='form-control disable-on-edit'
                                    value="<?=$row['farmers_identification_number'] ?>" required disabled/></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td><input type='text' name='username' class='form-control' value="<?=$row['username'] ?>"
                                    required disabled/></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type='submit' value='Save' id="submit" name="submit"
                                    class='btn btn-primary button' disabled/>
                                <div class='btn btn-danger button' id='editBtn'>Edit</div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="logic/uploadimage.php" method="post" enctype="multipart/form-data">
                            <input type="file" class="form-control" name="choosefile" />
                            <input type="hidden" name="id" value='<?php echo $_SESSION['id'] ?>'>
                            <div class="modal-footer">
                                <button value="submit" name="submit"
                                    class="btn btn-primary btn-save">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        document.getElementById('editBtn').addEventListener('click', function (event) {
            var inputs = document.querySelectorAll('input[name="address"], input[name="email"], input[name="phonenumber"], input[name="username"]');
            var isDisabled = inputs[0].disabled;

            for (var i = 0; i < inputs.length; i++) {
                inputs[i].disabled = !isDisabled;
            }

            var saveButton = document.getElementById('submit');
            saveButton.disabled = !isDisabled;
        });
    </script>

</body>

</html>