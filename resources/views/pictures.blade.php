@extends('layouts.elements')

@section('title', 'Pictures')

@section('headerStyles')
@parent
<link rel="stylesheet" href="{{ mix('css/pictures.css') }}">
@endsection

@section('extra')
<div id="bigImgClick" class="bigShow" style="background: #000; width: 100vw; height: 100vh; display: none;">
    <!-- big image show -->
    <div id="bigLeft" class="bigLeft fadeOut setOpacity" style="display: block;">
    <svg width="50px" height="50px" viewBox="0 0 16 16" class="bi bi-chevron-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
    </svg>
    </div>
    <div id="bigRight" class="bigRight fadeOut setOpacity" style="display: block;">
    <svg width="50px" height="50px" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
    </svg>
    </div>
    <div style="display:none" id="noShowImg"></div>
    <img style="display:none" id="thumbImg">
    <img id="imgShadowClick" src="" class="classRotate0">
    <img id="bigShowImgClick" src="" class="classRotate0">

    <dl id="img_opClick" class="icon_btn_bar bigImg_bottom_btns fadeOut setOpacity">
        <dd class="bigImgToll zoom_big"></dd>
        <dd class="bigImgToll zoom_small"></dd>
        <dd class="bigImgToll rotate_img_left"></dd>
        <dd class="bigImgToll rotate_img_right"></dd>
        <dd class="bigImgToll bigImg_download"></dd>
        <dd class="bigImgToll bigImg_delete" style="display: inline-block;"></dd>
    </dl>

    <dl id="imgNameShow" class="imgNameShow fadeOut setOpacity">
        <dd style="width:100% ; line-height:60px;font-size:18px"></dd>
    </dl>
    <div id="bigCloseClick" class="bigClose fadeOut setOpacity">
    <svg width="50px" height="50px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
    </svg>
    </div>
</div>
@endsection

@section('content')
<div class="row">
@foreach ($images as $image)
    <div class="col-sm-4 imgContainer">
        <img src="{{ asset('images/'.$image->type.'/'.$image->filename.'.'.$image->extension) }}" alt="{{ $image->clientname }}">
    </div>
@endforeach
</div>

@endsection

@section('footerScripts')
@parent
<script>
    $('#bigCloseClick').click(() => {
        $('#bigImgClick').hide();
        $('header').show();
        $('.test').show();
    });
    var image;
    $('.imgContainer > img').click(function(){
        image = $(this);
        $('#bigShowImgClick').attr('src', $(this).attr('src'));
        $('header').hide();
        $('.test').hide();
        $('#bigImgClick').show();
    });
    $('.bigLeft').click(function(){
        if(image.parent().is(':first-child')){
            $('#bigShowImgClick').attr('src', image.parent().parent().children(':last-child').children('img').attr('src'));
            image = image.parent().parent().children(':last-child').children('img'); 
        } else {
            $('#bigShowImgClick').attr('src', image.parent().prev().find('img').attr('src'));
            image = image.parent().prev().find('img');
        }
        
    });
    $('.bigRight').click(function(){
        if(image.parent().is(':last-child')){
            $('#bigShowImgClick').attr('src', image.parent().parent().children(':first-child').children('img').attr('src'));
            image = image.parent().parent().children(':first-child').children('img');
        } else {
            $('#bigShowImgClick').attr('src', image.parent().next().find('img').attr('src'));
            image = image.parent().next().find('img');
        }
        
    });
    $(function(){
        $('#bigImgClick').on("swipeleft", swipeleftHandler);
        $('#bigImgClick').on("swiperight", swiperightHandler);
    })
    function swipeleftHandler(event) {
        if(image.parent().is(':last-child')){
            $('#bigShowImgClick').attr('src', image.parent().parent().children(':first-child').children('img').attr('src'));
            image = image.parent().parent().children(':first-child').children('img');
        } else {
            $('#bigShowImgClick').attr('src', image.parent().next().find('img').attr('src'));
            image = image.parent().next().find('img');
        }
    }
    function swiperightHandler(event) {
        if(image.parent().is(':first-child')){
            $('#bigShowImgClick').attr('src', image.parent().parent().children(':last-child').children('img').attr('src'));
            image = image.parent().parent().children(':last-child').children('img'); 
        } else {
            $('#bigShowImgClick').attr('src', image.parent().prev().find('img').attr('src'));
            image = image.parent().prev().find('img');
        }
    }
</script>
@endsection