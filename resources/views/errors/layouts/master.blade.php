<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="">

	<title>
        @yield('title')
    </title>

    @include('errors.layouts.partials.style')
    


</head>

<body>

	@yield('content')

    @include('errors.layouts.partials.script')

</body>
</html>	