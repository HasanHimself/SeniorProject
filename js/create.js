$(document).ready(function() {
  $("#category").change(function() {
  	    var $dropdownCat = $(this);
      	var $dropdownComp = $("#company");
  		$.getJSON("categories.json", function(data) {
  			var selectedCat = $dropdownCat.val();
  			var companiesInCat = [];

  			switch(selectedCat) {
  				case 'communications':
  					companiesInCat = data.communications.split(",");
  					break;
				case 'resturants':
					companiesInCat = data.resturants.split(",");
					break;
				case 'banks':
					companiesInCat = data.banks.split(",");
					}


			$dropdownComp.empty();
			$dropdownComp.prop("disabled", false);

        	$.each(companiesInCat, function(index, value) {
        	$dropdownComp.append("<option " + "value = '" + value + "'>" + value + "</option>");
        });

  			

  		});

      	

    });        

});