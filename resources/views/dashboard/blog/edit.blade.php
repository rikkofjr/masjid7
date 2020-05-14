@extends('layouts.startbootstrap')
@section('TitleBar')
    Blog
@endsection

@section('DynamicCSS')
<link rel="stylesheet" href="{{ asset('vendor/trumbowyg/dist/ui/trumbowyg.min.css')}}">

@endsection
@section('Content')
<!--Row1-->

<!--Row2-->
<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4>Posting Blog</h4>
            </div>
            <div class="card-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('rubah'))
            <div class="container">      
                <div class="alert alert-success"><em> {!! session('rubah') !!}</em>
                </div>
            </div>
            @endif 
            {{ Form::model($blog, array('route' => array('blog.update', $blog->id), 'method' => 'PUT')) }}


                <div class="form-group">
                    {{ Form::label('judul', 'Judul Blog') }}
                    {{ Form::text('judul', $blog->judul, array('class' => 'form-control')) }}
                </div>
                <img src="{{asset('uploads')}}/{{$blog->gambar}}" width="100px" alt="">
                <div class="form-group">
                    {{ Form::label('gambar', 'Gambar Icon') }}
                    <input type="file" name="gambar" id="gambar" class="form-controll">
                </div>
                
                <div class="form-group">
                    {{ Form::label('isi', 'Content') }}
                    {{ Form::textarea('isi', $blog->isi, array('class' => 'form-control', 'id' => 'description')) }}
                </div>


                {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}

            </div>
        </div>
	</div>
</div>
@endsection

@section('DynamicScript')
<script src="{{asset('vendor/trumbowyg/dist/trumbowyg.min.js')}}"></script>
    <script>
    // Doing this in a loaded JS file is better, I put this here for simplicity
        $('#description').trumbowyg();
    </script>
@endsection