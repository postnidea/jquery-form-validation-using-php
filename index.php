<title>Postnidea | Jquery Form validation with database using php</title>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style type="text/css">
  body{
    margin-top: 20px;
}
h3.heading {
    border-bottom: 3px solid #cccc;
    font-size: 17px;
    margin-bottom: 17px;
    margin-left: 16px;
    padding: 0 0 11px;
    width: 94%;
    }
input[type=submit]{
  margin-left: 16px;
}    
input[type=submit]+.alert-success{
    float: right;
    margin-right: 15px;
    padding: 6px;
    width: 77%;
  }
.myform{
  height: 295px;
}

</style>
</head>
<body>
  <div class="container">
      <div class="row">
        <div class="col-md-6 myform">
          <h3 class="heading">Form with error & success message</h3>
          <form id="case1" action="process.php?case=case1">
              <div class="col-md-6 form-group"><input type="text" class="form-control" name="fname" placeholder="Full Name"></div>
              <div class="col-md-6 form-group"><input type="text" class="form-control" name="username" placeholder="username"></div>
              <div class="col-md-6 form-group"><input type="password" class="form-control" name="password" placeholder="Password"></div>
              <div class="col-md-6 form-group"><input type="password" class="form-control" name="password1" placeholder="Confirm Password"></div>
        
              <input type="submit" class="btn btn-primary" id="case1_button" value="Case 1">
          </form>
        </div>

        <div class="col-md-6 myform">
          <h3 class="heading">Form with callback function</h3>
          <form id="case2" action="process.php?case=case2">
              <div class="col-md-6 form-group"><input type="text" class="form-control" name="fname1" placeholder="Full Name"></div>
              <div class="col-md-6 form-group"><input type="text" class="form-control" name="username1" placeholder="username"></div>
              <div class="col-md-6 form-group"><input type="password" class="form-control" name="password2" placeholder="Password"></div>
              <div class="col-md-6 form-group"><input type="password" class="form-control" name="password3" placeholder="Confirm Password"></div>
        
              <input type="submit" class="btn btn-primary" id="case2_button" value="Case 2">
          </form>
        </div>


        <div class="col-md-6 myform">
          <h3 class="heading">Form success redirect to another page</h3>
          <form id="case3" action="process.php?case=case3">
              <div class="col-md-6 form-group"><input type="text" class="form-control" name="fname3" placeholder="Full Name"></div>
              <div class="col-md-6 form-group"><input type="text" class="form-control" name="username3" placeholder="username"></div>
              <div class="col-md-6 form-group"><input type="password" class="form-control" name="password4" placeholder="Password"></div>
              <div class="col-md-6 form-group"><input type="password" class="form-control" name="password5" placeholder="Confirm Password"></div>
        
              <input type="submit" class="btn btn-primary" id="case3_button" value="Case 3">
          </form>
        </div>
      </div>
  </div>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.server_validation.js"></script>
<script type="text/javascript" src="js/myscript.js"></script>