<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <?php 
    include 'C:/xampp/htdocs/btth01/admin/db.php';
    $sql = "SELECT * FROM baiviet";
$result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     // Xuất dữ liệu cho mỗi hàng
//     while($row = $result->fetch_assoc()) {
//         echo  " - Tên: " . $row["tieude"] . "<br>";
//     }
// } else {
//     echo "0 kết quả";
// }
    ?>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Trang ngoài</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="category.php">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="author.php">Tác giả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="article.php">Bài viết</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

    </header>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <a href="add_article.php" class="btn btn-success">Thêm mới</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Tên bài hát</th>
                            <!-- <th scope="col">Mã thể loại</th> -->
                            <th scope="col">Tóm tắt</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Mã tác giả</th>
                            <th scope="col">Ngày viết</th>
                            <th scope="col">Hình ảnh</th>
                            
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <?php
        if ($result) {
            if ($result->num_rows > 0) {
                // Biến đếm cho cột #
                

                // Xuất dữ liệu cho mỗi hàng
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row["ma_bviet"] . '</td>'; // Cột #
                    echo '<td>' . htmlspecialchars($row["tieude"]) . '</td>'; // Tiêu đề
                    echo '<td>' . htmlspecialchars($row["ten_bhat"]) . '</td>'; // Tên bài hát
                    echo '<td>' . htmlspecialchars($row["tomtat"]) . '</td>'; // Tóm tắt
                    echo '<td>' . htmlspecialchars($row["noidung"]) . '</td>'; // Nội dung
                    echo '<td>' . htmlspecialchars($row["ma_tgia"]) . '</td>'; // Mã tác giả
                    echo '<td>' . htmlspecialchars($row["ngayviet"]) . '</td>'; // Ngày viết
                    echo '<td><img src="' . htmlspecialchars($row["hinhanh"]) . '" alt="Hình ảnh" width="100"></td>'; // Hình ảnh
                    echo '<td><a href="edit_article.php?id='  . $row["ma_bviet"] . '"><i class="fa-solid fa-pen-to-square"> </i></a></td>'; // Sửa
                    echo ' <td>
                                <a href="delete_article.php?id='. $row["ma_bviet"] . '"><i class="fa-solid fa-trash"></i></a>
                            </td>'; // Xóa
                
                    
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="10">Không có dữ liệu</td></tr>'; // Không có dữ liệu
            }
        } else {
            echo '<tr><td colspan="10">Lỗi: ' . $conn->error . '</td></tr>'; // Xuất lỗi nếu có
        }

        $conn->close(); // Đóng kết nối
        ?>
        
                </table>
                <table class="table">
                <?php 
        if(isset($_GET['insert_msg'])){
            echo "<h6>" . $_GET['insert_msg'] . "</h6>";
        }
        ?>
    </table>

            </div>
            <?php 
        if(isset($_GET['delete_msg'])){
            echo "<h6>" . $_GET['delete_msg'] . "</h6>";
        }
        ?>
        </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>