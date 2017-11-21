<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Export BilbiApp</title>

	<!-- Folhas de estilo utlizadas no exemplo -->
	<link type="text/css" rel="stylesheet" href="<?=base_url().'./public/libraries/all.min.css'?>" media="all" />
	<script type="text/javascript" src="<?=base_url().'./public/libraries/all.min.js'?>"></script>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?= base_url();?>">Upload de Arquivos</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li <?php if($this->uri->segment(2)=="send_authors"):echo 'class="active"';endif;?>><a href="<?=base_url().'upload/send_authors'?>">Enviar Autor</a></li>
				<li <?php if($this->uri->segment(2)=="send_books"):echo 'class="active"';endif;?>><a href="<?=base_url().'upload/send_books'?>">Enviar Livros</a></li>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</div>