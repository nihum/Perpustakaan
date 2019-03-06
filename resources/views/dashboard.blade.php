@extends('template')

@section('judul')
Dashboard
@stop

@section('ac-dash')
active
@stop

@section('subjudul')
The future is not where my dream is
@stop

@section('content')
<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-red">
      <span class="info-box-icon"><i class="fa fa-star-o"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">{{ $pinjam_banyak[0]->nama }}</span>
        <span class="info-box-number">{{ $pinjam_banyak[0]->jumlah }} Buku</span>
        <div class="progress">
          <div class="progress-bar" style="width:{{ $pinjam_banyak[0]->jumlah }}%"></div>
        </div>
            <span class="progress-description">
            Pinjam buku terbanyak
            </span>
      </div>
      <!-- /.info-box-content -->
    </div> 
      <!-- /.info-box  -->
  </div> 

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-yellow">
      <span class="info-box-icon"><i class="fa fa-users"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Anggota</span>
        <span class="info-box-number">{{ $anggota[0]->jumlah }} Anggota</span>

        <div class="progress">
          <div class="progress-bar" style="width: {{ $anggota[0]->jumlah }}%"></div>
        </div>
            <span class="progress-description">
              Anggota Saat Ini
            </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-aqua">
      <span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Jumlah Peminjam</span>
        <span class="info-box-number">{{ $jmlh_pinjam[0]->jumlah }} <i class="fa fa-user"></i></span>

        <div class="progress">
          <div class="progress-bar" style="width: {{ $jmlh_pinjam[0]->jumlah }}%"></div>
        </div>
            <span class="progress-description" id="bulan">
              
            </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-aqua">
      <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">{{ $p_bulan[0]->nama }}</span>
        <span class="info-box-number">{{ $p_bulan[0]->jumlah }}</span>

        <div class="progress">
          <div class="progress-bar" style="width: {{$p_bulan[0]->jumlah}}%"></div>
        </div>
            <span class="progress-description" >
              pinjam banyak/bulan
            </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>

  <div class="content">
    <div class="row">
      <div class="col-xs-12">
            <!-- interactive chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Pelengkap supaya Area Chart penuh</h3>

              <div class="box-tools pull-right">
                Real time
                <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                  <button type="button" class="btn btn-default btn-xs active" data-toggle="on">On</button>
                  <button type="button" class="btn btn-default btn-xs" data-toggle="off">Off</button>
                </div>
              </div>
            </div>
            <div class="box-body">
              <div id="interactive" style="height: 300px;"></div>
            </div>
            <!-- /.box-body-->
          </div>
            <!-- /.box -->

      </div>
        <!-- /.col -->
    </div>
  </div>

  <script>
var month = new Array();
month[0] = "Januari";
month[1] = "Februari";
month[2] = "Maret";
month[3] = "April";
month[4] = "Mei";
month[5] = "Juni";
month[6] = "Juli";
month[7] = "Agustus";
month[8] = "September";
month[9] = "Oktober";
month[10] = "November";
month[11] = "Desember";

var d = new Date();
var m = month[d.getMonth()];
document.getElementById("bulan").innerHTML = m;

</script>

<script>
$(function(){
/*
     * Flot Interactive Chart
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // be fetched from a server
    var data = [], totalPoints = 100

    function getRandomData() {

      if (data.length > 0)
        data = data.slice(1)

      // Do a random walk
      while (data.length < totalPoints) {

        var prev = data.length > 0 ? data[data.length - 1] : 50,
            y    = prev + Math.random() * 10 - 5

        if (y < 0) {
          y = 0
        } else if (y > 100) {
          y = 100
        }

        data.push(y)
      }

      // Zip the generated y values with the x values
      var res = []
      for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]])
      }

      return res
    }

    var interactive_plot = $.plot('#interactive', [getRandomData()], {
      grid  : {
        borderColor: '#f3f3f3',
        borderWidth: 1,
        tickColor  : '#f3f3f3'
      },
      series: {
        shadowSize: 0, // Drawing is faster without shadows
        color     : '#3c8dbc'
      },
      lines : {
        fill : true, //Converts the line chart to area chart
        color: '#3c8dbc'
      },
      yaxis : {
        min : 0,
        max : 100,
        show: true
      },
      xaxis : {
        show: true
      }
    })

    var updateInterval = 500 //Fetch data ever x milliseconds
    var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
    function update() {

      interactive_plot.setData([getRandomData()])

      // Since the axes don't change, we don't need to call plot.setupGrid()
      interactive_plot.draw()
      if (realtime === 'on')
        setTimeout(update, updateInterval)
    }

    //INITIALIZE REALTIME DATA FETCHING
    if (realtime === 'on') {
      update()
    }
    //REALTIME TOGGLE
    $('#realtime .btn').click(function () {
      if ($(this).data('toggle') === 'on') {
        realtime = 'on'
      }
      else {
        realtime = 'off'
      }
      update()
    })
    /*
     * END INTERACTIVE CHART
     */
})
</script>

