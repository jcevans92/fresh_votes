voterApp.controller('voterLoginController', function($http, $window, $location) {
      var voter = this;
      voter.login = function () {
        // Login User
        var jsonData = {
           username: voter.firstName
           };

        $http({
                method: "post",
                url: "ajax/loginStudent.php",
                data: JSON.stringify(jsonData)
            }).then(function successCallback(response) {

                    // this callback will be called asynchronously
                  // when the response is available
                  if(response.data == "success") {
                    //alert("success");
                    var host = $window.location.host;
                    var url = host + "/vote.php";
                    $window.location = 'vote.php';//$location.path(url);
                  } else {
                    // handle failure
                    console.log(response);
                  }
                  //alert("Successfully Logged In");
               }, function errorCallback(response) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
                //$scope.responseMessage = "Username or Password is incorrect"
                alert("Error with the routing.");
               });
      };
  });
