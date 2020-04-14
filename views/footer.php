    </div>
    <!--Este é o inicio do footer -->	
	
        

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?=URL;?>public/bs/js/jquery.min.js"></script>
       
        <script src="<?=URL;?>public/bs/js/jquery-ui.min.js" type="text/javascript"></script>
        

        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?=URL;?>public/bs/js/bootstrap.min.js"></script>
        <script src="<?=URL;?>public/bs/js/vue.js"></script>
        <script src="<?=URL;?>public/bs/js/toastr.min.js"></script>
        <script src="<?=URL;?>public/bs/js/jquery.blockUI.js"></script>
        <script src="<?=URL;?>public/bs/js/jquery.mask.min.js"></script>
       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.2/axios.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
            <?php
                if(isset($this->js)){
                    foreach ($this->js as $js)
                            {
                                echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
                            }
                }

            ?>
	
   </body>
</html>