<table>
    <thead>
        <tr>
            <th style="min-width: 200px; width: 400px;">Наименование</th>
            <th style="min-width: 70px; width: 70px;">ЭКР</th>
            <th style="min-width: 150px; width: 150px;">0104 Расходы администрации</th>
            <th style="min-width: 150px; width: 150px;">0105 Судебная система</th>
            <th style="min-width: 150px; width: 150px;">0111 Резервный фонд</th>
            <th style="min-width: 150px; width: 150px;">0113 Другие общегосударственные расходы</th>
            <th style="min-width: 150px; width: 150px;">0309 ГО и ЧС</th>
            <th style="min-width: 150px; width: 150px;">0405 Животные</th>
            <th style="min-width: 150px; width: 150px;">0408 Транспорт</th>
            <th style="min-width: 150px; width: 150px;">0409 Дорожный фонд</th>
            <th style="min-width: 150px; width: 150px;">0412 Другие вопросы нац. экономики</th>
            <th style="min-width: 150px; width: 150px;">0502 Коммунальное хозяйство</th>
            <th style="min-width: 150px; width: 150px;">0503 Благоустройство</th>
            <th style="min-width: 150px; width: 150px;">0909 Костомукша город здоровья</th>
            <th style="min-width: 150px; width: 150px;">1001 Пенсии</th>
            <th style="min-width: 150px; width: 150px;">1003 Социальная поддержка граждан</th>
            <th style="min-width: 150px; width: 150px;">1101 Физкультура и спорт</th>
            <th style="min-width: 150px; width: 150px;">1301 Обслуживание МД</th>
            <th style="min-width: 150px; width: 150px;">0314 Другие вопросы</th>
            <th style="min-width: 150px; width: 150px;">0501 Жилищное хозяйство</th>
            
            <th style="min-width: 150px; width: 150px;">0104 Расходы администрации</th>
            <th style="min-width: 150px; width: 150px;">0105 Судебная система</th>
            <th style="min-width: 150px; width: 150px;">0111 Резервный фонд</th>
            <th style="min-width: 150px; width: 150px;">0113 Другие общегосударственные расходы</th>
            <th style="min-width: 150px; width: 150px;">0309 ГО и ЧС</th>
            <th style="min-width: 150px; width: 150px;">0405 Животные</th>
            <th style="min-width: 150px; width: 150px;">0408 Транспорт</th>
            <th style="min-width: 150px; width: 150px;">0409 Дорожный фонд</th>
            <th style="min-width: 150px; width: 150px;">0412 Другие вопросы нац. экономики</th>
            <th style="min-width: 150px; width: 150px;">0502 Коммунальное хозяйство</th>
            <th style="min-width: 150px; width: 150px;">0503 Благоустройство</th>
            <th style="min-width: 150px; width: 150px;">0909 Костомукша город здоровья</th>
            <th style="min-width: 150px; width: 150px;">1001 Пенсии</th>
            <th style="min-width: 150px; width: 150px;">1003 Социальная поддержка граждан</th>
            <th style="min-width: 150px; width: 150px;">1101 Физкультура и спорт</th>
            <th style="min-width: 150px; width: 150px;">1301 Обслуживание МД</th>
            <th style="min-width: 150px; width: 150px;">0314 Другие вопросы</th>
            <th style="min-width: 150px; width: 150px;">0501 Жилищное хозяйство</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($info['budget'] as $value) 
            @if ($value['ekr']['main'] === 'Yes')
            <tr>
                <td><b>{{ $value['ekr']['title'] }}</b></td>
                <td><b>{{ $value['ekr']['ekr'] }}</b></td>
                <td><b>{{  $value['data'][53]['sum_fu']  }}</b></td>
                <td><b>{{  $value['data'][54]['sum_fu']  }}</b></td>
                <td><b>{{  $value['data'][55]['sum_fu']  }}</b></td>
                <td><b>{{  $value['data'][56]['sum_fu']  }}</b></td>
                <td><b>{{  $value['data'][57]['sum_fu']  }}</b></td>
                <td><b>{{  $value['data'][58]['sum_fu']  }}</b></td>
                <td><b>{{  $value['data'][59]['sum_fu']  }}</b></td>
                <td><b>{{  $value['data'][60]['sum_fu']  }}</b></td>
                <td><b>{{  $value['data'][61]['sum_fu']  }}</b></td>
                <td><b>{{  $value['data'][62]['sum_fu']  }}</b></td>
                <td><b>{{  $value['data'][63]['sum_fu']  }}</b></td>
                <td><b>{{  $value['data'][64]['sum_fu']  }}</b></td>
                <td><b>{{  $value['data'][65]['sum_fu']  }}</b></td>
                <td><b>{{  $value['data'][66]['sum_fu']  }}</b></td>
                <td><b>{{  $value['data'][67]['sum_fu']  }}</b></td>
                <td><b>{{  $value['data'][68]['sum_fu']  }}</b></td>
                <td><b>{{  $value['data'][73]['sum_fu']  }}</b></td>
                <td><b>{{  $value['data'][74]['sum_fu']  }}</b></td>
                
                <td><b>{{  $value['data'][53]['sum_cb']  }}</b></td>
                <td><b>{{  $value['data'][54]['sum_cb']  }}</b></td>
                <td><b>{{  $value['data'][55]['sum_cb']  }}</b></td>
                <td><b>{{  $value['data'][56]['sum_cb']  }}</b></td>
                <td><b>{{  $value['data'][57]['sum_cb']  }}</b></td>
                <td><b>{{  $value['data'][58]['sum_cb']  }}</b></td>
                <td><b>{{  $value['data'][59]['sum_cb']  }}</b></td>
                <td><b>{{  $value['data'][60]['sum_cb']  }}</b></td>
                <td><b>{{  $value['data'][61]['sum_cb']  }}</b></td>
                <td><b>{{  $value['data'][62]['sum_cb']  }}</b></td>
                <td><b>{{  $value['data'][63]['sum_cb']  }}</b></td>
                <td><b>{{  $value['data'][64]['sum_cb']  }}</b></td>
                <td><b>{{  $value['data'][65]['sum_cb']  }}</b></td>
                <td><b>{{  $value['data'][66]['sum_cb']  }}</b></td>
                <td><b>{{  $value['data'][67]['sum_cb']  }}</b></td>
                <td><b>{{  $value['data'][68]['sum_cb']  }}</b></td>
                <td><b>{{  $value['data'][73]['sum_cb']  }}</b></td>
                <td><b>{{  $value['data'][74]['sum_cb']  }}</b></td>
            </tr>
            @else
            <tr>
                <td>{{ $value['ekr']['title'] }}</td>
                <td>{{ $value['ekr']['ekr'] }}</td>
                <td>{{  $value['data'][53]['sum_fu']  }}</td>
                <td>{{  $value['data'][54]['sum_fu']  }}</td>
                <td>{{  $value['data'][55]['sum_fu']  }}</td>
                <td>{{  $value['data'][56]['sum_fu']  }}</td>
                <td>{{  $value['data'][57]['sum_fu']  }}</td>
                <td>{{  $value['data'][58]['sum_fu']  }}</td>
                <td>{{  $value['data'][59]['sum_fu']  }}</td>
                <td>{{  $value['data'][60]['sum_fu']  }}</td>
                <td>{{  $value['data'][61]['sum_fu']  }}</td>
                <td>{{  $value['data'][62]['sum_fu']  }}</td>
                <td>{{  $value['data'][63]['sum_fu']  }}</td>
                <td>{{  $value['data'][64]['sum_fu']  }}</td>
                <td>{{  $value['data'][65]['sum_fu']  }}</td>
                <td>{{  $value['data'][66]['sum_fu']  }}</td>
                <td>{{  $value['data'][67]['sum_fu']  }}</td>
                <td>{{  $value['data'][68]['sum_fu']  }}</td>
                <td>{{  $value['data'][73]['sum_fu']  }}</td>
                <td>{{  $value['data'][74]['sum_fu']  }}</td>
                
                <td>{{  $value['data'][53]['sum_cb']  }}</td>
                <td>{{  $value['data'][54]['sum_cb']  }}</td>
                <td>{{  $value['data'][55]['sum_cb']  }}</td>
                <td>{{  $value['data'][56]['sum_cb']  }}</td>
                <td>{{  $value['data'][57]['sum_cb']  }}</td>
                <td>{{  $value['data'][58]['sum_cb']  }}</td>
                <td>{{  $value['data'][59]['sum_cb']  }}</td>
                <td>{{  $value['data'][60]['sum_cb']  }}</td>
                <td>{{  $value['data'][61]['sum_cb']  }}</td>
                <td>{{  $value['data'][62]['sum_cb']  }}</td>
                <td>{{  $value['data'][63]['sum_cb']  }}</td>
                <td>{{  $value['data'][64]['sum_cb']  }}</td>
                <td>{{  $value['data'][65]['sum_cb']  }}</td>
                <td>{{  $value['data'][66]['sum_cb']  }}</td>
                <td>{{  $value['data'][67]['sum_cb']  }}</td>
                <td>{{  $value['data'][68]['sum_cb']  }}</td>
                <td>{{  $value['data'][73]['sum_cb']  }}</td>
                <td>{{  $value['data'][74]['sum_cb']  }}</td>
            </tr>
            @endif
        @endforeach
        <tr>
            <td><b>Итог</b></td>
            <td></td>
            <td><b>{{  $info['total'][53]['sum_fu']  }}</b></td>
            <td><b>{{  $info['total'][54]['sum_fu']  }}</b></td>
            <td><b>{{  $info['total'][55]['sum_fu']  }}</b></td>
            <td><b>{{  $info['total'][56]['sum_fu']  }}</b></td>
            <td><b>{{  $info['total'][57]['sum_fu']  }}</b></td>
            <td><b>{{  $info['total'][58]['sum_fu']  }}</b></td>
            <td><b>{{  $info['total'][59]['sum_fu']  }}</b></td>
            <td><b>{{  $info['total'][60]['sum_fu']  }}</b></td>
            <td><b>{{  $info['total'][61]['sum_fu']  }}</b></td>
            <td><b>{{  $info['total'][62]['sum_fu']  }}</b></td>
            <td><b>{{  $info['total'][63]['sum_fu']  }}</b></td>
            <td><b>{{  $info['total'][64]['sum_fu']  }}</b></td>
            <td><b>{{  $info['total'][65]['sum_fu']  }}</b></td>
            <td><b>{{  $info['total'][66]['sum_fu']  }}</b></td>
            <td><b>{{  $info['total'][67]['sum_fu']  }}</b></td>
            <td><b>{{  $info['total'][68]['sum_fu']  }}</b></td>
            <td><b>{{  $info['total'][73]['sum_fu']  }}</b></td>
            <td><b>{{  $info['total'][74]['sum_fu']  }}</b></td>
            
            <td><b>{{  $info['total'][53]['sum_cb']  }}</b></td>
            <td><b>{{  $info['total'][54]['sum_cb']  }}</b></td>
            <td><b>{{  $info['total'][55]['sum_cb']  }}</b></td>
            <td><b>{{  $info['total'][56]['sum_cb']  }}</b></td>
            <td><b>{{  $info['total'][57]['sum_cb']  }}</b></td>
            <td><b>{{  $info['total'][58]['sum_cb']  }}</b></td>
            <td><b>{{  $info['total'][59]['sum_cb']  }}</b></td>
            <td><b>{{  $info['total'][60]['sum_cb']  }}</b></td>
            <td><b>{{  $info['total'][61]['sum_cb']  }}</b></td>
            <td><b>{{  $info['total'][62]['sum_cb']  }}</b></td>
            <td><b>{{  $info['total'][63]['sum_cb']  }}</b></td>
            <td><b>{{  $info['total'][64]['sum_cb']  }}</b></td>
            <td><b>{{  $info['total'][65]['sum_cb']  }}</b></td>
            <td><b>{{  $info['total'][66]['sum_cb']  }}</b></td>
            <td><b>{{  $info['total'][67]['sum_cb']  }}</b></td>
            <td><b>{{  $info['total'][68]['sum_cb']  }}</b></td>
            <td><b>{{  $info['total'][73]['sum_cb']  }}</b></td>
            <td><b>{{  $info['total'][74]['sum_cb']  }}</b></td>
        </tr>
    </tbody>
</table>    
