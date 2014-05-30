<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="description" content=""><meta name="author" content=""><title>Online Grading System</title>
    {{ HTML::style('/css/bootstrap.min.css') }}
    @yield('styles')  
  </head><body>
  @yield('navs')
	@yield('content')
    {{ HTML::script('/js/jquery.min.js') }}
    {{ HTML::script('/js/bootstrap.min.js') }}
    @yield('scripts')
  </body></html>
