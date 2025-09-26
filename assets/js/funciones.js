function validarFormatoContrasena(str){

    var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*\.\_\-])(?=.{8,})");

    if(strongRegex.test(str)){
        return true
    }
    else{
        return false;
    }

}

function validarTelefonoGt(numero){

    var res = parseInt(numero.substring(0, 4));

    if((res >= 3000) && (res <= 5999)){

        return true;

    }
    else{
        return false;
    }

}

function diferenciaEnDias(fechaInicial, fechaFinal){
    var date1 = new Date(fechaInicial);
    var date2 = new Date(fechaFinal);
    var timeDiff = (date2.getTime() - date1.getTime());
    var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
    return diffDays;
}


function fixedTableCompleto(idTabla){

    'use strict';

    var table = $('#' + idTabla).DataTable( {
        fixedHeader: {
            header: true,
            footer: false
        },
        paging: true,
        searching: true,
        bInfo: true,
        responsive: true, 
        language: {
            "url": "jsons/Spanish.json"
        },

        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
     } );
    return table;
}

function formatearHoraSinLetras(fecha) {
    return new Date("2017-01-01 " + fecha).toString("HH:mm");
}


function formatearHoraConLetras(fecha) {
    return new Date("2017-01-01 " + fecha).toString("hh:mm tt");
}

function formatearFechaConLetras(fecha) {

    date = new Date(fecha);

    var monthNames = [
        "Ene", "Feb", "Mar",
        "Abr", "May", "Jun", "Jul",
        "Ago", "Sep", "Oct",
        "Nov", "Dic"
    ];

    var day = date.getDate();
    var monthIndex = date.getMonth();
    var year = date.getFullYear();

    return day + ' ' + monthNames[monthIndex] + ' ' + year;
    /*stringFecha = stringFecha.replace("Apr", "Abr");
     stringFecha = stringFecha.replace("Aug", "Ago");
     stringFecha = stringFecha.replace("Dec", "Dic");*/

    /*var today = new Date(fecha);
    return today.toLocaleFormat('%d-%b-%Y');*/
}

function calcularDiasEntreDosFechas(fechaInicio, fechaFinal){
    var f1 =  new Date(fechaInicio);
    var f2 =  new Date(fechaFinal);
    var dias = Math.floor((f2.getTime()-f1.getTime()) / (1000 * 60 * 60 * 24));
    return dias;
}

function removerComa(texto){
    texto = texto.replace(",", "");
    texto = texto.replace(",", "");
    texto = texto.replace(",", "");
    texto = texto.replace(",", "");
    texto = texto.replace(",", "");
    return texto.replace(",", "");
}

function obtenerIniciales(nombre){
	
	var res = nombre.split(" ");
	var iniciales = "";
	for(var i = 0; i < res.length; i++){
		iniciales += res[i].substring(0, 1); 
	}
	return iniciales;
}


function comparacionFechas(fechaInicial, fechaFinal){
	
	var x = new Date(fechaInicial);
	var y = new Date(fechaFinal);

	return x >= y;
	
}


