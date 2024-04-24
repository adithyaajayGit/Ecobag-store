</html>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script>
    function togglePasswordVisibility() {
      var passwordInput = document.getElementById("password");
      var toggleButton = document.getElementById("togglePassword");

      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleButton.innerHTML = "<i class='fas fa-eye-slash'></i>";
      } else {
        passwordInput.type = "password";
        toggleButton.innerHTML = "<i class='fas fa-eye'></i>";
      }
    }
  </script>

</head>
<style>

  body {
    font-family: Arial, sans-serif;
    background-image: url('24.jpg');
    /* Update the image URL */
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-position: center;
  }

  .container {
    background-color: #000000e3;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 500px;
    padding: 20px;
  }

  .login-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .company-info {
    flex: 1;
    text-align: center;
    padding: 20px;
  }

  .company-info h1 {
    color: #008080;
    margin-bottom: 10px;
  }

  .login-form {
    flex: 2;
    padding: 20px;
  }

  .login-form h2 {
    color: #008080;
    margin-bottom: 20px;
  }

  .form-group {
    margin-bottom: 20px;
  }

  label {
    display: block;
    margin-bottom: 5px;
    color: #555;
  }

  input[type="text"],
  input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  input[type="checkbox"] {
    margin-right: 5px;
  }

  button {
    background-color: #008080;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  button:hover {
    background-color: #005555;
  }
</style>


<body>
    <div class="container">
        <div class="login-container">
            <div class="company-info">
                <!-- <h1>Eco Bag</h1> -->
                <h1><img src="img/core-img/4,1.png" width="200px" height="200px"></h1>
                <!-- <p>Welcome to our platform</p> -->
            </div>
            <div class="login-form">
                <h2 style="color:white;">Login</h2>
                <form action="loginaction.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" placeholder="Enter your username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div style="display: flex;">
                            <input type="password" name="password" id="password" placeholder="Enter your password" required>
                            <span id="togglePassword" onclick="togglePasswordVisibility()" style="color:white;"><i class="fas fa-eye"></i></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit">Login</button>
                    </div>
                </form>
                <p style="color:white;">Don't have an account? <a href="shopownerreg.php">Register Here</a></p>
                <p><a href="forgotpassword.php">Forgot Password?</a></p>
            </div>
        </div>
    </div>
</body>

</html>
