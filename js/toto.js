
const toto =()=> {alert('click!')  }
toto()
// external js: isotope.pkgd.js, imagesloaded.pkgd.js

// init Isotope
var $grid = $('.category_container').isotope({
    itemSelector: '.grid',
    // percentPosition: true,
    masonry: {
      // columnWidth: '.grid-sizer',
          // gutter: 100,
          fitWidth: true,
          columnWidth: 400,
    }
  });
  // layout Isotope after each image loads
  $grid.imagesLoaded().progress( function() {
    $grid.isotope('layout');
  });

  $grid()
  