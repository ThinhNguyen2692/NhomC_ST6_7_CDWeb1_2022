<nav>
    <div class="menu">
        <div class="logo">
            <a href="#">
                <img src="logo.png" alt="">
            </a>
        </div>
        <ul style="list-style: none;">
             <li>
                <a href="/feedback-list">
                    <span><i class="fas fa-home"></i></span>
                    Danh sách phản hồi
                </a>
            </li>
            <li>
                <a href="/feedback-list-history">
                    <span><i class="fas fa-address-card"></i></span>
                    Lịch sử phản hồi
                </a>
            </li>
          <?php
            if(Cookie::get('postion_id') == 1){?>
               <li>
                <a href="/employee-list">
                    <span><i class="fas fa-cog"></i></span>
                    Quản lý nhân viên
                </a>
            </li>
            <li>
                <a href="/add-feedback-type">
                    <span><i class="fas fa-address-book"></i></span>
                    Thêm loại phản hồi
                </a>
            </li>
            <li>
                <a href="/view-food">
                    <span><i class="fas fa-address-book"></i></span>
                    Món ăn
                </a>
            </li>
            
            <?php } ?>
        
        </ul>
    </div>
</nav>