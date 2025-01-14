$(window).on('load resize', function(){
  resizeIconsAndLabels('my-hotel-icon', 'my-hotel-label');

  $('.my-destination').each(function(){
    resizeImages($(this));
  });
});


$(function(){

  $('.my-hotel-delete').on('click', function(e) {
    e.preventDefault();

    $hotelDelete = $(this);
    $hotel = $hotelDelete.closest('.my-hotel');
    $destination = $hotel.closest('.my-destination');
    hotelLabel = $hotel.find('.my-filter-target').text();


    $.ajax({
      
      url: $hotelDelete.attr('data-url'),
      method: 'delete',
      
      data: {
        _token: $hotelDelete.attr('data-token')
      },
      

      success : function(data) {

        if(data === "ok") {
          
          $hotel.remove();

          if($destination.find('.my-hotel').length < 1) {
            $destination.remove();
          }

          $('#my-entity-delete-status')
            .addClass('my-entity-delete-status-ok')
            .removeClass('d-none')
            .html(`<i>"${hotelLabel}"</i> has successfully been deleted`);

        } 


        else {
          
          $('#my-entity-delete-status')
            .addClass('my-entity-delete-status-ko')
            .removeClass('d-none')
            .html(`Something went wrong when attempting to delete <i>"${hotelLabel}"</i>`);

        }

      },
      

      error: function (error) {
        
        $('#my-entity-delete-status')
          .addClass('my-entity-delete-status-ko')
          .removeClass('d-none')
          .text(error.responseJSON.message);
      
      },


      complete: function () {
        resizeLayout();
      }

    });
  });

});

