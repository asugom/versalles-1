@extends('layouts.layout')

@section('header')
    @include('header.header')
@endsection


@section('sidebar')
    @include('menu.menuadmin', array('galeria'=>'active'))
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
                    <li class="crumb-trail">Galeria imagenes recientes</li>
                </ol>
            </div>
        </header>
        <!-- End: Topbar -->

        <!-- Begin: Content -->
        <section id="content" class="table-layout animated fadeIn">
            <input type="hidden" id="message" value="{{ Session::get('message') }}">
            <!-- begin: .tray-center -->
            <div class="tray tray-center">

                <div class="mw1000 center-block">
                    <!-- Begin: Admin Form -->
                    <div class="admin-form  theme-system">

                        <div class="panel heading-border  panel-dark">
                            <div class="panel-body bg-light">
                                <input type="hidden" id="message" value="{{ Session::get('message') }}">
                                {!! Form::open(array('route' => 'adjuntar_archivo','method'=>'POST','id'=>'admin-form','files'=>'true')) !!}
                                <input type="hidden" id="nombre" name="nombre" value="1.jpg">
                                <div class="section-divider mv40" id="spy4">
                                    <span>Imagen 1</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="section">
                                            <img id="img1" src=" {{ URL::asset('galeria/1.jpg?666.6') }}" width="300" height="200">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="section">
                                            <label class="field prepend-icon append-button file">
                                                <span class="button btn-primary">Cambiar Imagen</span>
                                                <input class="gui-file" name="file1" id="file1" onchange="document.getElementById('uploader1').value = this.value;" type="file">
                                                <input class="gui-input" id="uploader1" placeholder="Seleccione un archivo" type="text">
                                                <label class="field-icon">
                                                    <i class="fa fa-upload"></i>
                                                </label>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="panel-body bg-light">
                                <input type="hidden" id="message" value="{{ Session::get('message') }}">
                                {!! Form::open(array('route' => 'adjuntar_archivo','method'=>'POST','id'=>'admin-form2','files'=>'true')) !!}
                                <input type="hidden" id="nombre" name="nombre" value="2.jpg">
                                <div class="section-divider mv40" id="spy4">
                                    <span>Imagen 2</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="section">
                                            <img id="img2" src=" {{ URL::asset('galeria/2.jpg') }}" width="300" height="200">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="section">
                                            <label class="field prepend-icon append-button file">
                                                <span class="button btn-primary">Cambiar Imagen</span>
                                                <input class="gui-file" name="file1" id="file2" onchange="document.getElementById('uploader1').value = this.value;" type="file">
                                                <input class="gui-input" id="uploader1" placeholder="Seleccione un archivo" type="text">
                                                <label class="field-icon">
                                                    <i class="fa fa-upload"></i>
                                                </label>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="panel-body bg-light">
                                <input type="hidden" id="message" value="{{ Session::get('message') }}">
                                {!! Form::open(array('route' => 'adjuntar_archivo','method'=>'POST','id'=>'admin-form3','files'=>'true')) !!}
                                <input type="hidden" id="nombre" name="nombre" value="3.jpg">
                                <div class="section-divider mv40" id="spy4">
                                    <span>Imagen 3</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="section">
                                            <img id="img3" src=" {{ URL::asset('galeria/3.jpg') }}" width="300" height="200">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="section">
                                            <label class="field prepend-icon append-button file">
                                                <span class="button btn-primary">Cambiar Imagen</span>
                                                <input class="gui-file" name="file1" id="file3" onchange="document.getElementById('uploader1').value = this.value;" type="file">
                                                <input class="gui-input" id="uploader1" placeholder="Seleccione un archivo" type="text">
                                                <label class="field-icon">
                                                    <i class="fa fa-upload"></i>
                                                </label>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="panel-body bg-light">
                                <input type="hidden" id="message" value="{{ Session::get('message') }}">
                                {!! Form::open(array('route' => 'adjuntar_archivo','method'=>'POST','id'=>'admin-form4','files'=>'true')) !!}
                                <input type="hidden" id="nombre" name="nombre" value="4.jpg">
                                <div class="section-divider mv40" id="spy4">
                                    <span>Imagen 4</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="section">
                                            <img id="img4" src=" {{ URL::asset('galeria/4.jpg') }}" width="300" height="200">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="section">
                                            <label class="field prepend-icon append-button file">
                                                <span class="button btn-primary">Cambiar Imagen</span>
                                                <input class="gui-file" name="file1" id="file4" onchange="document.getElementById('uploader1').value = this.value;" type="file">
                                                <input class="gui-input" id="uploader1" placeholder="Seleccione un archivo" type="text">
                                                <label class="field-icon">
                                                    <i class="fa fa-upload"></i>
                                                </label>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="panel-body bg-light">
                                <input type="hidden" id="message" value="{{ Session::get('message') }}">
                                {!! Form::open(array('route' => 'adjuntar_archivo','method'=>'POST','id'=>'admin-form5','files'=>'true')) !!}
                                <input type="hidden" id="nombre" name="nombre" value="5.jpg">
                                <div class="section-divider mv40" id="spy4">
                                    <span>Imagen 5</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="section">
                                            <img id="img5" src=" {{ URL::asset('galeria/5.jpg') }}" width="300" height="200">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="section">
                                            <label class="field prepend-icon append-button file">
                                                <span class="button btn-primary">Cambiar Imagen</span>
                                                <input class="gui-file" name="file1" id="file5" onchange="document.getElementById('uploader1').value = this.value;" type="file">
                                                <input class="gui-input" id="uploader1" placeholder="Seleccione un archivo" type="text">
                                                <label class="field-icon">
                                                    <i class="fa fa-upload"></i>
                                                </label>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="panel-body bg-light">
                                <input type="hidden" id="message" value="{{ Session::get('message') }}">
                                {!! Form::open(array('route' => 'adjuntar_archivo','method'=>'POST','id'=>'admin-form6','files'=>'true')) !!}
                                <input type="hidden" id="nombre" name="nombre" value="6.jpg">
                                <div class="section-divider mv40" id="spy4">
                                    <span>Imagen 6</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="section">
                                            <img id="img6" src=" {{ URL::asset('galeria/6.jpg') }}" width="300" height="200">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="section">
                                            <label class="field prepend-icon append-button file">
                                                <span class="button btn-primary">Cambiar Imagen</span>
                                                <input class="gui-file" name="file1" id="file6" onchange="document.getElementById('uploader1').value = this.value;" type="file">
                                                <input class="gui-input" id="uploader1" placeholder="Seleccione un archivo" type="text">
                                                <label class="field-icon">
                                                    <i class="fa fa-upload"></i>
                                                </label>
                                            </label>
                                        </div>
                                    </div>
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

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/pnotify/pnotify.custom.min.css') }}">
    <!-- jQuery -->
    <script src="{{ URL::asset('vendor/jquery/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ URL::asset('vendor/jquery/jquery_ui/jquery-ui.min.js') }}"></script>

    <!-- jQuery Validate Plugin-->
    <script src="{{ URL::asset('assets/admin-tools/admin-forms/js/jquery.validate.min.js') }}"></script>

    <!-- jQuery Validate Addon -->
    <script src="{{ URL::asset('assets/admin-tools/admin-forms/js/additional-methods.min.js') }}"></script>


    <!-- Theme Javascript -->


    <!-- PNotify -->
    <script src="{{ URL::asset('vendor/plugins/pnotify/pnotify2.custom.min.js') }}"></script>

    <script type="text/javascript">
        jQuery(document).ready(function() {

            $("#file1").change(function() {
                var file = this.files[0];
                name = file.name;
                size = file.size;
                type = file.type;

                if(file.name.length < 1) {
                    alert("Sin Nombre");
                }
                else if(file.size > 10000000) {
                    alert("The file is too big");
                }
                else if(file.type != 'image/png' && file.type != 'image/jpg' && file.type != 'image/gif' && file.type != 'image/jpeg' ) {
                    alert("The file does not match png, jpg or gif");
                }
                else {

                        var formData = new FormData($('#admin-form')[0]);
                        $.ajax({
                            headers: {
                                '_token' : "{{ csrf_token() }}"
                            },
                            url: 'cambiar_imagen',  //server script to process data
                            type: 'POST',
                            xhr: function() {  // custom xhr
                                myXhr = $.ajaxSettings.xhr();
                                if(myXhr.upload){ // if upload property exists
                                  //  myXhr.upload.addEventListener('progress', progressHandlingFunction, false); // progressbar
                                }
                                return myXhr;
                            },
                            // Ajax events
                            success: completeHandler = function(data) {
                                d = new Date();
                                $("#img1").attr("src", "{{ URL::asset('galeria/1.jpg') }}?"+d.getTime());
                                new PNotify({
                                    title: 'Aviso',
                                    text: 'Imagen Cambiada con exito',
                                    type: 'success',
                                    icon: false
                                });
                            },
                            error: errorHandler = function( ) {
                                alert("Error");
                            },
                            // Form data
                            data: formData,
                            // Options to tell jQuery not to process data or worry about the content-type
                            cache: false,
                            contentType: false,
                            processData: false
                        }, 'json');

                }
            });
            $("#file2").change(function() {
                var file = this.files[0];
                name = file.name;
                size = file.size;
                type = file.type;

                if(file.name.length < 1) {
                    alert("Sin Nombre");
                }
                else if(file.size > 10000000) {
                    alert("The file is too big");
                }
                else if(file.type != 'image/png' && file.type != 'image/jpg' && file.type != 'image/gif' && file.type != 'image/jpeg' ) {
                    alert("The file does not match png, jpg or gif");
                }
                else {

                    var formData = new FormData($('#admin-form2')[0]);
                    $.ajax({
                        headers: {
                            '_token' : "{{ csrf_token() }}"
                        },
                        url: 'cambiar_imagen',  //server script to process data
                        type: 'POST',
                        xhr: function() {  // custom xhr
                            myXhr = $.ajaxSettings.xhr();
                            if(myXhr.upload){ // if upload property exists
                                //  myXhr.upload.addEventListener('progress', progressHandlingFunction, false); // progressbar
                            }
                            return myXhr;
                        },
                        // Ajax events
                        success: completeHandler = function(data) {
                            d = new Date();
                            $("#img2").attr("src", "{{ URL::asset('galeria/2.jpg') }}?"+d.getTime());
                            new PNotify({
                                title: 'Aviso',
                                text: 'Imagen Cambiada con exito',
                                type: 'success',
                                icon: false
                            });
                        },
                        error: errorHandler = function( ) {
                            alert("Error");
                        },
                        // Form data
                        data: formData,
                        // Options to tell jQuery not to process data or worry about the content-type
                        cache: false,
                        contentType: false,
                        processData: false
                    }, 'json');

                }
            });
            $("#file3").change(function() {
                var file = this.files[0];
                name = file.name;
                size = file.size;
                type = file.type;

                if(file.name.length < 1) {
                    alert("Sin Nombre");
                }
                else if(file.size > 10000000) {
                    alert("The file is too big");
                }
                else if(file.type != 'image/png' && file.type != 'image/jpg' && file.type != 'image/gif' && file.type != 'image/jpeg' ) {
                    alert("The file does not match png, jpg or gif");
                }
                else {

                    var formData = new FormData($('#admin-form3')[0]);
                    $.ajax({
                        headers: {
                            '_token' : "{{ csrf_token() }}"
                        },
                        url: 'cambiar_imagen',  //server script to process data
                        type: 'POST',
                        xhr: function() {  // custom xhr
                            myXhr = $.ajaxSettings.xhr();
                            if(myXhr.upload){ // if upload property exists
                                //  myXhr.upload.addEventListener('progress', progressHandlingFunction, false); // progressbar
                            }
                            return myXhr;
                        },
                        // Ajax events
                        success: completeHandler = function(data) {
                            d = new Date();
                            $("#img3").attr("src", "{{ URL::asset('galeria/3.jpg') }}?"+d.getTime());
                            new PNotify({
                                title: 'Aviso',
                                text: 'Imagen Cambiada con exito',
                                type: 'success',
                                icon: false
                            });
                        },
                        error: errorHandler = function( ) {
                            alert("Error");
                        },
                        // Form data
                        data: formData,
                        // Options to tell jQuery not to process data or worry about the content-type
                        cache: false,
                        contentType: false,
                        processData: false
                    }, 'json');

                }
            });
            $("#file4").change(function() {
                var file = this.files[0];
                name = file.name;
                size = file.size;
                type = file.type;

                if(file.name.length < 1) {
                    alert("Sin Nombre");
                }
                else if(file.size > 10000000) {
                    alert("Imagen muy grande para cargar en galeria");
                }
                else if(file.type != 'image/png' && file.type != 'image/jpg' && file.type != 'image/gif' && file.type != 'image/jpeg' ) {
                    alert("The file does not match png, jpg or gif");
                }
                else {

                    var formData = new FormData($('#admin-form4')[0]);
                    $.ajax({
                        headers: {
                            '_token' : "{{ csrf_token() }}"
                        },
                        url: 'cambiar_imagen',  //server script to process data
                        type: 'POST',
                        xhr: function() {  // custom xhr
                            myXhr = $.ajaxSettings.xhr();
                            if(myXhr.upload){ // if upload property exists
                                //  myXhr.upload.addEventListener('progress', progressHandlingFunction, false); // progressbar
                            }
                            return myXhr;
                        },
                        // Ajax events
                        success: completeHandler = function(data) {
                            d = new Date();
                            $("#img4").attr("src", "{{ URL::asset('galeria/4.jpg') }}?"+d.getTime());
                            new PNotify({
                                title: 'Aviso',
                                text: 'Imagen Cambiada con exito',
                                type: 'success',
                                icon: false
                            });
                        },
                        error: errorHandler = function( ) {
                            alert("Error");
                        },
                        // Form data
                        data: formData,
                        // Options to tell jQuery not to process data or worry about the content-type
                        cache: false,
                        contentType: false,
                        processData: false
                    }, 'json');

                }
            });
            $("#file5").change(function() {
                var file = this.files[0];
                name = file.name;
                size = file.size;
                type = file.type;

                if(file.name.length < 1) {
                    alert("Sin Nombre");
                }
                else if(file.size > 10000000) {
                    alert("The file is too big");
                }
                else if(file.type != 'image/png' && file.type != 'image/jpg' && file.type != 'image/gif' && file.type != 'image/jpeg' ) {
                    alert("The file does not match png, jpg or gif");
                }
                else {

                    var formData = new FormData($('#admin-form5')[0]);
                    $.ajax({
                        headers: {
                            '_token' : "{{ csrf_token() }}"
                        },
                        url: 'cambiar_imagen',  //server script to process data
                        type: 'POST',
                        xhr: function() {  // custom xhr
                            myXhr = $.ajaxSettings.xhr();
                            if(myXhr.upload){ // if upload property exists
                                //  myXhr.upload.addEventListener('progress', progressHandlingFunction, false); // progressbar
                            }
                            return myXhr;
                        },
                        // Ajax events
                        success: completeHandler = function(data) {
                            d = new Date();
                            $("#img5").attr("src", "{{ URL::asset('galeria/5.jpg') }}?"+d.getTime());
                            new PNotify({
                                title: 'Aviso',
                                text: 'Imagen Cambiada con exito',
                                type: 'success',
                                icon: false
                            });
                        },
                        error: errorHandler = function( ) {
                            alert("Error");
                        },
                        // Form data
                        data: formData,
                        // Options to tell jQuery not to process data or worry about the content-type
                        cache: false,
                        contentType: false,
                        processData: false
                    }, 'json');

                }
            });
            $("#file6").change(function() {
                var file = this.files[0];
                name = file.name;
                size = file.size;
                type = file.type;

                if(file.name.length < 1) {
                    alert("Sin Nombre");
                }
                else if(file.size > 10000000) {
                    alert("The file is too big");
                }
                else if(file.type != 'image/png' && file.type != 'image/jpg' && file.type != 'image/gif' && file.type != 'image/jpeg' ) {
                    alert("The file does not match png, jpg or gif");
                }
                else {

                    var formData = new FormData($('#admin-form6')[0]);
                    $.ajax({
                        headers: {
                            '_token' : "{{ csrf_token() }}"
                        },
                        url: 'cambiar_imagen',  //server script to process data
                        type: 'POST',
                        xhr: function() {  // custom xhr
                            myXhr = $.ajaxSettings.xhr();
                            if(myXhr.upload){ // if upload property exists
                                //  myXhr.upload.addEventListener('progress', progressHandlingFunction, false); // progressbar
                            }
                            return myXhr;
                        },
                        // Ajax events
                        success: completeHandler = function(data) {
                            d = new Date();
                            $("#img6").attr("src", "{{ URL::asset('galeria/6.jpg') }}?"+d.getTime());
                            new PNotify({
                                title: 'Aviso',
                                text: 'Imagen Cambiada con exito',
                                type: 'success',
                                icon: false
                            });
                        },
                        error: errorHandler = function( ) {
                            alert("Error");
                        },
                        // Form data
                        data: formData,
                        // Options to tell jQuery not to process data or worry about the content-type
                        cache: false,
                        contentType: false,
                        processData: false
                    }, 'json');

                }
            });




        });
    </script>
@endsection
