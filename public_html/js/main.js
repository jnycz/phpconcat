/**
 * ConcatPDF runs ajax request to php script for
 *
 * @param items
 */
function concatPDF( items ) {

  var parameters = {
    pdfs: items
  };

  console.log(items);

  // Ajax request passing pdf string to php
  var options = {
    type: "POST",
    data: parameters,
    url: "/_includes/concatHandler.php",
    success: function(data) {
      window.location.href = data;
    }
  };

  $.ajax(options);

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
    //console.log(selectedPDFs);
    //console.log('Num Items Added: ' + selectedPDFs.length);

    if(selectedPDFs.length > 0) {
      // Run concat function - download default
      concatPDF(selectedPDFs);
    } else {
      alert('You didn\'t select any pdfs to concatenate.');
    }

  });

});