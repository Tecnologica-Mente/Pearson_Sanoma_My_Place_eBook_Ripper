# Pearson_Sanoma_My_Place_eBook_Ripper
Simple PDF Downloader for Pearson Sanoma My Place Platform

ITALIAN

1) Scaricare l'archivio ed estrarlo in una posizione a piacere. Rinominare la cartella con un nome (in caratteri minuscoli) breve e facile da ricordare (ad. es. "pearson").
2) Scaricare la classe per PHP FPDF v1.86 (25/06/2023) dal sito:
http://www.fpdf.org/
ed estrarla nella cartella "fpdf" dell'archivio scaricato ed estratto al punto 1).
3) Scaricare la versione portable di XAMPP Lite dal sito:
https://sourceforge.net/projects/xampplite/
Estrarre l'archivio appena scaricato nella cartella root del PC (ad es. C:\, D:\, ecc.) e spostare la cartella contenente tutti i file dei precedenti punti 1) e 2) nella cartella "App/www" (vedi immagine allegata "files_position_image.png" - tutti i file devono stare nella stessa cartella).
4) Fare doppio clic sul file "Xampp-Launcher.exe". Lanciare il proprio browser e nella barra degli indirizzi digitare:
localhost/pearson
(oppure localhost/<nome_cartella_data_al_punto_1>).
5) Aprire un'altra scheda ed effettuare l'accesso con le proprie credenziali al sito Pearson Sanoma My Place:
https://sanomaitalia.it/prodotti-digitali/myplace
Cliccare su "I tuoi prodotti" e sul pulsante "Apri tutti i volumi" in corrispondenza del libro che si vuole scaricare e attendere il caricamento dello stesso sul webreader. Premere sulla tastiera il tasto F12 per visualizzare la DevTools.
a) Se si sta utilizzando Google Chrome, spostarsi nella scheda "Network", assicurandosi che sia spuntata la voce "Disable cache" e selezionata la voce "Fetch/XHR". Premere F5 per aggiornare la pagina. Tra i numerosi file elencati, cercare quello che ha nome "page0" (o con un qualunque altro numero) e cliccare su di esso. Verranno visualizzati il percorso completo e altre informazioni.
b) Se si sta utilizzando Firefox, spostarsi nella scheda "Rete" e ripetere gli stessi passi del punto a).
c) Se si sta utilizzando Microsoft Edge, spostarsi nella scheda "Rete" e ripetere gli stessi passi del punto a).
6) Con l'opzione "Download immagini" selezionata, copiare il contenuto del campo "Request URL" e incollarlo nel campo "URL (parte fissa)" e suddividerlo negli altri diversi campi, come richiesto. Compilare tutti gli altri campi. Nel campo "Estensione" selezionare "nessuna" oppure lasciare quella di default "png" se nel file "page0" non si trovano informazioni relative all'estensione dell'immagine della pagina del libro.
7) Fare clic sul pulsante "Procedi" per iniziare il download delle immagini delle pagine del libro.
8) Cliccare sull'opzione "Creazione PDF da immagini già scaricate" e compilare tutti i campi per creare il file PDF del libro a partire dalle immagini scaricate.
9) Cliccare sull'opzione "Modifica estensione a immagini già scaricate" nel caso si voglia cambiare il formato dell'estensione dalle immagini scaricate (utile soprattutto se si sono scaricate le immagini selezionando "nessuna" nel campo Estensione).

Divertitevi ;-)

p.s. Ricorda che sei responsabile di ciò che stai facendo su Internet e anche se questo script esiste, potrebbe non essere legale nel tuo paese creare backup personali dei libri.

L'UTILIZZO DEL SOFTWARE È A PROPRIO ESCLUSIVO RISCHIO E PERICOLO. IL SOFTWARE È FORNITO DAI DETENTORI DEL COPYRIGHT E DAI COLLABORATORI "COSÌ COM'È" E NON SI RICONOSCE ALCUNA ALTRA GARANZIA ESPRESSA O IMPLICITA, INCLUSE, A TITOLO ESEMPLIFICATIVO, GARANZIE IMPLICITE DI COMMERCIABILITÀ E IDONEITÀ PER UN FINE PARTICOLARE. IN NESSUN CASO IL PROPRIETARIO DEL COPYRIGHT O I RELATIVI COLLABORATORI POTRANNO ESSERE RITENUTI RESPONSABILI PER DANNI DIRETTI, INDIRETTI, INCIDENTALI, SPECIALI, PUNITIVI, O CONSEQUENZIALI (INCLUSI, A TITOLO ESEMPLIFICATIVO, DANNI DERIVANTI DALLA NECESSITÀ DI SOSTITUIRE BENI E SERVIZI, DANNI PER MANCATO UTILIZZO, PERDITA DI DATI O MANCATO GUADAGNO, INTERRUZIONE DELL'ATTIVITÀ), IMPUTABILI A QUALUNQUE CAUSA E INDIPENDENTEMENTE DALLA TEORIA DELLA RESPONSABILITÀ, SIA NELLE CONDIZIONI PREVISTE DAL CONTRATTO CHE IN CASO DI "STRICT LIABILITY", ERRORI (INCLUSI NEGLIGENZA O ALTRO), ILLECITO O ALTRO, DERIVANTI O COMUNQUE CORRELATI ALL'UTILIZZO DEL SOFTWARE, ANCHE QUALORA SIANO STATI INFORMATI DELLA POSSIBILITÀ DEL VERIFICARSI DI TALI DANNI.