<style>
  .carosel{
    padding-top:35px;
    margin:10px;
  }
  .box{
    border-radius:7px;
    box-shadow:2px 2px 10px rgb(22, 22, 22);
  }
  .story{
    margin:10px;
  }
</style>
  <!-- START ACCORDION & CAROUSEL-->
  <h2 class="page-header">Perpustakaan online</h2>
<div class="container-fluid">
<div class="box box-danger">
<div class="row">
  <div class="story">
  <div class="col-md-6">
    <div class="box box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Perpus</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="box-group" id="accordion">
          <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
          <div class="panel box box-primary">
            <div class="box-header with-border">
              <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                  Perkembangan teknologi
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
              <div class="box-body">
              <h1>Perkembangan teknologi informasi dan komunikasi</h1> membawa banyak perubahan di berbagai bidang. Baik itu corporate maupun lembaga yang bergerak di bidang jasa. Teknologi informasi dan komunikasi merubah aktivitas menjadi cepat, akurat dan fleksibel. Sebagai dampak dari perkembangan teknologi informasi dan komunikasi yang begitu cepat, telah membawa fenomena pergeseran orientasi kebutuhan pengguna akan informasi berbasis teknologi informasi. Lingkungan yang selalu berubah, mempengaruhi gaya hidup pengguna. Hal ini jelas mempengaruhi jenis produk yang diinginkan pengguna. Untuk itu perpustakaan sebagai lembaga yang bergerak di bidang jasa informasi, perlu melakukan inovasi berbasis kebutuhan pengguna informasi. Bila dahulu fungsi perpustakaan lebih berkonsentrasi pada penyediaan informasi dalam bentuk fisik seperti dokumen tercetak dengan dilengkapi sistem katalog kartu, maka kini dengan berkembangnya teknologi informasi perpustakaan dituntut menyediakan sumber-sumber informasi dalam bentuk elektronik. Dengan harapan ke depan penyebaran informasi dapat terakses melalui internet dengan informasi yang realtime (pada saat itu juga), sehingga pengguna akan mendapatkan kepuasan layanan yang beragam secara relevan, akurat, dan cepat. Dengan kata lain right users, right information, right now, and free.
              </div>
            </div>
          </div>
          <div class="panel box box-danger">
            <div class="box-header with-border">
              <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                  Masalah
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
              <div class="box-body">
              <h1>B. Permasalahan</h1>
                Bagaimana informasi dilayankan untuk kepuasan semua segmen? Akrabkah kita dengan istilah-istilah e-Commerce, e-Banking, e-Learning, e-Government, e-Mail dan sebagainya. Huruf “E” disini mengacu pada kata “Electronic”. Bagaimana dengan e-Library, e-Books, e-Journal, e-bibliografi (OPAC) ? saat ini segala macam informasi bisa kita dapatkan hanya dengan sekali ”klik” melalui huruf ”E” tersebut. Halaman demi halaman kertas akan berubah wajah ke format digital. Melalui kemasan informasi berbasis web terciptalah apa yang disebut sebagai perpustakaan elektronik, perpustakaan digital, perpustakaan virtual, perpustakaan maya yang mana pada intinya di sini pengguna bisa mendapatkan informasi melalui web, (wujud bangunan tidak lagi penting). Perpustakaan haruslah bisa menjembatani kebutuhan bacaan yang bagus dan berkualitas dengan target memberikan kepuasan membaca bagi para professional, mahasiswa dan masyarakat umum secara gratis.
              </div>
            </div>
          </div>
          <div class="panel box box-success">
            <div class="box-header with-border">
              <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                  Collapsible Group Success
                </a>
              </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
              <div class="box-body">
              Buku adalah kumpulan kertas atau bahan lainnya yang dijilid menjadi satu pada salah satu ujungnya dan berisi tulisan atau gambar. Setiap sisi dari sebuah lembaran kertas pada buku disebut sebuah halaman.
