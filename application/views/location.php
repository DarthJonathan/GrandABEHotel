<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . '/component.css'?>">
<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . '/slick.css'?>">
<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . '/slick-theme.css'?>">
<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . '/magnific-popup.css'?>">
<script src="<?php echo base_url() . JS_DIR . '/classie.js' ?>"></script>
<script src="<?php echo base_url() . JS_DIR . '/modernizr.min.js' ?>"></script>
<script src="<?php echo base_url() . JS_DIR . '/photostack.js' ?>"></script>
<script src="<?php echo base_url() . JS_DIR . '/slick.min.js' ?>"></script>
<script src="<?php echo base_url() . JS_DIR . '/jquery.magnific-popup.min.js' ?>"></script>
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAK0tB_7EonmaOzSbeUxxvkpNHK3PgwnQM&libraries=places"></script>-->

<!--GA USAH PAKE API-->
<!--<script>-->
<!--      function initMap() {-->
<!--        var directionsService = new google.maps.DirectionsService;-->
<!--        var directionsDisplay = new google.maps.DirectionsRenderer;-->
<!---->
<!--        var map = new google.maps.Map(document.getElementById('map'), {-->
<!--          zoom: 12,-->
<!--          center: {lat: -2.57, lng: 140.51}-->
<!--        });-->
<!--        directionsDisplay.setMap(map);-->
<!---->
<!--		calculateAndDisplayRoute(directionsService, directionsDisplay);-->
<!--      }-->
<!---->
<!--      function calculateAndDisplayRoute(directionsService, directionsDisplay) {-->
<!--		var airport = new google.maps.LatLng(-2.57, 140.51);-->
<!--		var grandabe = new google.maps.LatLng(-2.61, 140.66);-->
<!---->
<!--        directionsService.route({-->
<!--          origin: airport,-->
<!--          destination: grandabe,-->
<!--          travelMode: 'DRIVING'-->
<!--        }, function(response, status) {-->
<!--          if (status === 'OK') {-->
<!--            directionsDisplay.setDirections(response);-->
<!--          } else {-->
<!--            window.alert('Directions request failed due to ' + status);-->
<!--          }-->
<!--        });-->
<!--      }-->
<!--</script>-->
<!--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAK0tB_7EonmaOzSbeUxxvkpNHK3PgwnQM&callback=initMap" type="text/javascript"></script>-->

<style>
	#map 
	{
		height: 400px;
		width:100%;
	}

    .modal-container
    {
        width:100%;
        height:100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<script>
$(document).ready(function(){
	
	var popUpId = 0;

	$('.locDes').each(function()
	{
		if($(this).html().length > 200)
		{
			var original = $(this).html();
			var text = original;

			text = text.substring(0, 200);
			last = text.lastIndexOf(" ");
			text = text.substring(0, last);

			$(this).html(text + '... <a class="popupclick" id="#' + popUpId +'" href="#' + popUpId +'">Read More</a>');

			$(this).parent().append('<div class="popup mfp-hide" id="'  + popUpId + '">' + original + '</div>');

			popUpId++;
		}
	});

	for(var i=0; i<popUpId; i++)
	{
		$(".popupclick").magnificPopup({
			type:'inline',
			midClick: true
		});
	}

});
</script>

<div class="container">
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-container">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <p>Some text in the modal.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<section id="whereAreWe">
    <div class="container">
        <div class="row">
            <div class="col-xl-7">
                <div class="mapsWrapper">
                    <div id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1775.417745752815!2d140.66627566975478!3d-2.610435105393257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xadc84ceab536f6a!2sGrand+Abe+Hotel!5e0!3m2!1sen!2s!4v1502297805657" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 mapwrap">
                <div class="rightSideMaps">
                    <h1>Where Are We</h1>
                    <?php echo $headerLocation->ta_where; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="headerTouristAttraction">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panelHeaderTouristAttraction">
                    <h1>Tourist Attractions</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="touristAttraction">
    <div class="container-fluid tourist-attr-slider">
	<?php
		if(!empty($locations)){
			foreach ($locations as $count => $location) : ?>
            <div class="col-lg-4 col-md-6 panel">
                <img src="<?php echo base_url() . "assets/images/uploads/locations/" . $location->image ?>" alt="">
				<div class="inner-panel">
					<div class="col-lg-12">
						<div class="touristLeft">
							<h1><?php echo $location->name ?></h1>
                            <hr>
							    <div class="locDes wordwrapper"><?php echo $location->description ?></div>
						</div>
					</div>
				</div>
            </div>
	<?php endforeach;
		}
	?>
    </div>
</section>

<section id="scattered">
	<section id="photostack-2" class="photostack photostack-start">
		<div>

			<?php 
				if(!empty($photos)){
					foreach ($photos as $photo): ?>
							<figure onclick="open_this('<?php echo $photo->id ?>')">
								<img src="<?php echo base_url ().'assets/images/uploads/locationPhotos/'.$photo->photo ?>" style="width:100%;" alt="img01"/>
								<figcaption>
									<h2 class="photostack-title"><?php echo $photo->title ?></h2>
									<div class="photostack-back">
										<?php echo $photo->caption ?>
									</div>
								</figcaption>
							</figure>			
                    <?php endforeach;
				}
			?>
			
		</div>
	</section>
</section>

<div class="kentang">

</div>


<script>
	new Photostack( document.getElementById( 'photostack-2' ), {
		callback : function( item ) {
			//console.log(item)
		}
	} );
</script>


<script>
    var images = JSON.parse('<?php echo $images ?>');

    function open_this(e){

        $('#myModal').modal('toggle');

        $.each(images, function(key, value){
            if(value.id == e){
                $('.modal-body').html(
                    "<img src='./assets/images/uploads/locationPhotos/" + value.photo + "' width='450px'>"
                );
            }
        });
    }

	$(document).ready(function(){

        var responsiveSettings = [
            {
                breakpoint: 992,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 1,
                    dots: true
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 1,
                    dots: true
                }
            }
        ];

	  $('.tourist-attr-slider').slick({
	  	autoplay: true,
  		autoplaySpeed: 5000,
        arrows: false,
        slidesToShow: 3,
        responsive: responsiveSettings
	  });
	});
</script>