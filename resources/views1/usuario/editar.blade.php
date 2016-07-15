@extends('layouts.layout')

@section('header')
    @include('header.header')
@endsection


@section('sidebar')
	@include('menu.menuadmin')
@endsection

@section('wrapper')
<section id="content_wrapper">
      <!-- Start: Topbar -->
      <header id="topbar" class="alt">
        <div class="topbar-left">
          <ol class="breadcrumb">
            <li class="crumb-icon">
              <a href="dashboard.html">
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
            <div class="admin-form  theme-system">

              <div class="panel heading-border  panel-system">
                <div class="panel-body bg-light">
                  
                 
                {!! Form::model($user,array('route' => ['usuario.edit',$user->id],'method'=>'PUT')) !!}
                 <!-- <form method="post" action="{{ url('usuario') }}" id="admin-form"> -->
                   
                    <div class="section-divider mb40" id="spy1">
                      <span>Datos del Usuario</span>
                    </div>
                    <!-- .section-divider -->

                    <!-- Input Icons -->
                    <div class="row">
                      <div class="col-md-8">    
                        <div class="section">
                          <label class="field prepend-icon">

                            {{ Form::text('name', null, array('class' => 'gui-input')) }}
                           <!-- <input type="text" name="name" id="name" class="gui-input" placeholder="Nombre y apellido"> -->
                            <label for="name" class="field-icon">
                              <i class="fa fa-user"></i>
                            </label>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    	<div class="col-md-6">
	                        <div class="section">
	                          <label class="field prepend-icon">
                              {{ Form::text('email', null, array('class' => 'gui-input')) }}
	                            
	                            <label for="email" class="field-icon">
	                              <i class="fa fa-envelope"></i>
	                            </label>
	                          </label>
	                        </div>
                      	</div>
                    </div>
                    <div class="section row">

                      <div class="col-md-6">
                        <label for="mobile_phone" class="field prepend-icon">
                          {{ Form::text('mobilenumber', null, array('class' => 'gui-input phone-group')) }}

                          <label for="mobilenumber" class="field-icon">
                            <i class="fa fa-mobile-phone"></i>
                          </label>
                        </label>
                      </div>
                      <!-- end section -->

                      <div class="col-md-6">
                        <label for="home_phone" class="field prepend-icon">
                          {{ Form::text('phonenumber', null, array('class' => 'gui-input phone-group')) }}
                        
                          <label for="phonenumber" class="field-icon">
                            <i class="fa fa-phone"></i>
                          </label>
                        </label>
                      </div>

                      <!-- end section -->

                    </div>
                    <div class="section row">
                     <div class="col-md-6">
                        <label for="home_phone" class="field prepend-icon">
                          {{ Form::text('homenumber', null, array('class' => 'gui-input phone-group')) }}
                          <label for="homenumber" class="field-icon">
                            <i class="fa fa-phone"></i>
                          </label>
                        </label>
                      </div>
                     </div>
					          <div class="section-divider mv40" id="spy4">
                      <span> Contraseña </span>
                    </div>
                    <!-- .section-divider -->

                    <div class="section">
                      <label for="password" class="field prepend-icon">
                        <input type="password" name="password" id="password" class="gui-input" placeholder="Create a password">
                        <label for="password" class="field-icon">
                          <i class="fa fa-lock"></i>
                        </label>
                      </label>
                    </div>
                    <!-- end section -->

                    <div class="section">
                      <label for="repeatPassword" class="field prepend-icon">
                        <input type="password" name="repeatPassword" id="repeatPassword" class="gui-input" placeholder="Repeat password">
                        <label for="repeatPassword" class="field-icon">
                          <i class="fa fa-unlock-alt"></i>
                        </label>
                      </label>
                    </div>
                    <!-- end section -->
                    <button type="submit" class="button btn-primary mr10 pull-right">Guardar</button>
                    {!! Form::close() !!}
                  <!--</form>-->
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

  <!-- Widget Javascript -->
  <script src="{{ URL::asset('assets/js/demo/widgets.js') }}"></script>
  <script type="text/javascript">
  jQuery(document).ready(function() {

    "use strict";

    // Init Demo JS
    Demo.init();


    // Init Theme Core
    Core.init();

  $("#admin-form").validate({

      /* @validation states + elements 
      ------------------------------------------- */

      errorClass: "state-error",
      validClass: "state-success",
      errorElement: "em",

      /* @validation rules 
      ------------------------------------------ */

      rules: {
        firstname: {
          required: true
        },
        lastname: {
          required: true
        },
        useremail: {
          required: true,
          email: true
        },
        website: {
          required: true,
          url: true
        },
        language: {
          required: true
        },
        upload1: {
          required: true,
          extension: "jpg|png|gif|jpeg|doc|docx|pdf|xls|rar|zip"
        },
        mobileos: {
          required: true
        },
        comment: {
          required: true,
          minlength: 30
        },
        mobile_phone: {
          require_from_group: [1, ".phone-group"]
        },
        home_phone: {
          require_from_group: [1, ".phone-group"]
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
        },
        gender: {
          required: true
        },
        languages: {
          required: true
        },
        verification: {
          required: true,
          smartCaptcha: 19
        },
        applicant_age: {
          required: true,
          min: 16
        },
        licence_no: {
          required: function(element) {
            return $("#applicant_age").val() > 19;
          }
        },
        child_name: {
          required: "#parents:checked"
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
          required: 'Enter email address',
          email: 'Enter a VALID email address'
        },
        website: {
          required: 'Enter your website URL',
          url: 'URL should start with - http://www'
        },
        language: {
          required: 'Choose a language'
        },
        upload1: {
          required: 'Please browse a file',
          extension: 'File format not supported'
        },
        mobileos: {
          required: 'Please select a mobile platform'
        },
        comment: {
          required: 'Oops you forgot to comment',
          minlength: 'Enter at least 30 characters or more'
        },
        mobile_phone: {
          require_from_group: 'Fill at least a mobile contact'
        },
        home_phone: {
          require_from_group: 'Fill at least a home contact'
        },
        password: {
          required: 'Please enter a password'
        },
        repeatPassword: {
          required: 'Please repeat the above password',
          equalTo: 'Password mismatch detected'
        },
        gender: {
          required: 'Please choose specie'
        },
        languages: {
          required: 'Select laguages spoken'
        },
        verification: {
          required: 'Please enter verification code',
          smartCaptcha: 'Oops - enter a correct verification code'
        },
        applicant_age: {
          required: 'Enter applicant age',
          min: 'Must be 16 years and above'
        },
        licence_no: {
          required: 'Enter licence number'
        },
        child_name: {
          required: 'Please enter your childs name'
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



  });
  </script>
@endsection
