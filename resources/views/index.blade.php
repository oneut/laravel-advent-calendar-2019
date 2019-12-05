<html>
<body>
    <div>
        {{Form::open(['url' => '/', 'files' => true])}}
            {{Form::text("test")}}
            {{Form::submit()}}
        {{Form::close()}}
    </div>
</body>
</html>
