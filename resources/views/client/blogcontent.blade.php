@extends('layouts.lawncare')
@section('TitleBar')
    {{$blog->judul}}
@endsection
@section('Content')
<style type="text/css">
    .number-form{
        text-align:right;
    }
    @media screen and (min-width:800px){
        .dataTables_filter{
            float:right;
            margin-right:3px;
        }
    }
</style>
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{asset('uploads/'.$blog->gambar)}}');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h1 class="mb-3 bread">Judul</h1>
                </div>
            </div>
        </div>
    </section>
   	
	<section class="ftco-section bg-light">
        <div class="container">
            <div class="col-md-12 col-sm-12">
                <div class="card p-2">
                    {!!$blog->isi!!}
                </div>
            </div>
        </div>
    </section>
@endsection

@section('DynamicScript')
		<!-- Specific Page Vendor -->
		<script src="{{asset('startbootstrap/vendor/datatables/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('startbootstrap/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script>
			$(document).ready( function () {
				$('#tableKambing').DataTable();
			} );
			
			$(document).ready( function () {
				$('#tableDomba').DataTable();
			} );
			
			$(document).ready( function () {
				$('#tableSapi').DataTable();
			} );
		</script>
@endsection