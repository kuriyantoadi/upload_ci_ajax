function upload(url, loading, msg, view){
	var data = new FormData();
	// ambil atribut file yg akan diupload, lalu masukkan ke variabel input_gambar
	data.append('input_gambar', $("#input_gambar")[0].files[0]); 
	
	// Ambil isi dari textbox deskripsi
	data.append('input_deskripsi', $("#input_deskripsi").val()); 
	
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function(){
			msg.hide();
			loading.show();
		},
        success: function(response){
			// Pisahkan hasil (output) proses dengan tanda pemisah <|>
			var result = response.split("<|>");
			
			if(result[0] == "SUCCESS"){ // Jika sukses
				loading.hide(); // sembunyikan loadingnya
				msg.css({"color":"green"}).html(result[1]).show(); // tampilkan pesan sukses
				view.html(result[2]); // Load ulang tabel view nya
			}else{ // Jika gagal
				loading.hide(); // sembunyikan loadingnya
				msg.css({"color":"red"}).html(result[1]).show(); // tampilkan pesan error
			}
		},
        error: function (xhr, ajaxOptions, thrownError) {
			alert(xhr.responseText);
        }
    });
}
