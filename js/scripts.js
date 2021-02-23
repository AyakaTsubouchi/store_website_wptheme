// smooth screen 
$(document).ready(function(){
  $(".our-features a").on('click', function(event) {

    if (this.hash !== "") {

      event.preventDefault();

      var hash = this.hash;
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 500, function(){

        window.location.hash = hash;
      });
    }
  });
});

/*--------------------------------------
Header
-----------------------------------------------------*/
// to show the button after scrolling
$(document).ready(function() {

  $(window).scroll(function() {
    var scrollPos = $(document).scrollTop();

    if (scrollPos > 50) {
      $(".navbar").addClass("sticky");
    } else if (scrollPos <= 50) {
      $(".navbar").removeClass("sticky");
    }
  });
});

//if the page is other than home, always show navbar 
$(document).ready(function() {
 if($(".current-menu-item a span").text()=="Home"){
  $(".navbar").removeClass("black-nav");
 }else{
  $(".navbar").addClass("black-nav");
 }
});
 


//to close an open collapsed nav when clicking the element.
  $(".nav-link").click(function() {
    if(!$(this).hasClass('dropdown-toggle')){    
      $(".navbar-collapse").collapse("hide");
      $("body").removeClass("sidebar-margin");
      $(".sidenav-backdrop").removeClass("show");
    }
  });

//to close an open collapsed nav when clicking outside of the nav elements.
  $(document).click(function(event) {
    var clickover = $(event.target);
    var _opened = $("#navbarNavAltMarkup").hasClass("show");
    if (_opened === true && !clickover.hasClass("dropdown-toggle")){
      $(".navbar-toggler").click();
    
    }
  });

//TODO I want to make it opens the dropdown list if the "dropdown" class is clicked.
$(document).click(function(e){
  var clickover = $(e.target);
  if(clickover.hasClass("dropdown-toggle")){
    if(!$(this)
    .find(`.dropdown-menu`).hasClass('shown')){
      $(this)
    .find(`.dropdown-menu`).addClass('shown')
    }else{
      $(this)
      .find(`.dropdown-menu`).removeClass('shown');
    }
  }else if($(this)
  .find(`.dropdown-menu`).hasClass('shown')){
    $(this)
    .find(`.dropdown-menu`).removeClass('shown');
  }
})
//add X to the sidenav
$(document).ready(function(){
 
    if ($(window).width() < 991) {
      $(".navbar-nav").prepend("<li class='close'><span>X</span></li>");
    }else if($(window).width() >= 991){
      $(".navbar-nav .close").remove();
    }

})
$(window).resize(function() {
  if ($(window).width() < 991) {
    $(".navbar-nav").prepend("<li class='close'><span>X</span></li>");
  }else if($(window).width() >= 991){
    $(".navbar-nav .close").remove();
  }
})
/*--------------------------------------
End of Header
-------------------------------------*/


/*--------------------------------------
HOME
-----------------------------------------------------*/
// to show the button after scrolling
$(document).ready(function() {
  $(window).scroll(function() {
    var scrollPos = $(document).scrollTop();

    if (scrollPos < 200) {
      $(".back-to-top").removeClass("shown");
    } else if (scrollPos >= 200) {
      $(".back-to-top").addClass("shown");
    }
  });
});


// $(".owl-carousel").owlCarousel();
//owl carousel for blog archive
$('.owl-carousel').owlCarousel({
  loop:true,
  // responsiveClass:true,
  // nav:true,
  responsive:{
    0:{
      items:1,
      nav:false,
      dots:true
      
  },
  700:{
    items:2,
      nav:false,
      dots:true
  },
  900:{
      items:3,
      nav:true,
      dots:false
     
  },
  1500:{
      items:5,
      nav:true,
      dots:false
     
  }
     
  }
})




/*--------------------------------------
End of HOME
-------------------------------------*/

/*--------------------------------------
 Contact
-------------------------------------*/
// change iframe default width and height

  $(window).on("load", function() {
    $(".contact-section .my-container .google-map iframe").removeAttr("width");
    $(".contact-section .my-container .google-map iframe").removeAttr("height");
    $(".contact-section .my-container .google-map iframe").attr("width", "100%");
    $(".contact-section .my-container .google-map iframe").attr("height", "100%");
  });


/*--------------------------------------
End of Contact
-------------------------------------*/
/*--------------------------------------
Modal
-----------------------------------------------------*/


$("#exampleModal").on("shown.bs.modal", function() {
  $("#myInput").trigger("focus");
});

$(".get_button_more_info").on("click", function() {
  var clickedItem = $(this).val();
  clickedItem = JSON.parse(clickedItem);

  $("#exampleModal .modal-body #modal-image").attr("src", clickedItem.img);
  $("#exampleModal .modal-body #discription").text(clickedItem.discription);
  $("#exampleModal .modal-body #postid").text(clickedItem.post_id);

  //TODO when it's deployed, change the endpoint
  const endpoint = "http://localhost:8888/wp-json/wp/v2/gallery?exclude=";
  fetch(endpoint + clickedItem.post_id)
    .then((response) => response.json())
    .then((myJSON) => {
      if (myJSON) {
        for (let i = 0; i < myJSON.length; i++) {
          $("#carouselExample .carousel-inner").append(`
    <div class='carousel-item carousel_one closed-reset'>
      <img src=${myJSON[i].fimg_url} alt="menu">
      <p>${myJSON[i].title.rendered}</p>
   
    </div>
    `);
        }
      }
    });
});

//reset the "active" position when closing the modal.
$("#exampleModal").on("hidden.bs.modal", function() {
  var firstItem = $(this).find(".carousel-item:first");
  if (!firstItem.hasClass("active")) {
    firstItem.addClass("active");
  }
  $(".closed-reset").remove();
});

/*--------------------------------------
End of Modal
-------------------------------------*/


/*--------------------------------------
End of home gallery
-------------------------------------*/


//show more photos
$(document).ready(function() {
  $('.image-gallery button:nth-child(1)').addClass('shown');
  $('.image-gallery button:nth-child(2)').addClass('shown');
  $('.image-gallery button:nth-child(3)').addClass('shown');
})

$('.image-gallery .read-more').click(function() {
  
  $('.image-gallery button').addClass('shown');
  $(this).addClass('hidden');
 });


/*--------------------------------------
End of home gallery
-------------------------------------*/

/*--------------------------------------
home business hour
-------------------------------------*/
$('.current-condition .open').click(function() {
  $('.business-hour-table').removeClass('hidden');
  $('.current-condition').addClass('hidden');
  
})
$('.business-hour-table .close').click(function() {
  $('.business-hour-table').addClass('hidden');
  $('.current-condition').removeClass('hidden');
  
})

/*--------------------------------------
End of home business hour
-------------------------------------*/