<!--HEADER-->
<div class="header">
    <div><!--LOGO-->
     <img src="media/Logo.png" width="200px" />
    </div>
    <div class="menu">
     <img src="media/list.png" alt="" style="padding-top: 5px" />
     <div>
      <h4 style="margin: 10px">Danh mục sản phẩm</h4>
      <ul>
       <li><button onclick="filter('vpp')">Văn phòng phẩm</button></li>
       <li><button onclick="filter('pen')">Dụng cụ học tập</button></li>
       <li><button onclick="filter('art')">Mỹ thuật</button></li>
       <li><button onclick="filter('souv')">Quà lưu niệm</button></li>
      </ul>
     </div>
    </div>
    <div class="search">
     <input type="text" placeholder="Tìm kiếm sản phẩm..." />
     <img
      src="media/search.png"
      height="30px"
      width="30px"
      style="padding: 0 0 0 5px"
     />
    </div>
    <div class="user" style="margin-top: 15px">
     <a href="./SRC/login.html" style="display: flex">
      <img src="media/user.png" width="30px" height="30px" style="padding: 0 5px 0 0">
      <span style="margin-top: 7px">Khách hàng</span>
     </a>
     <div style="padding: 10px">
      <form>
       <table>
        <tr>
         <td>Tài khoản</td>
         <td><input type="text" /></td>
        </tr>
        <tr>
         <td>Mật khẩu</td>
         <td><input type="password" /></td>
        </tr>
       </table>
       <p align="center"><input type="submit" value="ĐĂNG NHẬP" /></p>
      </form>
      <p>
       Chưa có tài khoản? <a href="./SRC/register.html"><u>Đăng ký ngay</u></a>
      </p>
     </div>
    </div>