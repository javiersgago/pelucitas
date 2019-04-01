/*function cambiaCategoria(categoria, usuario) {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText.includes('Error')) {
				alert(this.responseText);
			} else {
				document.getElementById("tabla").innerHTML = this.responseText;
			}
		}
	};
	xhr.open("POST", "cambiaCategoria.php", true);
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhr.send("c=" + categoria + "&u=" + usuario);
}

function ocultaCarro(usuario) {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText.includes('Error')) {
				alert(this.responseText);
			} else {
				var respuesta = this.responseText.split('|');
				document.getElementById("carro").innerHTML = respuesta[0];
				document.getElementById("tabla").innerHTML = respuesta[1];
				document.getElementById("select").style.display = "initial";
				document.getElementById("select").innerHTML = respuesta[2];
			}
		}
	};
	xhr.open("POST", "ocultaCarro.php", true);
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhr.send("u=" + usuario);
}

function meterCarro(usuario, producto) {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText.includes('Error')) {
				alert(this.responseText);
			} else {
				document.getElementById("carro").innerHTML = this.responseText;
			}
		}
	};
	xhr.open("POST", "meterCarro.php", true);
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhr.send("u=" + usuario + "&p=" + producto);
}

function restarCarro(usuario, producto) {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText.includes('Error')) {
				alert(this.responseText);
			} else {
				document.getElementById("tabla").innerHTML = this.responseText;
			}
		}
	};
	xhr.open("POST", "restarCarro.php", true);
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhr.send("u=" + usuario + "&p=" + producto);
}

function sumarCarro(usuario, producto) {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText.includes('Error')) {
				alert(this.responseText);
			} else {
				document.getElementById("tabla").innerHTML = this.responseText;
			}
		}
	};
	xhr.open("POST", "sumarCarro.php", true);
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhr.send("u=" + usuario + "&p=" + producto);
}

function sacarCarro(usuario) {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText.includes('Error')) {
				alert(this.responseText);
			} else {
				document.getElementById("tabla").innerHTML = this.responseText;
			}
		}
	};

	var checkboxes = document.getElementsByName("borrar[]");
	var post = "u=" + usuario;
	for (i = 0; i < checkboxes.length; i++)
		if (checkboxes[i].checked)
			post += "&p[]=" + checkboxes[i].value;

	xhr.open("POST", "sacarCarro.php", true);
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhr.send(post);
}

function verCarro(usuario) {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText.includes('Error')) {
				alert(this.responseText);
			} else {
				var respuesta = this.responseText.split('|');
				document.getElementById("carro").innerHTML = respuesta[0];
				document.getElementById("tabla").innerHTML = respuesta[1];
				document.getElementById("select").style.display = "none";
			}
		}
	};
	xhr.open("POST", "verCarro.php", true);
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhr.send("u=" + usuario);
}

function cambiaPagina(pagina, usuario) {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText.includes('Error')) {
				alert(this.responseText);
			} else {
				document.getElementById("tabla").innerHTML = this.responseText;
			}
		}
	};
	xhr.open("POST", "cambiaPagina.php", true);
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	var select = document.getElementById("desplegable");
	if (select.selectedIndex == 0)
		var categoria = -2;
	else
		var categoria = select.value;
	xhr.send("c=" + categoria + "&u=" + usuario + "&p=" + pagina);
}

function comprar(usuario) {
	if (window.confirm("¿Confirma la compra?")) {
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				if (this.responseText.includes('Error')) {
					alert(this.responseText);
				} else {
					document.getElementById("tabla").innerHTML = this.responseText;
				}
			}
		};
		xhr.open("POST", "comprar.php", true);
		xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xhr.send("u=" + usuario);
	}
}*/