function validarDpi(cui) {
    
    if (!cui) {
        return true;
    }

    var cuiRegExp = /^[0-9]{4}\s?[0-9]{5}\s?[0-9]{4}$/;

    if (!cuiRegExp.test(cui)) {
        return false;
    }

    cui = cui.replace(/\s/, '');
    var depto = parseInt(cui.substring(9, 11), 10);
    var muni = parseInt(cui.substring(11, 13));
    var numero = cui.substring(0, 8);
    var verificador = parseInt(cui.substring(8, 9));
    var munisPorDepto = [ 
        /* 01 - Guatemala tiene:      */ 17 /* municipios. */, 
        /* 02 - El Progreso tiene:    */  8 /* municipios. */, 
        /* 03 - Sacatepéquez tiene:   */ 16 /* municipios. */, 
        /* 04 - Chimaltenango tiene:  */ 16 /* municipios. */, 
        /* 05 - Escuintla tiene:      */ 13 /* municipios. */, 
        /* 06 - Santa Rosa tiene:     */ 14 /* municipios. */, 
        /* 07 - Sololá tiene:         */ 19 /* municipios. */, 
        /* 08 - Totonicapán tiene:    */  8 /* municipios. */, 
        /* 09 - Quetzaltenango tiene: */ 24 /* municipios. */, 
        /* 10 - Suchitepéquez tiene:  */ 21 /* municipios. */, 
        /* 11 - Retalhuleu tiene:     */  9 /* municipios. */, 
        /* 12 - San Marcos tiene:     */ 30 /* municipios. */, 
        /* 13 - Huehuetenango tiene:  */ 32 /* municipios. */, 
        /* 14 - Quiché tiene:         */ 21 /* municipios. */, 
        /* 15 - Baja Verapaz tiene:   */  8 /* municipios. */, 
        /* 16 - Alta Verapaz tiene:   */ 17 /* municipios. */, 
        /* 17 - Petén tiene:          */ 14 /* municipios. */, 
        /* 18 - Izabal tiene:         */  5 /* municipios. */, 
        /* 19 - Zacapa tiene:         */ 11 /* municipios. */, 
        /* 20 - Chiquimula tiene:     */ 11 /* municipios. */, 
        /* 21 - Jalapa tiene:         */  7 /* municipios. */, 
        /* 22 - Jutiapa tiene:        */ 17 /* municipios. */ 
    ];
    
    if (depto === 0 || muni === 0)
    {
        return false;
    }
    
    if (depto > munisPorDepto.length)
    {
        return false;
    }
    
    if (muni > munisPorDepto[depto -1])
    {
        return false;
    }
    
    var total = 0;
    
    for (var i = 0; i < numero.length; i++)
    {
        total += numero[i] * (i + 2);
    }
    
    var modulo = (total % 11);
    
    return modulo === verificador;
}

function imprimir(){
	
	window.print();
	
}

function obtenerFechaHora(){
	
	var now     = new Date(); 
    var year    = now.getFullYear();
    var month   = now.getMonth()+1; 
    var day     = now.getDate();
    var hour    = now.getHours();
    var minute  = now.getMinutes();
    var second  = now.getSeconds(); 
    if(month.toString().length == 1) {
        var month = '0'+month;
    }
    if(day.toString().length == 1) {
        var day = '0'+day;
    }   
    if(hour.toString().length == 1) {
        var hour = '0'+hour;
    }
    if(minute.toString().length == 1) {
        var minute = '0'+minute;
    }
    if(second.toString().length == 1) {
        var second = '0'+second;
    }   
    var dateTime = year+month+day+hour+minute+second;   
     return dateTime;
	
}

function contieneCaracter(texto, caracter){
	if(texto.indexOf(caracter) == -1){
		return false;
	}
	else{
		return true;
	}
}


function tieneComa(texto){
	if(texto.indexOf(',') == -1){
		return false;
	}
	else{
		return true;
	}
}

function tieneGuion(texto){
	if(texto.indexOf('-') == -1){
		return false;
	}
	else{
		return true;
	}
}

var limpiarTextoTildes = (function() {
  var from = "ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÑñÇç", 
      to   = "AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuunncc",
      mapping = {};
 
  for(var i = 0, j = from.length; i < j; i++ )
      mapping[ from.charAt( i ) ] = to.charAt( i );
 
  return function( str ) {
      var ret = [];
      for( var i = 0, j = str.length; i < j; i++ ) {
          var c = str.charAt( i );
          if( mapping.hasOwnProperty( str.charAt( i ) ) )
              ret.push( mapping[ c ] );
          else
              ret.push( c );
      }      
      return ret.join( '' );
  }
 
})();

function esTelefono(numero){
	return /^\d{8}$/.test(numero);
}

function esCorreo(mail){
	return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,7})+$/.test(mail);
}

function codificar(id){
	var encripta = Base64.encode(id);
	return encripta;
}

function descodificar(id){
	var des = Base64.decode(id);
	return des;
}

function esNit(nit) {
	
    if((nit == "cf") || (nit == "CF") || (nit == "C/F") || (nit == "C-F") || (nit == "c/f") || (nit == "c-f")){
        return true;
    }
    
    var pos = nit.indexOf("-");
    var correlativo = nit.substring(0, pos);
    var digitoVerificador = nit.substring(pos + 1, nit.length);
    var factor = correlativo.length + 1;
    var valor = 0;
    for (i = 0; i < pos; i++) {
        valor += parseInt(correlativo[i]) * factor;
        factor -= 1;
    }
    var residuo = valor % 11;
    var resultado = 11 - residuo;

    if (resultado >= 11) {
        residuo = resultado % 11;
        resultado = residuo;
    }

    if (resultado == 10) {
        if (digitoVerificador.toUpperCase() == "K") {
            return true;
        }
	} else if (digitoVerificador == resultado) {
        return true;
    }
    return false;
}

