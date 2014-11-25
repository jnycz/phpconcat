/**
 * ConcatPDF runs ajax request to php script for
 *
 * @param items
 */
function concatPDF( items ) {

  var parameters = {
    pdfs: items
  };

  // Ajax request passing pdf string to php
  var options = {
    type: "POST",
    data: parameters,
    url: "/_includes/concatHandler.php",
    dataType: "html",
    context: document.body,
    success: function(data) {

      console.log(data);
      if (data) {
        if (data.path) {
          //Create an hidden iframe, with the 'src' attribute set to the created ZIP file.
          var dlif = $('<iframe/>',{'src':data.path}).hide();
          //Append the iFrame to the context
          this.append(dlif);
        } else if (data.error) {
          alert(data.error);
        } else {
          alert('Something went wrong');
        }
      }
    },
    error: function(items) {
      alert('Error');
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
    console.log(selectedPDFs);
    console.log('Num Items Added: ' + selectedPDFs.length);

    if(selectedPDFs.length > 0) {
      // Run concat function - download default
      alert('RUN CONCAT!');
      concatPDF(selectedPDFs);
    } else {
      alert('You didn\'t select any pdfs to concatenate.');
    }



  });

});

//Reference
// http://stackoverflow.com/questions/6668776/download-file-through-an-ajax-call-php
