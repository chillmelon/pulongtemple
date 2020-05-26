@extends("projects.project")

@section("summary")

{{-- min-summary --}}
<div class="container-fluid top-content">
  <div class="row top-img">
    <!-- image_main -->
    <div class="imgbox img-main img-min col-sm-6 col-md-6 col-lg-6 ">
      <div class="imgbox-inner">
        <div class="image" style="background-image: url('{{asset('image/pulongTemple.png')}}');"></div>
      </div>
    </div>
    <!-- intro -->
    <iv class="intro col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 ">
      <!-- title -->
      <div class="title">
        <h4>
          <b>埔隆宮-炭烤土司大王</b>
          <br>
          <small> by Pulong Temple</small>
        </h4>
        <hr class="style-eight">
      </div>
      <!-- status -->
      <div class="row status">
        <!-- goal -->
        <div class="goal col-6 col-sm-8 col-lg-6">
          <h5><b>NT$6,700</b></h5>
          <small>目標 NT$100,00</small>
          <hr class="new" color="#8C8C8C">
          <h5>3 <small>人贊助</small></h5>
          <hr class="new" color="#8C8C8C">
          <h5>2 <small>天剩餘</small></h5>
        </div>
      </div>
  </div>
</div>

@endsection