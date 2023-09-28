<!DOCTYPE html>
<html>
<head>
  <title>Progress Bar</title>
</head>
<body>
<!-- Progress bar holder -->
<div id="progress" style="width:500px;border:1px solid #ccc;"></div>
<!-- Progress information -->
<div id="information" style="width"></div>
<?PHP
ini_set("max_execution_time", 0);  //NO maximum execution time of 30 seconds exceeded
ini_set('memory_limit', '1024M');
require('./fpdf/fpdf.php');

$operazione=$_POST["operazione"];
if(isset($_POST["verifica_download"])){
    $verifica_download=$_POST["verifica_download"];
}else{
    $verifica_download = "" ;  //default value
}
$url=trim(utf8_decode($_POST["url"]));  //solo parte fissa
$pagina_da=trim(utf8_decode($_POST["pagina_da"]));
$pagina_a=trim(utf8_decode($_POST["pagina_a"]));
$estensione=$_POST["estensione"];
$nuova_estensione=$_POST["nuova_estensione"];
$nome_img=trim(utf8_decode($_POST["nome_img"]));  //solo parte fissa
$nome_cartella=trim(utf8_decode($_POST["nome_cartella"]));
$nome_pdf=trim(utf8_decode($_POST["nome_pdf"]));

/**
 * Set the maximum execution time to 15 minutes (900 seconds).
 * We can flexibly adjust it to fit our need. If we need unlimited time,
 * just set it to 0 but be carefull there will be performance impact.
 */
set_time_limit(900);

// Total processes
$total = intval($pagina_a)-intval($pagina_da);

if(!file_exists("./".$nome_cartella) && !is_dir("./".$nome_cartella)){
   mkdir("./".$nome_cartella);
}

if(trim($estensione)!=""){
   $estensione=".".$estensione;
}

