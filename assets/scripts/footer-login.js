const footerTemplate = document.createElement('template');
footerTemplate.innerHTML = `
<style>
    footer{
        background-color: #121315;
        color: #a7a7a7;
        font-size: 100%;
    }

    footer *{
        font-family: var(--font);
        box-sizing: border-box;
        border: none;
        outline: none;
    }

    .row{
        padding: 1em 1em;
    }

    .row.primary{
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 2fr;
        align-items: stretch;
    }

    .column{
        width: 100%;
        display: flex;
        flex-direction: column;
        padding: 0 2em;
        min-height: 15em;
    }

    .contentBox h3{
        width: 100%;
        text-align: left;
        color: white;
        font-size: 1.4em;
        white-space: nowrap;
    }

    .links ul{
        list-style: none;
        display: flex;
        flex-direction: column;
        padding: 0;
        margin: 0;
    }

    .links li:not(:first-child){
        margin-top: 0.8em;
        
    }

    .links ul li a{
        color: #a7a7a7;
        text-decoration: none;
    }

    .links ul li a:hover{
        color: var(--red);
    }

    .about p{
        text-align: justify;
        margin: 0;
    }

    #social {
        font-size: 2.5rem;
        cursor: pointer;
        color: #a7a7a7;
    }

    #social:hover {
        color: #F38181;
    }

    .social .icons {
        display: flex;
    }

    .copyright{
        padding: 0.3em 1em;
        background-color: #25262e;
    }

    .footer-menu{
        float: left;
        margin-top: 10px;
    }

    .footer-menu a{
        color: #cfd2d6;
        padding: 6px;
        text-decoration: none;
    }

    .footer-menu a:hover{
        color: #27bcda;
    }
    .copyright p{
        font-size: 0.9em;
        text-align: center;
    }
    @media screen and (max-width: 850px){
        .row.primary {
            grid-template-columns: 1fr;
        }
    }
</style>
<head>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<footer>
    <div class="row primary">
        <div class="column about">
            <h3>About</h3>

            <br>
            
            <p>
                The Crunchy adalah sebuah toko makanan yang didirikan oleh Bu Marnis sejak tahun 2014.
                Toko ini memproduksi dan menjual makanan homemade dengan harga yang terjangkau.
            </p>
        </div>

        <div class="column links">
            <h3>Pages</h3>
            
            <br>

            <ul>
                <li>
                    <a href="index-login.php">Beranda</a>
                </li>
                <li>
                    <a href="menu-login.php">Menu</a>
                </li>
                <li>
                    <a href="layanan-login.php">Layanan</a>
                </li>
                <li>
                    <a href="kontak-login.php">Kontak</a>
                </li>
            </ul>               
        </div>
        
        <div class="column links">
            <h3>Partners</h3>
            
            <br>

            <ul>
                <li>
                    <a href="https://smkn1cibinong.sch.id/main/" target="_blank">SMKN 1 Cibinong</a>
                </li>
            </ul>               
        </div>

        <div class="column social">
            <h3>Follow Us</h3>

            <br>

            <div class="icons"> 
                <a href="http://wa.me/6285213725053" target="_blank"><i class='bx bxl-whatsapp' id="social"></i></a>
                <a href="https://instagram.com/produsen_baso_homemade_?igshid=YmMyMTA2M2Y=" target="_blank"><i class='bx bxl-instagram' id="social"></i></a>
                <a href="https://www.facebook.com/profile.php?id=100054786758756" target="_blank"><i class='bx bxl-facebook-circle' id="social"></i></a>
            </div>
        </div>
    </div>
    
    <div class="row copyright">
        <p>TheCrunchy is a Trademark of Abieza, Tristan, Lidia, Ayya. Copyright &copy; 2014-2022 TheCrunchy LLC.</p>
    </div>
</footer>
`

class Footer extends HTMLElement {
    constructor() {
      super();
    }

    connectedCallback() {
        const shadowRoot = this.attachShadow({ mode: 'open' }); 
        shadowRoot.appendChild(footerTemplate.content);
    }
}

customElements.define('footer-component', Footer);

