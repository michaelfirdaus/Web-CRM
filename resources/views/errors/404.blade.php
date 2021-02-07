<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <style>
      .gambar {
        padding-left:150px; 
      }

      img.center{
        display: block;
        margin: 0 auto;
      }

      .text-center{
        color: #FF0000;
      }

      .navbar{
        background-color: #1b1918;
      }
  
      h2{
        font-family: 'Poppins', sans-serif;
      }

      .sub{
        text-align: center;
      }

      .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        text-align: left;
        background-color:#1b1918;
        color: white;
      }
    </style>

    <title>Error 404: Not Found | Course-Net CRM</title>
    
  </head>
  <body>
    <nav class="navbar navbar-dark justify-content-between">
        <a class="navbar-brand" href="https://course-net.com/" target="_blank">
          <img src="{{ asset('assets/logo-cn-panjang.png') }}" alt="" height=30px width=120px class="d-inline-block align-top">
        </a>
      <div class="form-inline">
        <a href="https://crm.course-net.com/" class="text-white" style="text-decoration: none !important;">
          <strong class="text-white">Course-Net CRM</strong>
        </a>
      </div>
    </nav>

      <div class="container mx-auto">
        <img src="{{ asset('assets/404.png') }}" class="center" height=40% width=40%>
        <h2 class="text-center text-bold"> Halaman yang Kamu Cari Tidak Ditemukan </h2>
        <p class="sub">Ups, sepertinya kamu nyasar deh...<br>Coba kontak IT Support untuk membuat halamannya! <i class="far fa-laugh-beam"></i></p>
      </div> 

      <div class="navbar footer mt-5 pl-3 pt-2 pb-2 justify-content-between">
        <a href="https://www.linkedin.com/in/michaelfirdaus/" target="_blank" class="text-white" style="text-decoration: none !important;">
          <strong class="mr-1">Copyright &copy; 2020-2021. Created By Michael.</strong>
          All rights reserved.
        </a>
        <div class="ml-auto">
          <a href="https://crm.course-net.com/" class="text-white" style="text-decoration: none !important;">crm.course-net.com</a>
        </div>
      </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>  
  </body>
</html>