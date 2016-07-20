@extends('layouts.layout')

@section('header')
    @include('header.header')
@endsection


@section('sidebar')
    @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2)
        @include('menu.menuadmin', array('servicios'=>'active'))
    @else
        @if (Auth::user()->inquilino == 0)
            @include('menu.menuuser', array('servicios'=>'active'))
        @else
            @include('menu.menuinqui', array('servicios'=>'active'))
        @endif
    @endif
@endsection

@section('wrapper')

<section id="content_wrapper">
      <!-- Start: Topbar -->
      <header id="topbar" class="alt" style=" min-height: 10px;padding: 10px 10px; ">
        <div class="topbar-left">
          <ol class="breadcrumb">
            <li class="crumb-icon">
              <a href="{{route('home')}}">
                <span class="glyphicon glyphicon-home"></span>
              </a>
            </li>
            <li class="crumb-trail">Galería de Servicios</li>
          </ol>
        </div>
      </header>
      <!-- End: Topbar -->

      <!-- Begin: Content -->
      <section id="content" class="table-layout animated fadeIn">
        <!-- begin: .tray-center -->
        <div class="tray tray-center">
          <div class="mw1200 center-block">
            <!-- Begin: Admin Form -->
              <div class="panel heading-border  panel-dark">
                  <div class="gridster" style="margin: 10px">
                      <ul>
                          <li data-row="1" data-col="1" data-sizex="2" data-sizey="1">
                            <img src=" {{ URL::asset('galeria/grid1.jpg') }}" width="100%" height="100%">
                          </li>
                          <li data-row="2" data-col="1" data-sizex="1" data-sizey="1">
                              <img src=" {{ URL::asset('galeria/grid2.jpg') }}" width="100%" height="100%">
                          </li>
                          <li data-row="3" data-col="1" data-sizex="1" data-sizey="1">
                              <img src=" {{ URL::asset('galeria/grid3.jpg') }}" width="100%" height="100%">
                          </li>

                          <li data-row="1" data-col="2" data-sizex="1" data-sizey="1">
                              <img src=" {{ URL::asset('galeria/grid4.jpg') }}" width="100%" height="100%">
                          </li>
                          <li data-row="2" data-col="2" data-sizex="1" data-sizey="1">
                              <img src=" {{ URL::asset('galeria/grid5.jpg') }}" width="100%" height="100%">
                          </li>
                          <li data-row="3" data-col="2" data-sizex="1" data-sizey="1">
                              <img src=" {{ URL::asset('galeria/grid6.jpg') }}" width="100%" height="100%">
                          </li>

                          <li data-row="1" data-col="3" data-sizex="1" data-sizey="1">
                              <img src=" {{ URL::asset('galeria/grid7.png') }}" width="100%" height="100%">
                          </li>
                          <li data-row="2" data-col="3" data-sizex="1" data-sizey="1">
                              <img src=" {{ URL::asset('galeria/grid8.png') }}" width="100%" height="100%">
                          </li>
                          <li data-row="3" data-col="3" data-sizex="1" data-sizey="1">
                              <img src=" {{ URL::asset('galeria/grid9.jpg') }}" width="100%" height="100%">
                          </li>

                      </ul>
                  </div>
              </div>
          </div>
        </div>
        <!-- end: .tray-center -->
      </section>
      <!-- End: Content -->
    <!-- Begin: Page Footer -->
    <footer id="content-footer" class="affix" style="z-index: 10;margin-left: 0px;">
        <div class="row">
            <div class="col-md-6">
                <span class="footer-legal">© 2016 Sistema de Condominio</span>
            </div>
            <div class="col-md-6 text-right">
                <span class="footer-meta">Creado por <b>PubliRed24</b>  </span>
                <a href="#content" class="footer-return-top">
                    <span class="fa fa-arrow-up"></span>
                </a>
            </div>
        </div>
    </footer>
    <!-- End: Page Footer -->
</section>


@endsection

@section('scripts')
    <link rel="stylesheet" type="text/css" href="vendor/plugins/gridster/css/jquery.gridster.css">
    <link rel="stylesheet" type="text/css" href="vendor/plugins/gridster/css/styles.css">
  <!-- jQuery -->
  <script src="{{ URL::asset('vendor/jquery/jquery-1.11.1.min.js') }}"></script>
  <script src="{{ URL::asset('vendor/jquery/jquery_ui/jquery-ui.min.js') }}"></script>

    <script src="vendor/plugins/gridster/jquery.gridster.js"></script>
  <!-- Theme Javascript -->
  <script src="{{ URL::asset('assets/js/utility/utility.js') }}"></script>
  <script src="{{ URL::asset('assets/js/demo/demo.js') }}"></script>
  <script src="{{ URL::asset('assets/js/main.js') }}"></script>

  <script type="text/javascript">
  jQuery(document).ready(function() {

      "use strict";

      var gridster;

      $(function() {
          gridtster = $(".gridster > ul").gridster({
              widget_margins: [10, 10],
              widget_base_dimensions: [360, 360],
              min_cols: 3
          }).data('gridster');
      });

  });
  </script>
@endsection
