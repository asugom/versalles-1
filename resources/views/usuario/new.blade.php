@extends('layouts.layout')

@section('header')
    @include('header.header')
@endsection


@section('sidebar')
    @include('menu.menuadmin', array('usuario'=>'active'))
@endsection

@section('wrapper')

    <section id="content_wrapper">
        <!-- Start: Topbar -->
        <header id="topbar" class="alt" style=" min-height: 10px;padding: 10px 10px; ">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-icon">
                        <a href="dashboard.html">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                    </li>
                    <li class="crumb-trail">Crear Usuario</li>
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

                        <div class="panel heading-border  panel-dark">
                            <div class="panel-body bg-light">
                                <input type="hidden" id="message" value="{{ $status or ' ' }}">
                                <form method="post" action="{{ url('usuario') }}" id="admin-form">
                                    {{ csrf_field() }}
                                    <div class="section-divider mb40" id="spy1">
                                        <span>Datos del Usuario</span>
                                    </div>
                                    <!-- .section-divider -->

                                    <!-- Input Icons -->
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="section">
                                                <label class="field prepend-icon">
                                                    <input type="text" name="name" id="firstname" class="gui-input" placeholder="Nombre y apellido">
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
                                                <input type="tel" name="mobilenumber" id="mobile_phone" class="gui-input phone-group" placeholder="Celular">
                                                <label for="mobilenumber" class="field-icon">
                                                    <i class="fa fa-phone"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                        <div class="col-md-6">
                                            <label for="home_phone" class="field prepend-icon">
                                                <input type="tel" name="phonenumber" id="home_phone" class="gui-input phone-group" placeholder="Telefono hogar">
                                                <label for="phonenumber" class="field-icon">
                                                    <i class="glyphicon glyphicon-phone-alt"></i>
                                                </label>
                                            </label>
                                        </div>

                                        <!-- end section -->

                                    </div>
                                    <div class="section row">
                                        <div class="col-md-6">
                                            <label for="home_phone" class="field prepend-icon">
                                                <input type="text" name="homenumber" id="homenumber" class="gui-input phone-group" placeholder="Lote">
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
                                                    <input type="email" name="email" id="email" class="gui-input" placeholder="Correo Electronico">
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

                                    <div class="section-divider mv40" id="spy4">
                                        <span> Contraseña </span>
                                    </div>
                                    <!-- .section-divider -->

                                    <div class="section">
                                        <label for="password" class="field prepend-icon">
                                            <input type="password" name="password" id="password" class="gui-input" placeholder="Contraseña">
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
                                    <button type="submit" class="button btn-primary mr10 pull-right">Guardar</button>
                                </form>
                            </div>
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
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    mobilenumber: {
                        require_from_group: [1, ".phone-group"]
                    },
                    phonenumber: {
                        require_from_group: [1, ".phone-group"]
                    },
                    homenumber: {
                        required: true
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
                    name: {
                        required: 'Enter first name'
                    },
                    email: {
                        required: 'Enter email address',
                        email: 'Enter a VALID email address'
                    },
                    emailalt_1: {
                        email: 'Introduzca un correo valido'
                    },
                    emailalt_2: {
                        email: 'Introduzca un correo valido'
                    },
                    mobilenumber: {
                        require_from_group: 'Fill at least a mobile contact'
                    },
                    phonenumber: {
                        require_from_group: 'Fill at least a home contact'
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
