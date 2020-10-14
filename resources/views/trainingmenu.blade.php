<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 10px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
           

            <div class="content">
                <div class="title m-b-md">
                    Training
                </div>
<div class="dropdown">
<a href="{{asset('asm/logout')}}" class="btn btn-success" role="button">Logout</a>

  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Menu
  </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="btn btn-info" href="{{asset('asm/viewcource')}}">Course management </a>
                    <a class="btn btn-success" href="{{asset('asm/viewtrainees')}}">Trainee management</a>
                    <a class="btn btn-danger" href="{{asset('asm/viewtrainer')}}">Trainer management</a>
                    <a class="btn btn-warning" href="{{asset('asm/managecategories')}}">Categories management</a>
                    <a class="btn btn-danger" href="{{asset('asm/viewtopic')}}">Topic management</a>
                    <a class="btn btn-warning" href="{{asset('asm/assigntutor')}}">Assign trainer</a>
                    <a class="btn btn-primary" href="{{asset('asm/assigntrainee')}}">Assign trainee</a>
                    <a class="btn btn-success" href="{{asset('asm/addtopictocourse')}}">Add topic to course</a>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>
