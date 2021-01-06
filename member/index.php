<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./style.css?after" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="cotn_principal">
    <div class="cont_centrar">

        <div class="cont_login">
        <div class="cont_info_log_sign_up">
            <div class="col_md_login">
            <div class="cont_ba_opcitiy">

                <h2>LOGIN</h2>
                <p>BALGAME의 계정이 있으신가요? 로그인하세요!</p>
                <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
            </div>
            </div>
            <div class="col_md_sign_up">
            <div class="cont_ba_opcitiy">
                <h2>SIGN UP</h2>
                <p>BALGAME의 회원이 아니시군요, <br />가입하세요!</p>
                <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
            </div>
            </div>
        </div>

        <div class="cont_back_info">
            <div class="cont_img_back_grey">
            <img src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d" alt="" />
            </div>

        </div>
        <div class="cont_forms">
            <div class="cont_img_back_">
                <img src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d" alt="" />
            </div>
            <form action="./signin.php" method="post">
                <div class="cont_form_login">
                    <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
                    <h2>SIGN IN</h2>
                    <input type="email" placeholder="Email" name="id" />
                    <input type="password" placeholder="Password" name="pwd" />
                    <button class="btn_login" type="submit" onclick="cambiar_login()">SIGN IN</button>
                </div>
            </form>

            <form action="./signup.php" method="post">
                <div class="cont_form_sign_up">
                    <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
                    <h2>SIGN UP</h2>
                    <input type="email" placeholder="Email" name="id" />
                    <input type="text" placeholder="Your NickName" name="name" />
                    <input type="password" placeholder="Password" name="pwd" />
                    <input type="password" placeholder="Confirm Password" name="repwd" />
                    <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
                </div>
            </form>

        </div>

        </div>
    </div>
    </div>
</body>

<script src="./script.js"></script>
</html>