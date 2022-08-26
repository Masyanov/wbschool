<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package wbdent
 */

$wp_query->set_404();
status_header( 404 );
header('Location:'. get_site_url() .'/404.php');
die;