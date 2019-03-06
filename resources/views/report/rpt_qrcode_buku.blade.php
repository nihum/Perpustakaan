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
    $count = count($buku);
@endphp


<table>
@foreach($buku as $rsBuku)

@if($i%6==1)
    <tr>
@endif
        <td width="20%"><img src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(150)->color(41,41,97)->generate($rsBuku->no_induk_buku) ) }}">
        <p>{{ $rsBuku->no_induk_buku }}</p>
        </td>
@if(($i%6)==0 || $i==$count )
    </tr>
@endif

@php
$i++;
@endphp

@endforeach
</table>
