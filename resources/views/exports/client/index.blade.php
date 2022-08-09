@php
    {{ $i=0; }}
@endphp
<table>
    <thead>
    <tr>
        <th style="border: 1px solid black; background: green;">№</th>
        <th style="border: 1px solid black; background: green;">Наименование</th>
        <th style="border: 1px solid black; background: green;">Дата контракта</th>
        <th style="border: 1px solid black; background: green;">Цена поставки</th>
        <th style="border: 1px solid black; background: green;">Регион</th>
    </tr>
    </thead>
    <tbody>
    @foreach($clients as $client)
        <tr>
            <td style="border: 1px solid black">{{ ++$i }}</td>
            <td style="border: 1px solid black">{{ $client->title }}</td>
            <td style="border: 1px solid black">{{ $client->contract_date }}</td>
            <td style="border: 1px solid black">{{ $client->cost_deliveries }}</td>
            <td style="border: 1px solid black">{{ $client->region }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
