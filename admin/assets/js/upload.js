$(document).ready(function(){
	
	var buttom = $("#butUpload"), interval, file;
	
	new AjaxUpload(buttom, {
		action: "./ProductsAdmin.php?upload=1",
		data: {file: "file"},
		name: "userfile",
		onSubmit: function(file, ext){
			if (! (ext && /^(jpg|png|jpeg|gif)$/i.test(ext))){
				// extension is not allowed
				alert('Ошибка! Не допустимый формат файла');
				// cancel upload
				return false;
				
			}
			buttom.text("Загрузка");
			this.disable();
			
			interval = setInterval(function(){
				var text = buttom.text();
				if(text.length < 11){
					buttom.text(text + ".");
				}else{
					buttom.text("Загрузка");
				}
			}, 300);
		},
		
		onComplete: function(file, response){
			buttom.text("Загрузите еще");
			window.clearInterval(interval);
			this.enable();
			response = JSON.parse(response);
			console.log(response);
			$("#filesUpload").append(response.answer + " - " + response.file + "<br />");
		}
		
	});
});