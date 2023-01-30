<?php

@include '../../assets/sql/koneksi.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("location: index-login.php");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $sql = "SELECT * FROM tb_akun WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql, $role);

    if ($result->num_rows > 0) 
    {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['stat_login']=1;
        $_SESSION['username'] = $row['username'];
        
        if($row["posisi"]=="00")
        {
            header("location:index-login.php");
        }
        else if($row["posisi"]=="01")
        {
            header("location:admin-only/dashboard.php");
        }
        
    } 

    else 
    {
        echo "<script>alert('email atau password anda salah. silahkan coba lagi!')</script>";
    }
}

?>
<!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

        <title>Login</title>
    </head>
    <style>
        :root{
            --red: #F38181;
            --font: 'Quicksand', sans-serif;
        }

        *{
            font-family: var(--font)
        }

        body {
            background-color: #F38181;
        }

        .container{
            display: grid;
            justify-content: center;
            margin-top: 10%;
        }

        .content{
            display: grid;
            justify-content: center;
            margin-left: 5%;
        }

        .group{
            position:relative; 
            margin-bottom:45px; 
        }

        .footer { text-align:center; }
        .footer a { color:#53B2C8; }

        .group input{
            font-size:18px;
            padding:10px 10px 10px 5px;
            display:block;
            width:250px;
            border:none;
            border-bottom:1px solid black;
        }
        
        .group input:focus { outline:none; }

        label{
            color:#999; 
            font-size:18px;
            font-weight:normal;
            position:absolute;
            pointer-events:none;
            left:5px;
            top:10px;
            transition:0.2s ease all; 
            -moz-transition:0.2s ease all; 
            -webkit-transition:0.2s ease all;
        }
        
        .group :focus ~ label, input:valid ~ label{
            top:-20px;
            font-size:14px;
            color: var(--red)
        }
        
        .bar { position:relative; display:block; width:300px; }
        .bar:before, .bar:after {
            content:'';
            height:2px; 
            width:0;
            bottom:1px; 
            position:absolute;
            background: var(--red);
            transition:0.2s ease all; 
            -moz-transition:0.2s ease all; 
            -webkit-transition:0.2s ease all;
        }

        .highlight{
            position:absolute;
            height:60%; 
            width:100px; 
            top:25%; 
            left:0;
            pointer-events:none;
            opacity:0.5;
        }
        
        .group input:focus ~ .highlight{
            -webkit-animation:inputHighlighter 0.3s ease;
            -moz-animation:inputHighlighter 0.3s ease;
            animation:inputHighlighter 0.3s ease;
        }
        
        @-webkit-keyframes inputHighlighter {
            from { background:#5264AE; }
            to 	{ width:0; background:transparent; }
        }
        @-moz-keyframes inputHighlighter {
            from { background:#5264AE; }
            to 	{ width:0; background:transparent; }
        }
        @keyframes inputHighlighter {
            from { background:#5264AE; }
            to 	{ width:0; background:transparent; }
        }

        .login a{
            font-size: 108%;
            padding: 9px 18px;
            color: var(--red);
            background-color: white;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease 0s;
            color: var(--red);
        }

        .login input{
            font-size: 111%;
            padding: 9px 18px;
            color: var(--red);
            background-color: white;
            border-color: var(--red);
            border-radius: 5px;
            border-width: 2px;
            border-style: solid;
            cursor: pointer;
            transition: all 0.3s ease 0s;
        }

        .login input:hover{
            background-color: var(--red);
            color: white;
        }

        .card
        {
            background-color: white;
            border: solid 2px black;
            box-shadow:
                15px 15px 0 -2px lightblue,
                15px 15px black;
            width: 300PX;
            height: 400px;
        }

        h1{
            font: var(--font);
            font-size: 150%;
            font-weight: bold;
            margin-bottom: 62px;
        }
    </style>
    <body>
    <div class="alert alert-warning" role="alert">
        <?php echo $_SESSION['error']?>
    </div>
        <div class="container">
            <form method="post" >
                <div class="card">
                    <div class="content">
                        <h1>Selamat <br> Datang <br> Kembali! :)</h1>
                        
                        <div class="group">      
                            <input type="text" name="email" value="<?php echo $email; ?>" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Email</label>
                        </div>
        
                        <div class="group">      
                            <input type="password" name="password" value="<?php echo $_POST['password']; ?>" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Password</label>
                        </div>

                        <div class="login">
                            <input type="submit" name="submit" value="Login" class="butt" style="font-size:100%">
                            <a href="register.php">Belum punya akun?</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>