if(isset($verifica_download) && ($verifica_download=="V")){
   // Download della sola prima immagine
   //echo("Please wait...<br>");
   //if(file_exists($url.$pagina_da.$estensione)){   // CAN'T BE TESTED BECAUSE THE WEBAPP DOESN'T HAVE ACCESS TO THE RESOURCE
      $full_url = $url.$pagina_da;
      $immagine = file_get_contents($full_url);
      $nome_file = basename($full_url).$estensione;
      file_put_contents("./".$nome_cartella."/".$nome_file, $immagine);
      echo("Downloaded page: ".$pagina_da."<br>");
      usleep(100000); // debuging purpose
      ob_flush();
      flush();
      echo("Image saved successfully on local folder!");
   //}
   //else{
   //   echo("Image ".$url.$pagina_da.$estensione." does not exist!");
   //}
}
else{
   if($operazione=="D"){
      // Download immagini
      //echo("Please wait...<br>");
      $j=0;
      for($i=$pagina_da;$i<=$pagina_a;$i++){
         //if(file_exists($url.$i.$estensione)){   // CAN'T BE TESTED BECAUSE THE WEBAPP DOESN'T HAVE ACCESS TO THE RESOURCE
            $full_url = $url.$i;
            $immagine = file_get_contents($full_url);
            $nome_file = basename($full_url).$estensione;
            file_put_contents("./".$nome_cartella."/".$nome_file, $immagine);
            /*
            echo("Downloaded page: ".$i."<br>");
            usleep(100000); // debuging purpose
            ob_flush();
            flush();
            */
         //}
         //else{
         //   echo("Image ".$url.$i.$estensione." does not exist and has been skipped<br>");
         //}
         // Calculate the percentation
         $percent = intval($j/$total * 100)."%";

         // Javascript for updating the progress bar and information
         echo '<script language="javascript">
         //document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#ddd;\">&nbsp;</div>";
         document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-image:url(./imgs/pbar-ani.gif);\">&nbsp;</div>";
         document.getElementById("information").innerHTML="'.$j.' image(s) processed.";
         </script>';

         // This is for the buffer achieve the minimum size in order to flush data
         echo str_repeat(' ',1024*64);

         // Send output to browser immediately
         flush();

         // Sleep one second so we can see the delay
         sleep(0.5);
         
         // Go next process
         $j=$j+1;
      }
      echo("Images saved successfully on local folder!");
   }

   elseif($operazione=="C"){
      // Creazione PDF da immagini già scaricate
      $j=0;
      for($i=$pagina_da;$i<=$pagina_a;$i++){
         $folder_name="./".$nome_cartella;
         //if(file_exists($folder_name."/".$nome_img.$i)){   // DO NOT PUT BECAUSE FILES WITHOUT EXTENSION ARE NOT DETECTED!
         $files = glob($folder_name."/".$nome_img.$i."*");
         shuffle($files);
         //echo(realpath($files[0])).'<br>';
         // Get file's extension
         if(isset($files[0])){
            $ext = pathinfo($files[0], PATHINFO_EXTENSION);
            //echo($ext).'<br>';
            if(trim($ext)!=""){
               $ext=".".$ext;
            }
            //$pdf = new FPDF('P','mm','A4');  //Dimensioni A4: 210x297 mm
            //larghezza_img:210=altezza_img:x --> ho ricavato x=257 (approssimando per eccesso)
            //$w=210;  //larghezza pagina in mm
            //$h=257;  //altezza pagina in mm
            // Calling getimagesize() function
            //if(file_exists("./".$nome_cartella."/".$nome_img.$i.$ext)){
            $image_info = getimagesize("./".$nome_cartella."/".$nome_img.$i.$ext);
            $larg=$image_info[0];
            $alt=$image_info[1];
            $w=210;                  //larghezza pagina in mm
            $h=ceil($w*$alt/$larg);  //altezza pagina in mm
            //}
            //else{
            // Standard A4 page
            //$w=210;  //larghezza pagina in mm
            //$h=297;  //altezza pagina in mm
            if($j==0){
               $pdf = new FPDF('P','mm',array($w,$h));
               //echo("Please wait...<br>");
            }
            $pdf->AddPage();
            $page_name = $nome_img.$i;
            $nome_file = $folder_name."/".$page_name.$ext;
            //$pdf->Image($nome_file,0,0,210,297);  //Dimensioni A4: 210x297 mm
            $pdf->Image($nome_file,0,0,$w,$h);      //Dimensioni dell'immagine
            /*
            echo("Created page: ".$i."<br>");
            usleep(100000); // debuging purpose
            ob_flush();
            flush();
            */
         }
         else{
            echo("Image ".$nome_img.$i." does not exist and has been skipped<br>");
         }
         //}
         //else{
         //   echo("Image ".$nome_img.$i." does not exist and has been skipped<br>");
         //}
         // Calculate the percentation
         $percent = intval($j/$total * 100)."%";

         // Javascript for updating the progress bar and information
         echo '<script language="javascript">
         //document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#ddd;\">&nbsp;</div>";
         document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-image:url(./imgs/pbar-ani.gif);\">&nbsp;</div>";
         document.getElementById("information").innerHTML="'.$j.' image(s) processed.";
         </script>';

         // This is for the buffer achieve the minimum size in order to flush data
         echo str_repeat(' ',1024*64);

         // Send output to browser immediately
         flush();

         // Sleep 0.5 seconds so we can see the delay
         sleep(0.5);
         
         // Go next process
         $j=$j+1;
      }
      $pdf->Output('F', './'.$nome_pdf.'.pdf');
      echo("PDF created successfully!");
   }
   
   else{  //$operazione=="M"
      // Modifica estensione a immagini già scaricate
      if(trim($nuova_estensione)!=""){
         $nuova_estensione=".".$nuova_estensione;
      }
      $j=0;
      for($i=$pagina_da;$i<=$pagina_a;$i++){
         $folder_name="./".$nome_cartella;
         //if(file_exists($folder_name."/".$nome_img.$i.$estensione)){   // DO NOT PUT BECAUSE FILES WITHOUT EXTENSION ARE NOT DETECTED!
            //echo($folder_name."/".$nome_img.$i."*<br>");
            $files = glob($folder_name."/".$nome_img.$i."*");
            shuffle($files);
            //echo(realpath($files[0])).'<br>';
            // Get file's extension
            if(isset($files[0])){
               $ext = pathinfo($files[0], PATHINFO_EXTENSION);
               //echo($ext).'<br>';
               if(trim($ext)!=""){
                  $ext=".".$ext;
               }
               // Rename a file using PHP
               $old_file = $folder_name."/".$nome_img.$i.$ext;
               $new_file = $folder_name."/".$nome_img.$i.$nuova_estensione;
               if(file_exists($folder_name."/".$nome_img.$i.$ext)){
                  rename($old_file, $new_file);
               }
            }
            else{
               echo("Image ".$nome_img.$i." does not exist and has been skipped<br>");
            }
         //}
         // Calculate the percentation
         $percent = intval($j/$total * 100)."%";

         // Javascript for updating the progress bar and information
         echo '<script language="javascript">
         //document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#ddd;\">&nbsp;</div>";
         document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-image:url(./imgs/pbar-ani.gif);\">&nbsp;</div>";
         document.getElementById("information").innerHTML="'.$j.' image(s) processed.";
         </script>';

         // This is for the buffer achieve the minimum size in order to flush data
         echo str_repeat(' ',1024*64);

         // Send output to browser immediately
         flush();

         // Sleep 0.3 seconds so we can see the delay
         sleep(0.3);
         
         // Go next process
         $j=$j+1;
      }
      echo("Operation completed successfully!");
   }
}
// Tell user that the process is completed
echo '<script language="javascript">document.getElementById("information").innerHTML="Process completed."</script>';
echo('<br><br><a href="./index.php">Back to main page</a>');
?>
</body>
</html>