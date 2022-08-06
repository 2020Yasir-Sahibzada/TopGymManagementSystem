class MyFooter extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
                <link rel="stylesheet" href="css_style/footerStyle.css">
                <footer>
                <div id="container">
                    <div class="sec aboutUs">
                        <h2>About Us</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam ratione nemo deleniti maiores eius voluptatem cupiditate nobis repellendus assumenda aperiam.</p>
                        <ul class="social">
                            <li><a href="#"><img src="icons/W2.png" alt=""></a></li>
                            <li><a href="#"><img src="icons/F2.png" alt=""></a></li>
                            <li><a href="#"><img src="icons/T2.png" alt=""></a></li>
                            <li><a href="#"><img src="icons/I2.png" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="sec Services">
                        <h2>Services</h2>
                        <ul>
                            <li><a href="about.php">About</a></li>
                            <li><a href="ToDoList.php">ToDo List</a></li>
                            <li><a href="php_Operation/logout.php">Log out</a></li>
                        </ul>
                    </div>
                    <div class="sec contact">
                        <h2>Adress Info</h2>
                        <ul id="info">
                            <li>
                                <img src="icons/A2.png" alt="">
                                <p>Qalai Shahnan<br>
                                Ahmad Shah Baba mina, Kab<br>
                                Afg</span>
                            </li>
                            <li>
                                <img src="icons/P2.png" alt="">
                                <p><a href="tel: 0093783036882">+93-78-3036882</a><br>
                                    <a href="tel: 0093779141922">+93-77-9141922</a></p>
                            </li>
                            <li>
                                <img src="icons/E2.png" alt="">
                                <p><a href="mailto:yasirsahibzada90@gmail.com">yasirsahibzasa90@gmail.com</a>
                                </p>
                            </li>
                        </ul>
            
                    </div>
                </div>
            </footer>
            <div id="copyrightText"><p>Copyright | 2022 Yasir Sahibzada. All Rights Reserved.</p></div>
        `
    }
}

customElements.define('my-footer', MyFooter);