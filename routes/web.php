   <?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// adim đăng nhập đăng xuất
Route::get('admin/dangnhap','UserController@getDangnhapAdmin');
Route::post('admin/dangnhap','UserController@postDangnhapAdmin');
Route::get('admin/logout','UserController@getDangxuatAdmin');

//rằng buộc middleware để bảo mật thông tin
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
  //quản lí sẩn phẩm
Route::group(['prefix'=>'product'],function(){
    Route::get('danhsach','ProductController@getDanhSach');
    
    Route::get('them','ProductController@getThem');
    Route::post('them','ProductController@postThem');

    Route::get('sua/{id}','ProductController@getSua');
    Route::post('sua/{id}','ProductController@postSua');

    Route::get('xoa/{id}','ProductController@getXoa');

    
});

//quản lí thương hiệu
Route::group(['prefix'=>'brand'],function(){
  Route::get('danhsach','BrandController@getDanhSach');

  Route::get('them','BrandController@getThem');
  // post du lieeu
  Route::post('them','BrandController@postThem');

   Route::get('sua/{id}','BrandController@getSua');
   Route::post('sua/{id}','BrandController@postSua');

   Route::get('xoa/{id}','BrandController@getXoa');
    
});

//quản lí loại sản phẩm
Route::group(['prefix'=>'productcategory'],function(){
 Route::get('danhsach','ProductCategoryController@getDanhSach');

  Route::get('them','ProductCategoryController@getThem');
  // post du lieeu
  Route::post('them','ProductCategoryController@postThem');

   Route::get('sua/{id}','ProductCategoryController@getSua');
   Route::post('sua/{id}','ProductCategoryController@postSua');

   Route::get('xoa/{id}','ProductCategoryController@getXoa');
    
    
});
//quản lí user
Route::group(['prefix'=>'user'],function(){
 Route::get('danhsach','UserController@getDanhSach');

  Route::get('them','UserController@getThem');
  // post du lieeu
  Route::post('them','UserController@postThem');

   Route::get('sua/{id}','UserController@getSua');
   Route::post('sua/{id}','UserController@postSua');

   Route::get('xoa/{id}','UserController@getXoa');
    
    
});
//quản lí bill
Route::group(['prefix'=>'bills'],function(){
  Route::get('danhsach','BillsController@getDanhSach');
  Route::get('chitiet/{id_bill}','BillsController@getChiTiet');
  Route::get('xoa/{id_bill}','BillsController@getXoa');

  Route::get('thongke','BillsController@getThongKe');
  // Route::post('thongke','BillsController@postThongKe');
  // sửa trạng thái
   Route::get('sua/{id}','BillsController@getSua');
    Route::post('sua/{id}','BillsController@postSua');
});

//quản lý slide
Route::group(['prefix'=>'slide'],function(){
  
  Route::get('danhsach','ImageslideController@getDanhSach');

  Route::get('them','ImageslideController@getThem');
  // post du lieeu
  Route::post('them','ImageslideController@postThem');

   Route::get('sua/{id}','ImageslideController@getSua');
   Route::post('sua/{id}','ImageslideController@postSua');

   Route::get('xoa/{id}','ImageslideController@getXoa');
});

//bình luân:xóa
Route::group(['prefix'=>'comment'],function(){
   Route::get('xoa/{id}/{idproduct}','CommentController@getXoa');

});
Route::group(['prefix'=>'feedback'],function(){
  Route::get('danhsach','FeedBackController@getDanhSach');
  Route::get('xoa/{id}','FeedBackController@getXoa');

});
Route::get('thongkesp','BillDetailController@getThongkesp');


});
Route::group(['prefix'=>'pages'],function(){
// trang chủ,xem hanh và liên hệ
  Route::get('trangchu','PageController@trangchu');
  Route::get('xemnhanh','PageController@xemnhanh');
  Route::get('lienhe','PageController@lienhe');
  Route::get('gioithieu','PageController@gioithieu');

// phản hồi lấy từ view lienhe
  Route::get('phanhoi','PageController@getPhanhoi');
  Route::post('phanhoi','PageController@postPhanhoi');

// loại sản phẩm
  Route::get('loaisanpham/{type}/{price}','PageController@loaisanpham');
  Route::get('loaithuonghieu/{type}/{price}','PageController@loaithuonghieu');

// xem chi tiết sp
  Route::get('chitietsp/{id}','PageController@chitietsp');
 
  Route::get('timkiem','PageController@timkiem');
  
//đăng nhập và đăng xuất
  Route::get('dangnhap','PageController@getDangnhap');
  Route::post('dangnhap','PageController@postDangnhap');
  Route::get('dangxuat','PageController@getDangxuat');

//lấy thông tin người dùng: để sửa
  Route::get('nguoidung','PageController@getNguoidung');
  Route::post('nguoidung','PageController@postNguoidung');

// đăng kí tài khoản
  Route::get('dangky','PageController@getDangKy');
  Route::post('dangky','PageController@postDangKy');

  Route::get('sanpham','PageController@getSanpham');

});
//lấy slide và bình luận của từng sp
Route::get('slide123','PageController@slide');
Route::post('binhluan/{id}','CommentController@postBinhLuan');

//giỏ hàng
Route::group(['prefix'=>'cart'],function(){
  Route::get('add/{id}','CartController@getAddCart');
  Route::get('show','CartController@getShowCart');
  Route::get('delete/{id}','CartController@getDelete');
  Route::get('update/{id}/{qty}','CartController@getUpdateCart');

  Route::get('dathang','CartController@getDathang');
  Route::post('dathang','CartController@postDathang');
  Route::get('hoanthanh','CartController@getHoanThanh');
  
});
