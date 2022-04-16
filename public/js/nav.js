const createNav = () =>{
    let nav = document.querySelector('.navbar');

    nav.innerHTML = `
        <div class="nav">
            <img src="./public/img/dark-logo.png" class="brand-logo" alt="">
            <div class="nav-items">
                <div class="search">
                    <input type="text" class="search-box" placeholder="Tìm kiếm sản phẩm">
                    <button class="search-btn">Tìm kiếm</button>
                </div>
                <a href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-shopping-bag" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <ul class="links-container">
            <li class="link-item"><a href="#" class="link">Trang chủ</a></li>
            <li class="link-item"><a href="#" class="link">Tivi</a></li>
            <li class="link-item"><a href="#" class="link">Tủ lạnh</a></li>
            <li class="link-item"><a href="#" class="link">Điều hòa</a></li>
            <li class="link-item"><a href="#" class="link">Máy giặt</a></li>
            <li class="link-item"><a href="#" class="link">Máy lọc không khí</a></li>
            <li class="link-item"><a href="#" class="link">Tủ rượu</a></li>
            <li class="link-item"><a href="#" class="link">Máy sấy quần áo</a></li>
        </ul>    
    `;
}

createNav();