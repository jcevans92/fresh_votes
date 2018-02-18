voterApp.controller('voteFruitController', function($http, $window, $location) {
      var vote = this;
      voter.submitVote = function () {
        // Submit Vote
        var jsonData = {
           vot_key: voter.vot_key,
           fru_key: voter.vot_key
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
