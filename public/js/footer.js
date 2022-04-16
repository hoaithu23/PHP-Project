const createFooter = () => {
    let footer = document.querySelector('footer');

    footer.innerHTML = `
    <div class="footer-container">
        <div class="row">
            <div class="footer-col">
                <h4>Sản phẩm</h4>
                <ul>
                    <li><a href="#">Tivi</a></li>
                    <li><a href="#">Tủ lạnh</a></li>
                    <li><a href="#">Máy giặt</a></li>
                    <li><a href="#">Điều hòa</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Liên hệ</h4>
                <ul>
                    <li><a href="#">hoaithu230600@gmail.com</a></li>
                    <li><a href="#">thuanle1598@gmail.com</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Về chúng tôi</h4>
                <ul>
                    <li><a href="#">Trang web phục vụ cho đồ án chuyên ngành công nghệ thông tin, chúng tôi không chịu trách nhiệm về nội dung của trang web</a></li>
                </ul>
            </div>
        </div>
    </div>
    `;
}

createFooter();