<div class="container">
     <nav role="navigation" class="navbar navbar-light bg-faded">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="assets/images/menu-logo.png" /></a>
        </div>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <?php
                $strGetUrl = '';
                $strFixedUrl = '';
                $arrUrlData = end(explode('/',$_SERVER['REQUEST_URI']));
                $strGetUrl = current(explode('.',$arrUrlData));
                $arrMenuList = array( 'index' => 'Home', 'product' => 'Products', 'overview' => 'Overview', 'gallery' => 'Gallery', 'event' => 'Events', 'career' => 'Careers', 'contact' => 'Contacts');
            ?>
            <ul class="nav navbar-nav navbar-right">
                <?php
                    foreach ($arrMenuList as $strIndexUrl => $strMenu) { 
                            $strActiveClass = '';
                            if($strGetUrl == $strIndexUrl){
                                $strActiveClass = 'active';
                            }
                ?>
                            <li class="nav-item <?php echo $strActiveClass; ?>">
                                <?php
                                    $strAddSpanTag = '';
                                    if( $strIndexUrl == 'index' ){
                                        $strAddSpanTag = '<span class="sr-only">(current)</span>';
                                    }
                                ?>
                                <a class="nav-link" href="<?php echo $strIndexUrl ?>.php"><?php echo $strMenu; ?></a>
                            </li>        
                <?php    }
                ?>
            </ul>
        </div>
    </nav>
    
</div>