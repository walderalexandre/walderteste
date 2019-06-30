<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" http-equiv="Content-Language" content="pt-br">
<title>Walder</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
   

</head>
<body>
<div class="container">
@yield('main')
</div>


@yield('scripts')

</body>
</html>