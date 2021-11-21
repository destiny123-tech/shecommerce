@extends('layouts.elements')

@section('title', 'Home')

@section('headerStyles')
    @parent
    <style>.upload-row, #image-upload, #video-upload{cursor: pointer}</style>
@endsection

@section('content')
@if ($success ?? '')
    <div class="alert alert-success" role="alert">
        {{ $success ?? '' }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div>
    <hr>
    <div class="container mb-3">
        <div class="row upload-row">
            <h4 class="col-10 py-1">Media Upload</h5>
            <a class="btn float-right col-2" id="upload-button">
                <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-chevron-expand" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3.646 9.146a.5.5 0 0 1 .708 0L8 12.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708zm0-2.292a.5.5 0 0 0 .708 0L8 3.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708z"/>
                </svg>
            </a>
        </div>
    </div>
    <div style="display: none" id="media-container" class="container mt-2">
        <div class="row mb-2">
            <div class="col-5">
                <div class="row" id="image-upload">
                    <h5 class="col-9 py-1">Image Upload</h5>
                    <a class="btn float-right col-2 py-1" id="upload-button">
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-cloud-upload" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z"/>
                            <path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-2"></div>
            <div class="col-5">
                <div class="row" id="video-upload">
                    <h5 class="col-9 py-1 pl-0">Video Upload</h5>
                    <a class="btn float-right col-2 py-1" id="upload-button">
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-cloud-upload" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z"/>
                            <path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div style="display: none" id="image-form" class="container pb-5">
        <hr>
            <form method="POST" enctype="multipart/form-data" action="/admin/pictures">
                @csrf
                <h5 class="text-center">Image Upload</h5>
                <div class="form-group row">
                    <label for="clientname" class="col-sm-2 pt-2">Client Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="clientname" id="clientname" class="form-control mb-2 mr-sm-2" placeholder="Client Name">
                    </div>
                </div>
                <div class="row">
                    <div class="image-type form-group row col-sm-6">
                        <label for="image_type" class="col-sm-2 pt-2">Type</label>
                        <div class="col-sm-10">
                            <select name="image_type" id="image_type" class="form-control custom-select">
                                <option class="image-type-selection" value="Portfolio Image">Portfolio Image</option>
                                <option class="image-type-selection" value="Profile Picture">Profile Picture</option>
                                <option class="image-type-selection" value="Transformation Picture">Transformation</option>
                            </select>
                        </div>
                    </div>
                    <div class="stage form-group row col-sm-6" style="display: none;">
                        <label for="stsge" class="col-sm-2 pt-2">Stage</label>
                        <div class="col-sm-10">
                            <select name="stage" id="stage" class="form-control custom-select">
                                <option value="before">Before</option>
                                <option value="during">During</option>
                                <option value="after">After</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group row col-sm-6 mt-1">
                        <label for="image_upload" class="col-sm-2 pt-1">Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="image_upload" id="image_upload" class="form-control-file">
                        </div>
                    </div>
                    <div class="form-group row col-sm-6">
                        <label for="image_upload" class="col-sm-2 pt-2">Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="date" id="date" class="form-control">
                        </div>    
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image_type" class="col-sm-2 pt-2">Filename</label>
                    <div class="col-sm-10">
                        <input type="text" name="filename" id="filename" class="form-control mb-2 mr-sm-2">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="extension" class="col-sm-2 pt-2">Extension</label>
                    <div class="col-sm-10">
                        <select name="extension" id="extensiom" class="form-control custom-select">
                            <option value="jpg">JPG</option>
                            <option value="jpeg">JPEG</option>
                            <option value="png">PNG</option>
                            <option value="webp">WEBP</option>
                        </select>
                    </div>
                </div>
                {{csrf_field()}}
                <button type="submit" value="Upload" class="btn btn-success btn-block">Submit</button>
            </form>
        </div>
    </div>
    <hr>
</div>
@endsection

@section('footerScripts')
    @parent
    <script>
        $('.upload-row').click(function(){
            $('#media-container').slideToggle('slow', 'swing');
        });
        $('#image-upload').click(function(){
            $('#image-form').slideToggle();
        });
        $('.image-type-selection').click(function (){
            if ($('#image_type').val() == 'Transformation Picture') {
                $('.stage').css('display', 'flex');
            }
            else {
                $('.stage').css('display', 'none');
            }
        });
        
    </script>
@endsection