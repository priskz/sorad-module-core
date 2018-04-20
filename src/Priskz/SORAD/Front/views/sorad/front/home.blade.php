@extends(Config::get('sorad.front.view.prefix') . 'front.layout.no-col-bootstrap')

@section('view-styles')
<!-- View Styles -->
@stop

@section('main-inner')
<div class="row">
    <div class="col">
        <div id="carouselExampleIndicators" class="carousel" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block image-fluid w-100" src="http://placehold.it/1110x500" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block image-fluid w-100" src="http://placehold.it/1110x500" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block image-fluid w-100" src="http://placehold.it/1110x500" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>
</div>
@stop

@section('view-scripts')
<!-- View Scripts -->
@stop