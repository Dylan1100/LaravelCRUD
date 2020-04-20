<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Final Project | Create Item</title>

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
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .formContainer {
                text-align: left;
                margin-left: 40%;
            }

            .formContainer input{
                text-align: right;
            }

            /* Create two equal columns that floats next to each other */
            .column {
            float: left;
            width: 50%;
            height: 300px; /* Should be removed. Only for demonstration */
            }

            /* Clear floats after the columns */
            .row:after {
            content: "";
            display: table;
            clear: both;
            }

            .labelContainer{
                padding-left: 45%;
                text-align: left;
            }

            .inputContainer{
                padding-right: 30%;
                text-align: left;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Edit Item
                </div>

                <div class="links">
                    <a href="/">Home</a>
                    <a href="/catagories">Catagories</a>
                    <a href="/items">Items</a>
                </div>
                
                <br><br>


                {!! Form::model($item, ['route' => ['items.update', $item->id], 'method' => 'PUT']) !!}

    

                <div class="column">
                    <div class="labelContainer">
                    {{ Form::label('catagory', 'Catagory: ') }}
                    <br><br>

                    {{ Form::label('title', 'Title: ') }}
                    <br><br>

                    {{ Form::label('description', 'Description: ') }}
                    <br><br>

                    {{ Form::label('price', 'Price: ') }}
                    <br><br>

                    {{ Form::label('quantity', 'quantity: ') }}
                    <br><br>

                    {{ Form::label('sku', 'Sku: ') }}
                    <br><br>

                    {{ Form::label('img', 'Image: ') }}

                    </div>
                </div>


                <div class="column">
                    <div class="inputContainer">
                    {{ Form::text('catagory', null, array('class' => 'form-control')) }}
                    <br><br>

                    {{ Form::text('title', null, array('class' => 'form-control')) }}
                    <br><br>

                    {{ Form::text('description', null, array('class' => 'form-control')) }}
                    <br><br>

                    {{ Form::text('price', null, array('class' => 'form-control')) }}
                    <br><br>

                    {{ Form::text('quantity', null, array('class' => 'form-control')) }}
                    <br><br>

                    {{ Form::text('sku', null, array('class' => 'form-control')) }}
                    <br><br>

                    {{ Form::file('featured_img') }}

                    </div>
                </div>
            
                {{ Form::submit('Add entry', array('class' => 'btn btn-success btn-lg')) }}
                
                {!! Form::close() !!}
              

                @if($errors->any())
                    <div class="alert alert-danger">
                        <p><strong>Opps Something went wrong</strong></p>
                        <ul>
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                        </ul>
                    </div>
                @endif
            
            @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif
                

            </div>
        </div>
    </body>
</html>
