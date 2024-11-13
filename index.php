<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EduShop</title>
  <link rel="icon" href="media/ic.png" type="image/x-icon">
  <link rel="stylesheet" href="public/CSS/style.css" type="text/css" />
  <script src="public/JS/main.js" async></script>
 </head>
 <body>
  <div class="page-container">

   <?php include('template/header.php') ?>

    <div><!--GIỎ HÀNG-->
     <button class="cartbtn"id="cartbtn" onclick="display()">
       <img src="media/basket.png" width="30px" height="30px" style="padding: 0 5px 0 0 ;"></a>
       <span style="margin-top: 7px;">Giỏ hàng</span>
     </button>
     <div id="basket">
      <div id="mini" align="center">
       <button onclick="close_m()" id="x">x</button>
       <h3>GIỎ HÀNG</h3>
       <hr style="height: 3px;">
       <h4 style="display: flex;justify-content: space-between;">
        <span style="height: 20px;">Sản phẩm</span>
        <span style="height: 20px;">Giá</span>
        <span style="height: 20px;">Số lượng</span>
       </h4>
       <div class="items">

       </div>
       <hr style="height: 3px; margin-bottom: 15px;">
       <div style="float: right; width: 260px;">
        <b class="total">Tổng cộng:</b>
        <span class="total-price">0 VNĐ</span>
       </div>
       <!--<hr style="height: 3px; margin-top: 55px; margin-bottom: 15px;"> -->
       <div style="margin-top: 45px;">
        <button onclick="close_m()" class="basbtn">Đóng</button>
        <button class="basbtn ord">Thanh toán</button>
       </div>
      </div>
     </div>
    </div>
   </div>

   <!--CONTENT-->
   <div class="content">
    <div class="classsp">
     <div>
      <span>NEW ARRIVALS</span>
      <img src="media/textboxend.png" alt="" width="25px" style="margin: -6px;" />
     </div>
     <div>
      <button onclick="filter('all')">>Xem tất cả</button>
     </div>
    </div>
    <hr />
    <br />
    <div class="sp" id="art">
     <img src="media/Products/1.webp" class="sp-img" />
     <p class="sp-name">BÚT LÔNG MÀU COLOKIT 36 MÀU</p>
     <p class="price">115.000 VNĐ</p>
     <p class="btn">
      <button class="addbtn">Thêm Vào Giỏ Hàng</button>
     </p>
    </div>
    <div class="sp" id="pen">
     <img src="media/Products/2.webp" class="sp-img" />
     <p class="sp-name">BÚT BI THIÊN LONG</p>
     <p class="price">7.000 VNĐ</p>
     <p class="btn">
      <button class="addbtn">Thêm Vào Giỏ Hàng</button>
     </p>
    </div>
    <div class="sp" id="souv">
     <img src="media/Products/4.jpg" class="sp-img" />
     <p class="sp-name">MÓC KHÓA HÌNH CHUỘT HAMSTER</p>
     <p class="price">25.000 VNĐ</p>
     <p class="btn">
      <button class="addbtn">Thêm Vào Giỏ Hàng</button>
     </p>
    </div>
    <div class="sp" id="pen">
     <img src="media/Products/4.webp" class="sp-img" />
     <p class="sp-name">GÔM THIÊN LONG</p>
     <p class="price">4.000 VNĐ</p>
     <p class="btn">
      <button class="addbtn">Thêm Vào Giỏ Hàng</button>
     </p>
    </div>
    <div class="sp" id="vpp">
     <img src="media/Products/5.webp" class="sp-img" />
     <p class="sp-name">BÚT KẾT HỢP KÉO VÀ DAO</p>
     <p class="price">39.000 VNĐ</p>
     <p class="btn">
      <button class="addbtn">Thêm Vào Giỏ Hàng</button>
     </p>
    </div>
    <div class="classsp" style="margin-top: 15px">
     <div>
      <span>BEST SELLER</span>
      <img src="media/textboxend.png" alt="" width="25px" style="margin: -6px;" />
     </div>
     <div>
      <button onclick="filter('all')">>Xem tất cả</button>
     </div>
    </div>
    <hr />
    <br />
    <div class="sp" id="vpp">
     <img src="media/Products/6.webp" class="sp-img" />
     <p class="sp-name">BÚT BĂNG KEO</p>
     <p class="price">27.000 VNĐ</p>
     <p class="btn">
      <button class="addbtn">Thêm Vào Giỏ Hàng</button>
     </p>
    </div>
    <div class="sp" id="vpp">
     <img src="media/Products/7.webp" class="sp-img" />
     <p class="sp-name"GIẤY NOTE CUỘN</p>
     <p class="price">27.000 VNĐ</p>
     <p class="btn">
      <button class="addbtn">Thêm Vào Giỏ Hàng</button>
     </p>
    </div>
    <div class="sp" id="art">
     <img src="media/Products/8.webp" class="sp-img" />
     <p class="sp-name">TẬP VẼ A4 CAMPUS</p>
     <p class="price">21.000 VNĐ</p>
     <p class="btn">
      <button class="addbtn">Thêm Vào Giỏ Hàng</button>
     </p>
    </div>
    <div class="sp" id="pen">
     <img src="media/Products/9.webp" class="sp-img" />
     <p class="sp-name">TẬP CAMPUS 200 TRANG</p>
     <p class="price">22.000 VNĐ</p>
     <p class="btn">
      <button class="addbtn">Thêm Vào Giỏ Hàng</button>
     </p>
    </div>
    <div class="sp" id="souv">
     <img src="media/Products/10.jpg" class="sp-img" />
     <p class="sp-name">ĐỆM GHẾ HÌNH HOA</p>
     <p class="price">89.000 VNĐ</p>
     <p class="btn">
      <button class="addbtn">Thêm Vào Giỏ Hàng</button>
     </p>
    </div>
   </div>
   <?php include('template/footer.php') ?>
  <script src="public/main.js"></script>
 </body>
</html>