Seiring dengan perkembangan dalam bidang dunia informatika, kini dikenal pula istilah e-book atau buku-e (buku elektronik), yang mengandalkan perangkat seperti komputer meja, komputer jinjing, komputer tablet, telepon seluler dan lainnya, serta menggunakan perangkat lunak tertentu untuk membacanya.
Dalam bahasa Indonesia terdapat kata kitab yang diserap dari bahasa Arab (كتاب), yang memiliki arti buku. Kemudian pada penggunaan kata tersebut, kata kitab ditujukan hanya kepada sebuah teks atau tulisan yang dijilid menjadi satu. Biasanya kitab merujuk kepada jenis tulisan kuno yang mempunyai ketetapan hukum, atau dengan kata lain merupakan undang-undang yang mengatur. Istilah kitab biasanya digunakan untuk menyebut karya sastra para pujangga pada masa lampau yang dapat dijadikan sebagai bukti sejarah untuk mengungkapkan suatu peristiwa masa lampau seperti halnya kitab suci. Kerajaan-kerajaan di Nusantara pada masa lampau memberi kedudukan yang penting bagi para pujangga untuk menceritakan kehidupan dan kekuasaan raja-raja pada waktu itu untuk diriwayatkan dengan cara ditulis.
              </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.box-body -->
    </div><!-- /.box --> 
  </div><!-- /.col -->
  <div class="carosel">
  <div class="col-md-6">
    <div class="box box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Carousel</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
            <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
            <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
            <li data-target="#carousel-example-generic" data-slide-to="4" class=""></li>
          </ol>
          <div class="carousel-inner">
            <div class="item active">
              <img src="img/slide1.jpg" alt="First slide" style="height:300px !important; width:500px !important; border-radius: 10px">

              <div class="carousel-caption">
                First Slide
              </div>
            </div>
            <div class="item">
              <img src="img/slide2.jpg" alt="Second slide"style="height:300px !important; width:500px !important; border-radius: 10px">

              <div class="carousel-caption">
                Second Slide
              </div>
            </div>
            <div class="item">
              <img src="img/slide3.jpg" alt="Third slide"style="height:300px !important; width:500px !important;border-radius: 10px">

              <div class="carousel-caption">
                Third Slide
              </div>
            </div>
            <div class="item">
              <img src="img/slide4.jpg" alt="Fourth slide"style="height:300px !important; width:500px !important;border-radius: 10px">

              <div class="carousel-caption">
                fourth Slide
              </div>
            </div>
            <div class="item">
              <img src="img/slide5.jpg" alt="five slide"style="height:300px !important; width:500px !important;border-radius: 10px">

              <div class="carousel-caption">
                fifth Slide
              </div>
            </div>
          </div>
          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="fa fa-angle-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="fa fa-angle-right"></span>
          </a>
       </div>
     </div>
    </div><!-- /.box-body -->
         
  </div><!-- /.box --> 
 </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- box danger-->
</div><!-- container-->
<li>
              <i class="fa fa-camera bg-purple"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                <h3 class="timeline-header"><a href="#"> Lee</a> uploaded new photos</h3>

                <div class="timeline-body">
                <img id="avatar" src="{{ asset('img/buku1.jpg') }}" style="width:25%;border: 2px solid #ccc;">
                <img id="avatar" src="{{ asset('img/buku2.jpg') }}" style="width:25%;border: 2px solid #ccc;">
                <img id="avatar" src="{{ asset('img/buku3.jpg') }}" style="width:25%;border: 2px solid #ccc;">
               
                </div>
              </div>
            </li>
            <li>
              <i class="fa fa-video-camera bg-maroon"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 5 days ago</span>

                <h3 class="timeline-header"><a href="#">Mr. Doe</a> shared a video</h3>

                <div class="timeline-body">
                  <div class="embed-responsive embed-responsive-16by9">
                  <iframe width="686" height="386" src="https://www.youtube.com/embed/eTpJ7VeUA6A" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                  </div>
                </div>
                <div class="timeline-footer">
                  <a href="#" class="btn btn-xs bg-maroon">See comments</a>
                </div>
              </div>
            </li>
@stop
