const sidebarTemplate = document.createElement('template');
sidebarTemplate.innerHTML = 
`
<style>
    .left {
        height: 100%;
        display: flex;
    }
    
    .wrapper {
        padding: 0 25px;
        height: 100vh;
        display: flex;
        flex-direction: column;
    }
    
    .items {
        margin-top: 50px;
    }
    
    .menu {
        margin-top: 20px;
    }
    
    .navigation {
        width: 270px;
        border-right: 1px solid #ddd;
    }
    
    .wrapper2 {
        padding: 0 25px;
        height: 100%;
        overflow: auto;
    }
    
    .folders {
        margin-top: 30px;
        color: #b8b8b8;
        font-size: 14px;
    }
    .folder-icons {
        margin-top: 20px;
        display: flex;
        align-items: center;
    }
    
    .icon-name a{
        margin-left: 10px;
        color: grey;
        text-decoration: none;
    }
    
    .icon-name a:hover{
        color: var(--red);
    }
    
    .big-inbox {
        font-size: 25px;
        font-weight: 500;
    }
    .right-side {
        background-color: #f2f3f7;
        width: 100%;
        padding: 8px 30px;
        display: flex;
        flex-direction: column;
    }
    .right-body {
        flex: 1;
        display: flex;
        overflow: hidden;
    }
    
    .new-hr {
        border: 0.6px solid #ddd;
        margin-bottom: 25px;
    }

    ion-icon {
        font-size: 25px;
        color: grey;
        margin-top: 5px;
    }
</style>    
</head>
<div class="left">
    <div class="navigation">
        <div class="wrapper2">
            <span class="plus"></span>
            <div class="folders">Tautan</div>
            <div class="folder-icons"></div>  

            <div class="folder-icons">
                <div class="icon1">
                    <ion-icon name="home-outline"></ion-icon>
                </div>
                <div class="icon-name"><a href="dashboard.php">Dashboard</a></div>
            </div> 

            <div class="folder-icons">
                <div class="icon1">
                    <ion-icon name="add-circle-outline"></ion-icon>
                </div>
                <div class="icon-name"><a href="input.php">Data Produk</a></div>
            </div>

            <div class="folder-icons">
                <div class="icon1">
                    <ion-icon name="bar-chart-outline"></ion-icon>
                </div>
                <div class="icon-name"><a href="penjualan.php">Data Penjualan</a></div>
            </div>

            <div class="folder-icons"></div>

            <div class="folder-icons">
                <div class="icon1">
                    <ion-icon name="power-outline"></ion-icon>
                </div>
                <div class="icon-name"><a href="../../../index.php">Logout</a></div>
            </div>
            <div class="folder-icons">
            </div>
        </div>
    </div>
</div>
`
class Sidebar extends HTMLElement {
    constructor() {
      super();
    }

    connectedCallback() {
        const shadowRoot = this.attachShadow({ mode: 'open' }); 
        shadowRoot.appendChild(sidebarTemplate.content);
    }
}

customElements.define('sidebar-component', Sidebar);
