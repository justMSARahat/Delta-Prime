<section class="subscribe__area pb-100">
	<div class="container">
		<div class="subscribe__inner pt-95">
		@if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     @if (\Session::has('failure'))
      <div class="alert alert-danger">
        <p>{{ \Session::get('failure') }}</p>
      </div><br />
     @endif
			<div class="row">
				<div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2">
					<div class="subscribe__content text-center">
                        @foreach ( App\Models\Backend\headertitle::orderBy('title','asc')->where('position','newsletter')->get() as $info )
                            <h2>{{ $info->title }}</h2>
                            <p>{{ $info->subtitle }}</p>
                        @endforeach
						<div class="subscribe__form">
							<form method="post" action="{{url('newsletter')}}">
								@csrf
								<input type="email" placeholder="Subscribe to our newsletter..." name="email">
								<button type="submit" class="os-btn os-btn-2 os-btn-3">subscribe</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
