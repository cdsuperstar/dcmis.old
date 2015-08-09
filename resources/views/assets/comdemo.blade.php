<!doctype html>
<html ng-app="myApp">
<head>
    @foreach($mycomp->getAllStuff('css',$name) as $css)
        <link href="{{$css}}" rel="stylesheet" type="text/css"/>
    @endforeach
</head>
<body>
    <div class="row">
        @foreach($mycomp->getAllStuff('demo',$name) as $demo)
            {!! $demo !!}
        @endforeach
    </div>
@foreach($mycomp->getAllStuff('script',$name) as $script)
    {{--<script src="{{str_replace('../..','/theme',$script)}}" type="text/javascript"></script>--}}
    <script src="{{$script}}" type="text/javascript"></script>
@endforeach

<script type="text/javascript">
    {!! $mycomp->getMetronicInitScript($name) !!}
</script>
</body>
</html>