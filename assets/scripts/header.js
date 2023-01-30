const headerTemplate = document.createElement('template');
headerTemplate.innerHTML = `
<style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@400&display=swap');

    :root {
        --main-color: ;
        --bg-color: #fff;
    }

    * {
        font-family: 'Quicksand', sans-serif;
        margin: 0; 
        padding: 0;
        scroll-padding-top: 2rem;
        scroll-behavior: smooth;
        box-sizing: border-box;
        list-style: none;
        text-decoration: none;
    }

    .container {
        max-width: 1068px;
        margin: auto;
        width: 100%;
    }

    header {
        top: 0;
        left: 0;
        width: 100%;
        background: var(--bg-color);
        box-shadow: 0 1px 4px hsl(0 4% 15% / 10%);
        z-index: 100;
    }

    .nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .logo {
        font-size: 1.1rem;
        color: #F38181;
        margin-right: auto;
    }

    .pages{
        display: flex;
        justify-content: center;
        align-items: center;
        list-style: none;
        font-size: 125%;
    }

    .pages li{
        display: inline-block;
        padding: 0px 20px;
    }

    .pages li a{
        transition: all 0.3s ease 0s;
        color: #121315;
    }

    .pages li a:hover{
        color: #F38181;
    }

    .buttons{
        margin-left: auto;
    }

    .buttons button{
        font-size: 111%;
        padding: 9px 18px;
        color: #F38181;
        background-color: white;
        border-color: #F38181;
        border-radius: 5px;
        border-width: 2px;
        border-style: solid;
        cursor: pointer;
        transition: all 0.3s ease 0s;
    }

    .buttons button:hover{
        background-color: #F38181;
        color: white;
    }
</style>
<header>
    <div class="nav container">
        <img src="assets/images/produk/logo-transparent.png" alt="" width="10%">
        <a href="#" class="logo"><h1>TheCrunchy</h1></a>
        <div class="pages">
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="layanan.html">Layanan</a></li>
                <li><a href="kontak.html">Kontak</a></li>
            </ul>
        </div>
        <div class="buttons">
            <a href="pages/middleware/register.php"><button>Daftar</button></a>
            <a href="pages/middleware/login.php"><button>Masuk</button></a>
        </div>
    </div>
</header>`;

class Header extends HTMLElement {
    constructor() {
      super();
    }

    connectedCallback() {
        const shadowRoot = this.attachShadow({ mode: 'open' }); 
        shadowRoot.appendChild(headerTemplate.content);
    }
}

customElements.define('header-component', Header);

