<div class="container" style="padding-top: 30px">
	<div class="row">
		<h2>Envio de Livros</h2>
		<form action="<?=base_url('upload/upload_file');?>" enctype="multipart/form-data" method="POST">
		<div class="col-lg-12">
			<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="form-group">
					<label for="id">ID do Autor:</label>
					<input type="text" class="form-control" name="id_autor" aria-describedby="emailHelp" placeholder="ID">
				</div>
				<span class="btn btn-primary btn-file">
				<span class="fileupload-new">Buscar arquivo</span>
				<span class="fileupload-exists">Mudar</span>         
				<input type="file" name="arquivo" /></span>
				<input type="hidden" value="2" name="ref"/> <!-- 2 para livros -->
				<span class="fileupload-preview"></span>
				<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>			
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary pull-right">Enviar</button>
			</div>				
		</div>
		</form>
	</div>
	<?php if(isset($error)):?>
		<div class="alert alert-danger"><strong>Erro!</strong> <?=$error?></div>
	<?php endif; ?>
	<?php if(isset($success)):?>
		<div class="alert alert-success"><strong>Successo!</strong> <?=$success?></div>
	<?php endif; ?>
	<?php if(isset($_SESSION['author'])):?>
	<div class="container">
	<h3>Autores Cadastrados</h3>
		<div class="row">
			<div class="col-sm">
				<table class="table table-striped">
				<thead>
					<tr>
					<th scope="col">#</th>
					<th scope="col">Nome</th>
					<th scope="col"> Último Nome</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($this->session->userdata('author') as $author):?>
					<tr>
					<th scope="row"><?php echo $author['id'];?></th>
					<td><?php echo $author['firstName']?></td>
					<td><?php echo $author['lastName']?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php endif; ?>
</div>
