<?php
include_once 'connect.php';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == '' || $password == '') {
        echo "<script>alert('ไม่ได้กรอก username หรือ pasword')</script>";
    } else {
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password' ";
        //$result=mysqli_query($con,$sql;);
        $result = $con->query($sql);
        $row=mysqli_fetch_array($result);
        $num=mysqli_num_rows($result);
        if ($num != 1) {
            //echo "<script>alert('login ไม่สำเร็จ')</script>";
            echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง')</script>";
        } else {
             session_start();
             $_SESSION['username'] = $row['username'];
             $_SESSION['fullname'] = $row['fullname'];
               header('location:index.php');
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </form>
                        <div class="text-center text-danger">
                        <?php
                        if(isset($message)){
                            echo "$message";
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>