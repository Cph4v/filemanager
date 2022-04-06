<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
  <title>ورود به حساب کاربری · {{ @TITLE }}</title>
  <link href="{{ @BASE }}/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ @BASE }}/assets/css/login.css" rel="stylesheet">
  <link href="{{ @BASE }}/assets/css/vazir-font.css" rel="stylesheet">
</head>
<body class="text-center">
  <form class="form-signin" method="post">
    <h1 class="font-weight-bold">{{ @TITLE }}</h1>
    <h3 class="h3 mb-3">ورود به حساب کاربری</h3>
    <?php if (($flash = Flash::get()) !== null) { ?>
    <div class="alert alert-<?php echo $flash['type']; ?>" role="alert">
      <?php echo $flash['message']; ?>
    </div>
    <?php } ?>
    <form method="post">
      <label class="sr-only" for="username">نام کاربری</label>
      <input type="text" class="form-control" name="username" id="username" placeholder="نام کاربری" required autofocus>
      <label class="sr-only" for="password">رمز عبور</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="رمز عبور" required>
      <div class="checkbox mb-3">
        <label><input type="checkbox" value="remember"> مرا به‌خاطر بسپار</label>
      </div>
      <input class="btn btn-lg btn-dark btn-block" type="submit" value="ورود">
    </form>
  </form>
  <script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyC1bRmaEDOHgdQSuAIjGNzcR7p6itcpBpc",
    authDomain: "file-manager-aa51a.firebaseapp.com",
    projectId: "file-manager-aa51a",
    storageBucket: "file-manager-aa51a.appspot.com",
    messagingSenderId: "734465717573",
    appId: "1:734465717573:web:8529b13b096d8137c6ba2c",
    measurementId: "G-5ZHKC66Z4L"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>
</body>
</html>