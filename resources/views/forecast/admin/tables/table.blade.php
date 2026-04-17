@if($info['status'] == true)
    <font color="Black">
    @include("forecast.admin.tables.table_{$info['table']}", ['info' => $info])
@endif
