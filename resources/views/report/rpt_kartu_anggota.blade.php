<style>
  
   .judul h3,h4,p{
        margin:0;
        text-align: center;
    }
    p{
        padding-bottom:15px;
        margin-bottom: 10px;
        border-bottom: 5px;
        border-bottom: 5px double #000;
    }

    .title{
        background-color: #ccc;
    }

    .text{
        background-color: #e1e5ed;
        width:54%;
        height: 149px;
        border:1px solid #ccc;
        position: absolute;
        top:43.55%;
        left: 200px;   
    }

   h5{  
       margin:5px 15px 10px 10px;
        padding-top:10px;
        font-size:15;
    
  
    }
    
    img{
        border: 1px solid #ccc;
    }
    
</style>
<div class="judul">
<h3>PERPUSTAKAAN Sci-Fi</h3>
<h4>INI(Indonesia Netherland Incorporated)</h4>
<p>Jl Thamrin Madiun, Telp : (007) 02 , www.INI.com , perpus@ini.com</p>
</div>

<div class="text">
<h5>No. Anggota   : {{ $anggota->no_anggota }} </h5>
<h5>Nama          : {{ $anggota->nama }} </h5>
<h5>Alamat        : {{ $anggota->alamat }} </h5>
<h5>E-mail        : {{ $anggota->email }} </h5>
</div>

<img src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(150)->color(31, 42, 66)->generate($anggota->no_anggota) ) }}">