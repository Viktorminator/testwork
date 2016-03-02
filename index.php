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
      <form method="post" class="ajax_form" action="">
        <div class="input-group">
          <input placeholder="Email Address" type="email" name="email" class="form-control" value="">
          <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
             Notify
            </button>
          </span>
        </div>
   
        
      </form>
    </div>
  </div>
</div>



<?php get_footer(); ?>
