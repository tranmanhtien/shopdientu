
 <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="pages/trangchu">Trang chủ</a></li>
              <li><a href="pages/trangchu">Loại sản phẩm <span class="caret"></span></a>
                <ul class="dropdown-menu">
                @foreach($productcategory as $category)                
                  <li><a href="pages/loaisanpham/{{$category->id}}/{{$price=0}}">{{$category->name}}</a></li>
                @endforeach
                </ul>
              </li>
               <li><a href="pages/trangchu">Thương hiệu<span class="caret"></span></a>
                <ul class="dropdown-menu">
                @foreach($brand as $br)                
                  <li><a href="pages/loaithuonghieu/{{$br->id}}/{{$price=0}}"">{{$br->name}}</a></li>
                @endforeach
                </ul>
              </li>
              </li>
              <li><a href="pages/gioithieu">Giới thiệu</a>
              </li>
              <li><a href="pages/lienhe">Liên hệ</a></li>
            
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->