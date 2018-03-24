# Laravel-Cadillac

## DATE

{{ date('Y/m/d H:i:s') }}

## Tables

@foreach($tables as $table => $columns)
#### {{ $table }}

| Column | Type | Default | Nullable | Extra | Comment |
| --- | --- | --- | --- | --- | --- |
@foreach($columns as $column)
| `{{$column->COLUMN_NAME}}` | `{{$column->COLUMN_TYPE}}` | {{$column->COLUMN_DEFAULT}} | {{$column->IS_NULLABLE}} | {{$column->EXTRA}} | {{$column->COLUMN_COMMENT}} |
@endforeach

@endforeach