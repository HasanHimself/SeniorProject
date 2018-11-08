$(document).ready(function() {

  $("#category").change(function() {
      var $dropdownCat = $(this);
      var $dropdownComp = $("#company");
      $("#branch").empty();
      $("#service").empty();
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


			if($dropdownComp.prop("disabled") == true) {
        $dropdownComp.prop("disabled", false);
        }
          $dropdownComp.empty();
          
          $dropdownComp.append("<option value=''>Choose a company</option>");
        	$.each(companiesInCat, function(index, value) {
        	$dropdownComp.append("<option " + "value = '" + value + "'>" + value + "</option>");
        });

  			

  		});

      	

    }); 

  $("#company").change(function() {

    $("#service").empty();
    $dropdownComp = $(this);
    $dropdownBranch = $("#branch");
    $dropdownBranch.prop("disabled", false);
    $dropdownBranch.load("compgetter.php?choice=" + $dropdownComp.val());
  });       

  $("#branch").change(function() {
    $dropdownBranch = $(this);
    $dropdownService = $("#service");
    $dropdownService.prop("disabled", false);
    $dropdownService.load("branchgetter.php?choice=" + $dropdownBranch.val());


  });

});