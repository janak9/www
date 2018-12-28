<?php // $mess=$this->Ads_model->messages(); ?>
<html>
    <head>
        <title>Chat Demo</title>
        <style type="text/css">
           .chat-box
            {
                width: 300px;
                box-shadow: 1px 1px 6px 1px grey;
                border-radius: 0 0 6px 6px;
                margin: 430px 0  0 1000px;
            }

            div.header
            {
                padding: 10px;
                color: white;
                font-size: 14px;
                font-weight: bold;
                background-color: #2C2761;
            }

            .messages
            {
                padding: 10px;
                height: 200px;
                background-color: green;
                color:white;
                background-color: rgb(237, 239, 244);
                overflow-y: scroll;
            }

            .messages ul
            {
                padding: 0px;
                list-style-type: none;
            }

            .messages ul li
            {
               /* height: auto;*/

                margin-top: -20px;
                clear: both;
                padding:10px;
                padding-left: 10px;
                padding-right: 10px;
            }

            .messages ul li span
            {
                display: inline-block;
                max-width: 200px;
                background-color: #5656bb;
                padding: 5px;
                border-radius: 4px;
                position: relative;
                border-width: 1px;
                border-style: solid;
                border-color: grey;
            }

            .messages ul li span.left
            {
                float: left;
            }

            .messages ul li span.left:after
            {
                content: "";
                display: inline-block;
                position: absolute;
                left: -8.5px;
                top: 7px;
                height: 0px;
                width: 0px;
                border-top: 8px solid transparent;
                border-bottom: 8px solid transparent;
                border-right: 8px solid #5656bb;
            }

            .messages ul li span.left:before
            {
                content: "";
                display: inline-block;
                position: absolute;
                left: -9px;
                top: 7px;
                height: 0px;
                width: 0px;
                border-top: 8px solid transparent;
                border-bottom: 8px solid transparent;
                border-right: 8px solid white;
            }

            .messages ul li span.right:after
            {
                content: "";
                display: inline-block;
                position: absolute;
                right: -8px;
                top: 6px;
                height: 0px;
                width: 0px;
                border-top: 8px solid transparent;
                border-bottom: 8px solid transparent;
                border-left: 10px solid #5656bb;
            }

            .messages ul li span.right:before
            {
                content: "";
                display: inline-block;
                position: absolute;
                right: -5px;
                top: 6px;
                height: 0px;
                width: 0px;
                border-top: 8px solid transparent;
                border-bottom: 8px solid transparent;
                border-left: 8px solid #5656bb;
            }

            .messages ul li span.right
            {
                float: right;
                background-color: #5656bb;
                margin-right: -12px;    
            }

            .clear
            {
                clear: both;
            }

            .input-box
            {
                background-color: white;
                border-radius: 0 0 6px 6px;
                height: 32px;
                padding: 3px;
            }

            .input-box input
            {
                padding: 0px;
                width: 275px;
                height: 30%;
                display: inline-block;
                outline: 0px;
                resize: none;
                border:none;
                font-size: 12px;
                padding: 10px;
            }
            input,input::-webkit-input-placeholder {
                font-size: 15px;
            }
        </style>
        <script type="text/javascript" src="jquery.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            setInterval(function(){chat_box()},5000);
        });
        function fun(str){
            xmlhttp=new XMLHttpRequest();
         xmlhttp.open("GET","http://localhost/show_your_Ads/ading_coding/index.php/Admin/Ads/mess_receive/"+str,true);
            xmlhttp.send();
         xmlhttp.onreadystatechange=function()
          {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                    chat_box();
                }
          }   
        }
        function chat_box(){
            xmlhttp=new XMLHttpRequest();
         xmlhttp.open("GET","http://localhost/show_your_Ads/ading_coding/index.php/Admin/Ads/chat_box",true);
            xmlhttp.send();
         xmlhttp.onreadystatechange=function()
          {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                    $('.chat-box').html(xmlhttp.responseText);
                    var elem = document.getElementById('messages');
                    elem.scrollTop = elem.scrollHeight;
                }
          }   
        }
        </script>
    </head>
    <body>
        <div id="lo"><?php  //$mess=$this->Ads_model->messages(); ?></div>
        <div class="chat-box">
           <div class="header">
                Gaurav vanani
            </div>
            <div id="messages" class="messages">
                <ul>
                    <?php foreach($mess as $m){ 
                     ?><?php if($m['sender']=='Admin'){ ?>
                    <li>
                        <span class="left"><?php echo $m['mess']; }else{ ?> </span>
                        <div class="clear"></div>
                    </li> 
                    <li>
                        <span class="right"><?php  echo $m['mess'];}  ?></span>
                        <div class="clear"></div>
                    </li> <?php } ?>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="input-box">
                <input type="text" name="mess" onKeydown="Javascript: if (event.keyCode==13) fun(this.value);" placeholder="Enter message">
            </div>
        </div>
    </body>
</html>
<script type="text/javascript">
    var elem = document.getElementById('messages');
                              elem.scrollTop = elem.scrollHeight;
</script>