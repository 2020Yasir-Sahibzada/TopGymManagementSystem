class MyHeader extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
            <link rel="stylesheet" href="css_style/headerStyle.css">
            <header>
                <div id="main-logo">
                    <img src="img/muscle.png" alt="" class="main-logo">
                    <h3><span>Yasir</span> Top Gym</h3>
                </div>
                <ul>
                    <li><a href="php_Operation/logout.php">Log Out</a></li>
                </ul>
            </header>
        `;
    }
}

customElements.define('my-header', MyHeader);