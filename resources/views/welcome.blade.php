<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>陈一锑的小说站-2018-1-25</title>
        {{--<link href="{{ asset('bootstrap/css/bootstrap.css') }}"rel="stylesheet" >--}}
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script href="{{ asset('js/js.css') }}"></script>
        {{--<script href="{{ asset('bootstrap/js/bootstrap.js') }}"></script>--}}
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

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
            <div class="content">
                <div class="panel panel-default ">
                    <!-- Default panel contents -->
                    <div class="panel-heading">天道图书馆--by,cyt</div>
                    <!-- Table -->
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th align="center">标题</th>
                            <th>创建时间</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $item)
                            <tr>
                                <td>#</td>
                                <td><a href="{{ url($item->id) }}">{{ $item->title }}</a></td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $list->links() }}
                </div>
            </div>
        </div>

    </body>
</html>
