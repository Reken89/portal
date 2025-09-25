@if ($info['status'] == true)
    <p>Тут будет таблица</p>
    @php var_dump($info['ofs']); @endphp
@else
    <p>Не выбраны параметры для формирования таблицы!</p>
@endif

