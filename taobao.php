<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="发卡平台系统,激活码,体验码,新手卡">
<title>取TOP_SESSION - ESUP网游</title>
<script type="text/javascript">
        (function(){
            var start, end, obj, data;
            obj = document.getElementById('data');
            data = document.getElementById('data').value;
            end = data.length;
            document.getElementById('btn').onclick = function(){
                if(-[1,]){             //处理费IE浏览器
                    alert("您使用的浏览器不支持此复制功能，请使用Ctrl+C或鼠标右键。");
                    document.getElementById('data').setSelectionRange(0,end);
                    document.getElementById('data').focus();
                }else{
                    var flag = window.clipboardData.setData("text",data);
                    if(flag == true){
                        alert("复制成功。");
                    }else{
                        alert("复制失败。");
                    }
                    var range = obj.createTextRange();
                    range.moveEnd("character",end);
                    range.moveStart("character",0);
                    range.select();
                }
 
            }
        })()
    </script>
</head>

<body>
<div class="container">

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="发卡平台系统" />
<meta name="author" content="@howechiang" />
    <!-- Le styles -->
    <link href="http://ka.esup.cn/bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="http://ka.esup.cn/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://ka.esup.cn/js/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="./bootstrap/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://ka.esup.cn/bootstrap/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://ka.esup.cn/bootstrap/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://ka.esup.cn/bootstrap/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="http://ka.esup.cn/bootstrap/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <div class="navbar navbar-static navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.php" title="Esup网游"><strong>Esup网游</strong></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="divider-vertical"></li>
              <li><a href="index.php">主页</a></li>
              <li class="divider-vertical"></li>
              <li><a href="#about" data-toggle="modal">关于</a></li>
              <li class="divider-vertical"></li>
              <li><a href="#contact" data-toggle="modal">联系</a></li>
              <li class="divider-vertical"></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
</body>
</html>
<form class="form-horizontal">
  <legend>取TOP_SESSION</legend>
  <div class="well" style="max-width: 75%; margin: 0 auto 10px;">
    <div class="control-group">
      <label class="control-label" for="inputEmail">TOP_SESSION</label>
      <div class="controls">
        <div class="input-append">
  			<input class="input-xlarge" name="data" id="data" size="16" type="text" value="<?=$_GET['top_session']?>"> <a class="btn btn-primary" id="btn">复 制</a>
		</div>
    </div>
    </div>
  </div>
</form>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<STYLE TYPE="text/css">   
.qq {
    background:#fff url(http://ka.esup.cn/images/QQ.gif) 2px center no-repeat;color:#999999;
    padding-left:40px;
	padding-bottom:40px;
}
.weibo{
    background:#fff url(http://ka.esup.cn/images/weibo.gif) 2px center no-repeat;color:#999999;
    padding-left:40px;
	padding-bottom:40px;
}
.mail{
    background:#fff url(http://ka.esup.cn/images/EMAIL.gif) 2px center no-repeat;color:#999999;
    padding-left:40px;
	padding-bottom:40px;
}
.qr{
    background:#fff url(./images/QR.gif) 2px center no-repeat;color:#999999;
    padding-left:40px;
    padding-bottom:40px;
}
</STYLE>