function getFecha(fecha){
	
	posicion = fecha.indexOf("T");
	fechaNueva = fecha.substring(0, posicion); 
	return fechaNueva;
	
}

function getHora(fecha){
	posicion = fecha.indexOf("T");
	fechaNueva = fecha.substring((posicion + 1), fecha.length); 
	return fechaNueva;
}

function esNumeroDecimal(numero){
	return !isNaN(parseFloat(numero));
}

function esNumero(numero){
	return !isNaN(numero);
}


function redondear(numero){
	try{
		return numero.toFixed(2);
	}
	catch (e) { 
		debug("Error = " + e);
		debug("numero = " + numero);
		return 0;
	}
	
}

function contiene(arreglo, objeto) {
	
	if(!objeto){
		return false;
	}
	
    var i = arreglo.length;
    while (i--) {
       if (arreglo[i] === objeto) {
           return true;
       }
    }
    return false;
}


function debug(mensaje){
	
	var mostrar = true;
	
	if(mostrar){
		
		console.log(mensaje);
	}
	
}


  
  var Base64 = {
 
	_keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
 
	
	encode : function (input) {
		var output = "";
		var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
		var i = 0;
 
		input = Base64._utf8_encode(input);
 
		while (i < input.length) {
 
			chr1 = input.charCodeAt(i++);
			chr2 = input.charCodeAt(i++);
			chr3 = input.charCodeAt(i++);
 
			enc1 = chr1 >> 2;
			enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
			enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
			enc4 = chr3 & 63;
 
			if (isNaN(chr2)) {
				enc3 = enc4 = 64;
			} else if (isNaN(chr3)) {
				enc4 = 64;
			}
 
			output = output +
			this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
			this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);
 
		}
 
		return output;
	},
 
	decode : function (input) {
		var output = "";
		var chr1, chr2, chr3;
		var enc1, enc2, enc3, enc4;
		var i = 0;
 
		input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");
 
		while (i < input.length) {
 
			enc1 = this._keyStr.indexOf(input.charAt(i++));
			enc2 = this._keyStr.indexOf(input.charAt(i++));
			enc3 = this._keyStr.indexOf(input.charAt(i++));
			enc4 = this._keyStr.indexOf(input.charAt(i++));
 
			chr1 = (enc1 << 2) | (enc2 >> 4);
			chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
			chr3 = ((enc3 & 3) << 6) | enc4;
 
			output = output + String.fromCharCode(chr1);
 
			if (enc3 != 64) {
				output = output + String.fromCharCode(chr2);
			}
			if (enc4 != 64) {
				output = output + String.fromCharCode(chr3);
			}
 
		}
 
		output = Base64._utf8_decode(output);
 
		return output;
 
	},
 
	_utf8_encode : function (string) {
        debug(string);
		string = string.replace(/\r\n/g,"\n");
		var utftext = "";
 
		for (var n = 0; n < string.length; n++) {
 
			var c = string.charCodeAt(n);
 
			if (c < 128) {
				utftext += String.fromCharCode(c);
			}
			else if((c > 127) && (c < 2048)) {
				utftext += String.fromCharCode((c >> 6) | 192);
				utftext += String.fromCharCode((c & 63) | 128);
			}
			else {
				utftext += String.fromCharCode((c >> 12) | 224);
				utftext += String.fromCharCode(((c >> 6) & 63) | 128);
				utftext += String.fromCharCode((c & 63) | 128);
			}
 
		}
 
		return utftext;
	},
 
	_utf8_decode : function (utftext) {
		var string = "";
		var i = 0;
		var c = c1 = c2 = 0;
 
		while ( i < utftext.length ) {
 
			c = utftext.charCodeAt(i);
 
			if (c < 128) {
				string += String.fromCharCode(c);
				i++;
			}
			else if((c > 191) && (c < 224)) {
				c2 = utftext.charCodeAt(i+1);
				string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
				i += 2;
			}
			else {
				c2 = utftext.charCodeAt(i+1);
				c3 = utftext.charCodeAt(i+2);
				string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
				i += 3;
			}
 
		}
 
		return string;
	}
 
}