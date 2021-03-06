<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php include_javascripts() ?>
  </head>
  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <span class="brand">BDE Admin</span>
          <div class="btn-group pull-right">
            <?php if(!$sf_user->isAuthenticated()): ?>
              <a class="btn dropdown-toggle" data-toggle="dropdown" href="#drop-connexion">
                <i class="icon-user"></i> Connexion
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu pull-right">
                <li><a href="<?php echo url_for('cas') ?>">Je suis étudiant</a></li>
                <li><a href="<?php echo url_for('sf_guard_signin') ?>">Extérieur</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo url_for('sf_guard_register') ?>">Inscription extérieur</a></li>
              </ul>
            <?php else: ?>
              <a class="btn dropdown-toggle" data-toggle="dropdown" href="#drop-connexion">
                <i class="icon-user"></i> <?php echo $sf_user->getGuardUser()->getName() ?>
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu pull-right">
                <li><a href="<?php echo url_for('cas_logout') ?>">Déconnexion du CAS</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo url_for('sf_guard_signout') ?>">Déconnexion du portail</a></li>
              </ul>
            <?php endif ?>
          </div>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="/">Retour vers le portail</a></li>
              
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span2">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li><?php echo link_to('Gestion des cotisants', 'cotisants/index') ?></li>
              <li><?php echo link_to('Chartes info', 'charte_info/index') ?></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span10">
          <div class="well">
            <?php echo $sf_content ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
