/* scripts for search*/  
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'php/search.php?key=%QUERY',
        limit : 10
      });
    });
   
   function validateForm() {
    var x = document.forms["search"]["typeahead"].value;
    if (x == null || x == "") {
        alert("Error");
        return false;
    }
  }