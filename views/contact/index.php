<?php include_once ROOT . '/views/header.php';
if(isset($_SESSION['user']))
{
    $userId = $_SESSION['user'];
    $user= User::getUserById($userId);
}
?>

<?php include_once ROOT . '/views/include/banner.php';?>

<?php   if ($result): ?>
<div class="animated slideInLeft"><p class="msg-send">Ваше сообщение отправлено.</p></div>
<?php else: ?>
    <?php if (isset($errors) && is_array($errors)): ?>
       <div class="animated slideInLeft">
           <ul class="msg-send-error">
               <?php foreach ($errors as $error): ?>
                   <li> - <?php echo $error; ?></li>
               <?php endforeach; ?>
           </ul>
       </div>
    <?php endif; ?>
<?php endif; ?>
        <div class="wrapper-contact">
            <div id="map" class="wow slideInUp hidden-xs hidden-sm"></div>

        <div id="contact-page" class="container">

    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">КАК С НАМИ СВЯЗАТЬСЯ</h2>
					</div>
				</div>			 		
			</div>
            <div class="row">
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Просто напишите нам</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" required="required" placeholder="Имя"  <?php if(isset($_SESSION['user'])){echo 'value='.$user['name'].' readonly';} ?>>
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email"  <?php if(isset($_SESSION['user'])){echo 'value='.$user['email'].' readonly';} ?>>
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required="required" placeholder="Тема">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="msg" id="message" required="required" class="form-control" rows="8" placeholder="Сообщение...."></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Отправить">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Мы ВСЕГДА НА СВЯЗИ</h2>
	    				<address>
							<p>Мы расположены: <?php echo $address[2]['info'] ?></p>
							<p>Звоните нам по номерам:<br> <span><?php $i=0; while ($i<count($phone_array)){echo $phone_array[$i]."<br>";$i++;}?></span></p>
							<p>Email: <?php echo $address[0]['info'] ?></p>
                            <p>Время работы: <?php echo $address[3]['info'] ?></p>
	    				</address>
                        <!--
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
                        -->
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
        </div>
<?php include_once ROOT . '/views/footer.php' ?>
