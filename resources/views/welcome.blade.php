<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Sopa De Letras</title>

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
                height: 50vh;
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

            .matrix > a {
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
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Sopa De Letras
                </div>
            <div style="clear:none">
                <label for="InputKeyword">Palabra a buscar:</label>
                <input type="text" name="InputKeyword" value="OIE" id="keyword">
            </div>
                <div>
                    <h3>Click en una sopa para resolver</h3>
                </div>
                <div>
                    <div style="float:left; width:25%">
                    <h3 class="solution" style="display:none"></h3>
                    <table class="matrix" id="0" style="width:100%">
                        <tr>
                            <td>O</td>
                            <td>I</td>
                            <td>E</td>
                        </tr>
                        <tr>
                            <td>I</td>
                            <td>I</td>
                            <td>X</td>
                        </tr>
                        <tr>
                            <td>E</td>
                            <td>X</td>
                            <td>E</td>
                        </tr>
                    </table>
                    </div>
                    <div style="float:left; width:25%">
                    <h3 class="solution" style="display:none"></h3>
                    <table class="matrix" id="1" style="width:100%">
                        <tr>
                            <td>E</td>
                            <td>I</td>
                            <td>O</td>
                            <td>I</td>
                            <td>E</td>
                            <td>I</td>
                            <td>O</td>
                            <td>E</td>
                            <td>I</td>
                            <td>O</td>
                        </tr>
                    </table>
                    </div>
                    <div style="float:left; width:25%">
                    <h3 class="solution" style="display:none"></h3>
                    <table class="matrix" id="2" style="width:100%">
                        <tr>
                            <td>E</td>
                            <td>A</td>
                            <td>E</td>
                            <td>A</td>
                            <td>E</td>
                        </tr>
                        <tr>
                            <td>H</td>
                            <td>I</td>
                            <td>I</td>
                            <td>I</td>
                            <td>H</td>
                        </tr>
                        <tr>
                            <td>E</td>
                            <td>I</td>
                            <td>O</td>
                            <td>I</td>
                            <td>E</td>
                        </tr>
                        <tr>
                            <td>A</td>
                            <td>I</td>
                            <td>I</td>
                            <td>I</td>
                            <td>A</td>
                        </tr>
                        <tr>
                            <td>E</td>
                            <td>A</td>
                            <td>E</td>
                            <td>A</td>
                            <td>E</td>
                        </tr>
                    </table>
                    </div>
                    <div style="float:left; width:25%">
                    <h3 class="solution" style="display:none"></h3>
                    <table class="matrix" id="3" style="width:100%">
                        <tr>
                            <td>O</td>
                            <td>X</td>
                        </tr>
                        <tr>
                            <td>I</td>
                            <td>O</td>
                        </tr>
                        <tr>
                            <td>E</td>
                            <td>X</td>
                        </tr>
                        <tr>
                            <td>I</td>
                            <td>I</td>
                        </tr>
                        <tr>
                            <td>O</td>
                            <td>X</td>
                        </tr>
                        <tr>
                            <td>I</td>
                            <td>E</td>
                        </tr>
                        <tr>
                            <td>E</td>
                            <td>X</td>
                        </tr>
                    </table>
                    </div>

                </div>
        </div>
    </body>
    <script
        src="http://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous">
    </script>
    <script>
        var token='{{ Session::token() }}';
	    var url = '{{ route('solve') }}';
    </script>
    <script type="text/javascript" src="{!! asset('js/selectSopa.js') !!}"></script>
</html>