</head>

    <body>
     <div id="contact" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 id="myModalLabel">联系方式</h3>
            </div>
            <div class="modal-body">
              <h4>Text in a modal</h4>
              <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem.</p>

              <h4>Popover in a modal</h4>
              <p>This <a href="#" role="button" class="btn popover-test" title="A Title" data-content="And here's some amazing content. It's very engaging. right?">button</a> should trigger a popover on hover.</p>

              <h4>Tooltips in a modal</h4>
              <p><a href="#" class="tooltip-test" title="Tooltip">This link</a> and <a href="#" class="tooltip-test" title="Tooltip">that link</a> should have tooltips on hover.</p>

              <hr>

              <h4>Overflowing text to show optional scrollbar</h4>
              <p>We set a fixed <code>max-height</code> on the <code>.modal-body</code>. Watch it overflow with all this extra lorem ipsum text we've included.</p>
              <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
              <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
              <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
              <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
            </div>
            <div class="modal-footer">
              <button class="btn" data-dismiss="modal">关闭</button>
            </div>
          </div>
          
        <!--/span-->
         <div id="about" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="aboutLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 id="myModalLabel">关于我们</h3>
            </div>
            <div class="modal-body">
              <h4>Text in a modal</h4>
              <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem.</p>

              <h4>Popover in a modal</h4>
              <p>This <a href="#" role="button" class="btn popover-test" title="A Title" data-content="And here's some amazing content. It's very engaging. right?">button</a> should trigger a popover on hover.</p>

              <h4>Tooltips in a modal</h4>
              <p><a href="#" class="tooltip-test" title="Tooltip">This link</a> and <a href="#" class="tooltip-test" title="Tooltip">that link</a> should have tooltips on hover.</p>

              <hr>

              <h4>Overflowing text to show optional scrollbar</h4>
              <p>We set a fixed <code>max-height</code> on the <code>.modal-body</code>. Watch it overflow with all this extra lorem ipsum text we've included.</p>
              <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
              <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
              <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
              <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
            </div>
            <div class="modal-footer">
              <button class="btn" data-dismiss="modal">关闭</button>
            </div>
          </div>
        <!--/span-->
    	   <hr>

      <footer>
        <p align="center" style="font-size:10px; color:#CCC">&copy; 2012 ESUP网游  <a href="http://www.miibeian.gov.cn/" title="ICP备案" target="_blank">苏ICP备10226088号-3</a></p>
        <p align="center" >
            <a class="weibo" href="http://weibo.com/100110566" title="新浪微博"></a>&nbsp; 
            <a class="qq" href="http://wpa.qq.com/msgrd?v=3&uin=100110566&site=qq&menu=yes" title="即时通讯" target="_blank"></a>&nbsp;
            <a class="mail" href="mailto:info@esup.cn" title="电子邮件" target="_blank"></a>&nbsp;
            <a class="qr" href="#qrModal" title="微信扫一扫" data-toggle="modal"></a>
        </p>
      </footer>
        <div class="modal" id="qrModal" tabindex="-1" role="dialog" aria-labelledby="qrModalLabel" aria-hidden="true" style="display:none; width:200px;" align="center">
          <div class="modal-body" align="center">
            <p><img src="http://ka.esup.cn/images/ewm.gif" /></p>
          </div>
        </div>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://ka.esup.cn/js/jquery.js"></script>
    <script src="http://ka.esup.cn/bootstrap/js/bootstrap-transition.js"></script>
    <script src="http://ka.esup.cn/bootstrap/js/bootstrap-alert.js"></script>
    <script src="http://ka.esup.cn/bootstrap/js/bootstrap-modal.js"></script>
    <script src="http://ka.esup.cn/bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="http://ka.esup.cn/bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="http://ka.esup.cn/bootstrap/js/bootstrap-tab.js"></script>
    <script src="http://ka.esup.cn/bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="http://ka.esup.cn/bootstrap/js/bootstrap-popover.js"></script>
    <script src="http://ka.esup.cn/bootstrap/js/bootstrap-button.js"></script>
    <script src="http://ka.esup.cn/bootstrap/js/bootstrap-collapse.js"></script>
    <script src="http://ka.esup.cn/bootstrap/js/bootstrap-carousel.js"></script>
    <script src="http://ka.esup.cn/bootstrap/js/bootstrap-typeahead.js"></script>
	<script type="text/javascript">
		var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
		document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F0bfd0694a5044dce7fc6b0e8f9967a8e' type='text/javascript'%3E%3C/script%3E"));
	</script>
    </body>
</html>
</div>
</body>
</html>