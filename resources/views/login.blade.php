<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Rekomendasi Jurusan Perguruan Tinggi - Login</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="/images/logo/logo_icon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="/css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="/style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="/css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="/css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="/css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="/css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="/css/custom.css" />
      <!-- calendar file css -->
      <link rel="stylesheet" href="/js/semantic.min.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="inner_page login">
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center full_height">
               <div class="login_section">
                    <div class="logo_login">
                    </div>
                    <div class="login_form">
                        @if (session()->has('Gagal'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('Gagal') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form action="/autentikasi" method="post">
                            @csrf
                            <fieldset>
                                <div class="field">
                                    <label for="username" class="label_field">Username</label>
                                    <input id="username" type="text" name="username" placeholder="Username" />
                                </div>
                                <div class="field input-container">
                                    <label for="password" class="label_field">Password</label>
                                    <input id="password" type="password" name="password" placeholder="Password" />
                                    <span class="input-icon" id="togglePassword" style="cursor: pointer;">
                                        <i class="fa fa-eye" id="eyeIcon"></i>
                                    </span>
                                </div>
                                <div class="field margin_0">
                                    <label class="label_field hidden">hidden label</label>
                                    <button class="main_bt" type="submit">Login</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="/js/jquery.min.js"></script>
      <script src="/js/popper.min.js"></script>
      <script src="/js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="/js/animate.js"></script>
      <!-- select country -->
      <script src="/js/bootstrap-select.js"></script>
      <!-- nice scrollbar -->
      <script src="/js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="/js/custom.js"></script>
      <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('icon-eye');
                eyeIcon.classList.add('icon-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('icon-eye-slash');
                eyeIcon.classList.add('icon-eye');
            }
        });
    </script>
   </body>
</html>
