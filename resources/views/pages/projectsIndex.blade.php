@extends('layouts.main')

@section('title', 'Projects')

@section('content')

	<section id="banner" style="padding: 6em 0 2em 0; -webkit-backdrop-filter: blur(5px)">
		<div class="inner">
            <h2 class="major" style="border: none; font-size: 1.2em;">Projects - Buy or Build</h2>
        </div>
	</section>

	<div class="wrapper" style="padding: 2em 0 0 0;">

		<!-- Four -->
		<section id="four" class="wrapper alt style1">
			<div class="inner">
				
				<section class="features">
					<article>
						<form name="form4" method="post" action="item.php" autocomplete="off">
							<input type="hidden" name="id" id="id" value="4" />
							<a href="JAVASCRIPT:form4.submit()" class="image"><img src="{{ URL::asset('assets/images/spin0000.png') }}" alt="" /></a>
						</form>
						<h3 class="major">Khalid</h3>
						<p>56643
						<form role="form" method="post" action="" autocomplete="off">
							<input type="hidden" name="item" id="item" value="4" />
							<input type="text" name="quantity" id="quantity" placeholder="Quantity"/>
							<p></p>
							<input type="submit" name="submit13" value="Add to Cart" class="button fit" style="margin-bottom: 1em">
						</form></p>
						<p>Lorem ipsum</p>
						<p></p>
					</article>
				</section>
			</div>
		</section>
	</div>


@endsection