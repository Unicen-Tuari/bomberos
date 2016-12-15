@extends('layouts.app')

@section('content')
<article>
  @if (!Auth::guest())
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-home" aria-hidden="true"></span>
      <h4>Inicio</h4>
    </div>
    {{-- {{$actual_link = "$_SERVER[REQUEST_URI]"}} --}}
    <div class="panel-body">
      <div id="carouselHome" class="col-xs-10 col-xs-offset-1">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="./assets/images/carousel.jpg" alt="Chania">
            </div>

            <div class="item">
              <img src="./assets/images/carousel.jpg" alt="Chania">
            </div>

            <div class="item">
              <img src="./assets/images/carousel.jpg" alt="Flower">
            </div>
          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>
  </div>
  @endif
</article>
@endsection
