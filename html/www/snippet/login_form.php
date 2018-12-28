
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style_css.css">
  <script type="text/javascript" src="jquery.min.js"></script>
</head>
<body>
<div class="form-collection">
    <div class="card elevation-3 limit-width log-in-card below turned">
      <div class="card-body">
        <div class="input-group email">
          <input type="text" placeholder="Email"/>
        </div>
        <div class="input-group password">
          <input type="password" placeholder="Password"/>
        </div>
        <a href="#" class="box-btn">Forgot Password?</a>
      </div>
      <div class="card-footer">
        <button type="submit" class="login-btn">Log in</button>
      </div>
    </div>

    <div class="card elevation-2 limit-width sign-up-card above">
      <div class="card-body">
        <div class="input-group fullname">
          <input type="text" placeholder="Full Name"/>
        </div>
        <div class="input-group email">
          <input type="email" placeholder="Email"/>
        </div>
        <div class="input-group password">
          <input type="password" placeholder="Password"/>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="signup-btn">Sign Up</button>
      </div>
    </div>
  </div>
  </div>
  <script type="text/javascript">
    $(document).on('click', '.below button', function(){
      var belowCard = $('.below'),
      aboveCard = $('.above'),
      parent = $('.form-collection');
      parent.addClass('animation-state-1');
      setTimeout(function(){
        belowCard.removeClass('below');
        aboveCard.removeClass('above');
        belowCard.addClass('above');
        aboveCard.addClass('below');
        setTimeout(function(){
          parent.addClass('animation-state-finish');
          parent.removeClass('animation-state-1');
          setTimeout(function(){
            aboveCard.addClass('turned');
            belowCard.removeClass('turned');
            parent.removeClass('animation-state-finish');
          }, 300)
        }, 10)
      }, 300);
    });
  </script>
</body>
</html>