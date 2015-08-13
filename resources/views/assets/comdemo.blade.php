<!doctype html>
<html ng-app="myApp">
<head>
    @foreach($mycomp->getAllUniqueStuff('css') as $css)
        <link href="{{$css}}" rel="stylesheet" type="text/css"/>
    @endforeach
</head>
<body>
<div class="row">
    @foreach($mycomp->getAllUniqueStuff('demo') as $demo)
        {!! $demo !!}
    @endforeach
</div>
@foreach($mycomp->getAllUniqueStuff('script') as $script)
    <script src="{{$script}}" type="text/javascript"></script>
@endforeach

@foreach($mycomp->getAllUniqueStuff('initScript') as $script)
    <script type="text/javascript">
        {!! $script !!}
    </script>
@endforeach
</body>
</html>