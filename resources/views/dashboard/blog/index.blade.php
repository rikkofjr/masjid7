@extends('layouts.startbootstrap')

@section('TitleBar')
    Blog
@endsection

@section('DynamicCss')
<!-- Specific Page Vendor CSS -->
<link href="{{asset('startbootstrap/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

@endsection

@section('TitleBox')
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
    	<h1 class="h3 mb-0 text-gray-800"></h1>
    </div>
@endsection

@section('Content')
<!--Row1-->
<style type="text/css">
     @media(min-width:300px){
            .box-jobs{
                padding:12px;
            }
        }
        @media(min-width:700px){
            .box-jobs{
                padding:20px;
            }
        }
        .box-jobs{
            border: solid 1px #eff0f1;
            color:#000;
        }
        a.link-jobs:hover{
            color:#000;
        }
        ul.date-profile li{
            display:inline;
        }
        ul.date-profile li:last-child:before{
            content:"/";
            padding: 5px;
        }
        .fa{
            color:#f44949;
        }
        ul.sc-widget{
            list-style-type:none;
        }
        
</style>
<!--Row2-->
<div class="row">
	<div class="col-md-12">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Blog</h6>
            </div>
			<div class="card-body">
                @foreach($blog as $p)
                <a href="{{route('blog.edit', $p->id)}}" class="link-jobs">
                <div class="row box-jobs" style="">
                    <div class="col-lg-2">
                        <div class="" class="align-middle">
                            <i class="fas fa-file-alt fa-6x text-primary"></i>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="sc-text">
                            <h4>{{$p->judul_isi}}</h4>
                            <p>{{Str::limit(strip_tags($p->isi),300,'...')}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <ul class="sc-widget">
                            <li><i class="fa fa-user"></i> {{$p->penulisnya->name}}</li>
                            <li><i class="fa fa-calendar"></i> {{$p->created_at->diffForHumans()}} 
                            </li>
                        </ul>
                    </div>
                </div>
                </a>
                <!--Boxjobs-->
                 @endforeach
			</div>
            <div class="card-footer">
            {{ $blog->links() }}
            </div>
		</div>
	</div>
</div>
@endsection
@section('DynamicScript')
		<!-- Specific Page Vendor -->
		
        
@endsection

