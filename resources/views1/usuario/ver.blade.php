@extends('layouts.layout')

@section('header')
    @include('header.header')
@endsection


@section('sidebar')
    @include('menu.menuadmin', array('usuario'=>'active'))
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
      <!-- Start: Topbar -->
      <header id="topbar" class="alt">
        <div class="topbar-left">
          <ol class="breadcrumb">
            <li class="crumb-icon">
              <a href="dashboard.html">
                <span class="glyphicon glyphicon-home"></span>
              </a>
            </li>
            <li class="crumb-trail">Listar usuarios</li>
          </ol>
        </div>
      </header>
      <!-- End: Topbar -->
    <input type="hidden" id="message" value="{{ $status or ' ' }}">
      <!-- Begin: Content -->
      <section id="content" class="table-layout animated fadeIn">

        <!-- begin: .tray-center -->
        <div class="tray tray-center">
            <div class="col-md-12">
                <div class="panel panel-visible" id="spy2">
                    <div class="panel-heading">
                        <div class="panel-title hidden-xs">
                            <span class="glyphicon glyphicon-tasks"></span>Listado de usuario registrados</div>
                    </div>
                    <div class="panel-body pn">
                        <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Celular</th>
                                <th>Telefono</th>
                                <th>Lote</th>
                                <th>Usuario</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($usuarios as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->mobilenumber}}</td>
                                    <td>{{$user->phonenumber}}</td>
                                    <td>{{$user->homenumber}}</td>
                                    @if ($user->id_role==0)
                                        <td>Usuario</td>
                                    @elseif ($user->id_role==1)
                                        <td>Administrador</td>
                                    @else
                                        <td>SuperAdmin</td>
                                    @endif

                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
        <!-- end: .tray-center -->
      </section>
      <!-- End: Content -->
    <!-- Begin: Page Footer -->
    <footer id="content-footer" class="affix" style="z-index: 100">
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

  <!-- jQuery Validate Plugin-->
  <script src="{{ URL::asset('assets/admin-tools/admin-forms/js/jquery.validate.min.js') }}"></script>

  <!-- jQuery Validate Addon -->
  <script src="{{ URL::asset('assets/admin-tools/admin-forms/js/additional-methods.min.js') }}"></script>

  <!-- Theme Javascript -->
  <script src="{{ URL::asset('assets/js/utility/utility.js') }}"></script>
  <script src="{{ URL::asset('assets/js/demo/demo.js') }}"></script>
  <script src="{{ URL::asset('assets/js/main.js') }}"></script>

  <!-- PNotify -->
  <script src="{{ URL::asset('vendor/plugins/pnotify/pnotify.js') }}"></script>

  <!-- Widget Javascript -->
  <script src="{{ URL::asset('assets/js/demo/widgets.js') }}"></script>
  <script type="text/javascript">
  jQuery(document).ready(function() {

    "use strict";

    // Init Demo JS
    Demo.init();

    // Init Theme Core
    Core.init();

    // Init DataTables

    $('#datatable2').dataTable({
      "aoColumnDefs": [
          {
            'bSortable': false,
            'aTargets': [-1]
          },
          {
          "targets": [0],
          "visible": false,
          "searchable": false
          }
      ],
      "oLanguage": {
          "oPaginate": {
              "sPrevious": "<",
              "sNext": ">"
          },
          "sSearch": "Buscar:"

      },
      "iDisplayLength": 25  ,
      "aLengthMenu": [
          [5, 10, 25, 50, -1],
          [5, 10, 25, 50, "Todos"]
      ],
      "sDom": '<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>',
      "oTableTools": {
          "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
      }
    });

    // Add Placeholder text to datatables filter bar
    $('.dataTables_filter input').attr("placeholder", "Enter Terms...");

    if ($("#message").val()!=' ') {

          var Stacks = {
              stack_top_right: {
                  "dir1": "down",
                  "dir2": "left",
                  "push": "top",
                  "spacing1": 10,
                  "spacing2": 10
              }
          }

          // Create new Notification
          new PNotify({
              title: 'Aviso',
              text: 'Usuario creado con exito! ^_^',
              shadow: "true",
              opacity: "1",
              addclass: "stack_top_right",
              type: "success",
              stack: Stacks["stack_top_right"],
              width: "290px",
              delay: 1400
          });
      }

  });
  </script>
@endsection
