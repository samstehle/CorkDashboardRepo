                                                                                                                                                                                                                                                                                                <!DOCTYPE HTML>
<!--
	Halcyonic 3.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
	<title>Cork Dashboard Cork RealTime</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Provides access to a live information coming from sensors in Cork" />
		<meta name="keywords" content="Corkdashboard, Cork,Dashboard,Live, Travel, Environment, Bikes, Air, Traffic, Water" />
	<script src="/dublindashboard/js/Dashboard/jquery.min.js"></script>
		<!-- <script src="/dublindashboard/js/Dashboard/config.js"></script> -->
		
		<script src="/dublindashboard/js/Dashboard/skel.min.js"></script>
		<!-- <script src="/dublindashboard/js/Dashboard/skel-panels.min.js"></script> -->
		<script src="/dublindashboard/js/Dashboard/skel-layers.min.js"></script> 
		<script src="/dublindashboard/js/Dashboard/init.js"></script>

         
		<noscript>
			<link rel="stylesheet" href="/dublindashboard/css/Dashboard/skel-noscript.css" />
			<link rel="stylesheet" href="/dublindashboard/css/Dashboard/style.css" />
			<link rel="stylesheet" href="/dublindashboard/css/Dashboard/style-desktop.css" />

		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="/dublindashboard/css/Dashboard/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="/dublindashboard/js/Dashboard/html5shiv.js"></script><![endif]-->
		<?php  echo $this->Html->script('jquery.min.js'); ?>
         <!-- Stylesheets -->
	<?php echo $this->Html->css('3cols'); ?>
	<?php echo $this->Html->css('2cols'); ?>
	<?php echo $this->Html->css('4cols'); ?>
        <?php echo $this->Html->css('6cols'); ?>
	<?php echo $this->Html->css('col'); ?>

	<?php echo $this->Html->css('responsivegridsystem2'); ?> 
        <?php echo $this->Html->css('tabs'); ?> 
        <?php echo $this->fetch('content');?>
     
     <style type="text/css">

	/*  THIS IS JUST TO GET THE GRID TO SHOW UP.  YOU DONT NEED THIS IN YOUR CODE */

	#maincontent .col {
		background: #ccc;
		background: rgba(255,255,255, 0.3);

	}

	</style>
	
           
	</head>
	<body >

		<!-- Header -->
			<div id="header-wrapper">
			<header id="header" class="container">
					<div class="row">
						<div class="12u">
						
				<!-- Banner -->

                            <?php echo $this->element('dbBanner'); ?>

						</div>
					</div>
				</header>
			
        
                      <div id="band">
					<section>
						<div class="row">
							
							
							<?php echo $this->element('dbNavMenu'); ?>

							
				
						</div>
				</section>
				</div>
                
</div>
		<!-- Content -->
			<div id="content-wrapper">
				<div id="content">
					<div class="container">
						<div class="row">
							<div class="2u">
								
								<!-- Sidebar -->
								<section>
										<header>
											<h2>Other Data Modules</h2>
										</header>
										<ul class="link-list">
                                        <?php echo $this->element('sidebar'); ?>
											
											
										</ul>
									</section>

							</div>
							<div class="10u important(collapse)">
								
								<!-- Main Content -->
									<section>
									<header>
											<h2>Home - Cork Real Time</h2>
											<h3>Real Time Environment and Travel Maps</h3>
										</header>
					<div id="headcontainer">
                    <header>
               
                    
                </div>
                <div id="maincontentcontainer">
                   
        
 
                     <div class="section group">
   
                            
                            
                        
                   
                     <div class="col span_1_of_2">
                          <center>
                                     <div id ="containerGG">
                       <div class="upper">
                             <a href ="/./pages/HomeEnvironment">
                            <img src="/dublindashboard/img/real_time_environment.png" alt="environment Icon"></td></a>
                                         </div>
                  
                    </div>
                            </center>
                            </div>
                        
                                   <div class="col span_1_of_2">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
        
                            <a href="/pages/HomeTravel">
                            <img src="/dublindashboard/img/real_time_travel.png" alt="housing Icon"></td></a>
                              </div>
                
                    </div>
                                    
                            
                            </center>
                                
                            </div>
                            
                            
                          
                        </div>      
                        
             
           
                            
                        
                 
          </body>
						
                                        
                                        
  
					
					
				
				
									</section>
                                
                                

							</div>
						</div>
					</div>
				</div>
			</div>

		<!--		<!-- Footer -->
			<div id="footer-wrapper">
                
				<footer id="footer" class="container">

							
					<div class="row">
			
 
                        
            
	<?php echo $this->element('dbFooter'); ?>

						
						
                          
                        
                        
                        
					</div>
				</footer>
			</div>
		<?php echo $this->element('googleAnalytics'); ?>
		<!-- Copyright -->
			<div id="copyright">
				<?php echo $this->element('copyright'); ?>
			</div>

	</body>
</html>
                                                            
                            
                                                            
                            
                            
                            
                            
                            
                                                            
                            
                            
                            