<?php

\App\Http\Controllers\Auth\AuthController::postLogin();



?>
<html>
<head>
</head>
<body>

{{ $myl }}
@foreach($lesson as $lson)


    <li>{{ $lson }}</li>

@endforeach
hote pages.

</body>
</html>
