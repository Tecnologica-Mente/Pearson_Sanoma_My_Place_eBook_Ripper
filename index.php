<html>
<head>
<title>Pearson eBook Ripper</title>
<script type="text/javascript" src="./jquery/jquery-3.7.0.js"></script>

<script>
// Esegue al caricamento della pagina (onload)
$(document).ready(function(){
   $(".DI").show();
   $(".CI").hide();
   $(".SC").hide();
   $(".ME").hide();
   $("#url").val('');
   $("#nome_img").val('nothing');
   $("#nome_pdf").val('nothing');
});

$(document).ready(function(){ 
    $("input[name=operazione]").change(function() {
        var val = $(this).val();
        if(val=="D"){
           $(".DI").show();
           $(".CI").hide();
           $(".SC").hide();
           $(".ME").hide();
           $("#url").val('');
           $("#nome_img").val('nothing');
           $("#nome_pdf").val('nothing');
        }
        else if(val=="C"){
           $(".DI").hide();
           $(".CI").show();
           $(".SC").show();
           $(".ME").hide();
           $("#url").val('nothing');
           $("#nome_img").val('');
           $("#nome_pdf").val('');
        }
        else{  //val=="M"
           $(".DI").hide();
           $(".CI").hide();
           $(".SC").show();
           $(".ME").show();
           $("#url").val('nothing');
           $("#nome_img").val('');
           $("#nome_pdf").val('nothing');
        }
    }); 
});
</script>

<script language="javascript">

function controlla()
{
   var url=$("#url").val();
   var pagina_da=$("#pagina_da").val();
   var pagina_a=$("#pagina_a").val();
   var nome_img=$("#nome_img").val();
   var nome_cartella=$("#nome_cartella").val();
   var nome_pdf=$("#nome_pdf").val();
   if($.trim(url)==""){
      alert("URL NON VALIDO!");
      $("#url").val('');
      $("#url").focus();
   }
   else if(($.trim(pagina_da)=="") || (isNaN(parseInt(pagina_da)))){
      alert("PAGINA INIZIALE NON VALIDA!");
      $("#pagina_da").val('');
      $("#pagina_da").focus();
   }
   else if(($.trim(pagina_a)=="") || (isNaN(parseInt(pagina_a)))){
      alert("PAGINA FINALE NON VALIDA!");
      $("#pagina_a").val('');
      $("#pagina_a").focus();
   }
   else if(parseInt(pagina_a)<parseInt(pagina_da)){
      alert("LA PAGINA FINALE NON PUO' ESSERE INFERIORE ALLA PAGINA INIZIALE!");
      $("#pagina_a").val('');
      $("#pagina_a").focus();
   }
   else if($.trim(nome_img)==""){
      alert("NOME FILE IMMAGINE NON VALIDO!");
      $("#nome_img").val('');
      $("#nome_img").focus();
   }
   else if($.trim(nome_cartella)==""){
      alert("NOME CARTELLA NON VALIDA!");
      $("#nome_cartella").val('');
      $("#nome_cartella").focus();
   }
   else if($.trim(nome_pdf)==""){
      alert("NOME PDF NON VALIDO!");
      $("#nome_pdf").val('');
      $("#nome_pdf").focus();
   }
   else{
      document.ripper.submit();
   }
}

</script>

</head>
<body bgcolor="#91d8e3">
<center>
<br>
<h1>Pearson Sanoma My Place eBook Ripper</h1>
<img border="0" src="imgs/0a633855c250798d3ab1b2dbfe28f18e-historieta-divertida-profesi-oacute-n-de-ladr-oacute-n-by-vexels.png" height="200">
<img border="0" src="imgs/Thief-Robber-PNG-Transparent-Image.png" height="200">
<img border="0" src="imgs/Thief-No-Background.png" height="200">
<br><br>
<form method="POST" id="ripper" name="ripper" action="download.php">
<b>Operazione da effettuare:</b><br><br>
<input type="radio" name="operazione" value="D" checked> Download immagini&nbsp;&nbsp;&nbsp;
<input type="radio" name="operazione" value="C"> Creazione PDF da immagini gi&agrave; scaricate&nbsp;&nbsp;&nbsp;
<input type="radio" name="operazione" value="M"> Modifica estensione a immagini gi&agrave; scaricate<br><br><br>
<div class="DI">URL (parte fissa): <input type="text" id="url" name="url" size="130" placeholder="https://d38l3k3yaet8r2.cloudfront.net/resources/products/epubs/generated/DD894B24-FC13-48A9-9CC4-49AD7F9A5658/foxit-assets/pages/page"><br><br></div>
Pagina da: <input type="text" id="pagina_da" name="pagina_da" size="6" placeholder="0">&nbsp;&nbsp;&nbsp;Pagina a: <input type="text" id="pagina_a" name="pagina_a" size="6" placeholder="217"><br><br>
<div class="DI">Estensione: <select size="1" id="estensione" name="estensione">
        <option value="bmp">bmp</option>
        <option value="gif">gif</option>
        <option value="heif">heif</option>
        <option value="heic">heic</option>
        <option value="jpg">jpg</option>
        <option value="jpeg">jpeg</option>
        <option value="png" selected>png</option>
        <option value="psd">psd</option>
        <option value="svg">svg</option>
        <option value="tif">tif</option>
        <option value="tiff">tiff</option>
        <option value="">nessuna</option>
        </select>&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="verifica_download" name="verifica_download" value="V"> Verifica solo il download<br><br></div>
<div class="ME">Nuova estensione: <select size="1" id="nuova_estensione" name="nuova_estensione">
        <option value="bmp">bmp</option>
        <option value="gif">gif</option>
        <option value="heif">heif</option>
        <option value="heic">heic</option>
        <option value="jpg">jpg</option>
        <option value="jpeg">jpeg</option>
        <option value="png" selected>png</option>
        <option value="psd">psd</option>
        <option value="svg">svg</option>
        <option value="tif">tif</option>
        <option value="tiff">tiff</option>
        <option value="">nessuna</option>
        </select><br><br><br></div>
<div class="SC">Nome del file immagine (parte fissa): <input type="text" id="nome_img" name="nome_img" size="20" placeholder="page"><br><br><br></div>
Nome della cartella contenente le immagini: <input type="text" id="nome_cartella" name="nome_cartella" size="20" placeholder="libro"><br><br><br>
<div class="CI">Nome da dare al file PDF: <input type="text" id="nome_pdf" name="nome_pdf" size="20" placeholder="libro"><br><br><br></div>
<input type="button" id="Invia" name="Invia" value="  Procedi  " OnClick="javascript:controlla()">
</form>
</center>
</body>
</html>