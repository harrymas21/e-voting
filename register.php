<?php
 include"assets/include/header.php";
 ?>
     <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                    <?php
					 if($role == 0){
						 echo'
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="index.php">Home</a></li>
                            <li><a class="menu-top-active" href="register.php">Register</a></li>
                            <li><a href="member.php">Members</a></li>
                            <li><a href="results.php">Results</a></li>
                        </ul>';
					//login as student:
					 }else if($role == 1){
						 echo'
						 <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a class="menu-top-active" href="index.php">Home</a></li>
                            <li><a href="vote.php">Vote</a></li>
                            <li><a href="motionapp.php">Motions</a></li>
                            <li><a href="results.php">Results</a></li>
                        </ul>';
					 }
					?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Registration Forms </h1>
                    </div>
                </div>
                <div id="tt" class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Fill all the Details
                        </div>
                        <div class="panel-body">
                        <div id="msg"></div>
                      <form id="ttt" role="form">
                       <!--FIRST COLUMN-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Student Name:</label>
                                <input type="text" class="form-control" onkeypress="return IsName(event);"
                                       ondrop="return false;" onpaste="return false;" id="fname" placeholder="Student Full Names" />
                                <span id="name-err" style="color: Red;"></span>
                            </div>

                            
                            <div class="form-group">
                              <label for="">ID Number:</label>
                              <input type="text" maxlength="8" class="form-control" onkeypress="return IsNumeric(event);" 
                              ondrop="return false;" onpaste="return false;" id="idno" placeholder="Student ID/Passport Number" />
                              <span id="num-err" style="color: Red; display: none">* Enter Numbers Only</span>
                              <span id="num-err1" style="color: Red;"></span>
                            </div> 
                            
                            <div class="form-group">
                                <label>Role:</label>
                                <select id="rol" class="form-control">		
                                    <option value="0">Admin</option>
                                    <option value="1">Student</option>
                                    
                                </select>
                             </div>                       
                             <hr />
                       </div>
                    
                         <!--SEC COLUMN-->
                        <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter Username" />
                                <span id="username-er" style="color: Red;"></span>
                              </div>
                            <div class="form-group">
                                <label for="">Reg number</label>
                                <input type="text" class="form-control" id="regnumber" placeholder="Enter student Reg number" />
                            </div>
                              <div class="form-group">
                                <label for="">School:</label>
                                  <select class="form-control" id="sch">
                                  <option value="1">School of Engineering</option>
                                  <option value="2">School of Nursing</option>
                                  <option value="3">School of ICT</option>
                                  <option value="4">School of Human Sciences</option>
                                  </select>
                              </div>
                               <hr />                               
                        </div>            
                        
                        <button type="button" id="btnsave" class="btn btn-info pull-left"> <!--<span class="fa fa-unlock"></span>--> Register</button>
                        <!--<button type="button" id="btnsave" class="btn btn-info" >Submit</button>-->
                     </form>      
                    </div>
                  </div>
              </div>
          </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
	<?php include"assets/include/footer.php"; ?>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/register.js"></script>
    
    <script type="text/javascript">
	
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
		
	//validate id number.	
        function IsNumeric(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            document.getElementById("num-err").style.display = ret ? "none" : "block";
            return ret;
        }
	//validate telephone.
		function IsNam(e) {
            var keyCode =  e.which ? e.which : e.keyCode
            var ret_num = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            document.getElementById("num-er").style.display = ret_num ? "none" : "block";
            return ret_num;
        }
		
	//validate letters for the first name.
			function IsName(e){
				var code;
				if (!e) var e = window.event;
				if (e.keyCode) code = e.keyCode;
				else if (e.which) code = e.which;
				if (((code >= 48) && (code <= 57) || specialKeys.indexOf(code) != -1)) {
				document.getElementById("name-err").innerHTML = '* Enter Letters only.';
				return false;
					}
				return true;
		}
	//validate the second name.
			function IsName1(e){
				var code;
				if (!e) var e = window.event;
				if (e.keyCode) code = e.keyCode;
				else if (e.which) code = e.which;
				if (((code >= 48) && (code <= 57) || specialKeys.indexOf(code) != -1)) {
				document.getElementById("name-er").innerHTML = '* Enter Letters only.';
				return false;
					}
				return true;
		}

    </script> 
    
</body>
</html>
