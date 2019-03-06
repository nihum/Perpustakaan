<style>
    table{
        width:100%;
    }
    table td{
        text-align:center;
    }
</style>

@php
    $i = 1;
    $count = count($anggota);
@endphp


<table>
@foreach($anggota as $rsAngg)

@if($i%6==1)
    <tr>
@endif
        <td width="20%"><img src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(150)->color(41,41,97)->generate($rsAngg->no_anggota) ) }}">
        <p>{{ $rsAngg->no_anggota }}</p>
        </td>
@if(($i%6)==0 || $i==$count )
    </tr>
@endif

@php
$i++;
@endphp

@endforeach
</table>
