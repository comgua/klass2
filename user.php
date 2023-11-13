<?php 
include_once "navbar.php";
include_once "connect.php";
$sql = "SELECT * FROM user";
$result = $con->query($sql);
?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">ข้อมูล user</div>
        <div class="card-body">
            <a href="add_user.php" class="btn btn-outline-danger mb-3"><i class="bi bi-person-plus-fill"></i>เพิ่มข้อมูล</a>
            <table class="table table-striped">
                <tr>
                    <th class="bg-success text-white">ลำดับที่</th>
                    <th class="bg-success text-white">username</th>
                    <th class="bg-success text-white">fullname</th>
                    <th class="bg-success text-white">email</th>
                    <th class="bg-success text-white">image</th>
                    <th class="bg-success text-white">Action</th>
                </tr>
                <?php
                $i=1;
                while($row = mysqli_fetch_assoc($result)){?>               
                <tr>
                    <td><?php echo $i;$i++?></td>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['fullname'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td>
                       <img src="user_img/<?php echo $row['image'] ?>" width="100">
                    </td>
                    <td>
                        <a href="edit_user.php?username=<?php echo $row['username']?>">เเก้ไข</a>
                        <a href="del_user.php?username=<?php echo $row['username']?>" onclick="return confirm('ยืนยันการลบ?')">ลบ</a> 
                    </td>
                </tr>
                <?php }?>
            </table>
        </div>
    </div>
</div>