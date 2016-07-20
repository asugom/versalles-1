@extends('layouts.layout')

@section('header')
  @include('header.header')
@endsection


@section('sidebar')
  @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2)
    @include('menu.menuadmin', array('usuario'=>'active'))
  @else
    @include('menu.menuuser', array('usuario'=>'active'))
  @endif
@endsection

@section('wrapper')
  <section id="content_wrapper">
    <!-- Start: Topbar -->
    <header id="topbar" class="alt" style=" min-height: 10px;padding: 10px 10px; ">
      <div class="topbar-left">
        <ol class="breadcrumb">
          <li class="crumb-icon">
            <a href="{{ route('home') }}">
              <span class="glyphicon glyphicon-home"></span>
            </a>
          </li>

          <li class="crumb-trail">Editar Usuario:  {{$user->name}}</li>
        </ol>
      </div>
    </header>
    <!-- End: Topbar -->

    <!-- Begin: Content -->
    <section id="content" class="table-layout animated fadeIn">
      <!-- begin: .tray-center -->
      <div class="tray tray-center">
        <div class="mw1000 center-block">
          <!-- Begin: Admin Form -->
          <div class="admin-form  theme-dark">
            <div class="panel heading-border  panel-dark">
              <div class="panel-body bg-light">

                {!! Form::model($user,array('route' => ['profile_edit',$user->id],'method'=>'PUT','id'=>'form')) !!}

                <div class="section-divider mb40" id="spy1">
                  <span>Datos del Usuario</span>
                </div>


                <!-- Input Icons -->
                <div class="row">
                  <div class="col-md-8">
                    <div class="section">
                      <label class="field prepend-icon">
                        {!! Form::text('name', null, array('class' => 'gui-input','placeholder'=>'Nombre y apellido')) !!}
                        <label for="name" class="field-icon">
                          <i class="fa fa-user"></i>
                        </label>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="section row">
                  <div class="col-md-6">
                    <label for="mobile_phone" class="field prepend-icon">
                      {!! Form::text('mobilenumber', null, array('class' => 'gui-input phone-group','placeholder'=>'Celular')) !!}
                      <label for="mobilenumber" class="field-icon">
                        <i class="fa fa-mobile-phone"></i>
                      </label>
                    </label>
                  </div>
                  <!-- end section -->
                  <div class="col-md-6">
                    <label for="home_phone" class="field prepend-icon">
                      {!! Form::text('phonenumber', null, array('class' => 'gui-input phone-group','placeholder'=>'Telefono Casa')) !!}
                      <label for="phonenumber" class="field-icon">
                        <i class="fa fa-phone"></i>
                      </label>
                    </label>
                  </div>
                </div>
                <div class="section row">
                  <div class="col-md-6">
                    <label for="home_phone" class="field prepend-icon">
                      {!! Form::text('homenumber', Auth::user()->lotes->nombre, array('class' => 'gui-input phone-group','readonly'=>'')) !!}
                      <label for="homenumber" class="field-icon">
                        <i class="glyphicon glyphicon-home"></i>
                      </label>
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="section">
                      <label class="field prepend-icon">
                        {!! Form::text('email', null, array('class' => 'gui-input','placeholder'=>'Correo Electronico')) !!}

                        <label for="email" class="field-icon">
                          <i class="fa fa-envelope"></i>
                        </label>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="section">
                      <label class="field prepend-icon">
                        {!! Form::text('emailalt_1', null, array('class' => 'gui-input','placeholder'=>'Email alternativo 1')) !!}

                        <label for="email" class="field-icon">
                          <i class="fa fa-envelope"></i>
                        </label>
                      </label>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="section">
                      <label class="field prepend-icon">
                        {!! Form::text('emailalt_2', null, array('class' => 'gui-input','placeholder'=>'Email alternativo 2')) !!}

                        <label for="email" class="field-icon">
                          <i class="fa fa-envelope"></i>
                        </label>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <button type="submit" class="button btn-primary mr10 pull-right">Cambiar datos</button>
                </div>
                {!! Form::close() !!}

                {!! Form::model($user,array('route' => ['profile_edit',$user->id],'method'=>'PUT','id'=>'form2')) !!}
                <div class="section-divider mv40" id="spy4">
                  <span> Contraseña </span>
                </div>
                <!-- .section-divider -->

                <div class="section">
                  <label for="password" class="field prepend-icon">
                    <input type="password" name="password" id="password" class="gui-input" placeholder="Crear contraseña">
                    <label for="password" class="field-icon">
                      <i class="fa fa-lock"></i>
                    </label>
                  </label>
                </div>
                <!-- end section -->

                <div class="section">
                  <label for="repeatPassword" class="field prepend-icon">
                    <input type="password" name="repeatPassword" id="repeatPassword" class="gui-input" placeholder="Repetir Contraseña">
                    <label for="repeatPassword" class="field-icon">
                      <i class="fa fa-unlock-alt"></i>
                    </label>
                  </label>
                </div>
                <!-- end section -->
                <div class="row">
                  <button type="submit" class="button btn-primary mr10 pull-right">Cambiar contraseña</button>
                </div>
                {!! Form::close() !!}
              </div>
            </div>

          </div>

        </div>
      </div>
      <!-- end: .tray-center -->
    </section>
    <!-- End: Content -->
  </section>
  @endsection

  @section('scripts')

          <!-- jQuery -->
  <script src="{{ URL::asset('vendor/jquery/jquery-1.11.1.min.js') }}"></script>
  <script src="{{ URL::asset('vendor/jquery/jquery_ui/jquery-ui.min.js') }}"></script>

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


  <script type="text/javascript">
    jQuery(document).ready(function() {

      "use strict";

      // Init Demo JS
      Demo.init();

      // Init Theme Core
      Core.init();

      $("#form").validate({

        /* @validation states + elements
         ------------------------------------------- */

        errorClass: "state-error",
        validClass: "state-success",
        errorElement: "em",

        /* @validation rules
         ------------------------------------------ */

        rules: {
          name: {
            required: true
          },
          email: {
            required: true,
            email: true
          },
          emailalt_1: {
            email: true
          },
          emailalt_2: {
            email: true
          },
          password: {
            required: true,
            minlength: 6,
            maxlength: 16
          },
          repeatPassword: {
            required: true,
            minlength: 6,
            maxlength: 16,
            equalTo: '#password'
          }

        },

        /* @validation error messages
         ---------------------------------------------- */

        messages: {
          firstname: {
            required: 'Enter first name'
          },
          lastname: {
            required: 'Enter last name'
          },
          useremail: {
            required: 'Introduzca un correo valido',
            email: 'Introduzca un correo valido'
          },
          emailalt_1: {
            email: 'Introduzca un correo valido'
          },
          emailalt_2: {
            email: 'Introduzca un correo valido'
          },
          password: {
            required: 'Please enter a password'
          },
          repeatPassword: {
            required: 'Please repeat the above password',
            equalTo: 'Password mismatch detected'
          }

        },

        /* @validation highlighting + error placement
         ---------------------------------------------------- */

        highlight: function(element, errorClass, validClass) {
          $(element).closest('.field').addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).closest('.field').removeClass(errorClass).addClass(validClass);
        },
        errorPlacement: function(error, element) {
          if (element.is(":radio") || element.is(":checkbox")) {
            element.closest('.option-group').after(error);
          } else {
            error.insertAfter(element.parent());
          }
        }

      });

      $("#form2").validate({

        /* @validation states + elements
         ------------------------------------------- */

        errorClass: "state-error",
        validClass: "state-success",
        errorElement: "em",

        /* @validation rules
         ------------------------------------------ */

        rules: {
          name: {
            required: true
          },
          email: {
            required: true,
            email: true
          },

          password: {
            required: true,
            minlength: 6,
            maxlength: 16
          },
          repeatPassword: {
            required: true,
            minlength: 6,
            maxlength: 16,
            equalTo: '#password'
          }

        },

        /* @validation error messages
         ---------------------------------------------- */

        messages: {
          firstname: {
            required: 'Enter first name'
          },
          lastname: {
            required: 'Enter last name'
          },
          useremail: {
            required: 'Introduzca un correo valido',
            email: 'Introduzca un correo valido'
          },
          password: {
            required: 'Please enter a password'
          },
          repeatPassword: {
            required: 'Please repeat the above password',
            equalTo: 'Password mismatch detected'
          }

        },

        /* @validation highlighting + error placement
         ---------------------------------------------------- */

        highlight: function(element, errorClass, validClass) {
          $(element).closest('.field').addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).closest('.field').removeClass(errorClass).addClass(validClass);
        },
        errorPlacement: function(error, element) {
          if (element.is(":radio") || element.is(":checkbox")) {
            element.closest('.option-group').after(error);
          } else {
            error.insertAfter(element.parent());
          }
        }

      });

      @if(isset($status))
              new PNotify({
        title: 'Aviso',
        text: '{{$status}}',
        shadow: "true",
        opacity: "1",
        addclass: "stack_top_right",
        type: "success",
        stack: {
          "dir1": "down",
          "dir2": "left",
          "push": "top",
          "spacing1": 10,
          "spacing2": 10
        },
        width: "550px",
        delay: 3000
      });
      @endif

    });
  </script>
@endsection
