<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>陈一锑的小说站-2018-1-25</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script href="{{ asset('js/js.css') }}"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                font-size: 12px;
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
        <div class="container">
            <h2>{{ $info->title }}</h2>
            <h4> {!! $info->content !!}</h4>
            <br>

            <div class="row">
                <div class="col-md-4">
                    <button type="button" class="next btn btn-w-m btn-info btn-lg ">
                        <input type="hidden" class="next_page" value="{{ url($info->id+1) }}">
                        下一篇
                    </button>
                </div>
                <div class="col-md-4"><button type="button" class="next btn btn-w-m btn-info btn-lg ">
                        <input type="hidden" class="next_page" value="{{ url($info->id+1) }}">
                        下一篇
                    </button></div>
            </div>

        </div>

    </body>
</html>
<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script>
    $(function () {
        $('.next').click(function () {
            var url = $('.next_page').val();
            window.location.href = url;
        })
    })
</script>