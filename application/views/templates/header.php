<!DOCTYPE html>
<html>
<head>
	<title>Web002</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css">

</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url(); ?>">Web002</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="<?php echo base_url(); ?>News">News</a></li>
          <?php if (!empty($this->session->userdata('is_admin'))&&$this->session->userdata('is_admin')==1): ?>
            <li><a href="<?php echo base_url();?>News/Create">Create</a></li>
          <?php endif;?>
        </ul>
        <?php if(!$this->session->userdata('loggedin')): ?>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url(); ?>Users/Login">Log In</a></li>
            <li><a href="<?php echo base_url(); ?>Users/Register">Register</a></li>
          </ul>
        <?php else: ?>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><b><?php echo $this->session->userdata('username'); ?></b><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url(); ?>Users/Logout">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      <?php endif; ?>
    </div>
  </nav>
  <div class="container">
    <?php if ($this->session->flashdata('message')): ?>
      <div class="alert alert-dismissible alert-warning">
        <p>
          <?php echo $this->session->flashdata('message'); ?>
        </p>
      </div>
    <?php endif; ?>
