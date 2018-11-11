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

  $("#show-info").click(function() {
    $dropdownService = $("#service");
    serviceVal = $dropdownService.val();
    branchVal = $("#branch").val();
    companyVal = $("#company").val();

    if(companyVal && branchVal && serviceVal)
    {
      $.ajax({
      url: 'paramgetter.php?service=' + $dropdownService.val(),
      type: 'GET',
      success: function(results) {
      alert(results);
      },
      error: function() {
        alert("epic fail");
      }
      });
    }

    else
    {
      alert("Please choose a service first");
    }
  });

  // $("#show-info").click(function() {
  //   $dropdownService = $("#service");
  //   $.ajax({
  //     url: 'paramgetter.php?service=' + $dropdownService.val(),
  //     type: 'GET',
  //     beforeSend: function(results) {

  //     }
  //   })
  // })

});