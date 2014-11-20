
/*


$.ajax({
  type: "POST",
  data: {
    invoiceno:jobid
  },
  url: "animalHandler.php",
  dataType: "html",
  async: false,
  success: function(data) {
    result=data;
  }
});


*/

/**
 * ConcatPDF runs ajax request to php script for
 *
 * @param items
 */


function concatPDF( items ) {




}


$(function() {

  $('#controls button').click( function() {

    // Vars
    var selectedItem = '#grid .grid__item.added';
    var selectedPDFs = [];

    // Create list of selected pdfs
    $(selectedItem).each( function() {
      selectedPDFs.push($(this).find('img').attr('data-pdf'));
    });

    // Debug
    console.log(selectedPDFs);

    if(selectedPDFs.length > 0) {
      // Run concat function - download default
      concatPDF(selectedPDFs);
    } else {
      alert('You didn\'t select any pdfs to concatenate.');
    }



  });

});
