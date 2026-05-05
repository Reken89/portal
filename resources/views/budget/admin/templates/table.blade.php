@if($info['status'] == true)
    <font color="Black">
    @include("budget.admin.templates.table_{$info['table']}", ['info' => $info])
@endif
