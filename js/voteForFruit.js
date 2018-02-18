voterApp.controller('voteFruitController', function($http, $window, $location) {
      var vote = this;
      //vote.votes = [];
      // get votes
      var getData = {
        vot_key: vote.vot_key
      };
      $http.get("ajax/getFruits.php").then(function successCallback(response) {
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

      vote.submitVote = function () {
        // Submit Vote
        var jsonData = {
           vot_key: vote.vot_key,
           fru_key: vote.fru_key,
           vxf_vote: vote.vxf_vote
           };

        $http({
                method: "post",
                url: "ajax/loginStudent.php",
                data: JSON.stringify(jsonData)
            }).then(function successCallback(response) {
              // this callback will be called asynchronously
              // when the response is available
              if(response.data == "success") {
                alert("success");
              } else {
                // handle failure
                console.log(response);
              }
              //alert("Successfully Logged In");
           }, function errorCallback(response) {
           });
      };
  });
