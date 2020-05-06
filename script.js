function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
  
  function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
      if(getCookie("userID")==""){
          document.cookie = "userID=" + profile.getId();
            var id_token = googleUser.getAuthResponse().id_token;
            window.location.replace("https://nith.ml/login.php?id="+profile.getId()+"&name="+profile.getName()+"&email="+profile.getEmail());
            document.querySelector('.analytics-table').setAttribute("hidden","true")
      }
      else {
      if(getCookie("userID")!=profile.getId()){
          document.cookie = "userID=" + profile.getId();
            window.location.replace("https://nith.ml/login.php?id="+profile.getId()+"&name="+profile.getName()+"&email="+profile.getEmail());
      }
          else{
            document.querySelector('.analytics-table').removeAttribute("hidden")
      }
      }
      
  }