Licenza MIT (Massachusetts Institute of Technology)

------------------------------------------------------------------------------------
ENGLISH

1) Download the archive and extract it to a location of your choice. Rename the folder to a short, easy-to-remember (in lowercase) name (e.g. "pearson").
2) Download the class for PHP FPDF v1.86 (25/06/2023) from the site:
http://www.fpdf.org/
and extract it into the "fpdf" folder of the archive downloaded and extracted in point 1).
3) Download the portable version of XAMPP Lite from the site:
https://sourceforge.net/projects/xamplite/
Extract the archive you just downloaded to the root folder of your PC (e.g. C:\, D:\, etc.) and move the folder containing all the files from the previous points 1) and 2) to the "App/www" folder ( see attached image "files_position_image.png" - all files must be in the same folder).
4) Double click on the "Xampp-Launcher.exe" file. Launch your browser and in the address bar type:
localhost/pearson
(or localhost/<folder_name_given_at_point_1>).
5) Open another tab and log in with your credentials to the Pearson Sanoma My Place site:
https://sanomaitalia.it/prodotti-digitali/myplace
Click on "Your products" and the "Open all volumes" button next to the book you want to download and wait for it to load on the webreader. Press the F12 key on your keyboard to view DevTools.
a) If you are using Google Chrome, move to the "Network" tab, making sure that "Disable cache" is checked and "Fetch/XHR" is selected. Press F5 to refresh the page. Among the numerous files listed, look for the one that name "content.opf" and click on it. The full path and other information will be displayed.
b) If you are using Firefox, go to the "Network" tab and repeat the same steps in point a).
c) If you are using Microsoft Edge, move to the "Network" tab and repeat the same steps in point a).
6) With the "Download images" option selected, copy the contents of the "Request URL" field and paste it into the "URL (fixed part)" field and split it into the other several fields, as required. Fill in all other fields. In the "Extension" field, select "none" or leave the default "png" if there is no information relating to the extension of the book page image in the "page0" file.
7) Click the "Proceed" button to begin downloading the book page images.
8) Click on the "PDF creation from images already downloaded" option and fill in all the fields to create the PDF file of the book starting from the downloaded images.
9) Click on the "Change extension to images already downloaded" option if you want to change the format of the extension from the downloaded images (especially useful if you have downloaded the images by selecting "none" in the Extension field).

Enjoy ;-)

p.s. Remember that you are responsible for what you are doing on the Internet and even if this script exists, it might not be legal in your country to create personal backups of books.

USE OF THE SOFTWARE IS AT YOUR OWN RISK. THE SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND COLLABORATORS "AS IS" AND THERE IS NO EXPRESS OR IMPLIED WARRANTY, INCLUDING, BUT NOT LIMITED TO, IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR. IN NO EVENT SHALL THE OWNER OF THE COPYRIGHT OR ITS COLLABORATORS BE HELD LIABLE FOR DIRECT, INDIRECT, INCIDENTAL, SPECIAL, PUNITIVE, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, DAMAGES, DAMAGES ARISING FROM THE LOSS OF DATA OR FAILURE TO EARN, INTERRUPTION OF BUSINESS), CAUSED BY ANY CAUSE AND REGARDLESS OF THE THEORY OF LIABILITY, BOTH IN THE CONDITIONS PROVIDED BY THE CONTRACT AND IN CASE OF "STRICT LIABILITY", ERRORS (INCLUDING NEGLIGENCE OR OTHERWISE), ARISING OR OTHERWISE RELATED TO YOUR USE OF THE SOFTWARE, EVEN IF YOU HAVE BEEN INFORMED OF THE POSSIBILITY OF SUCH DAMAGES.

MIT (Massachusetts Institute of Technology) licence
