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
            <a class="navbar-brand" href="<?php echo DIR ?>"><img src="assets/images/menu-logo.png" /></a>
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
                            if(empty($strGetUrl) ){
                                $strGetUrl = 'index';
                            }
                            if($strGetUrl == $strIndexUrl){
                                $strActiveClass = 'active';
                            }
                ?>
                            <li class=" dropdown nav-item <?php echo $strActiveClass; ?>">
                                <?php
                                    $strAddSpanTag = '';
                                    $strAddSubMenus = array();
                                    $bootstrapToogle = '';
                                    if( $strIndexUrl == 'index' ){
                                        $strAddSpanTag = '<span class="sr-only">(current)</span>';
                                    }

                                    if( $strIndexUrl == 'product'){
                                        $getCatQuery = $connection->tableDataCondition("categories_id, categories_name", "categories", "categories_status=1");
                                        $strAddSubMenus = $getCatQuery->fetchAll(PDO::FETCH_ASSOC);
                                        $bootstrapToogle = 'data-toggle="dropdown"';
                                    }
                                ?>
                                <a class="dropdown-toggle" <?php echo $bootstrapToogle ?>  href="<?php echo DIR .''. $strIndexUrl; ?>"><?php echo $strMenu; ?></a>
                                    <?php 
                                        if( !empty( $strAddSubMenus ) ){
                                        echo "<ul class='dropdown-menu'>";
                                            foreach ($strAddSubMenus as $strProIndex => $strAddSubCat) {
                                    ?>
                                            <li><a href="<?php echo $strIndexUrl .'?cat='. $strAddSubCat['categories_id'] .'&subid=1' ; ?>"> <?php echo $strAddSubCat['categories_name']; ?> </a></li>
                                        
                                    <?php } echo "</ul>"; } ?>
                            </li>        
                <?php    }
                ?>
                 <!-- <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Page 1-1</a></li>
                      <li><a href="#">Page 1-2</a></li>
                      <li><a href="#">Page 1-3</a></li>
                    </ul>
                </li> -->
            </ul>
        </div>
    </nav>
    
</div>