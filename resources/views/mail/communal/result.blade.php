<div style="
    width: 30cm; 
    min-height: 5cm;
    display: flex; 
    flex-direction: column; /* Располагаем строки друг под другом */
    align-items: center; 
    justify-content: center; 
    background: linear-gradient(145deg, #bdc3c7, #7f8c8d, #bdc3c7, #95a5a6);
    border: 2px solid #7f8c8d;
    border-radius: 8px;
    box-shadow: inset 0 1px 3px rgba(255,255,255,0.5), 3px 5px 15px rgba(0,0,0,0.3);
    font-family: sans-serif;
">
    <!-- Первая строка -->
    <span style="
        color: #2c3e50; 
        font-size: 24px; 
        font-weight: bold; 
        text-shadow: 1px 1px 2px rgba(255,255,255,0.4);
    ">
        Список учреждений не отправивших информацию (коммунальные услуги)
    </span>

    <span style="
        color: #1a237e; /* Насыщенный темно-синий */
        font-size: 18px; 
        font-weight: 900; /* Максимальная жирность */
        margin-top: 8px;
        text-shadow: 0px 1px 1px rgba(255,255,255,0.3);
    ">
        @foreach($items as $item)
            {{ $item['user']['name'] }}, месяц {{ $name_months[$item['mounth']] }}, статус = {{ $status[$item['status']] }} <br />
        @endforeach
    </span>
</div>

