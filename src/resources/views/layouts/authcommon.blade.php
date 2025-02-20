<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/authcommon.css') }}" />
	@yield('css')
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Grape+Nuts&family=Inika:wght@400;700&family=Noto+Serif+JP:wght@200..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
  @livewireStyles
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <h1 class="header__title inika-regular">
        FashionablyLate
      </h1>
      @if(Auth::check())
        <form class="header__button" action="/logout" method="post">
          @csrf
          <button class="header__button--loguot inika-regular"type="submit">logout</buttpm>
        </form>
      @endif
      @if(!Auth::check())
        <a class="header__button inika-regular" href="/@yield('action')">@yield('action')</a>
      @endif
    </div>
  </header>

  <main>
    @yield('content')
  </main>
</body>

</html>