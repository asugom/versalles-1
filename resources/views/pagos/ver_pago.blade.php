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
  <!-- jQuery -->
  <script src="{{ URL::asset('vendor/jquery/jquery-1.11.1.min.js') }}"></script>
  <script src="{{ URL::asset('vendor/jquery/jquery_ui/jquery-ui.min.js') }}"></script>

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

    <!-- PNotify -->
  <script src="{{ URL::asset('vendor/plugins/pnotify/pnotify.custom.min.js') }}"></script>

  <script type="text/javascript">
  PNotify.prototype.options.styling = "bootstrap3";
  jQuery(document).ready(function() {

    "use strict";
    // Init Demo JS
    Demo.init();
    // Init Theme Core
    Core.init();
    $('input[type=radio][name=optradio]').filter('[value=1]').prop('checked', true);
      
    function format ( d ) {
      // `d` is the original data object for the row
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
          (($('input[type=radio][name=optradio]:checked').val() == 1) ?
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
    

  });

  function myFunction(recibo, id, opt) {
    var title = '';
    var text = '';

    switch (opt){
      case 1: title = 'Aprobar pagos';
              text = 'Aprobar el pago #'+recibo+'?';
              break;
      case 2: title= 'Rechazar pagos';
              text = 'Rechazar el Pago #'+recibo+'?';
              break;
      // case 3: title= 'Aprobar pago';
      //         text = 'Aprobar el Pago #'+recibo+' y agregar deuda por mora?';
      //         break;
      default: title= '';
               text = '';
    }

    new PNotify({
      title: title,
      text: text,
      icon: 'glyphicon glyphicon-question-sign',
      hide: false,
      confirm: {
          confirm: true,
          buttons: [{
            text: 'Aceptar',
            addClass: 'btn-primary',
            click: function(notice) {
              notice.remove();
              var url  = '{!! route('update_pago') !!}';
              var post = {};
              post.id  = id;
              post.opt = opt;

              $.ajax({
                url: url,
                type: "POST",
                data: {'id': post.id, 'opt': post.opt, '_token': $('input[name=_token]').val()},
                success: function(data){

                new PNotify({
                    title: 'Resultado de la operación.',
                    text: data.msg,
                    type: data.type
                });

                currentSource = "{!! route('index_pago') !!}";
                var table = $('#datatable9').DataTable();
                table.ajax.url(currentSource).load();

                console.log(data);
                }
              });
            }
          }, {
            text: 'Cancelar',
            addClass: 'btn-primary',
            click: function(notice) {
                notice.remove();
            }
          }]
      },
      
      buttons: {
          closer: false,
          sticker: false
      },
      history: {
          history: false
      },
      addclass: 'stack-modal',
      stack: {
          'dir1': 'down',
          'dir2': 'right'
      }
    });
    // .get().on('pnotify.confirm', function(){
    //     alert('Ok, cool.');
    // }).on('pnotify.cancel', function(){
    //     alert('Oh ok. Chicken, I see.');
    // });
  }

  

  </script>
@endsection