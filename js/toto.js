jQuery(document).ready(function($) {
  // Code that uses jQuery's $ can follow here.

// external js: isotope.pkgd.js, imagesloaded.pkgd.js

// init Isotope
var $grid = $('.grid2').isotope({
  itemSelector: '.grid-item-4-isotope',
  // percentPosition: true,
  masonry: {
    // columnWidth: '.grid-sizer',
		// gutter: 5,
		fitWidth: true,
		// columnWidth: 400,
  }
});
// layout Isotope after each image loads

$grid.imagesLoaded().progress( function() {
  

  console.log('TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT')
  $grid.isotope('layout');
  
});  


// const toto =()=> {alert('click!')  }

// // external js: isotope.pkgd.js, imagesloaded.pkgd.js

// // init Isotope


// console.log("jQuery",jQuery.fn.jquery) // answers jQuery 3.7.0
// console.log("jQuery",jQuery) 
// // console.log("jquery",jquery) 
// // console.log("$",$) 
// // console.log("$ version",$.fn.jquery) // answers jQuery 3.7.0
// // jq = jQuery.noConflict(true);





// var $grid = jQuery('.category_container').isotope({
//     itemSelector: '.grid-item',
//     // percentPosition: true,
//     masonry: {
//       // columnWidth: '.grid-sizer',
//           // gutter: 100,
//           fitWidth: true,
//           columnWidth: 400,
//     }
//   });
 
//   // layout Isotope after each image loads
//   // $grid.imagesLoaded().progress( function() {
//   //   alert ('kkkkkkkkkkkkk');
//   //   $grid.isotope('layout');
//   // });

//   $grid
//   toto()
});
