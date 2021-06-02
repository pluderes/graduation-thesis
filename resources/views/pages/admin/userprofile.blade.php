<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ</title>
    <link rel="stylesheet" href="{{asset('public/Frontend/aboutme/CSS/aboutdemo.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />
</head>

<body>
    <div class="about-section">
        <a href="{{URL::TO('/trang-chu')}}">
            <img src="{{('public/Upload/banner/zorbashop.png')}}" style="width: 160px; height: 80px;" alt="">
          </a>
    </div>
    <div class="team" id="divteam">
        <h5 class="team">ABOUT ME</h5>
    </div>
    <div class="row" style="margin: 0; background-color: #888888;">
        <div class="column">
            <div class="card">
                <img class="avt" src="{{asset('public/Frontend/aboutme/Image/trung1.jpg')}}" alt="TrungDuc">
                <div class="container">
                    <h2>Trần Đức Trung</h2>
                    <hr>
                    <p class="title"><i class="fas fa-phone-square-alt"></i> 0359280808</p>
                    <p class="title"><i class="fas fa-envelope"></i> manba211198@gmail.com</p>
                    <a href="https://www.facebook.com/pluderes"><i class="fab fa-facebook-square"></i><span> Trung Đức</span></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>