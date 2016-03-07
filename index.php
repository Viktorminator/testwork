<?php
/**
* The main template file.
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*
* @package styl_s
*/

get_header(); ?>


<div class="section hero">
  <div class="container">
    <div class="row">
      <div class="one-half column hero__left">
        <h1 class="hero__heading">
          Notify<span class="green">.</span>
        </h1>
        <p>
          A great new free psd theme to showcase your new application.
        </p>
        <div class="hero__icons">
          <a href="#" class='sprite apple_g'></a>
          <a href="#" class='sprite android_g'></a>
          <a href="#" class='sprite wind_g'></a>  
        </div>
      </div>
      <div class="one-half column hero__app">
        <img class="hero__app__phone" src="wp-content/themes/Styl_s-master/img/hand.png" alt="">
      </div>
    </div>
  </div>
</div>

<div class="section values">
  <div class="container">
    <div class="row">
      <div class="one-third column value">
        <img src="wp-content/themes/Styl_s-master/img/wheel.png" alt="" class="values__icon">
        <h5 class="value__heading">
          Editable Theme
        </h5>
        <p class="value__description">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse fringilla fringilla.
        </p>
      </div>
      <div class="one-third column value">
        <img src="wp-content/themes/Styl_s-master/img/star.png" alt="" class="value__icon">
        <h5 class="value__heading">
          Flat Design
        </h5>
        <p class="value__description">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse fringilla fringilla.
        </p>
      </div>
      <div class="one-third column value">
        <img src="wp-content/themes/Styl_s-master/img/globe.png" alt="" class="values__icon">
        <h5 class="value__heading">
          Reach Your Audience
        </h5>
        <p class="value__description">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse fringilla fringilla.
        </p>
      </div>
    </div>
  </div>
</div>

<div class="section notify">
  <div class="container">
    <div class="row">
      <h3 class="notify__header">
        Get Notified Of Any Updates!
      </h3>
      <p class="notify__description">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse fringilla fringilla nisl congue congue. Maecenas nec condimentum libero, at elementum mauris. Phasellus eget nisi dapibus, ultricies nisl at, hendrerit risusuis ornare luctus id sollicitudin ante lobortis at.
      </p>
    </div>
    <div class="row">
     <div class="container">
        <div class="login_bar">
            <form action="add_subscriber" id="notify"  type="post" name="postForm">
              <input class="login" type="email" name="email" placeholder="some@email.com" required="required">
              <input type="submit" class="subscribe_button" value="Notify"/>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section foomenu">
  <div class="container">
    <div class="row foomenu__links">
      <a href="#" class="foomenu__link">Contact</a>
      <a href="#" class="foomenu__link">Download</a>
      <a href="#" class="foomenu__link">Press</a>
      <a href="#" class="foomenu__link">Email</a>
      <a href="#" class="foomenu__link">Support</a>
      <a href="#" class="foomenu__link">Privacy Policy</a>
    </div>
  </div>
</div>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-21613008-7', {"cookieDomain":"none"});
    ga('send', 'pageview');

</script>
<script>
    /**
     * Created by user on 3/5/16.
     */
    function formSend(){
        $('#notify').submit(function(event) { //Trigger on form submit


            var postForm = { //Fetch form data
                'action'    : 'add_subscriber',
                'email'     : $('input[name=email]').val() //Store name fields value
            };

            $.ajax({ //Process the form using $.ajax()
                type      : 'POST', //Method type
                url       : window.location.href + 'wp-admin/admin-ajax.php', // form processing file URL
                data      : postForm, //Forms name
                dataType  : 'json',
                success: function (resdata) {
                    alert(resdata.responseText);
                    ga('send', {   //Subscriber submited send to Google Analytics account
                        hitType: 'submission',
                        eventCategory: 'Subscribers',
                        eventAction: 'submit',
                        eventLabel: 'Submitted subscriber'
                    }, {
                        nonInteraction: true
                    });
                },
                error: function (result, status, err) {
                    alert(result.responseText);
                    alert(status.responseText);
                    alert(err.Message);
                }
            });
            event.preventDefault(); //Prevent the default submit
        });
    }

    function validateEmail(email) {
        // http://stackoverflow.com/a/46181/11236

        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    /**
     * When document is ready, do
     */
    $(document).ready(function() {
        formSend();
    });
</script>
<?php get_footer(); ?>
