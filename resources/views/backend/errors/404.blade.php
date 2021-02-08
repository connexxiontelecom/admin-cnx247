<!DOCTYPE html>

<html lang="en-us" class="no-js">

	<head>
		<meta charset="utf-8">
		<title>{{Auth::user()->tenant->company_name ?? 'CNX247'}}</title>
		<meta name="description" content="Error 404">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="Connexxion Group" content="Connexxion Group">

        <!-- Favicon -->
        <link rel="shortcut icon" href="img\favicon.ico">
		<link rel="stylesheet" type="text/css" href="{{asset('/assets/errors/css/style.css')}}">
	</head>

	<body class="flat">

        <!-- Canvas for particles animation -->
        <div id="particles-js"></div>

        <!-- Your logo on the top left -->
        <a href="#" class="logo-link" title="back home">

            <img src="img\logo.png" class="logo" alt="Company's logo">

        </a>

        <div class="content">

            <div class="content-box">

                <div class="big-content">

                    <!-- Main squares for the content logo in the background -->
                    <div class="list-square">
                        <span class="square"></span>
                        <span class="square"></span>
                        <span class="square"></span>
                    </div>

                    <!-- Main lines for the content logo in the background -->
                    <div class="list-line">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>

                    <!-- The animated searching tool -->
                    <i class="fa fa-search" aria-hidden="true"></i>

                    <!-- div clearing the float -->
                    <div class="clear"></div>

                </div>

                <!-- Your text -->
                <h1>Oops! Error 404 not found.</h1>

                <p>The page you were looking for doesn't exist.<br>
                    We think the page may have moved.</p>

            </div>

        </div>
    <footer class="light">
        <ul>
            <li><a href="{{url()->previous()}}">Take me back</a></li>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        </ul>
    </footer>
        <script src="{{asset('/assets/errors/js/jquery.min.js')}}"></script>
        <script src="{{asset('/assets/errors/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('/assets/errors/js/particles.js')}}"></script>

    </body>

</html>
