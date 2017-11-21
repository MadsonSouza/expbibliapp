<div class="container" style="padding-top: 30px">
	<div class="row">
		<h2>Envio de Autor</h2>
		<form action="<?=base_url('upload/upload_file');?>" enctype="multipart/form-data" method="POST">
		<div class="col-lg-12">
			<div class="fileupload fileupload-new" data-provides="fileupload">
				<span class="btn btn-primary btn-file">
				<span class="fileupload-new">Buscar arquivo</span>
				<span class="fileupload-exists">Mudar</span>         
				<input type="file" name="arquivo" /></span>
                <input type="hidden" value="1" name="ref"/> <!-- 1 para autor -->
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
</div>
