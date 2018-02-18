voterApp.controller('voteFruitController', function($http, $window, $location) {
      //voteList.bNotSubmitted = true;
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
                  vote.bNotSubmitted = true;
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
        var jsonData = {"votes" : vote.votes};

        //console.log(jsonData);
        $http({
                method: "post",
                url: "ajax/submitVote.php",
                data: JSON.stringify(jsonData)
            }).then(function successCallback(response) {
              // this callback will be called asynchronously
              // when the response is available
              console.log(response);
              if(response.data == "success") {
                var host = $window.location.host;
                var url = host + "/thankyou.php";
                $window.location = 'thankyou.php';//$location.path(url);
              } else {
                // handle failure
                console.log(response);
              }
              //alert("Successfully Logged In");
           }, function errorCallback(response) {
             alert("Bad Route");
           });
      };
  });
