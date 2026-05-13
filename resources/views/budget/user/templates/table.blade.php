@if($info['status'] == true)
    <font color="Black">
    @include("budget.user.templates.table_{$info['table']}", ['info' => $info])
@endif