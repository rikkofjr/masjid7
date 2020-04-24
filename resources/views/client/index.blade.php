@extends('layouts.lawncare')
@section('Content')

<div class="hero-wrap js-fullheight" style="background-image: url('{{asset('lawncare/images/masjid-belakang.jpg')}}');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate">
          	<h2 class="subheading">Selamat Datang di Website Resmi</h2>
          	<h1>Masjid <br/>Al-Amanah</h1>
            <p class="mb-4">Sunter Agung </p>
            <p><a href="#" class="btn btn-primary mr-md-4 py-2 px-4">Learn more <span class="ion-ios-arrow-forward"></span></a></p>
          </div>
        </div>
      </div>
	</div>
	
<section class="ftco-section ftco-no-pt">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-3 py-5 order-md-last">
	          <div class="heading-section ftco-animate">
	          	<span class="subheading">Pengajian</span>
	            <h2 class="mb-4">Pengajian Rutin</h2>
	            <p>Jadwal Pengajian rutin masjid Al-Amanah</p>
	            <p><a href="#" class="btn btn-primary py-3 px-4"><i class="fa fa-calendar"></i> Get a Schedule</a></p>
	          </div>
    			</div>
    			<div class="col-lg-9 services-wrap px-4 pt-5">
    				<div class="row pt-md-3">
    					<div class="col-md-4 d-flex align-items-stretch">
		    				<div class="services text-center">
		    					<div class="icon d-flex justify-content-center align-items-center">
		    						<span class="flaticon-give-money"></span>
		    					</div>
		    					<div class="text">
		    						<h3>Zakat</h3>
		    						<p>Masjid Al-Amanah siap menerima & menyalurkan zakat fitrah, mall & fidyah</p>
		    					</div>
		    					<a href="{{route('clientZakat')}}" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
		    				</div>
		    			</div>
		    			<div class="col-md-4 d-flex align-items-stretch">
		    				<div class="services text-center y">
		    					<div class="icon d-flex justify-content-center align-items-center">
                                    <span class="flaticon-cow">
                                    </span>
                                </div>
		    					<div class="text">
		    						<h3>Hewan Qurban</h3>
		    						<p>Masjid Al-Amanah siap menerima & menyalurkan hewan qurban</p>
		    					</div>
		    					<a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
		    				</div>
		    			</div>
		    			<div class="col-md-4 d-flex align-items-stretch">
		    				<div class="services text-center">
		    					<div class="icon d-flex justify-content-center align-items-center">
		    						<span class="fa fa-group"></span>
		    					</div>
		    					<div class="text">
		    						<h3>Jamaah</h3>
		    						<p>Masjid Al-amanah telah melakukan pencatatan / sensus terhadap jamaah</p>
		    					</div>
		    					<a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
		    				</div>
		    			</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
   	
    <section class="ftco-section ftco-no-pt ftco-no-pb bg-light">
    	<div class="container">
    		<div class="row d-flex">
    			<div class="col-md-6 d-flex">
    				<div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-end" style="background-image:url({{asset('lawncare/images/about.jpg')}});">
    					<a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
    						<span class="icon-play"></span>
    					</a>
    				</div>
    			</div>
    			<div class="col-md-6 pl-md-5">
    				<div class="row justify-content-start py-5">
		          <div class="col-md-12 heading-section ftco-animate">
		          	<span class="subheading">Profile</span>
		            <h2 class="mb-4">Profile Masjid Al-Amanah</h2>
		            <p></p>
		            <div class="services-wrap">
		            	<a href="#" class="services-list">Idarah
		            		<div class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></div>
		            	</a>
		            	<a href="#" class="services-list">Imarah
		            		<div class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></div>
		            	</a>
		            	<a href="#" class="services-list">Riayah
		            		<div class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></div>
		            	</a>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>

    <section class="ftco-intro bg-primary py-5">
			<div class="container">
				<div class="row justify-content-between align-items-center">
					<div class="col-md-6">
						<h2>Wakaf Transfer</h2>
						<p>Anda dapat berinfaq via transfer melalui Bank xyz Atas Nama </p>
					</div>
					<div class="col-md-5 text-md-right">
						<span class="contact-number">+00(123) 456-78-09</span>
					</div>
				</div>
			</div>
		</section>
		


    <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Pengurus</span>
            <h2 class="mb-4">DKM Masjid</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="text">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <div class="d-flex align-items-center">
                    	<div class="user-img" style="background-image: url({{asset('lawncare/images/person_1.jpg')}});"></div>
                    	<div class="pl-3">
		                    <p class="name">Roger Scott</p>
		                    <span class="position">Marketing Manager</span>
		                  </div>
	                  </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="text">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <div class="d-flex align-items-center">
                    	<div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                    	<div class="pl-3">
		                    <p class="name">Roger Scott</p>
		                    <span class="position">Marketing Manager</span>
		                  </div>
	                  </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="text">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <div class="d-flex align-items-center">
                    	<div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
                    	<div class="pl-3">
		                    <p class="name">Roger Scott</p>
		                    <span class="position">Marketing Manager</span>
		                  </div>
	                  </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="text">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <div class="d-flex align-items-center">
                    	<div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                    	<div class="pl-3">
		                    <p class="name">Roger Scott</p>
		                    <span class="position">Marketing Manager</span>
		                  </div>
	                  </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="text">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <div class="d-flex align-items-center">
                    	<div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                    	<div class="pl-3">
		                    <p class="name">Roger Scott</p>
		                    <span class="position">Marketing Manager</span>
		                  </div>
	                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Our Blog</span>
            <h2>Recent Blog</h2>
          </div>
        </div>
        <div class="row d-flex">
		@foreach($blog as $blogs)
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="{{route('blogContent',$blogs->slug)}}" class="block-20" style="background-image: url('{{asset('uploads/'.$blogs->gambar.'')}}');">
              </a>
              <div class="text p-4 float-right d-block">
              	<div class="topper d-flex align-items-center">
              		<div class="one py-2 pl-3 pr-1 align-self-stretch">
              			<span class="day">{{Carbon::parse($blogs->created_at)->format('j') }}</span>
              		</div>
              		<div class="two pl-0 pr-3 py-2 align-self-stretch">
              			<span class="yr">{{Carbon::parse($blogs->created_at)->format('Y') }}</span>
              			<span class="mos">{{Carbon::parse($blogs->created_at)->format('F') }}</span>
              		</div>
              	</div>
              	<h3 class="heading mb-0"><a href="{{route('blogContent',$blogs->slug)}}">{{$blogs->judul}}</a></h3>
                <p>
					{{Str::limit(strip_tags($blogs->isi),100,'...')}}
				</p>
                <p><a href="{{route('blogContent',$blogs->slug)}}" class="btn btn-primary">Read more</a></p>
              </div>
            </div>
          </div>
		@endforeach
        </div>
      </div>
    </section>
		

    <section class="ftco-section ftco-no-pt ftco-no-pb bg-primary">
      <div class="container">
        <div class="row d-flex justify-content-center">
        	<div class="col-lg-8 py-4">
        		<div class="row">
		          <div class="col-md-6 ftco-animate d-flex align-items-center">
		            <h2 class="mb-0" style="color:white; font-size: 24px;">Subcribe to our Newsletter</h2>
		          </div>
		          <div class="col-md-6 d-flex align-items-center">
		            <form action="#" class="subscribe-form">
		              <div class="form-group d-flex">
		                <input type="text" class="form-control" placeholder="Enter email address">
		                <input type="submit" value="Subscribe" class="submit px-3">
		              </div>
		            </form>
		          </div>
	          </div>
          </div>
        </div>
      </div>
    </section>

@endsection