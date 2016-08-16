@extends('layouts.layout')

@section('header')
    @include('header.header')
@endsection


@section('sidebar')
    @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2)
        @include('menu.menuadmin', array('pagos'=>'active'))
    @else
        @include('menu.menuuser', array('pagos'=>'active'))
    @endif
@endsection

@section('wrapper')

<section id="content_wrapper">
	  <!-- CSS page -->
    <!-- Datatables CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/datatables/media/css/dataTables.bootstrap.css') }}">
    <!-- Datatables Editor Addon CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/datatables/extensions/Editor/css/dataTables.editor.css') }}">
    <!-- Datatables ColReorder Addon CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/animate/animate_2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/pnotify/pnotify.custom.min.css') }}">
    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/magnific/magnific-popup.css') }}">



    <!-- Start: Topbar -->
    <header id="topbar" class="alt" style=" min-height: 10px;padding: 10px 10px; ">
      <div class="topbar-left">
        <ol class="breadcrumb">
          <li class="crumb-icon">
            <a href="{{route('home')}}">
              <span class="glyphicon glyphicon-home"></span>
            </a>
          </li>
          <li class="crumb-trail">Ver recibos de pago</li>
          
        </ol>
      </div>
    </header>
    <!-- End: Topbar -->
          <input type="hidden" id="success" value="{{ Session::get('success') }}">
          <input type="hidden" id="danger" value="{{ Session::get('danger') }}">

     <!-- Admin Form Popup -->
        <div id="modal-form" class=" popup-basic admin-form mfp-with-anim mfp-hide">
          <div class="panel">
            <div class="panel-heading">
              <span class="panel-title">
                <i class="fa fa-rocket"></i>Aprobar Pago</span>
            </div>
            <!-- end .panel-heading section -->
            <form method="post" action="/" id="aprobar">
              <div class="panel-body p25">
                <div class="section row">
                  <div class="col-md-12" id="div_recibo">
                    <h3 class="mt5" id="texto-recibo"></h3>
                  </div>
                  <div class="col-md-12">
                    <hr class="short alt">
                    <label for="fecha" class="field prepend-icon">
                      <input type="text" name="fecha" id="fecha" class="gui-input" placeholder="Fecha">
                      <label for="fecha" class="field-icon">
                        <i class="fa fa-calendar"></i>
                      </label>
                    </label>
                  </div>
                  <!-- end section -->
                </div>
                <!-- end section row section -->
              </div>
              <!-- end .form-body section -->
              <div class="panel-footer">
                <button type="submit" class="button btn-primary">Aprobar</button>
              </div>
              <!-- end .form-footer section -->
            </form>
          </div>
          <!-- end: .panel -->
        </div>
        <!-- end: .admin-form -->

        <!-- Admin Form Popup -->
        <div id="rechazar-form" class=" popup-basic admin-form mfp-with-anim mfp-hide">
          <div class="panel">
            <div class="panel-heading">
              <span class="panel-title">
                <i class="fa fa-rocket"></i>Rechazar Pago</span>
            </div>
            <!-- end .panel-heading section -->
            <form method="post" action="/" id="rechazar">
              <div class="panel-body p25">
                <div class="section row">
                  <div class="col-md-12" id="div_recibo_r">
                    <h3 class="mt5" id="texto-recibo-r"></h3>
                  </div>
                  <div class="section">
                  <label for="comment" class="field prepend-icon">
                    <textarea class="gui-textarea" id="comment" name="comment" placeholder="Motivo del pago"></textarea>
                    <label for="comment" class="field-icon">
                      <i class="fa fa-comments"></i>
                    </label>
                    <span class="input-footer">
                      Introduzca motivo de rechazo...</span>
                  </label>
                </div>
                  <!-- end section -->
                </div>
                <!-- end section row section -->
              </div>
              <!-- end .form-body section -->
              <div class="panel-footer">
                <button type="submit" class="button btn-primary">Rechazar</button>
              </div>
              <!-- end .form-footer section -->
            </form>
          </div>
          <!-- end: .panel -->
        </div>
        <!-- end: .admin-form -->

      <!-- Begin: Content -->
      <section id="content" class="table-layout animated fadeIn">
          <input type="hidden" name="_token" value="{{ Session::token() }}">
        <!-- begin: .tray-center -->
        <div class="tray tray-center" style="width: 100%;">
          <div class="col-md-12">
            <div class="panel-body bg-light">
              <div class="panel-heading">
                <div class="panel-title">
                  <span class="glyphicon glyphicon-tasks"></span>Listado de pagos registrados</div>
                </div>
              <div class="option-group field">
                @foreach($estado as $value)
                  <label class="radio-inline"><input type="radio" name="optradio" value="{{ $value->id }}" >{{ $value->name }}</label>
                @endforeach
              </div>
            </div>
            <div class="panel panel-visible" id="spy2">
                <!-- <div class="panel-heading">
                    <div class="panel-title hidden-xs">
                        <span class="glyphicon glyphicon-tasks"></span>Listado de pagos pendientes registrados
                    </div>
                </div> -->

                <div class="panel-body pn">
                    <table class="table table-hover" id="datatable9" cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th></th>
                              <th>Nombre</th>
                              <th>Numero</th>
                              <th>Recibo</th>
                              <th>Fecha</th>
                              <th>Monto</th>
                          </tr>
                      </thead>
                      <tfoot>
                          <tr>
                              <th></th>
                              <th>Nombre</th>
                              <th>Numero</th>
                              <th>Recibo</th>
                              <th>Fecha</th>
                              <th>monto</th>
                          </tr>
                      </tfoot>
                      
                    </table>
                </div>

            </div>
          </div>

         


        </div>
        <!-- end: .tray-center -->

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
  <link rel="stylesheet" type="text/css" href="vendor/plugins/datepicker/css/bootstrap-datetimepicker.css">
  <!-- jQuery -->
  <script src="{{ URL::asset('vendor/jquery/jquery-1.11.1.min.js') }}"></script>
  <script src="{{ URL::asset('vendor/jquery/jquery_ui/jquery-ui.min.js') }}"></script>
    <!-- DateTime Plugin -->
  <script src="{{ URL::asset('vendor/plugins/globalize/globalize.min.js') }}"></script>
  <script src="{{ URL::asset('vendor/plugins/moment/moment.min.js') }}"></script>
  <script src="{{ URL::asset('vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

  <!-- Datatables -->
  <script src="{{ URL::asset('vendor/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>

  <!-- Datatables Tabletools addon -->
  <script src="{{ URL::asset('vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>

  <!-- Datatables ColReorder addon -->
  <script src="{{ URL::asset('vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}"></script>

  <!-- Datatables Bootstrap Modifications  -->
  <script src="{{ URL::asset('vendor/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>
  <!-- Theme Javascript -->
  <script src="{{ URL::asset('assets/js/utility/utility.js') }}"></script>
  <script src="{{ URL::asset('assets/js/demo/demo.js') }}"></script>
  <script src="{{ URL::asset('assets/js/main.js') }}"></script>

    <!-- Page Plugins -->
  <script src="{{ URL::asset('vendor/plugins/magnific/jquery.magnific-popup.js') }}"></script>


    <!-- PNotify -->
  <script src="{{ URL::asset('vendor/plugins/pnotify/pnotify.custom.min.js') }}"></script>

  <script type="text/javascript">
  PNotify.prototype.options.styling = "bootstrap3";
  var sid = 0;
  var sopt = 0;
  jQuery(document).ready(function() {

    "use strict";
    // Init Demo JS
    Demo.init();
    // Init Theme Core
    Core.init();
    
    $('#fecha').datetimepicker({
          format: 'DD/MM/YYYY',
          pickTime: false
    });
    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var output = ((''+day).length<2 ? '0' : '') + day + '/' +
    ((''+month).length<2 ? '0' : '') + month + '/' +
    d.getFullYear();
    $('#fecha').val(output);


    $('input[type=radio][name=optradio]').filter('[value=1]').prop('checked', true);
      
    function format ( d ) {
      // `d` is the original data object for the row
      var role = "{{ (Auth::user()->id_role == 1 || Auth::user()->id_role == 2) ? true : false }}";
      return '<table id="tabla" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
          '<td class="fw600 pr10">Tipo de Pago:</td>'+
          '<td>'+d.tipo+'</td>'+
        '</tr>'+
        '<tr>'+
          '<td class="fw600 pr10">Concepto de Pago:</td>'+
          '<td>'+d.concepto+'</td>'+
        '</tr>'+
        '<tr>'+    
          '<td class="fw600 pr10">Recibo de Pago:</td>'+
          '<td>'+d.recibo+'</td>'+
        '</tr>'+
        '<tr>'+
          '<td>'+
          (($('input[type=radio][name=optradio]:checked').val() == 1 && role == '1') ?
          '<button type="button" id="aprobar" onclick="myFunction('+d.recibo+','+d.id_pago+',1)" class="button btn-success mr10 pull-left">Aprobar</button>'+
          '<button type="button" id="rechazar" onclick="myFunction('+d.recibo+','+d.id_pago+',2)" class="button btn-danger mr10 pull-left">Rechazar</button>'
          : '')
          // '<button type="button" id="aprobar_c" onclick="myFunction('+d.recibo+','+d.id_pago+',3)" class="button btn-warning mr10 pull-left">Aprobar con Mora</button>'+
          +'</td>'+
        '</tr>'+
      '</table>';
    }

      var table = $('#datatable9').DataTable({
      "sDom": 'Rt<"dt-panelfooter clearfix"ip>',
      // "ajax": '{!! route('index_pago') !!}',
      "ajax": {
              "url": "{!! route('index_pago') !!}",
              "data": { "estado": 1 }
      },
      "columns": [
        {
          "className":      'details-control',
          "procesing":      true, 
          "serverside":     true,
          "orderable":      false,
          "data":           null,
          "defaultContent": ''
        },
        { "data": "nombre", name: "nombre"  },
        { "data": "numero", name: "numero" },
        { "data": "recibo", name: "recibo" },
        { "data": "fecha", name: "fecha" },
        { "data": "monto", name: "monto" }
      ],
      "order": [[1, 'asc']]
    });
     
    // Add event listener for opening and closing details
    $('#datatable9 tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = table.row( tr );

      if ( row.child.isShown() ) {
        // This row is already open - close it
        row.child.hide();
        tr.removeClass('shown');
      }
      else {
        // Open this row
        row.child( format(row.data()) ).show();
        tr.addClass('shown');
      }
    });

    $('input[type=radio][name=optradio]').change(function () {
      var dato = this.value;
      table.destroy();
      table = $('#datatable9').DataTable({
        "sDom": 'Rt<"dt-panelfooter clearfix"ip>',
        // "ajax": '{!! route('index_pago') !!}',
        "ajax": {
                "url": "{!! route('index_pago') !!}",
                "data": { "estado": this.value }
        },
        "columns": [
          {
            "className":      'details-control',
            "procesing":      true, 
            "serverside":     true,
            "orderable":      false,
            "data":           null,
            "defaultContent": ''
          },
          { "data": "nombre", name: "nombre"  },
          { "data": "numero", name: "numero" },
          { "data": "recibo", name: "recibo" },
          { "data": "fecha", name: "fecha" },
          { "data": "monto", name: "monto" }
        ],
        "order": [[1, 'asc']]
      });
    });

    $('#aprobar').on('submit', function (event) {
      // body...
      event.preventDefault();
      var url  = '{!! route('update_pago') !!}';
      var post = {};
      post.id = sid;
      post.opt = sopt;
      post.message = '';
      post.fecha = $('#fecha').val();
      $.magnificPopup.close();
      console.log(post);

      $.ajax({
        url: url,
        type: "POST",
        data: {'id': post.id, 
          'opt': post.opt, 
          'fecha': post.fecha, 
          'message': post.message, 
          '_token': $('input[name=_token]').val()
        },
        success: function(data){

          new PNotify({
            title: 'Resultado de la operación.',
            text: data.msg,
            type: data.type
          });

        var currentSource = "{!! route('index_pago') !!}";
        var table = $('#datatable9').DataTable();
        table.ajax.url(currentSource).load();

        console.log(data);
        }
      });

    });

    $('#rechazar-form').on('submit', function (event) {
      // body...
      event.preventDefault();
      var url  = '{!! route('update_pago') !!}';
      var post = {};
      post.id = sid;
      post.opt = sopt;
      post.message = $('#comment').val();
      post.date = '';
      $.magnificPopup.close();
      console.log(post);
      $.ajax({
        url: url,
        type: "POST",
        data: {'id': post.id, 
          'opt': post.opt, 
          'fecha': post.fecha, 
          'message': post.message, 
          '_token': $('input[name=_token]').val()
        },
        success: function(data){

        new PNotify({
            title: 'Resultado de la operación.',
            text: data.msg,
            type: data.type
        });

        var currentSource = "{!! route('index_pago') !!}";
        var table = $('#datatable9').DataTable();
        table.ajax.url(currentSource).load();

        console.log(data);
        }
      });
    });

  });

  function myFunction(recibo, id, opt) {
    var title = '';
    var text = '';


    switch (opt){
      case 1: 
              texto = '<h3 class="mt5" id="texto-recibo">Aprobar el pago con recibo #'+recibo+'?</h3>';
              $('#texto-recibo').remove();
              $('#div_recibo').append(texto);
              sid = id;
              sopt = opt;
              $.magnificPopup.open({
                removalDelay: 500, 
                items: {
                  src: '#modal-form'
                },
                callbacks: {
                  beforeOpen: function(e) {
                    this.st.mainClass = 'mfp-zoomIn';
                  }
                },
                midClick: true 
              });

              break;
      case 2: 
              texto = '<h3 class="mt5" id="texto-recibo-r">Rechazar el pago con recibo #'+recibo+'?</h3>';
              $('#texto-recibo-r').remove();
              $('#div_recibo_r').append(texto);
              sid = id;
              sopt = opt;
              $.magnificPopup.open({
                removalDelay: 500, 
                items: {
                  src: '#rechazar-form'
                },
                callbacks: {
                  beforeOpen: function(e) {
                    this.st.mainClass = 'mfp-zoomIn';
                  }
                },
                midClick: true 
              });

              break;
      // case 3: title= 'Aprobar pago';
      //         text = 'Aprobar el Pago #'+recibo+' y agregar deuda por mora?';
      //         break;
      default: title= '';
               text = '';
    }


  }

  

  </script>
@endsection