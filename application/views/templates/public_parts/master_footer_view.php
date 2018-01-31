<!--
=============================================
    Footer
==============================================
-->
<footer class="bg-two">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="footer-logo">
                    <a href="<?php echo base_url('homepage') ?>">
                        <img src="<?php echo site_url('assets/public/img/logo_f.png') ?>" alt="Logo">
                    </a>
                    <h5><a href="javascript:void(0);" class="tran3s">sales@dragongate.vn</a></h5>
                    <h6 class="p-color">(+84) 926.895.555</h6>
                </div>
            </div>
            <div class="col-md-9 col-sm-6 col-xs-12 footer-subscribe">
                <form action="#" method="post">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <input type="text" name="subscribe" placeholder="Enter your mail" style="width: 70%" id="subscribe">
                    <input type="submit" value="Subscribe Us" style="width: 20%" class="btn btn-warning active btn-subscribe" disabled>
                </form>
                <ul>
                    <li>
                        <a href="https://www.facebook.com/dragongatevn/" class="tran3s" target="_blank">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.flickr.com/photos/148965014@N03/" class="tran3s" target="_blank">
                            <i class="fa fa-flickr" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/channel/UC9DX0mBu6bZXSGm1uPAIRfA" class="tran3s" target="_blank">
                            <i class="fa fa-youtube-play" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div> <!-- /.row -->

        <div class="bottom-footer clearfix">
            <!--<ul class="float-right">
                <li><h3><span class="timer p-color" data-from="0" data-to="8997" data-speed="5000" data-refresh-interval="50">0</span> Products</h3></li>
                <li><h3><span class="timer p-color" data-from="0" data-to="53701" data-speed="5000" data-refresh-interval="50">0</span> Members</h3></li>
                <li><h3><span class="timer p-color" data-from="0" data-to="1110" data-speed="5000" data-refresh-interval="50">0</span> Shops</h3></li>
            </ul>-->
            <p class="text-center">&copy; 2017 <a href="#" class="tran3s p-color">Dragon Gate</a>. All rights reserved</p>
        </div>
    </div> <!-- /.container -->
</footer>

<!-- Scroll Top Button -->
<button class="scroll-top tran3s">
    <i class="fa fa-angle-up" aria-hidden="true"></i>
</button>



</div> <!-- /.main-page-wrapper -->
</body>
<script type="text/javascript">
    var base_url = location.protocol + "//" + location.host + (location.port ? ':' + location.port : '');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var email = null;
    $('.btn-subscribe').click(function(){
        var cct = '<?php echo $this->security->get_csrf_hash() ?>';
        var get_csrf_token_name = '<?php echo $this->security->get_csrf_token_name() ?>';
        $.ajax({
            url : base_url + '/dragongate/subscribe/save',
            type:'post',
            dataType:"text",
            data:{ <?php echo $this->security->get_csrf_token_name() ?> :cct, email : email },
            success : function (result){
                if(JSON.parse(result).isExitsts == true){
                    alert('Thanks for subscribing');
                    $('#subscribe').val('');
                }else{
                    alert('Email đã tồn tại');
                    location.reload();
                }
            }
        });
        return false;
        
    });
    $('#subscribe').keyup(function(){
        email = $('#subscribe').val();
        if(filter.test(email)){
            $('.btn-subscribe').prop('disabled', false);
        }
    });
    
</script>
</html>