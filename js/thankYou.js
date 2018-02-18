voterApp.controller('thankyouController', function($http, $window, $location) {
      var vote = this;

      $http.get("ajax/getVoteNumbers.php").then(function successCallback(response) {
                if(response.data == "success") {
                  alert("success");
                } else {
                  // handle failure
                  //console.log(response);
                  vote.votes = response.data;
                }
                //alert("Successfully Logged In");
             }, function errorCallback(response) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
                //$scope.responseMessage = "Username or Password is incorrect"
                alert("Error with the routing.");

             });
  });
