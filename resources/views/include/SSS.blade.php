<div class="faqsection">
		<div class="container">
			<div class="container">
				<h3>Sık Sorulan Sorular<span>.</span></h3>
				<h6>Müşterilerimiz tarafından en çok sorulan soruları sizler için derledik.</h6>
			</div><!-- container -->

			<div class="row">
				<div class="col-md-6">
					@php($i = 0)
					@foreach ($sss1 as $item)
					<div class="accordion accordion-flush" id="accordionFlushExample">
						<div class="accordion-item">
							<h2 class="accordion-header" id="flush-heading{{$i++}}">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
									data-bs-target="#flush-collapse{{$i}}" aria-expanded="false"
									aria-controls="flush-collapse{{$i}}">
									{{$item->sss_questions}}
								</button>
							</h2>
							<div id="flush-collapse{{$i}}" class="accordion-collapse collapse"
								aria-labelledby="flush-heading{{$i}}" data-bs-parent="#accordionFlushExample">
								<div class="accordion-body">
									{{$item->sss_answers}}
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div><!-- col6 -->
				<div class="col-md-6">
					@php($i = 5)
					@foreach ($sss2 as $item)
					<div class="accordion accordion-flush" id="accordionFlushExample2">
						<div class="accordion-item">
							<h2 class="accordion-header" id="flush-heading{{$i++}}">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
									data-bs-target="#flush-collapse{{$i}}" aria-expanded="false"
									aria-controls="flush-collapse{{$i}}">
									{{$item->sss_questions}}
								</button>
							</h2>
							<div id="flush-collapse{{$i}}" class="accordion-collapse collapse"
								aria-labelledby="flush-heading{{$i}}" data-bs-parent="#accordionFlushExample2">
								<div class="accordion-body">
									{{$item->sss_answers}}
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div><!-- col6 -->
			</div>
		</div><!-- container -->
	</div>