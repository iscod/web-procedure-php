<?php //Script 8.8 -login.php
/*this page title people log into the site (in theory). */
//set the page title and include the header file:
	define('TITLE','登陆'); 
	require('templates/header.html');
	print 
		 '<h1>Login form</h1>
		 <p>User who are logged in can take advantage of certai
		 feaures link this ,that, and the other thing.</p>';
 //check if the form has beeen submitted:
 if (isset($_POST['submitted']))
 	{
 		//handle the form:
 		if ((!empty($_POST['email']))&&(!empty($_POST['password'])))
 		{
 			if((strtolower($_POST['email'])=='ascoon@163.com')&&($_POST['password']='testpass'))
 				{ //Correct
 					ob_end_clean();
 					header('Location:welcome.php');
 					exit();
 					
 				}else
 				{//Incorrect!
 					print 
 						'<p>The submitted email address and password do not match those on file!
 						<br/>Go back and try again.</p>';
 				}

 		}else
 			{//Forgot a filed.
 				print 
 				'
 				<p>please make sure you enter both an email adderss and a password!<br/>
				Go back and try again.</p>
 				';
 			}
 	}else 
 	      {//Dispaly the form .
 			print
 				'
 				<form action="login.php" method="post">
 				<p>Email Address:<input type="text" name="email" size="20"/></p>
 				<p>password :<input type="password" name="password" size="20"/></p>
 				<p><input type="submit" name="submit" value="Log In!"/></p>
 				<input type="hidden" name="submitted" value="true"/>
 				</forom>
 				';
 			}
 	require('templates/footer.html');//include footer
?>