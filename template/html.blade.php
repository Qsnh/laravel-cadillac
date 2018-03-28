<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel Cadillac</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1 class="text-center" style="line-height: 123px;">Laravel-Cadillac <small>{{date('Y/m/d H:i:s')}}</small></h1>
                <h3>Tables({{count($tables)}})</h3>

                @foreach($tables as $table => $columns)
                <h4>{{$table}}</h4>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Column</th>
                            <th>Type</th>
                            <th>Default</th>
                            <th>Nullable</th>
                            <th>Extra</th>
                            <th>Comment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($columns as $column)
                        <tr>
                            <td><code>{{$column->COLUMN_NAME}}</code></td>
                            <td><code>{{$column->COLUMN_TYPE}}</code></td>
                            <td>{{$column->COLUMN_DEFAULT}}</td>
                            <td>{{$column->IS_NULLABLE}}</td>
                            <td>{{$column->EXTRA}}</td>
                            <td>{{$column->COLUMN_COMMENT}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endforeach
            </div>
        </div>

        <div class="row">
            <div class="col-sm text-center" style="line-height: 100px;">
                PowerBy Laravel-Cadillac && <a href="https://github.com/qsnh/laravel-cadillac">Github</a>
            </div>
        </div>
    </div>

</body>
</html>