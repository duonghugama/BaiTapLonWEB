<?php
include ("./header.php")
?>
    <main class="container-sm my-4">
        <form action="process-themKhoaHoc.php" method="post">
            <div class="row align-items-center">
                <div class="form-group col">
                    <label for="nam" class="row-sm-2 row-form-label">Năm</label>
                    <div class="row">
                        <input type="text" class="form-control" id="nam" name="nam">
                    </div>
                </div>
                <div class="form-group col">
                    <label for="ky" class="row-sm-2 row-form-label">Kỳ</label>
                    <div class="row">
                        <select class="form-select" aria-label="Default select example" name="ky" id="ky">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">Phụ 1</option>
                            <option value="4">Phụ 2</option>
                            <option value="5">Hè</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col">
                    <label for="TGBD" class="row-sm-2 row-form-label">Thời gian bắt đầu</label>
                    <div class="row">
                        <input type="date" class="form-control" id="TGBD" name="TGBD">
                    </div>
                </div>
                <div class="form-group col">
                    <label for="TGKT" class="row-sm-2 row-form-label">Thời gian kết thúc</label>
                    <div class="row">
                        <input type="date" class="form-control" id="TGKT" name="TGKT">
                    </div>
                </div>
                <div class="form-group col">
                    <label for="DDK" class="row-sm-2 row-form-label">Được đăng ký</label>
                    <div class="row">
                        <select class="form-select" aria-label="Default select example" id="ChoPhep" name="ChoPhep">
                            <option value="1">Được phép</option>
                            <option value="0">Không được phép</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end my-3">
                <button type="submit" name="themKhoaHoc" id="themKhoaHoc" class="btn btn-success">Mở khóa học</button>
            </div>
        </form>
    </main>
    <?php
include("./footer.php")
?>