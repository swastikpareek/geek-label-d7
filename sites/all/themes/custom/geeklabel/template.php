<?php 
/**
 * @file
 * The primary PHP file for the Drupal Open Charity theme
 */

/**
 * Pre-processes variables for the "region" theme hook.
 *
 * See template for list of available variables.
 *
 * @param array $vars
 *   An associative array of variables, passed by reference.
 *
 * @see region.tpl.php
 *
 * @ingroup theme_preprocess
 */
function geeklabel_preprocess_region(&$vars){
  if($vars['is_front']) {
    $vars['theme_hook_suggestions'][] = 'region__' . $vars['region'] . '__front';
  } 
}

function geeklabel_preprocess_block(&$vars){;
  if($vars['is_front']) {
    if($vars['elements']['#block']->delta == 'services-block') {
      $vars['classes_array'] = [];
      $vars['classes_array'][] = 'container-fluid';
    }
    // $vars['theme_hook_suggestions'][] = 'block__' . $vars['elements']['#block']->delta . '__front';
  } 
}

/**
 * Pre-processes variables for the "views-view" theme hook.
 *
 * See template for list of available variables.
 *
 * @param array $vars
 *   An associative array of variables, passed by reference.
 *
 * @see views-view.tpl.php
 *
 * @ingroup theme_preprocess
 */

function geeklabel_preprocess_views_view(&$vars) {
  
  $view = $vars['view'];
  

  if ($view->name == 'clients' && $vars['display_id'] == 'block') {
    drupal_add_js(libraries_get_path('easing') . '/jquery.easing.min.js');
    drupal_add_js(libraries_get_path('slick') . '/slick/slick.min.js');
    drupal_add_js(drupal_get_path('theme', 'geeklabel') . '/js/slick/slideshow-clients.js');

    drupal_add_css(libraries_get_path('slick') . '/slick/slick.css');
    drupal_add_css(libraries_get_path('slick') . '/slick/slick-theme.css');
  }  
}

/**
 * Implements hook_form_alter.
 *
 * See template for list of available variables.
 *
 * @param array $form &form_state $form_id
 *   An associative array of variables, passed by reference.
 *
 */

function geeklabel_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'contact_site_form') {
    unset($form['subject']);
    unset($form['cid']);
    unset($form['copy']);
    unset($form['name']['#title']);
    unset($form['mail']['#title']);
    unset($form['message']['#title']);
    $form['name']['#attributes']['placeholder'] = 'Name';
    $form['mail']['#attributes']['placeholder'] = 'Email';
    $form['message']['#attributes']['placeholder'] = 'Message';
    $form['actions']['submit']['#value'] = $form['actions']['submit']['#value'] . '!';
    $form['#suffix'] = '<p class="contact-form-para dekstop-visible">' . t('Or phone on') . ': 01923 220121</p><p class="contact-form-para mobile-visible"> <span class="phone-icon"></span> 01923 220121<br/><span class="mail-icon"></span> info@compucorp.com</p>';
  }
}