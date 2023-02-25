<!DOCTYPE html>
<!-- === Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="signup/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon"
        href="https://www.kindpng.com/picc/m/136-1369817_blue-white-letter-e-logo-design-png-e.png"
        type="image/x-icon">
    <title>Login / Easymed</title>
</head>
<body>
    
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>

                <form action="log/logic.php" method="post">
                    <div class="input-field">
                        <input type="text"  name="number" placeholder="Enter your email" required>
                        <i class="fa fa-phone-square" aria-hidden="true"></i>                    </div>
                    <div class="input-field">
                        <input type="password" class="password"  name="password" placeholder="Enter your password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    
                    <div class="input-field button">
                        <input type="submit" name="submit" value="Login Now">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="join.php" class="text signup-link">Signup now</a>
                    </span>
                </div>
            </div>

            </div>
        </div>
    </div>

    <!--<script src="script.js"></script>-->

</body>
</html>
<script>
    const container = document.querySelector(".container"),
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password"),
      signUp = document.querySelector(".signup-link"),
      login = document.querySelector(".login-link");

    //   js code to show/hide password and change icon
    pwShowHide.forEach(eyeIcon =>{
        eyeIcon.addEventListener("click", ()=>{
            pwFields.forEach(pwField =>{
                if(pwField.type ==="password"){
                    pwField.type = "text";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                }else{
                    pwField.type = "password";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            }) 
        })
    })

    // js code to appear signup and login form
    // signUp.addEventListener("click", ( )=>{
    //     container.classList.add("active");
    // });
    // login.addEventListener("click", ( )=>{
    //     container.classList.remove("active");
    // });
</script>