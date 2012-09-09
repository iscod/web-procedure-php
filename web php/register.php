<?php //Script 8.9-regiter.php
	/*this page lets people register for the site.*/
	//set the page title and include the header file:

define('TITLE','注册'); 
	require('templates/header.html');
	//print some introductory text:
	print 
		'<h1>Registration Form</h1>
		<p>Register so that you can take advatage of certain features 
		like this,that,and the other thing.</p>';
	//Add the css:
	print
		'<stye type="text/css" media="screen">
		.error{color:red}</style>';
	//check if the form has been submitted:
		if( isset($_POST['submitted']))
			{
				$problem = FALSE;//No problems so far.
				//check for each value...
				if(empty($_POST['first_name']))
					{
						$problem = TRUE;
						print '<p class="error">please enter your firet name!</p>';
					}
					if(empty($_POST['last_name']))
						{
							$problem = TRUE;
							print '<p class="error">please enter your last name!</p>';
						}
						if(empty($_POST['email']))
							{
								$problem = TRUE;
								print '<p class="error">please enter your email adderss!</p>';
							}
							if(empty($_POST['password1']))
								{
									$problem = TRUE;
									print '<p class="error">please enter your password !</p>';
								}
							if($_POST['password1'] != $_POST['password2'])
									{
										$problem = TRUE;
										print '<p class="error">your please did not match your
										 confirmed confirmed password !</p>';
									}
									if(!$problem)
										{//if there weren't any problems...
										//print a message
										print '<p>you are now registered!<br/>okay,you are 
										not really registered but..</p>';
										//send the email
										$body="Think your for rightering with the Elliott Smit fan club! 
											Your password is '{$_POST[password1]}'.";
											mail($_POST['email'],'Registration Confirmation',$body,'From:ascoon@163.com');
										//clear the posted values
										$_POST = array();

										}else
											{//forgot a field.
												print '<p class="error">please try again. </p>';

											}
			}//end of handle form if
	//Create the form:
?>
	<form action='register.php' method="post">
		<p>Fist name :<input type="text" name="first_name" size="20px"
		   value="<?php if(isset($_POST['first_name'])) {print htmlspecialchars($_POST['first_name']);} ?>"/></p>
		<p>Lsst name :<input type="text" name="last_name" size="20px"
			value="<?php if(isset($_POST['last_name'])) {print htmlspecialchars($_POST['last_name']);} ?>"/></p>
		<p>Email Address:<input type="text" name="email"  size="20px"
			value="<?php if(isset($_POST['email'])) {print htmlspecialchars($_POST['email']); }?>"></p>
		<p>password:<input type="password" name="password1" size="20px"/></p>
		<p>Confirm password:<input type="password" name="password2" size="20px"/></p>
		<p><input type="submit" name="submit" value="Register!"/></p>
		   <input type="hidden" name="submit" value="true"/>
	</form>
<?php require('templates/footer.html'); //include footer ?>