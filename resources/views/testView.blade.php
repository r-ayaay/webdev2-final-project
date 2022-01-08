<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" id="token" value="{{ csrf_token() }}" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;600&display=swap" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit" async defer>
    </script>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    <link href="{{URL::asset('css/pageStyle.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/topbarStyle.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/sidenavStyle.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/tableStyle.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/popupStyle.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/formStyle.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/cardStyle.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/exhibitCardStyle.css')}}" rel="stylesheet">
    <title>{{env('APP_NAME')}}</title>
</head>

<body>
    <div id="app">

        @guest
        @if (!Route::has('login'))
        <h5 id="userName">Guest Account</h5>
        @endif

        @else
        <?php
        $userID = Auth::user()->id;
        $username = Auth::user()->name;
        $isAdmin = Auth::user()->admin;
        ?>
        @endguest

        <app username="{{$username}}" userID="{{$userID}}" isAdmin="{{$isAdmin}}" />
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>