<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>

    <title>แบบฟอร์มนักเรียน </title>

    <script>
        $(document).ready(function() {
            $('body').css({
                "font-family": "Arial, Helvetica, sans-serif"
            });
        })
    </script>

</head>

<body>

    <div class="container-fluid">
        <div class="card text-center">
            <div class="card-header">
                แบบฟอร์มบันทึกข้อมูล
            </div>
            <div class="card-body">
                <h5 class="card-title">คำอธิบาย</h5>
                <p class="card-text">การุณาระบุ รหัสประจำตัว ชื่อ-นามสกุล วันเกิด อายุ และการติดต่อ</p>
                <p class="card-text">การุณาเลือก คำนำหน้าชื่อ (นาย นาง นางสาว) เพศ (ชาย หรือ หญิง) สถานะภาพ (โสด หรือ สมรส)</p>
                <?php
                //print_r($data);
                foreach ($data as $key) {
                    $data['id'] = $key['std_id'];
                    $data['code'] = $key['std_code'];
                    $data['prefix'] = $key['std_pf_id'];
                    $data['fname'] = $key['std_name'];
                    $data['lname'] = $key['std_lname'];
                    $data['bdate'] = $key['std_dob'];
                    $data['age'] = $key['std_age'];
                    $data['gender'] = $key['std_gd_id'];
                    $data['status'] = $key['std_ms_id'];
                }

                ?>
            </div>
            <div class="card-footer text-muted">
            </div>
        </div>
        <hr>
        <div class="container">
            <form action="<?php echo base_url(); ?>index.php/60160027/reg/updateStudent" method="post">
                <div class="form-group">
                    <input name="id" value="<?php echo $data['id']; ?>" type="hidden">
                    <div class="container">
                        <div class="row">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">รหัสประจำตัว</span>
                                </div>
                                <input name="code" value="<?php echo $data['code']; ?>" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">คำนำหน้าชื่อ</label>
                                </div>
                                <select name="prefix" class="custom-select" id="inputGroupSelect01">
                                    <option>โปรดเลือก...</option>
                                    <?php
                                    foreach ($prefix as $key => $value) {
                                        if ($data['prefix'] == $value['id']) {
                                            ?>
                                            <option selected value="<?php echo $value['id']; ?>"><?php echo $value['prefix']; ?></option>
                                        <?php
                                    } else {
                                        ?>
                                            <option value="<?php echo $value['id']; ?>"><?php echo $value['prefix']; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">ชื่อ-นามสกุล</span>
                                </div>
                                <input value="<?php echo $data['fname']; ?>" name="fname" placeholder="ชื่อจริง" type="text" aria-label="First name" class="form-control">
                                <input value="<?php echo $data['lname']; ?>" name="lanme" placeholder="นามสกุล" type="text" aria-label="Last name" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <label for="colFormLabel" class="col-sm-2 col-form-label">เพศ</label>
                            <?php
                            foreach ($gender as $key => $value) {
                                if ($data['gender'] == $value['id']) {
                                    ?>
                                    <div class="form-check form-check-inline">
                                        <input checked name="gender" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="<?php echo $value['id'] ?>">
                                        <label class="form-check-label" for="inlineRadio1"><?php echo $value['gender'] ?></label>
                                    </div>
                                <?php } else { ?>
                                    <div class="form-check form-check-inline">
                                        <input name="gender" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="<?php echo $value['id'] ?>">
                                        <label class="form-check-label" for="inlineRadio1"><?php echo $value['gender'] ?></label>
                                    </div>
                                <?php }
                        }
                        ?>
                        </div>
                        <div class="row">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">สถานะภาพ</label>
                                </div>
                                <select name="status" class="custom-select" id="inputGroupSelect01">
                                    <option disabled>โปรดเลือก...</option>

                                    <?php
                                    foreach ($status as $key => $value) {
                                        if ($data['status'] == $value['id']) {
                                            ?>
                                            <option selected value="<?php echo $value['id']; ?>"><?php echo $value['status']; ?></option>
                                        <?php
                                    } else {
                                        ?>
                                            <option value="<?php echo $value['id']; ?>"><?php echo $value['status']; ?></option>
                                        <?php
                                    }
                                }
                                ?>

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group row">
                                <label for="example-date-input" class="col-4 col-form-label">วันเกิด</label>
                                <div class="col-8">
                                    <input name="bdate" class="form-control" type="date" value="<?php echo $data['bdate']; ?>" id="example-date-input">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">อายุ</span>
                                </div>
                                <input value="<?php echo $data['age']; ?>" name="age" placeholder="กรอกอายุ" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <button type="reset" class="btn btn-secondary">เคลีย</button>
                            </div>
                            <div class="col-7">

                            </div>
                            <div class="col-1">
                                <button type="submit" class="btn btn-danger">อัพเดท</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <hr>

        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">ตารางข้อมูลนักศึกษา</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ตารางที่ : 1
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">มีตารางเดียว</a>
                                <!-- 
                                            <a class="dropdown-item" href="#">2</a>
                                            <a class="dropdown-item" href="#">3</a>
                                            <a class="dropdown-item" href="#">4</a>
                                        -->
                            </div>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0" method="post" action="<?php echo base_url(); ?>index.php/60160027/reg/searchStudent">
                        <input name="search" class="form-control mr-sm-2" type="search" placeholder="ค้นหาด้วยรหัสนิสิต" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">ค้นหา</button>
                    </form>
                </div>
            </nav>
            <hr>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ลำดับ</th>
                        <th scope="col">รหัสนักศึกษา</th>
                        <th scope="col">ชื่อ-นามสกุล</th>
                        <th scope="col">เพศ</th>
                        <th scope="col">สถานะภาพ</th>
                        <th scope="col">อายุ</th>
                        <th scope="col">วันเกิด</th>
                        <th scope="col" colspan="2">ดำเนินการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($student as $key => $value) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $key + 1 ?></th>
                            <td><?php echo $value['code'] ?></td>
                            <td><?php echo $value['name'] ?></td>
                            <td><?php echo $value['gender'] ?></td>
                            <td><?php echo $value['status'] ?></td>
                            <td><?php echo $value['age'] ?></td>
                            <td><?php echo $value['bdate'] ?></td>
                            <td>
                                <form action="<?php echo base_url(); ?>index.php/60160027/reg/editStudent" method="post">
                                    <button name="id" value="<?php echo $value['id'] ?>" type="submit" class="btn btn-outline-danger">แก้ไข</button>
                                </form>
                            </td>
                            <td>
                                <form action="<?php echo base_url(); ?>index.php/60160027/reg/delStudent" method="post">
                                    <button name="id" value="<?php echo $value['id'] ?>" type="submit" class="btn btn-outline-danger">ลบ</button>
                                </form>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <hr>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                แสดงหน้าที่ 1 จากทั้งหมด 1 หน้า
                            </a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">ก่อนหน้า</button>
                        <button type="button" class="btn btn-outline-secondary">1</button>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">หน้าถัดไป</button>
                    </form>
                </div>
            </nav>
            <hr>
        </div>


    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>