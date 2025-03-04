<?php
// inicio.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LSA - Learn. Study. Achieve</title>
        <link rel="icon" type="image/png" href="../imagenes/Savy.png">   
             <link rel="stylesheet" href="../css/opciones.css"> 
    </head>
    <body>
        <header>
            <h1>OPCIONES EDUCATIVAS</h1>
        </header>
        <div class="container">
            <div class="sidebar">
                <div class="search-container">
                    <input type="text" id="searchInput" placeholder="Busca tu escuela">
                    <div id="searchResults"></div>
                </div>
                <ul>             

                    <li onclick="toggleSearch()"class="active">Todas las Opciones               
                    </li>
                    <ul id="cecyt-list" style="display: none;">
                        <li class="school-item" data-school="ESIME_Zacatenco" onclick="cargarMapa(19.504544, -99.146962, 'ESIME Escuela Superior de Ingeniería Mecánica y Eléctrica')">ESIME Zacatenco</li>

                        <li class="school-item" data-school="ESIQUIE" onclick="cargarMapa(19.504825, -99.146518, 'ESIQIE Escuela Superior de Ingeniería Química e Industrias Extractivas')">ESIQUIE</li>

                        <li class="school-item" data-school="ESIA_ZACATENCO" onclick="cargarMapa(19.505342, -99.146768, 'ESIA Escuela Superior de Ingeniería y Arquitectura')">ESIA Zacatenco</li>

                        <li class="school-item" data-school="UPIICSA" onclick="cargarMapa(19.395833, -99.091667, 'UPIICSA Unidad Profesional Interdisciplinaria de Ingeniería y Ciencias Sociales y Administrativas')">UPIICSA</li>

                        <li class="school-item" data-school="ESFM" onclick="cargarMapa(19.504155, -99.146765, 'ESFM Escuela Superior de Física y Matemáticas')">ESFM</li>

                        <li class="school-item" data-school="ESCA_TEPEPAN" onclick="cargarMapa(19.359764, -99.187451, 'ESCA Escuela Superior de Comercio y Administración - Tepepan')">ESCA Tepepan</li>

                        <li class="school-item" data-school="ESCA_SANTO_TOMAS" onclick="cargarMapa(19.455551, -99.155131, 'ESCA Escuela Superior de Comercio y Administración - Santo Tomás')">ESCA Santo Tomás</li>

                        <li class="school-item" data-school="ENCB_SANTO_TOMAS" onclick="cargarMapa(19.454156, -99.154896, 'ENCB Escuela Nacional de Ciencias Biológicas - Santo Tomás')">ENCB Santo Tomás</li>

                        <li class="school-item" data-school="ESE" onclick="cargarMapa(19.454635, -99.155034, 'ESE Escuela Superior de Enfermería')">ESE</li>

                        <li class="school-item" data-school="ESM" onclick="cargarMapa(19.454769, -99.155191, 'ESM Escuela Superior de Medicina')">ESM</li>

                        <li class="school-item" data-school="ESIT" onclick="cargarMapa(19.504243, -99.147317, 'ESIT Escuela Superior de Ingeniería Textil')">ESIT</li>

                        <li class="school-item" data-school="UPIITA" onclick="cargarMapa(19.511389, -99.129444, 'UPIITA Unidad Profesional Interdisciplinaria en Ingeniería y Tecnologías Avanzadas')">UPIITA</li>

                        <li class="school-item" data-school="ESCOM" onclick="cargarMapa(19.503560, -99.148634, 'ESCOM Escuela Superior de Cómputo')">ESCOM</li>

                        <li class="school-item" data-school="ESIME_CULHUACAN" onclick="cargarMapa(19.361420, -99.073226, 'ESIME Escuela Superior de Ingeniería Mecánica y Eléctrica - Culhuacán')">ESIME Culhuacán</li>

                        <li class="school-item" data-school="ESIME_AZCAPOTZALCO" onclick="cargarMapa(19.490278, -99.186944, 'ESIME Escuela Superior de Ingeniería Mecánica y Eléctrica - Azcapotzalco')">ESIME Azcapotzalco</li>

                        <li class="school-item" data-school="ESIME_TICOMAN" onclick="cargarMapa(19.511944, -99.129722, 'ESIME Escuela Superior de Ingeniería Mecánica y Eléctrica - Ticomán')">ESIME Ticomán</li>

                        <li class="school-item" data-school="ESIA_TICOMAN" onclick="cargarMapa(19.511944, -99.129722, 'ESIA Escuela Superior de Ingeniería y Arquitectura - Ticomán')">ESIA Ticomán</li>

                        <li class="school-item" data-school="ESIA_TECAMACHALCO" onclick="cargarMapa(19.403889, -99.248056, 'ESIA Escuela Superior de Ingeniería y Arquitectura - Tecamachalco')">ESIA Tecamachalco</li>

                        <li class="school-item" data-school="UPIIG_GUANAJUATO" onclick="cargarMapa(21.014463, -101.257468, 'UPIIG Unidad Profesional Interdisciplinaria de Ingeniería Campus Guanajuato')">UPIIG Campus Guanajuato</li>

                        <li class="school-item" data-school="UPIBI" onclick="cargarMapa(19.511389, -99.129444, 'UPIBI Unidad Profesional Interdisciplinaria de Biotecnología')">UPIBI</li>

                        <li class="school-item" data-school="UPIIZ_ZACATECAS" onclick="cargarMapa(22.770832, -102.623334, 'UPIIZ Unidad Profesional Interdisciplinaria de Ingeniería Campus Zacatecas')">UPIIZ Campus Zacatecas</li>

                        <li class="school-item" data-school="UPIIP_PALENQUE" onclick="cargarMapa(17.509722, -91.981389, 'UPIIP Unidad Profesional Interdisciplinaria de Ingeniería Campus Palenque')">UPIIP Campus Palenque</li>

                        <li class="school-item" data-school="UPIIC_COAHUILA" onclick="cargarMapa(25.411667, -100.986389, 'UPIIC Unidad Profesional Interdisciplinaria de Ingeniería Campus Coahuila')">UPIIC Campus Coahuila</li>

                        <li class="school-item" data-school="UPIIT_TLAXCALA" onclick="cargarMapa(19.318889, -98.238611, 'UPIIT Unidad Profesional Interdisciplinaria de Ingeniería Campus Tlaxcala')">UPIIT Campus Tlaxcala</li>

                        <li class="school-item" data-school="UPIEM" onclick="cargarMapa(19.472222, -99.175833, 'UPIEM Unidad Profesional Interdisciplinaria de Energía y Movilidad')">UPIEM</li>

                        <li class="school-item" data-school="UPIIH_HIDALGO" onclick="cargarMapa(20.078889, -98.765833, 'UPIIH Unidad Profesional Interdisciplinaria de Ingeniería Campus Hidalgo')">UPIIH Campus Hidalgo</li>

                        <li class="school-item" data-school="CICS_MILPA_ALTA" onclick="cargarMapa(19.191389, -99.025556, 'CICS Unidad Milpa Alta')">CICS Unidad Milpa Alta</li>

                        <li class="school-item" data-school="ESEO" onclick="cargarMapa(19.454615, -99.155115, 'ESEO Escuela Superior de Enfermería y Obstetricia')">ESEO</li>

                        <li class="school-item" data-school="CICS_SANTO_TOMAS" onclick="cargarMapa(19.454156, -99.154896, 'CICS Unidad Santo Tomás')">CICS Unidad Santo Tomás</li>

                        <li class="school-item" data-school="ENMyH" onclick="cargarMapa(19.454769, -99.155191, 'ENMyH Escuela Nacional de Medicina y Homeopatía')">ENMyH</li>

                        <li class="school-item" data-school="ENBA" onclick="cargarMapa(19.454615, -99.155115, 'ENBA Escuela Nacional de Biblioteconomía y Archivonomía')">ENBA</li>

                        <li class="school-item" data-school="EST" onclick="cargarMapa(19.454615, -99.155115, 'EST Escuela Superior de Turismo')">EST</li>




                        <li class="school-item" data-school="FACULTAD_INGENIERIA" onclick="cargarMapa(19.331944, -99.184167, 'Facultad de Ingeniería')">Facultad de Ingeniería</li>

                        <li class="school-item" data-school="FACULTAD_QUIMICA" onclick="cargarMapa(19.324722, -99.179722, 'Facultad de Química')">Facultad de Química</li>

                        <li class="school-item" data-school="FACULTAD_MEDICINA" onclick="cargarMapa(19.334167, -99.175556, 'Facultad de Medicina')">Facultad de Medicina</li>

                        <li class="school-item" data-school="FACULTAD_CIENCIAS" onclick="cargarMapa(19.324167, -99.178611, 'Facultad de Ciencias')">Facultad de Ciencias </li>

                        <li class="school-item" data-school="FACULTAD_DERECHO" onclick="cargarMapa(19.334444, -99.185833, 'Facultad de Derecho')">Facultad de Derecho</li>

                        <li class="school-item" data-school="FACULTAD_FILOSOFIA_LETRAS" onclick="cargarMapa(19.334688, -99.190314, 'Facultad de Filosofía y Letras')">Facultad de Filosofía y Letras</li>

                        <li class="school-item" data-school="FACULTAD_ECONOMIA" onclick="cargarMapa(19.334688, -99.190314, 'Facultad de Economía)')">Facultad de Economía</li>

                        <li class="school-item" data-school="FACULTAD_CONTADURIA_ADMINISTRACION" onclick="cargarMapa(19.334688, -99.190314, 'Facultad de Contaduría y Administración')">Facultad de Contaduría y Administración</li>

                        <li class="school-item" data-school="FACULTAD_ARQUITECTURA" onclick="cargarMapa(19.334688, -99.190314, 'Facultad de Arquitectura')">Facultad de Arquitectura</li>

                        <li class="school-item" data-school="FACULTAD_PSICOLOGIA" onclick="cargarMapa(19.334688, -99.190314, 'Facultad de Psicología')">Facultad de Psicología</li>

                        <li class="school-item" data-school="FACULTAD_ODONTOLOGIA" onclick="cargarMapa(19.334688, -99.190314, 'Facultad de Odontología)', )">Facultad de Odontología</li>

                        <li class="school-item" data-school="FACULTAD_VETERINARIA_ZOOTECNIA" onclick="cargarMapa(19.334688, -99.190314, 'Facultad de Medicina Veterinaria y Zootecnia')">Facultad de Medicina Veterinaria y Zootecnia</li>

                        <li class="school-item" data-school="FACULTAD_CIENCIAS_POLITICAS_SOCIALES" onclick="cargarMapa(19.334688, -99.190314, 'Facultad de Ciencias Políticas y Sociales')">Facultad de Ciencias Políticas y Sociales</li>

                        <li class="school-item" data-school="FACULTAD_ARTES_DISEÑO" onclick="cargarMapa(19.334688, -99.190314, 'Facultad de Artes y Diseño')">Facultad de Artes y Diseño</li>

                        <li class="school-item" data-school="FACULTAD_MUSICA" onclick="cargarMapa(19.334688, -99.190314, 'Facultad de Música')">Facultad de Música</li>

                        <li class="school-item" data-school="FES_ACATLAN" onclick="cargarMapa(19.510252, -99.126657, 'FES Acatlán')">FES Acatlán</li>

                        <li class="school-item" data-school="FES_ARAGON" onclick="cargarMapa(19.460461, -99.177031, 'FES Aragón)')">FES Aragón</li>

                        <li class="school-item" data-school="FES_CUAUTITLAN" onclick="cargarMapa(19.323036, -99.151148, 'FES Cuautitlán')">FES Cuautitlán</li>

                        <li class="school-item" data-school="FES_ZARAGOZA" onclick="cargarMapa(19.412833, -99.134164, 'FES Zaragoza')">FES Zaragoza</li>

                        <li class="school-item" data-school="FES_IZTACALA" onclick="cargarMapa(19.652464, -99.341771, 'FES Iztacala')">FES Iztacala</li>

                        <li class="school-item" data-school="TRABAJO_SOCIAL" onclick="cargarMapa(19.334688, -99.190314, 'Escuela Nacional de Trabajo Social')">Escuela Nacional de Trabajo Social</li>

                        <li class="school-item" data-school="ENFERMERIA_OBSTETRICIA" onclick="cargarMapa(19.334688, -99.190314, 'Escuela Nacional de Enfermería y Obstetricia')">Escuela Nacional de Enfermería y Obstetricia</li>

                        <li class="school-item" data-school="ENES_LEON" onclick="cargarMapa(19.331944, -99.184167, 'Facultad de Ingeniería')">ENES Unidad Leon, Gto</li>

                        <li class="school-item" data-school="ENES_MORELIA" onclick="cargarMapa(19.331944, -99.184167, 'Facultad de Ingeniería')">ENES Unidad Morelia, Mich</li>

                        <li class="school-item" data-school="ENES_JURIQUILLA" onclick="cargarMapa(19.331944, -99.184167, 'Facultad de Ingeniería')">ENES Juriquilla, Qro</li>

                        <li class="school-item" data-school="ENES_YUCATAN" onclick="cargarMapa(19.331944, -99.184167, 'Facultad de Ingeniería)')">ENES Unidad Merida, Yuc</li>

                        <li class="school-item" data-school="INST_BIOTECNOLOGIA" onclick="cargarMapa(19.331944, -99.184167, 'Facultad de Ingeniería')">Instituto de Biotecnología</li>

                        <li class="school-item" data-school="LENGUAS_TRADUCCION" onclick="cargarMapa(19.331944, -99.184167, 'Facultad de Ingeniería')">Escuela Nacional de Lenguas Lingüística y Traducción</li>




                        <li class="school-item" data-school="UAM_AZCAPOTZALCO" onclick="cargarMapa(19.504444, -99.184722, 'UAM Azcapotzalco')">UAM Azcapotzalco</li>

                        <li class="school-item" data-school="UAM_IZTAPALAPA" onclick="cargarMapa(19.254444, -99.184722, 'UAM Iztapalapa')">UAM Iztapalapa</li>

                        <li class="school-item" data-school="UAM_XOCHIMILCO" onclick="cargarMapa(19.184444, -99.184722, 'UAM Xochimilco')">UAM Xochimilco</li>

                        <li class="school-item" data-school="UAM_LERMA" onclick="cargarMapa(19.184444, -99.184722, 'UAM Lerma')">UAM Lerma</li>

                        <li class="school-item" data-school="UAM_CUAJIMALPA" onclick="cargarMapa(19.14444, -99.184722, 'UAM Cuajimalpa')">UAM Cuajimalpa</li>

                    </ul>
                    <li onclick="toggleSpecialties()" class="active">Especialidades                
                    </li>
                    <ul id="specialty-list" class="specialty-list">
                        <li onclick="cargarMapa(19.504544, -99.146962, 'Ingeniería Eléctrica - ESIME Unidad Zacatenco')">Ingeniería Eléctrica - ESIME Zacatenco</li>

                    </ul>

                    <li onclick="toggleTipo()" class="active">Tipo</li>
                    <ul id="tipo-list" class="tipo-list" style="display: none;">
                        <li onclick="togglefisico()" class="boton">Fisico Matematicas</li>
                        <ul id="fisicolist" class="specialty-list">
                            <li class="school-item" data-school="ESIME_TICOMAN" onclick="cargarMapa(19.511944, -99.129722, 'ESIME Escuela Superior de Ingeniería Mecánica y Eléctrica - Ticomán')">ESIME Ticomán</li>

                            <li class="school-item" data-school="UPIIG_GUANAJUATO" onclick="cargarMapa(21.014463, -101.257468, 'UPIIG Unidad Profesional Interdisciplinaria de Ingeniería Campus Guanajuato')">UPIIG Campus Guanajuato</li>

                            <li class="school-item" data-school="UPIBI" onclick="cargarMapa(19.511389, -99.129444, 'UPIBI Unidad Profesional Interdisciplinaria de Biotecnología')">UPIBI</li>

                            <li class="school-item" data-school="UPIIZ_ZACATECAS" onclick="carga8rMapa(22.770832, -102.623334, 'UPIIZ Unidad Profesional Interdisciplinaria de Ingeniería Campus Zacatecas')">UPIIZ Campus Zacatecas</li>

                            <li class="school-item" data-school="UPIITA" onclick="cargarMapa(19.511389, -99.129444, 'UPIITA Unidad Profesional Interdisciplinaria en Ingeniería y Tecnologías Avanzadas')">UPIITA</li>

                            <li class="school-item" data-school="ENCB_SANTO_TOMAS" onclick="cargarMapa(19.454156, -99.154896, 'ENCB Escuela Nacional de Ciencias Biológicas - Santo Tomás')">ENCB Santo Tomás</li>

                            <li class="school-item" data-school="UPIIT_TLAXCALA" onclick="cargarMapa(19.318889, -98.238611, 'UPIIT Unidad Profesional Interdisciplinaria de Ingeniería Campus Tlaxcala')">UPIIT Campus Tlaxcala</li>

                            <li class="school-item" data-school="UPIIP_PALENQUE" onclick="cargarMapa(17.509722, -91.981389, 'UPIIP Unidad Profesional Interdisciplinaria de Ingeniería Campus Palenque')">UPIIP Campus Palenque</li>

                            <li class="school-item" data-school="ESIA_ZACATENCO" onclick="cargarMapa(19.505342, -99.146768, 'ESIA Escuela Superior de Ingeniería y Arquitectura')">ESIA Zacatenco</li>

                            <li class="school-item" data-school="ESIME_Zacatenco" onclick="cargarMapa(19.504544, -99.146962, 'ESIME Escuela Superior de Ingeniería Mecánica y Eléctrica')">ESIME Zacatenco</li>

                            <li class="school-item" data-school="ESIME_CULHUACAN" onclick="cargarMapa(19.361420, -99.073226, 'ESIME Escuela Superior de Ingeniería Mecánica y Eléctrica - Culhuacán')">ESIME Culhuacán</li>

                            <li class="school-item" data-school="UPIIC_COAHUILA" onclick="cargarMapa(25.411667, -100.986389, 'UPIIC Unidad Profesional Interdisciplinaria de Ingeniería Campus Coahuila')">UPIIC Campus Coahuila</li>

                            <li class="school-item" data-school="UPIICSA" onclick="cargarMapa(19.395833, -99.091667, 'UPIICSA Unidad Profesional Interdisciplinaria de Ingeniería y Ciencias Sociales y Administrativas')">UPIICSA</li>

                            <li class="school-item" data-school="ESCOM" onclick="cargarMapa(19.503560, -99.148634, 'ESCOM Escuela Superior de Cómputo')">ESCOM</li>

                            <li class="school-item" data-school="ESIQUIE" onclick="cargarMapa(19.504825, -99.146518, 'ESIQIE Escuela Superior de Ingeniería Química e Industrias Extractivas')">ESIQIE</li>

                            <li class="school-item" data-school="UPIEM" onclick="cargarMapa(19.472222, -99.175833, 'UPIEM Unidad Profesional Interdisciplinaria de Energía y Movilidad')">UPIEM</li>

                            <li class="school-item" data-school="ESIME_AZCAPOTZALCO" onclick="cargarMapa(19.490278, -99.186944, 'ESIME Escuela Superior de Ingeniería Mecánica y Eléctrica - Azcapotzalco')">ESIME Azcapotzalco</li>

                            <li class="school-item" data-school="UPIIH_HIDALGO" onclick="cargarMapa(20.078889, -98.765833, 'UPIIH Unidad Profesional Interdisciplinaria de Ingeniería Campus Hidalgo')">UPIIH Campus Hidalgo</li>

                            <li class="school-item" data-school="ESIA_TICOMAN" onclick="cargarMapa(19.511944, -99.129722, 'ESIA Escuela Superior de Ingeniería y Arquitectura - Ticomán')">ESIA Ticomán</li>

                            <li class="school-item" data-school="ESFM" onclick="cargarMapa(19.504155, -99.146765, 'ESFM Escuela Superior de Física y Matemáticas')">ESFM</li>

                            <li class="school-item" data-school="ESIT" onclick="cargarMapa(19.504243, -99.147317, 'ESIT Escuela Superior de Ingeniería Textil')">ESIT</li>

                            <li class="school-item" data-school="ESIA_TECAMACHALCO" onclick="cargarMapa(19.403889, -99.248056, 'ESIA Escuela Superior de Ingeniería y Arquitectura - Tecamachalco')">ESIA Tecamachalco</li>

                        </ul>

                        <li onclick="togglebiologicas()" class="boton">Medico Biologicas</li>
                        <ul id="biologicaslist" class="specialty-list">
                            <li class="school-item" data-school="ENCB_SANTO_TOMAS" onclick="cargarMapa(19.454156, -99.154896, 'ENCB Escuela Nacional de Ciencias Biológicas - Santo Tomás')">ENCB Santo Tomás</li>

                            <li class="school-item" data-school="CICS_MILPA_ALTA" onclick="cargarMapa(19.191389, -99.025556, 'CICS Unidad Milpa Alta')">CICS Unidad Milpa Alta</li>

                            <li class="school-item" data-school="ESEO" onclick="cargarMapa(19.454615, -99.155115, 'ESEO Escuela Superior de Enfermería y Obstetricia')">ESEO</li>

                            <li class="school-item" data-school="CICS_SANTO_TOMAS" onclick="cargarMapa(19.454156, -99.154896, 'CICS Unidad Santo Tomás')">CICS Unidad Santo Tomás</li>

                            <li class="school-item" data-school="ENMyH" onclick="cargarMapa(19.454769, -99.155191, 'ENMyH Escuela Nacional de Medicina y Homeopatía')">ENMyH</li>

                            <li class="school-item" data-school="ESM" onclick="cargarMapa(19.454769, -99.155191, 'ESM Escuela Superior de Medicina')">ESM</li>
                        </ul>

                        <li onclick="togglesociales()">Ciencias Sociales y Administrativas</li>
                        <ul id="socialeslist" class="specialty-list">
                            <li class="school-item" data-school="ESCA_TEPEPAN" onclick="cargarMapa(19.359764, -99.187451, 'ESCA Escuela Superior de Comercio y Administración - Tepepan')">ESCA Tepepan</li>

                            <li class="school-item" data-school="ESCA_SANTO_TOMAS" onclick="cargarMapa(19.455551, -99.155131, 'ESCA Escuela Superior de Comercio y Administración - Santo Tomás')">ESCA Santo Tomás</li>

                            <li class="school-item" data-school="UPIICSA" onclick="cargarMapa(19.395833, -99.091667, 'UPIICSA Unidad Profesional Interdisciplinaria de Ingeniería y Ciencias Sociales y Administrativas')">UPIICSA</li>

                            <li class="school-item" data-school="ESE" onclick="cargarMapa(19.454635, -99.155034, 'ESE Escuela Superior de Enfermería')">ESE</li>

                            <li class="school-item" data-school="ENBA" onclick="cargarMapa(19.454615, -99.155115, 'ENBA Escuela Nacional de Biblioteconomía y Archivonomía')">ENBA</li>

                            <li class="school-item" data-school="EST" onclick="cargarMapa(19.454615, -99.155115, 'EST Escuela Superior de Turismo')">EST</li>

                            <li class="school-item" data-school="UPIIP_PALENQUE" onclick="cargarMapa(17.509722, -91.981389, 'UPIIP Unidad Profesional Interdisciplinaria de Ingeniería Campus Palenque')">UPIIP Campus Palenque</li>

                        </ul>
                    </ul>

                    <li onclick="toggleInstituciones()" class="active">Institución</li>
                    <ul id="instituciones-list" class="specialty-list">
                        <li onclick="toggleIPN()">IPN</li>
                        <ul id="ipn-cecyt-list" class="specialty-list">
                            <li class="school-item" data-school="ESIME_Zacatenco" onclick="cargarMapa(19.504544, -99.146962, 'ESIME Escuela Superior de Ingeniería Mecánica y Eléctrica')">ESIME Zacatenco</li>

                            <li class="school-item" data-school="ESIQUIE" onclick="cargarMapa(19.504825, -99.146518, 'ESIQIE Escuela Superior de Ingeniería Química e Industrias Extractivas')">ESIQUIE</li>

                            <li class="school-item" data-school="ESIA_ZACATENCO" onclick="cargarMapa(19.505342, -99.146768, 'ESIA Escuela Superior de Ingeniería y Arquitectura')">ESIA Zacatenco</li>

                            <li class="school-item" data-school="UPIICSA" onclick="cargarMapa(19.395833, -99.091667, 'UPIICSA Unidad Profesional Interdisciplinaria de Ingeniería y Ciencias Sociales y Administrativas')">UPIICSA</li>

                            <li class="school-item" data-school="ESFM" onclick="cargarMapa(19.504155, -99.146765, 'ESFM Escuela Superior de Física y Matemáticas')">ESFM</li>

                            <li class="school-item" data-school="ESCA_TEPEPAN" onclick="cargarMapa(19.359764, -99.187451, 'ESCA Escuela Superior de Comercio y Administración - Tepepan')">ESCA Tepepan</li>

                            <li class="school-item" data-school="ESCA_SANTO_TOMAS" onclick="cargarMapa(19.455551, -99.155131, 'ESCA Escuela Superior de Comercio y Administración - Santo Tomás')">ESCA Santo Tomás</li>

                            <li class="school-item" data-school="ENCB_SANTO_TOMAS" onclick="cargarMapa(19.454156, -99.154896, 'ENCB Escuela Nacional de Ciencias Biológicas - Santo Tomás')">ENCB Santo Tomás</li>

                            <li class="school-item" data-school="ESE" onclick="cargarMapa(19.454635, -99.155034, 'ESE Escuela Superior de Enfermería')">ESE</li>

                            <li class="school-item" data-school="ESM" onclick="cargarMapa(19.454769, -99.155191, 'ESM Escuela Superior de Medicina')">ESM</li>

                            <li class="school-item" data-school="ESIT" onclick="cargarMapa(19.504243, -99.147317, 'ESIT Escuela Superior de Ingeniería Textil')">ESIT</li>

                            <li class="school-item" data-school="UPIITA" onclick="cargarMapa(19.511389, -99.129444, 'UPIITA Unidad Profesional Interdisciplinaria en Ingeniería y Tecnologías Avanzadas')">UPIITA</li>

                            <li class="school-item" data-school="ESCOM" onclick="cargarMapa(19.503560, -99.148634, 'ESCOM Escuela Superior de Cómputo')">ESCOM</li>

                            <li class="school-item" data-school="ESIME_CULHUACAN" onclick="cargarMapa(19.361420, -99.073226, 'ESIME Escuela Superior de Ingeniería Mecánica y Eléctrica - Culhuacán')">ESIME Culhuacán</li>

                            <li class="school-item" data-school="ESIME_AZCAPOTZALCO" onclick="cargarMapa(19.490278, -99.186944, 'ESIME Escuela Superior de Ingeniería Mecánica y Eléctrica - Azcapotzalco')">ESIME Azcapotzalco</li>

                            <li class="school-item" data-school="ESIME_TICOMAN" onclick="cargarMapa(19.511944, -99.129722, 'ESIME Escuela Superior de Ingeniería Mecánica y Eléctrica - Ticomán')">ESIME Ticomán</li>

                            <li class="school-item" data-school="ESIA_TICOMAN" onclick="cargarMapa(19.511944, -99.129722, 'ESIA Escuela Superior de Ingeniería y Arquitectura - Ticomán')">ESIA Ticomán</li>

                            <li class="school-item" data-school="ESIA_TECAMACHALCO" onclick="cargarMapa(19.403889, -99.248056, 'ESIA Escuela Superior de Ingeniería y Arquitectura - Tecamachalco')">ESIA Tecamachalco</li>

                            <li class="school-item" data-school="UPIIG_GUANAJUATO" onclick="cargarMapa(21.014463, -101.257468, 'UPIIG Unidad Profesional Interdisciplinaria de Ingeniería Campus Guanajuato')">UPIIG Campus Guanajuato</li>

                            <li class="school-item" data-school="UPIBI" onclick="cargarMapa(19.511389, -99.129444, 'UPIBI Unidad Profesional Interdisciplinaria de Biotecnología')">UPIBI</li>

                            <li class="school-item" data-school="UPIIZ_ZACATECAS" onclick="cargarMapa(22.770832, -102.623334, 'UPIIZ Unidad Profesional Interdisciplinaria de Ingeniería Campus Zacatecas')">UPIIZ Campus Zacatecas</li>

                            <li class="school-item" data-school="UPIIP_PALENQUE" onclick="cargarMapa(17.509722, -91.981389, 'UPIIP Unidad Profesional Interdisciplinaria de Ingeniería Campus Palenque')">UPIIP Campus Palenque</li>

                            <li class="school-item" data-school="UPIIC_COAHUILA" onclick="cargarMapa(25.411667, -100.986389, 'UPIIC Unidad Profesional Interdisciplinaria de Ingeniería Campus Coahuila')">UPIIC Campus Coahuila</li>

                            <li class="school-item" data-school="UPIIT_TLAXCALA" onclick="cargarMapa(19.318889, -98.238611, 'UPIIT Unidad Profesional Interdisciplinaria de Ingeniería Campus Tlaxcala')">UPIIT Campus Tlaxcala</li>

                            <li class="school-item" data-school="UPIEM" onclick="cargarMapa(19.472222, -99.175833, 'UPIEM Unidad Profesional Interdisciplinaria de Energía y Movilidad')">UPIEM</li>

                            <li class="school-item" data-school="UPIIH_HIDALGO" onclick="cargarMapa(20.078889, -98.765833, 'UPIIH Unidad Profesional Interdisciplinaria de Ingeniería Campus Hidalgo')">UPIIH Campus Hidalgo</li>

                            <li class="school-item" data-school="CICS_MILPA_ALTA" onclick="cargarMapa(19.191389, -99.025556, 'CICS Unidad Milpa Alta')">CICS Unidad Milpa Alta</li>

                            <li class="school-item" data-school="ESEO" onclick="cargarMapa(19.454615, -99.155115, 'ESEO Escuela Superior de Enfermería y Obstetricia')">ESEO</li>

                            <li class="school-item" data-school="CICS_SANTO_TOMAS" onclick="cargarMapa(19.454156, -99.154896, 'CICS Unidad Santo Tomás')">CICS Unidad Santo Tomás</li>

                            <li class="school-item" data-school="ENMyH" onclick="cargarMapa(19.454769, -99.155191, 'ENMyH Escuela Nacional de Medicina y Homeopatía')">ENMyH</li>

                            <li class="school-item" data-school="ENBA" onclick="cargarMapa(19.454615, -99.155115, 'ENBA Escuela Nacional de Biblioteconomía y Archivonomía')">ENBA</li>

                            <li class="school-item" data-school="EST" onclick="cargarMapa(19.454615, -99.155115, 'EST Escuela Superior de Turismo')">EST</li>
                        </ul>

                        <li onclick="toggleUNAM()">UNAM</li>
                        <ul id="unam-list" class="specialty-list">
                            <li class="school-item" data-school="FACULTAD_INGENIERIA" onclick="cargarMapa(19.331944, -99.184167, 'Facultad de Ingeniería')">Facultad de Ingeniería</li>

                            <li class="school-item" data-school="FACULTAD_QUIMICA" onclick="cargarMapa(19.324722, -99.179722, 'Facultad de Química')">Facultad de Química</li>

                            <li class="school-item" data-school="FACULTAD_MEDICINA" onclick="cargarMapa(19.334167, -99.175556, 'Facultad de Medicina')">Facultad de Medicina</li>

                            <li class="school-item" data-school="FACULTAD_CIENCIAS" onclick="cargarMapa(19.324167, -99.178611, 'Facultad de Ciencias')">Facultad de Ciencias </li>

                            <li class="school-item" data-school="FACULTAD_DERECHO" onclick="cargarMapa(19.334444, -99.185833, 'Facultad de Derecho')">Facultad de Derecho</li>

                            <li class="school-item" data-school="FACULTAD_FILOSOFIA_LETRAS" onclick="cargarMapa(19.334688, -99.190314, 'Facultad de Filosofía y Letras')">Facultad de Filosofía y Letras</li>

                            <li class="school-item" data-school="FACULTAD_ECONOMIA" onclick="cargarMapa(19.334688, -99.190314, 'Facultad de Economía)')">Facultad de Economía</li>

                            <li class="school-item" data-school="FACULTAD_CONTADURIA_ADMINISTRACION" onclick="cargarMapa(19.334688, -99.190314, 'Facultad de Contaduría y Administración')">Facultad de Contaduría y Administración</li>

                            <li class="school-item" data-school="FACULTAD_ARQUITECTURA" onclick="cargarMapa(19.334688, -99.190314, 'Facultad de Arquitectura')">Facultad de Arquitectura</li>

                            <li class="school-item" data-school="FACULTAD_PSICOLOGIA" onclick="cargarMapa(19.334688, -99.190314, 'Facultad de Psicología')">Facultad de Psicología</li>

                            <li class="school-item" data-school="FACULTAD_ODONTOLOGIA" onclick="cargarMapa(19.334688, -99.190314, 'Facultad de Odontología)', )">Facultad de Odontología</li>

                            <li class="school-item" data-school="FACULTAD_VETERINARIA_ZOOTECNIA" onclick="cargarMapa(19.334688, -99.190314, 'Facultad de Medicina Veterinaria y Zootecnia')">Facultad de Medicina Veterinaria y Zootecnia</li>

                            <li class="school-item" data-school="FACULTAD_CIENCIAS_POLITICAS_SOCIALES" onclick="cargarMapa(19.334688, -99.190314, 'Facultad de Ciencias Políticas y Sociales')">Facultad de Ciencias Políticas y Sociales</li>

                            <li class="school-item" data-school="FACULTAD_ARTES_DISEÑO" onclick="cargarMapa(19.334688, -99.190314, 'Facultad de Artes y Diseño')">Facultad de Artes y Diseño</li>

                            <li class="school-item" data-school="FACULTAD_MUSICA" onclick="cargarMapa(19.334688, -99.190314, 'Facultad de Música')">Facultad de Música</li>

                            <li class="school-item" data-school="FES_ACATLAN" onclick="cargarMapa(19.510252, -99.126657, 'FES Acatlán')">FES Acatlán</li>

                            <li class="school-item" data-school="FES_ARAGON" onclick="cargarMapa(19.460461, -99.177031, 'FES Aragón)')">FES Aragón</li>

                            <li class="school-item" data-school="FES_CUAUTITLAN" onclick="cargarMapa(19.323036, -99.151148, 'FES Cuautitlán')">FES Cuautitlán</li>

                            <li class="school-item" data-school="FES_ZARAGOZA" onclick="cargarMapa(19.412833, -99.134164, 'FES Zaragoza')">FES Zaragoza</li>

                            <li class="school-item" data-school="FES_IZTACALA" onclick="cargarMapa(19.652464, -99.341771, 'FES Iztacala')">FES Iztacala</li>

                            <li class="school-item" data-school="TRABAJO_SOCIAL" onclick="cargarMapa(19.334688, -99.190314, 'Escuela Nacional de Trabajo Social')">Escuela Nacional de Trabajo Social</li>

                            <li class="school-item" data-school="ENFERMERIA_OBSTETRICIA" onclick="cargarMapa(19.334688, -99.190314, 'Escuela Nacional de Enfermería y Obstetricia')">Escuela Nacional de Enfermería y Obstetricia</li>

                            <li class="school-item" data-school="ENES_LEON" onclick="cargarMapa(19.331944, -99.184167, 'Facultad de Ingeniería')">ENES Unidad Leon, Gto</li>

                            <li class="school-item" data-school="ENES_MORELIA" onclick="cargarMapa(19.331944, -99.184167, 'Facultad de Ingeniería')">ENES Unidad Morelia, Mich</li>

                            <li class="school-item" data-school="ENES_JURIQUILLA" onclick="cargarMapa(19.331944, -99.184167, 'Facultad de Ingeniería')">ENES Juriquilla, Qro</li>

                            <li class="school-item" data-school="ENES_YUCATAN" onclick="cargarMapa(19.331944, -99.184167, 'Facultad de Ingeniería)')">ENES Unidad Merida, Yuc</li>

                            <li class="school-item" data-school="INST_BIOTECNOLOGIA" onclick="cargarMapa(19.331944, -99.184167, 'Facultad de Ingeniería')">Instituto de Biotecnología</li>

                            <li class="school-item" data-school="LENGUAS_TRADUCCION" onclick="cargarMapa(19.331944, -99.184167, 'Facultad de Ingeniería')">Escuela Nacional de Lenguas Lingüística y Traducción</li>
                        </ul>

                        <li onclick="toggleUAM()">UAM</li>
                        <ul id="uam-list" class="specialty-list">                     
                            <li class="school-item" data-school="UAM_AZCAPOTZALCO" onclick="cargarMapa(19.504444, -99.184722, 'UAM Azcapotzalco')">UAM Azcapotzalco</li>

                            <li class="school-item" data-school="UAM_IZTAPALAPA" onclick="cargarMapa(19.254444, -99.184722, 'UAM Iztapalapa')">UAM Iztapalapa</li>

                            <li class="school-item" data-school="UAM_XOCHIMILCO" onclick="cargarMapa(19.184444, -99.184722, 'UAM Xochimilco')">UAM Xochimilco</li>

                            <li class="school-item" data-school="UAM_LERMA" onclick="cargarMapa(19.184444, -99.184722, 'UAM Lerma')">UAM Lerma</li>

                            <li class="school-item" data-school="UAM_CUAJIMALPA" onclick="cargarMapa(19.184444, -99.184722, 'UAM Cuajimalpa')">UAM Cuajimalpa</li>
                        </ul>  
                        
                    </ul>
                                            <br>

                </ul>
            </div>

            <div id="map"></div>
        </div>

        <div id="detailsSidebar" class="hidden">
            <img id="schoolImage" src="" alt="" width="200">

            <button id="closeSidebar" class="close-btn">X</button>
            <h2 id="detailsTitle"></h2>
            <div id="generalInfo"></div>
            <ul id="carrerasList"></ul>
            <div id="locationInfo"></div>
        </div>

        <script src="https://unpkg.com/maplibre-gl@2.4.0/dist/maplibre-gl.js"></script>
        <link href="https://unpkg.com/maplibre-gl@2.4.0/dist/maplibre-gl.css" rel="stylesheet" />
        <script>
                                const schoolsData = {
    ESIME_Zacatenco: {
        name: "ESIME Escuela Superior de Ingeniería Mecánica y Eléctrica Zacatenco",
        institution: "Instituto Politécnico Nacional",
        type: "Universidad Pública",
        contacto: {
            telefono: "+52 55 5729 6000, Extensión 46000",
            email: "direccion_esimez@ipn.mx",
            sitioWeb: "https://www.esimez.ipn.mx"
        },
        descripcion: "La ESIME Zacatenco es una institución dedicada a la formación de ingenieros en áreas como mecánica, eléctrica, comunicaciones, sistemas automotrices y fotónica, promoviendo innovación en ingeniería aplicada.",
        carreras: [
            "Ingeniería Eléctrica",
            "Ingeniería en Comunicaciones y Electrónica",
            "Ingeniería en Control y Automatización",
            "Ingeniería en Sistemas Automotrices",
            "Ingeniería en Computación"
        ],
        address: "Unidad Profesional, Av. Luis Enrique Erro, Adolfo López Mateos S/N, Zacatenco, Gustavo A. Madero, 07700 Ciudad de México",
        coordinates: {lat: 19.5041, lng: -99.1464},
        infraestructura: [
            "Laboratorios de ingeniería eléctrica y mecánica",
            "Centro de Innovación Tecnológica",
            "Aulas con tecnología multimedia",
            "Biblioteca especializada"
        ],
        imagen: "../imagenes/ESIME_ZACATENCO.jpeg"
    },
    ESIQUIE: {
        name: "ESIQIE Escuela Superior de Ingeniería Química e Industrias Extractivas",
        institution: "Instituto Politécnico Nacional",
        type: "Universidad Pública",
        contacto: {
            telefono: "+52 55 5729 6000, Extensión 55000",
            email: "direccion_esiqie@ipn.mx",
            sitioWeb: "https://www.esiqie.ipn.mx"
        },
        descripcion: "La ESIQIE es líder en ingeniería química, ofreciendo formación avanzada en procesos industriales y química petrolera con un enfoque en investigación e innovación en el sector energético y de transformación.",
        carreras: [
            "Ingeniería Química Industrial",
            "Ingeniería Química Petrolera",
            "Ingeniería en Metalurgia y Materiales"
        ],
        address: "Av Instituto Politécnico Nacional, Lindavista, Gustavo A. Madero, 07738 Ciudad de México",
        coordinates: {lat: 19.504825, lng: -99.146518},
        infraestructura: [
            "Laboratorios de química avanzada",
            "Centro de investigación en ingeniería química",
            "Planta piloto de procesos",
            "Biblioteca especializada"
        ],
        imagen: "../imagenes/ESIQUIE.jpeg"
    },
    ESIA_ZACATENCO: {
        name: "ESIA Escuela Superior de Ingeniería y Arquitectura Zacatenco",
        institution: "Instituto Politécnico Nacional",
        type: "Universidad Pública",
        contacto: {
            telefono: "+52 55 5729 6000, Extensión 56000",
            email: "direccion_esiaz@ipn.mx",
            sitioWeb: "https://www.esiaz.ipn.mx"
        },
        descripcion: "La ESIA Zacatenco es una de las principales instituciones en México para la formación en ingeniería civil, enfocada en la sostenibilidad, innovación en infraestructura y el desarrollo urbano.",
        carreras: [
            "Ingeniería Civil",
            "Ingeniería Topográfica y Fotogramétrica"
        ],
        address: "Av. Juan de Dios Bátiz S/N, Colonia Adolfo López Mateos, Gustavo A. Madero, 07738 Ciudad de México",
        coordinates: {lat: 19.505342, lng: -99.146768},
        infraestructura: [
            "Laboratorios de materiales",
            "Talleres de construcción",
            "Centro de modelado estructural",
            "Biblioteca especializada"
        ],
        imagen: "../imagenes/ESIA_ZACATENCO.jpeg"
    },
    UPIICSA: {
        name: "UPIICSA Unidad Profesional Interdisciplinaria de Ingeniería y Ciencias Sociales y Administrativas",
        institution: "Instituto Politécnico Nacional",
        type: "Universidad Pública",
        contacto: {
            telefono: "+52 55 5624 2000",
            email: "upiicsa@ipn.mx",
            sitioWeb: "https://www.upiicsa.ipn.mx"
        },
        descripcion: "UPIICSA ofrece programas interdisciplinarios en ingeniería, administración e informática, con un enfoque en resolver problemas en áreas técnicas, industriales y administrativas, formando profesionales para la innovación empresarial.",
        carreras: [
            "Ingeniería en Informática",
            "Ingeniería Industrial",
            "Ingeniería en Transporte",
            "Licenciatura en Ciencias de la Informática",
            "Licenciatura en Administración Industrial"
        ],
        address: "Av. Té 950, Granjas México, Iztacalco, 08400 Ciudad de México",
        coordinates: {lat: 19.395833, lng: -99.091667},
        infraestructura: [
            "Laboratorios de informática",
            "Centro de simulación industrial",
            "Salas de cómputo especializadas",
            "Biblioteca de ciencias administrativas"
        ],
        imagen: "../imagenes/UPIICSA.jpeg"
    },
    ESFM: {
        name: "ESFM Escuela Superior de Física y Matemáticas",
        institution: "Instituto Politécnico Nacional",
        type: "Universidad Pública",
        contacto: {
            telefono: "+52 55 5729 6000, Extensión 55011",
            email: "direccion_esfm@ipn.mx",
            sitioWeb: "https://www.esfm.ipn.mx"
        },
        descripcion: "La ESFM es reconocida por su excelencia académica en física y matemáticas, formando profesionistas e investigadores altamente capacitados en ciencias exactas y sus aplicaciones en tecnología avanzada.",
        carreras: [
            "Licenciatura en Física y Matemáticas",
            "Ingeniería Matemática"
        ],
        address: "Avenida Instituto Politécnico Nacional s/n Edificio 9 Unidad Profesional Adolfo López Mateos, Col. San Pedro Zacatenco, Gustavo A. Madero, 07738 Ciudad de México",
        coordinates: {lat: 19.504155, lng: -99.146765},
        infraestructura: [
            "Laboratorios de física avanzada",
            "Centro de investigación en ciencias exactas",
            "Aulas de cálculo y análisis matemático",
            "Biblioteca especializada"
        ],
        imagen: "../imagenes/ESFM.jpeg"
    },
    ESCA_TEPEPAN: {
        name: "ESCA Escuela Superior de Comercio y Administración - Tepepan",
        institution: "Instituto Politécnico Nacional",
        type: "Universidad Pública",
        contacto: {
            telefono: "+52 55 5729 6300",
            email: "direccion_escat@ipn.mx",
            sitioWeb: "https://www.escatep.ipn.mx"
        },
        descripcion: "La ESCA Tepepan es una institución especializada en la formación de profesionales en las áreas de contaduría, administración y comercio, con un enfoque en gestión empresarial y negocios internacionales.",
        carreras: [
            "Licenciatura en Contaduría Pública",
            "Licenciatura en Relaciones Comerciales",
            "Licenciatura en Negocios Internacionales"
        ],
        address: "Periférico Sur 4863, Tepepan Xochimilco, 16020 Ciudad de México",
        coordinates: {lat: 19.359764, lng: -99.187451},
        infraestructura: [
            "Centro de simulación financiera y bursátil",
            "Biblioteca especializada en economía",
            "Aulas de cómputo para análisis de datos",
            "Salas de conferencias"
        ],
        imagen: "../imagenes/ESCA_TEPEPAN.jpeg"
    },
    ESCA_SANTO_TOMAS: {
        name: "ESCA Escuela Superior de Comercio y Administración - Santo Tomás",
        institution: "Instituto Politécnico Nacional",
        type: "Universidad Pública",
        contacto: {
            telefono: "+52 55 5729 6000, Extensión 61800",
            email: "escasto@ipn.mx",
            sitioWeb: "https://www.escasto.ipn.mx"
        },
        descripcion: "La ESCA Santo Tomás es una de las escuelas de negocios más antiguas de México, especializada en formar líderes empresariales con visión estratégica en las áreas de administración, comercio y finanzas.",
        carreras: [
            "Licenciatura en Contaduría Pública",
            "Licenciatura en Relaciones Comerciales",
            "Licenciatura en Administración y Desarrollo Empresarial"
        ],
        address: "Manuel Carpio 471, Plutarco Elías Calles, Miguel Hidalgo, 11340 Ciudad de México",
        coordinates: {lat: 19.455551, lng: -99.155131},
        infraestructura: [
            "Laboratorios de simulación empresarial",
            "Centro de estudios financieros",
            "Auditorios para conferencias",
            "Biblioteca especializada"
        ],
        imagen: "../imagenes/ESCA_SANTO_TOMAS.jpeg"
    },
    ENCB_SANTO_TOMAS: {
        name: "ENCB Escuela Nacional de Ciencias Biológicas - Santo Tomás",
        institution: "Instituto Politécnico Nacional",
        type: "Universidad Pública",
        contacto: {
            telefono: "+52 55 5729 6000, Extensión 62500",
            email: "direccion_encb@ipn.mx",
            sitioWeb: "https://www.encb.ipn.mx"
        },
        descripcion: "La ENCB es una institución líder en la formación de profesionales en ciencias biológicas, con un fuerte enfoque en investigación científica, biotecnología, análisis clínicos y farmacéutica.",
        carreras: [
            "Licenciatura en Biología",
            "Químico Bacteriólogo Parasitólogo",
            "Químico Farmacéutico Industrial",
            "Ingeniería Bioquímica",
            "Ingeniería en Sistemas Ambientales"
        ],
        address: "Prol. Carpio y Plan de Ayala S/N, Santo Tomás, Miguel Hidalgo, 11340 Ciudad de México",
        coordinates: {lat: 19.454156, lng: -99.154896},
        infraestructura: [
            "Laboratorios de investigación biológica",
            "Centro de instrumentación científica",
            "Herbario y colecciones biológicas",
            "Laboratorios de microbiología y bioquímica"
        ],
        imagen: "../imagenes/ENCB_SANTO_TOMAS.jpeg"
    },
    ESE: {
        name: "ESE Escuela Superior de Enfermería",
        institution: "Instituto Politécnico Nacional",
        type: "Universidad Pública",
        contacto: {
            telefono: "+52 55 5729 6000, Extensión 63112",
            email: "dir_enfermeria@ipn.mx",
            sitioWeb: "https://www.ese.ipn.mx"
        },
        descripcion: "La ESE forma profesionales de enfermería con una sólida preparación científica, humanista y técnica, capacitados para brindar cuidados integrales de salud y desarrollar investigación en el campo de la enfermería.",
        carreras: [
            "Licenciatura en Enfermería"
        ],
        address: "Guillermo Massieu Helguera 239, Fracc. La Escalera, Ticomán, Gustavo A. Madero, 07320 Ciudad de México",
        coordinates: {lat: 19.454635, lng: -99.155034},
        infraestructura: [
            "Laboratorios de simulación clínica",
            "Centro de prácticas de enfermería",
            "Biblioteca especializada en ciencias de la salud",
            "Aulas de aprendizaje interactivo"
        ],
        imagen: "../imagenes/ESE.jpeg"
    },
    ESM: {
        name: "ESM Escuela Superior de Medicina",
        institution: "Instituto Politécnico Nacional",
        type: "Universidad Pública",
        contacto: {
            telefono: "+52 55 5729 6000, Extensión 62700",
            email: "direccion_esm@ipn.mx",
            sitioWeb: "https://www.esm.ipn.mx"
        },
        descripcion: "La ESM es una institución de excelencia en la formación de médicos cirujanos y parteros, con énfasis en la investigación biomédica, atención primaria a la salud y programas de especialización médica de alto nivel.",
        carreras: [
            "Médico Cirujano y Partero",
            "Licenciatura en Médico Militar"
        ],
        address: "Plan de San Luis y Salvador Díaz Mirón S/N, Casco de Santo Tomás, Miguel Hidalgo, 11340 Ciudad de México",
        coordinates: {lat: 19.454769, lng: -99.155191},
        infraestructura: [
            "Hospital-Escuela",
            "Laboratorios de investigación biomédica",
            "Centro de simulación médica avanzada",
            "Anfiteatros para prácticas anatómicas",
            "Biblioteca de ciencias médicas"
        ],
        imagen: "../imagenes/ESM.jpeg"
    },
    ESIT: {
        name: "ESIT Escuela Superior de Ingeniería Textil",
        institution: "Instituto Politécnico Nacional",
        type: "Universidad Pública",
        contacto: {
            telefono: "+52 55 5729 6000, Extensión 73500",
            email: "direccion_esit@ipn.mx",
            sitioWeb: "https://www.esit.ipn.mx"
        },
        descripcion: "La ESIT es la principal institución educativa del país dedicada a formar profesionales en el área textil, con competencias en diseño, procesos de producción, control de calidad y gestión de empresas textiles.",
        carreras: [
            "Ingeniería Textil",
            "Ingeniería en Diseño Textil"
        ],
        address: "Av. Instituto Politécnico Nacional S/N, Col. Lindavista, Gustavo A. Madero, 07738 Ciudad de México",
        coordinates: {lat: 19.504243, lng: -99.147317},
        infraestructura: [
            "Laboratorios de procesos textiles",
            "Talleres de diseño y confección",
            "Centro de innovación en fibras y materiales",
            "Planta piloto de producción textil"
        ],
        imagen: "../imagenes/ESIT.jpeg"
    },
    UPIITA: {
        name: "UPIITA Unidad Profesional Interdisciplinaria en Ingeniería y Tecnologías Avanzadas",
        institution: "Instituto Politécnico Nacional",
        type: "Universidad Pública",
        contacto: {
            telefono: "+52 55 5729 6000, Extensión 56800",
            email: "upiita@ipn.mx",
            sitioWeb: "https://www.upiita.ipn.mx"
        },
        descripcion: "La UPIITA es un centro educativo especializado en tecnologías de vanguardia, formando ingenieros con un enfoque interdisciplinario en mecatrónica, telemática, biónica y energías alternas.",
        carreras: [
            "Ingeniería Mecatrónica",
            "Ingeniería en Telemática",
            "Ingeniería Biónica",
            "Ingeniería en Energía"
        ],
        address: "Av. Instituto Politécnico Nacional 2580, La Laguna Ticomán, Gustavo A. Madero, 07340 Ciudad de México",
        coordinates: {lat: 19.511389, lng: -99.129444},
        infraestructura: [
            "Laboratorios de robótica y automatización",
            "Centro de desarrollo tecnológico",
            "Laboratorios de biónica y bioingeniería",
            "Talleres de prototipos y manufactura"
        ],
        imagen: "../imagenes/UPIITA.jpg"
    },
    ESCOM: {
        name: "ESCOM Escuela Superior de Cómputo",
        institution: "Instituto Politécnico Nacional",
        type: "Universidad Pública",
        contacto: {
            telefono: "+52 55 5729 6000, Extensión 52000",
            email: "direccion_escom@ipn.mx",
            sitioWeb: "https://www.escom.ipn.mx"
        },
        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
        carreras: [
            "Ingeniería en Sistemas Computacionales",
            "Ingeniería en Inteligencia Artificial"
        ],
        address: "Av. Juan de Dios Bátiz s/n, Nueva Industrial Vallejo, Gustavo A. Madero, 07738 Ciudad de México",
        coordinates: {lat: 19.503560, lng: -99.148634},
        infraestructura: [
            "Laboratorios especializados en computación",
            "Laboratorios de inteligencia artificial y redes",
            "Centro de desarrollo de software",
            "Biblioteca digital",
            "Aulas multimedia"
        ],
        imagen: "../imagenes/escom.jpg"
    },
    ESIME_CULHUACAN: {
        name: "ESIME Escuela Superior de Ingeniería Mecánica y Eléctrica - Culhuacán",
        institution: "Instituto Politécnico Nacional",
        type: "Universidad Pública",
        contacto: {
            telefono: "+52 55 5729 6000, Extensión 73000",
            email: "direccion_esimec@ipn.mx",
            sitioWeb: "https://www.esimecu.ipn.mx"
        },
        descripcion: "ESIME Culhuacán se especializa en la formación de ingenieros en áreas de electrónica, computación y sistemas. Destaca por sus programas en telecomunicaciones y desarrollo de tecnologías de la información.",
        carreras: [
            "Ingeniería en Comunicaciones y Electrónica",
            "Ingeniería en Computación",
            "Ingeniería en Sistemas Automotrices"
        ],
        address: "Av. Santa Ana 1000, San Francisco Culhuacan, Coyoacán, 04430 Ciudad de México",
        coordinates: {lat: 19.361420, lng: -99.073226},
        infraestructura: [
            "Laboratorios de electrónica y telecomunicaciones",
            "Centro de desarrollo tecnológico",
            "Laboratorios de sistemas digitales",
            "Biblioteca especializada"
        ],
        imagen: "../imagenes/ESIME_CULHUACAN.jpeg"
    },
    ESIME_AZCAPOTZALCO: {
        name: "ESIME Escuela Superior de Ingeniería Mecánica y Eléctrica - Azcapotzalco",
        institution: "Instituto Politécnico Nacional",
        type: "Universidad Pública",
        contacto: {
            telefono: "+52 55 5729 6000, Extensión 64500",
            email: "director_esimeazc@ipn.mx",
            sitioWeb: "https://www.esimeazc.ipn.mx"
        },
        descripcion: "ESIME Azcapotzalco es reconocida por su excelencia en la formación de ingenieros mecánicos y electricistas, con especialización en sistemas energéticos, diseño mecánico y automatización industrial.",
        carreras: [
            "Ingeniería Mecánica",
            "Ingeniería Eléctrica",
            "Ingeniería en Robótica Industrial"
        ],
        address: "Av. de las Granjas 682, Santa Catarina, Azcapotzalco, 02550 Ciudad de México",
        coordinates: {lat: 19.490278, lng: -99.186944},
        infraestructura: [
            "Laboratorios de automatización y control",
            "Talleres de manufactura",
            "Centros de diseño asistido por computadora",
            "Laboratorios de energía y máquinas eléctricas"
        ],
        imagen: "../imagenes/ESIME_AZCAPOTZALCO.jpeg"
    },
    ESIME_TICOMAN: {
        name: "ESIME Escuela Superior de Ingeniería Mecánica y Eléctrica - Ticomán",
        institution: "Instituto Politécnico Nacional",
        type: "Universidad Pública",
        contacto: {
            telefono: "+52 55 5729 6000, Extensión 56000",
            email: "direccion_esimet@ipn.mx",
            sitioWeb: "https://www.esimetic.ipn.mx"
        },
        descripcion: "ESIME Ticomán es un centro educativo especializado en ciencias aeronáuticas y aeroespaciales, formando ingenieros para la industria de la aviación, sistemas de navegación y tecnologías aeroespaciales.",
        carreras: [
            "Ingeniería Aeronáutica",
            "Ingeniería en Sistemas Energéticos"
        ],
        address: "Av. Ticomán 600, San José Ticomán, Gustavo A. Madero, 07340 Ciudad de México",
        coordinates: {lat: 19.511944, lng: -99.129722},
        infraestructura: [
            "Túneles de viento",
            "Simuladores de vuelo",
            "Laboratorios de sistemas aeroespaciales",
            "Centro de investigación aeronáutica"
        ],
        imagen: "../imagenes/ESIME_TICOMAN.jpeg"
    },
    ESIA_TICOMAN: {
        name: "ESIA Escuela Superior de Ingeniería y Arquitectura - Ticomán",
        institution: "Instituto Politécnico Nacional",
        type: "Universidad Pública",
        contacto: {
            telefono: "+52 55 5729 6000, Extensión 56090",
            email: "direccion_esiatic@ipn.mx",
            sitioWeb: "https://www.esiatic.ipn.mx"
        },
        descripcion: "ESIA Ticomán se enfoca en la formación de profesionales en ciencias de la tierra, especializada en geociencias, petróleo y geofísica, con énfasis en la exploración y aprovechamiento de recursos naturales.",
        carreras: [
            "Ingeniería Petrolera",
            "Ingeniería Geológica",
            "Ingeniería Geofísica"
        ],
        address: "Av. Ticomán 600, San José Ticomán, Gustavo A. Madero, 07340 Ciudad de México",
        coordinates: {lat: 19.511944, lng: -99.129722},
        infraestructura: [
            "Laboratorios de geología y geofísica",
            "Centro de simulación petrolera",
            "Laboratorios de yacimientos petrolíferos",
            "Biblioteca especializada en ciencias de la tierra"
        ],
        imagen: "../imagenes/ESIA_TICOMAN.jpeg"
    },
    ESIA_TECAMACHALCO: {
        name: "ESIA Escuela Superior de Ingeniería y Arquitectura - Tecamachalco",
        institution: "Instituto Politécnico Nacional",
        type: "Universidad Pública",
        contacto: {
            telefono: "+52 55 5729 6000, Extensión 68000",
            email: "direccion_esiatec@ipn.mx",
            sitioWeb: "https://www.esiatec.ipn.mx"
        },
        descripcion: "ESIA Tecamachalco es una institución de referencia en la formación de arquitectos e ingenieros arquitectos, con énfasis en diseño sustentable, urbanismo, preservación del patrimonio y tecnologías para la edificación.",
        carreras: [
            "Ingeniero Arquitecto",
            "Arquitectura"
        ],
        address: "Av. Fuente de Los Leones 28, Lomas de Tecamachalco, 53950 Naucalpan de Juárez, Estado de México",
        coordinates: {lat: 19.403889, lng: -99.248056},
        infraestructura: [
            "Talleres de diseño arquitectónico",
            "Laboratorios de materiales y construcción",
            "Centro de modelado tridimensional",
            "Biblioteca especializada en arquitectura"
        ],
        imagen: "../imagenes/ESIA_TECAMACHALCO.jpeg"
    },
    UPIIG_GUANAJUATO: {
        name: "UPIIG Unidad Profesional Interdisciplinaria de Ingeniería Campus Guanajuato",
        institution: "Instituto Politécnico Nacional",
        type: "Universidad Pública",
        contacto: {
            telefono: "+52 462 626 9700",
            email: "upiig@ipn.mx",
            sitioWeb: "https://www.upiig.ipn.mx"
        },
        descripcion: "La UPIIG forma profesionales en ingeniería con enfoque interdisciplinario, especializados en áreas estratégicas para el desarrollo industrial y tecnológico de la región Bajío de México.",
        carreras: [
            "Ingeniería Aeronáutica",
            "Ingeniería en Sistemas Automotrices",
            "Ingeniería en Biotecnología",
            "Ingeniería Farmacéutica"
        ],
        address: "Av. Mineral de Valenciana 200, Fracc. Industrial Puerto Interior, Silao de la Victoria, 36275 Guanajuato",
        coordinates: {lat: 21.014463, lng: -101.257468},
        infraestructura: [
            "Laboratorios de biotecnología",
            "Centro de innovación aeronáutica",
            "Laboratorios de sistemas automotrices",
            "Plantas piloto farmacéuticas"
        ],
        imagen: "../imagenes/UPIIG_GUANAJUATO.jpeg"
    },
    UPIBI: {
        name: "UPIBI Unidad Profesional Interdisciplinaria de Biotecnología",
        institution: "Instituto Politécnico Nacional",
        type: "Universidad Pública",
        contacto: {
            telefono: "+52 55 5729 6000, Extensión 56305",
            email: "upibi@ipn.mx",
            sitioWeb: "https://www.upibi.ipn.mx"
        },
        descripcion: "La UPIBI es una institución líder en la formación de profesionales en biotecnología, alimentos, ambiental y farmacéutica, con un enfoque multidisciplinario que integra ciencias biológicas e ingeniería.",
        carreras: [
            "Ingeniería Biotecnológica",
            "Ingeniería en Alimentos",
            "Ingeniería Ambiental",
            "Ingeniería Farmacéutica",
            "Ingeniería Biomédica"
        ],
        address: "Av. Acueducto s/n, Barrio La Laguna Ticomán, Gustavo A. Madero, 07340 Ciudad de México",
        coordinates: {lat: 19.511389, lng: -99.129444},
        infraestructura: [
            "Laboratorios de biotecnología",
            "Plantas piloto de bioprocesos",
            "Laboratorios de análisis ambiental",
            "Centro de investigación biomédica"
        ],
        imagen: "../imagenes/UPIBI.jpeg"
    },
    
    UPIIZ_ZACATECAS: {
        name: "UPIIZ Zacatecas",
        institution: "Instituto Politécnico Nacional",
        type: "Unidad Académica",
        contacto: {
            telefono: "+52 492 924 7790",
            email: "directorzacatecas@ipn.mx",
            sitioWeb: "https://www.upiiz.ipn.mx"
        },
        descripcion: "Unidad Académica del Instituto Politécnico Nacional ubicada en Zacatecas, especializada en formación tecnológica y científica para estudiantes de la región.",
        carreras: [
            "Ingeniería Industrial",
            "Ingeniería en Sistemas Computacionales",
            "Ingeniería Mecatrónica",
            "Ingeniería Informática"
        ],
        address: "Carretera Zacatecas - Fresnillo km 12.5, Ejido La Escondida, 98310 Zacatecas, Zac.",
        coordinates: {lat: 22.9676, lng: -102.7169},
        infraestructura: [
            "Laboratorios de ingeniería",
            "Centro de cómputo",
            "Biblioteca",
            "Talleres especializados"
        ],
        imagen: "../imagenes/UPIIZ_ZACATECAS.jpeg"
    },
    UPIIP_PALENQUE: {
        name: "UPIIP Palenque",
        institution: "Instituto Politécnico Nacional",
        type: "Unidad Académica",
        contacto: {
            telefono: "+52 919 345 0440",
            email: "direccion_upiip@ipn.mx",
            sitioWeb: "https://www.upiip.ipn.mx"
        },
        descripcion: "Unidad Académica del Instituto Politécnico Nacional ubicada en Palenque, Chiapas, enfocada en la formación de profesionales en áreas tecnológicas.",
        carreras: [
            "Ingeniería en Gestión Empresarial",
            "Ingeniería Industrial",
            "Ingeniería en Sistemas Computacionales"
        ],
        address: "Carretera Palenque-Catazajá km 2, Ejido Palenque, 29960 Palenque, Chiapas",
        coordinates: {lat: 17.5174, lng: -91.9652},
        infraestructura: [
            "Laboratorios de cómputo",
            "Áreas de investigación",
            "Biblioteca especializada",
            "Espacios de vinculación empresarial"
        ],
        imagen: "../imagenes/UPIIP_PALENQUE.jpeg"
    },
    UPIIC_COAHUILA: {
        name: "UPIIC Coahuila",
        institution: "Instituto Politécnico Nacional",
        type: "Unidad Académica",
        contacto: {
            telefono: "+52 844 438 9600",
            email: "direccion_upiic@ipn.mx",
            sitioWeb: "https://www.upiic.ipn.mx"
        },
        descripcion: "Unidad Académica del Instituto Politécnico Nacional en Coahuila, dedicada a la formación de profesionales en áreas tecnológicas e industriales.",
        carreras: [
            "Ingeniería Industrial",
            "Ingeniería en Sistemas Computacionales",
            "Ingeniería Mecatrónica",
            "Ingeniería Química"
        ],
        address: "Carretera 57, Km 4.5, Unidad Universitaria, 25350 Ramos Arizpe, Coahuila",
        coordinates: {lat: 25.5482, lng: -100.9762},
        infraestructura: [
            "Laboratorios de alta tecnología",
            "Centro de investigación",
            "Biblioteca digital",
            "Talleres de manufactura"
        ],
        imagen: "../imagenes/UPIIC_COAHUILA.jpeg"
    },
    UPIIT_TLAXCALA: {
        name: "UPIIT Tlaxcala",
        institution: "Instituto Politécnico Nacional",
        type: "Unidad Académica",
        contacto: {
            telefono: "+52 246 465 3550",
            email: "direccion_upiit@ipn.mx",
            sitioWeb: "https://www.upiit.ipn.mx"
        },
        descripcion: "Unidad Académica del Instituto Politécnico Nacional ubicada en Tlaxcala, orientada a la formación de profesionales en tecnología e innovación.",
        carreras: [
            "Ingeniería Informática",
            "Ingeniería en Sistemas Computacionales",
            "Ingeniería Mecatrónica",
            "Ingeniería Industrial"
        ],
        address: "Avenida Tecnológico s/n, Santa María Ixtulco, 90100 Tlaxcala, Tlax.",
        coordinates: {lat: 19.3438, lng: -98.2163},
        infraestructura: [
            "Laboratorios de cómputo",
            "Centro de innovación tecnológica",
            "Biblioteca moderna",
            "Espacios de investigación"
        ],
        imagen: "../imagenes/UPIIT_TLAXCALA.jpeg"
    },
    UPIEM: {
        name: "UPIEM",
        institution: "Instituto Politécnico Nacional",
        type: "Unidad Académica",
        contacto: {
            telefono: "+52 55 5729 6000, Extensión 73802",
            email: "upiem@ipn.mx",
            sitioWeb: "https://www.upiem.ipn.mx"
        },
        descripcion: "Unidad Profesional Interdisciplinaria de Ingeniería y Ciencias Sociales y Administrativas, dedicada a la formación integral de profesionales.",
        carreras: [
            "Ingeniería Industrial",
            "Ingeniería en Informática",
            "Ingeniería en Administración",
            "Ingeniería Financiera"
        ],
        address: "Avenida Té 950, Granjas México, 08400 Ciudad de México, CDMX",
        coordinates: {lat: 19.3643, lng: -99.0817},
        infraestructura: [
            "Laboratorios de cómputo",
            "Aulas multimedia",
            "Biblioteca digital",
            "Centro de investigación interdisciplinaria"
        ],
        imagen: "../imagenes/UPIEM.jpeg"
    },
    UPIIH_HIDALGO: {
        name: "UPIIH Hidalgo",
        institution: "Instituto Politécnico Nacional",
        type: "Unidad Académica",
        contacto: {
            telefono: "+52 771 717 2000",
            email: "direccion_upiih@ipn.mx",
            sitioWeb: "https://www.upiih.ipn.mx"
        },
        descripcion: "Unidad Académica del Instituto Politécnico Nacional ubicada en Hidalgo, enfocada en la formación de profesionales en diversas áreas tecnológicas.",
        carreras: [
            "Ingeniería Industrial",
            "Ingeniería en Sistemas Computacionales",
            "Ingeniería Mecatrónica",
            "Ingeniería Química"
        ],
        address: "Kilometro 2.5 Carretera Pachuca-Tecozautla, El Venero, 42080 Pachuca de Soto, Hidalgo",
        coordinates: {lat: 20.1223, lng: -98.7389},
        infraestructura: [
            "Laboratorios de alta tecnología",
            "Centro de investigación",
            "Biblioteca especializada",
            "Aulas equipadas con tecnología moderna"
        ],
    
                                        imagen: "../imagenes/UPIIH_HIDALGO.jpeg"
    },
    
    CICS_MILPA_ALTA: {
        name: "CICS Milpa Alta",
        institution: "Instituto Politécnico Nacional",
        type: "Centro Interdisciplinario de Ciencias de la Salud",
        contacto: {
            telefono: "+52 55 5729 6300",
            email: "direccion_cics_milpaalta@ipn.mx",
            sitioWeb: "https://www.cics.ipn.mx"
        },
        descripcion: "Centro Interdisciplinario de Ciencias de la Salud, Unidad Milpa Alta, dedicado a la formación de profesionales en áreas de salud y ciencias biomédicas.",
        carreras: [
            "Médico Cirujano",
            "Enfermería",
            "Nutrición",
            "Optometría"
        ],
        address: "Av. Prolongación de Carpio 475, Colonia Plutarco Elías Calles, 11340 Ciudad de México, CDMX",
        coordinates: {lat: 19.3812, lng: -99.0733},
        infraestructura: [
            "Laboratorios de ciencias de la salud",
            "Clínicas de práctica",
            "Biblioteca especializada",
            "Aulas de simulación médica"
        ],
        imagen: "../imagenes/CICS_MILPA_ALTA.jpeg"
    },
    ESEO: {
        name: "ESEO",
        institution: "Instituto Politécnico Nacional",
        type: "Escuela Superior de Enfermería y Obstetricia",
        contacto: {
            telefono: "+52 55 5729 6000, Extensión 63800",
            email: "direccion_eseo@ipn.mx",
            sitioWeb: "https://www.eseo.ipn.mx"
        },
        descripcion: "Escuela Superior de Enfermería y Obstetricia, especializada en la formación de profesionales de la salud con un enfoque integral y humanista.",
        carreras: [
            "Enfermería",
            "Obstetricia",
            "Enfermería Gerontológica",
            "Cuidados de Enfermería Especializada"
        ],
        address: "Prolongación de Carpio 475, Colonia Plutarco Elías Calles, 11340 Ciudad de México, CDMX",
        coordinates: {lat: 19.4326, lng: -99.1332},
        infraestructura: [
            "Laboratorios de simulación clínica",
            "Centro de investigación en salud",
            "Biblioteca especializada",
            "Aulas multimedia"
        ],
        imagen: "../imagenes/ESEO.jpeg"
    },
    CICS_SANTO_TOMAS: {
        name: "CICS Santo Tomás",
        institution: "Instituto Politécnico Nacional",
        type: "Centro Interdisciplinario de Ciencias de la Salud",
        contacto: {
            telefono: "+52 55 5729 6000, Extensión 62800",
            email: "direccion_cics_santotomas@ipn.mx",
            sitioWeb: "https://www.cics.ipn.mx"
        },
        descripcion: "Centro Interdisciplinario de Ciencias de la Salud, Unidad Santo Tomás, formando profesionales de la salud con alta capacidad científica y humanística.",
        carreras: [
            "Médico Cirujano",
            "Optometría",
            "Nutrición",
            "Trabajo Social"
        ],
        address: "Prolongación de Carpio 475, Colonia Plutarco Elías Calles, 11340 Ciudad de México, CDMX",
        coordinates: {lat: 19.4421, lng: -99.1418},
        infraestructura: [
            "Laboratorios de ciencias biomédicas",
            "Clínicas de práctica",
            "Biblioteca digital",
            "Centros de investigación"
        ],
        imagen: "../imagenes/CICS_SANTO_TOMAS.jpeg"
    },
    ENMyH: {
        name: "ENMyH",
        institution: "Instituto Politécnico Nacional",
        type: "Escuela Nacional de Medicina y Homeopatía",
        contacto: {
            telefono: "+52 55 5729 6000, Extensión 55000",
            email: "direccion_enmyh@ipn.mx",
            sitioWeb: "https://www.enmyh.ipn.mx"
        },
        descripcion: "Escuela Nacional de Medicina y Homeopatía, pionera en la formación de médicos con enfoque integral y alternativos.",
        carreras: [
            "Médico Cirujano Homeópata",
            "Médico Cirujano",
            "Maestría en Ciencias de la Salud",
            "Especialidades Médicas"
        ],
        address: "Plan de San Luis y Díaz Mirón s/n, Colonia Santo Tomás, 11340 Ciudad de México, CDMX",
        coordinates: {lat: 19.4501, lng: -99.1404},
        infraestructura: [
            "Hospitales de práctica",
            "Laboratorios de investigación",
            "Biblioteca especializada",
            "Centros de simulación médica"
        ],
        imagen: "../imagenes/ENMyH.jpeg"
    },
    ENBA: {
        name: "ENBA",
        institution: "Instituto Politécnico Nacional",
        type: "Escuela Nacional de Biblioteconomía y Archivonomía",
        contacto: {
            telefono: "+52 55 5729 6000, Extensión 64500",
            email: "direccion_enba@ipn.mx",
            sitioWeb: "https://www.enba.ipn.mx"
        },
        descripcion: "Escuela Nacional de Biblioteconomía y Archivonomía, formando profesionales especializados en gestión de información y documentación.",
        carreras: [
            "Licenciatura en Biblioteconomía",
            "Licenciatura en Archivonomía",
            "Maestría en Gestión de la Información Documental",
            "Diplomados Especializados"
        ],
        address: "Manuel Guerrero 97, Colonia Obrera, 06800 Ciudad de México, CDMX",
        coordinates: {lat: 19.4254, lng: -99.1460},
        infraestructura: [
            "Biblioteca especializada",
            "Laboratorios de gestión documental",
            "Aulas multimedia",
            "Centro de investigación bibliográfica"
        ],
        imagen: "../imagenes/ENBA.jpeg"
    },
    EST: {
        name: "EST",
        institution: "Instituto Politécnico Nacional",
        type: "Escuela Superior de Turismo",
        contacto: {
            telefono: "+52 55 5729 6000, Extensión 64300",
            email: "direccion_est@ipn.mx",
            sitioWeb: "https://www.est.ipn.mx"
        },
        descripcion: "Escuela Superior de Turismo, formando profesionales líderes en la industria turística con visión innovadora y sostenible.",
        carreras: [
            "Turismo",
            "Gestión de Servicios Turísticos",
            "Desarrollo de Productos Turísticos",
            "Turismo Alternativo"
        ],
        address: "Av. Wilfrido Massieu s/n, Unidad Profesional Adolfo López Mateos, 07738 Ciudad de México, CDMX",
        coordinates: {lat: 19.5034, lng: -99.1461},
        infraestructura: [
            "Laboratorios de simulación turística",
            "Biblioteca especializada",
            "Aulas multimedia",
            "Centro de investigación turística"
        ],
        imagen: "../imagenes/EST.jpeg"
    },
    FACULTAD_INGENIERIA: {
        name: "Facultad de Ingeniería",
        institution: "Universidad Nacional Autónoma de México",
        type: "Facultad",
        contacto: {
            telefono: "+52 55 5622 0700",
            email: "contacto@ingenieria.unam.mx",
            sitioWeb: "https://www.ingenieria.unam.mx"
        },
        descripcion: "La Facultad de Ingeniería de la UNAM, líder en formación de ingenieros con una visión innovadora, científica y socialmente responsable.",
        carreras: [
            "Ingeniería Civil",
            "Ingeniería Mecánica",
            "Ingeniería Eléctrica",
            "Ingeniería Computacional",
            "Ingeniería Mecatrónica",
            "Ingeniería Geológica"
        ],
        address: "Ciudad Universitaria, 04510 Ciudad de México, CDMX",
        coordinates: {lat: 19.3285, lng: -99.1830},
        infraestructura: [
            "Laboratorios de alta tecnología",
            "Centro de investigación",
            "Biblioteca central",
            "Talleres especializados",
            "Aulas de cómputo avanzadas"
        ],
        imagen: "../imagenes/FACULTAD_INGENIERIA.jpeg"
    },
    FACULTAD_QUIMICA: {
        name: "Facultad de Química",
        institution: "Universidad Nacional Autónoma de México",
        type: "Facultad",
        contacto: {
            telefono: "+52 55 5622 3700",
            email: "contacto@quimica.unam.mx",
            sitioWeb: "https://www.quimica.unam.mx"
        },
        descripcion: "La Facultad de Química de la UNAM, reconocida por su excelencia académica y contribuciones científicas en el campo de la química.",
        carreras: [
            "Química",
            "Química Farmacéutica",
            "Química de Alimentos",
            "Ingeniería Química",
            "Química Industrial"
        ],
        address: "Ciudad Universitaria, 04510 Ciudad de México, CDMX",
        coordinates: {lat: 19.3254, lng: -99.1843},
        infraestructura: [
            "Laboratorios de investigación",
            "Centros especializados",
            "Biblioteca química",
            "Instalaciones de alta tecnología",
            "Laboratorios de química experimental"
        ],
        imagen: "../imagenes/FACULTAD_QUIMICA.jpeg"
    },
    FACULTAD_MEDICINA: {
        name: "Facultad de Medicina",
        institution: "Universidad Nacional Autónoma de México",
        type: "Facultad",
        contacto: {
            telefono: "+52 55 5623 2100",
            email: "contacto@medicina.unam.mx",
            sitioWeb: "https://www.medicina.unam.mx"
        },
        descripcion: "La Facultad de Medicina de la UNAM, líder en formación médica, investigación y atención médica de vanguardia.",
        carreras: [
            "Médico Cirujano",
            "Cirujano Dentista",
            "Investigación Biomédica",
            "Maestría en Ciencias Médicas",
            "Doctorado en Medicina"
        ],
        address: "Ciudad Universitaria, 04510 Ciudad de México, CDMX",
        coordinates: {lat: 19.3295, lng: -99.1812},
        infraestructura: [
            "Hospitales universitarios",
            "Laboratorios de investigación",
            "Biblioteca médica",
            "Centros de simulación clínica",
            "Aulas de alta tecnología"
        ],
        imagen: "../imagenes/FACULTAD_MEDICINA.jpeg"
    },
    
    FACULTAD_CIENCIAS: {
        name: "Facultad de Ciencias",
        institution: "Universidad Nacional Autónoma de México",
        type: "Facultad",
        contacto: {
            telefono: "+52 55 5622 4855",
            email: "contacto@ciencias.unam.mx",
            sitioWeb: "https://www.fciencias.unam.mx"
        },
        descripcion: "La Facultad de Ciencias de la UNAM, reconocida por su excelencia académica en investigación científica y formación de profesionales en diversas disciplinas científicas.",
        carreras: [
            "Biología",
            "Matemáticas",
            "Física",
            "Computación",
            "Actuaría",
            "Ciencias de la Tierra"
        ],
        address: "Ciudad Universitaria, Circuito Exterior s/n, Coyoacán, 04510 Ciudad de México, CDMX",
        coordinates: {lat: 19.3249, lng: -99.1766},
        infraestructura: [
            "Laboratorios de investigación especializados",
            "Observatorio astronómico",
            "Biblioteca científica",
            "Centros de cómputo avanzado",
            "Invernaderos y espacios de investigación"
        ],
        imagen: "../imagenes/FACULTAD_CIENCIAS.jpeg"
    },
    FACULTAD_DERECHO: {
        name: "Facultad de Derecho",
        institution: "Universidad Nacional Autónoma de México",
        type: "Facultad",
        contacto: {
            telefono: "+52 55 5622 2140",
            email: "contacto@derecho.unam.mx",
            sitioWeb: "https://www.derecho.unam.mx"
        },
        descripcion: "La Facultad de Derecho de la UNAM, líder en la formación de profesionales del derecho con un enfoque crítico y comprometido con la justicia social.",
        carreras: [
            "Licenciatura en Derecho",
            "Maestría en Derecho",
            "Doctorado en Derecho",
            "Especialidades Jurídicas"
        ],
        address: "Ciudad Universitaria, Circuito Interior s/n, Coyoacán, 04510 Ciudad de México, CDMX",
        coordinates: {lat: 19.3302, lng: -99.1832},
        infraestructura: [
            "Tribunales simulados",
            "Biblioteca jurídica especializada",
            "Aulas multimedia",
            "Centros de investigación jurídica",
            "Salas de conferencias"
        ],
        imagen: "../imagenes/FACULTAD_DERECHO.jpeg"
    },
    FACULTAD_FILOSOFIA_LETRAS: {
        name: "Facultad de Filosofía y Letras",
        institution: "Universidad Nacional Autónoma de México",
        type: "Facultad",
        contacto: {
            telefono: "+52 55 5622 1886",
            email: "contacto@filosofia.unam.mx",
            sitioWeb: "https://www.filosofia.unam.mx"
        },
        descripcion: "La Facultad de Filosofía y Letras, centro de pensamiento crítico y creatividad, formando intelectuales comprometidos con el análisis cultural y humanístico.",
        carreras: [
            "Filosofía",
            "Historia",
            "Letras Hispánicas",
            "Letras Clásicas",
            "Estudios Latinoamericanos",
            "Literatura Dramática y Teatro"
        ],
        address: "Ciudad Universitaria, Circuito Interior s/n, Coyoacán, 04510 Ciudad de México, CDMX",
        coordinates: {lat: 19.3285, lng: -99.1842},
        infraestructura: [
            "Biblioteca histórica",
            "Salas de lectura",
            "Auditorios culturales",
            "Centros de investigación humanística",
            "Espacios para publicaciones académicas"
        ],
        imagen: "../imagenes/FACULTAD_FILOSOFIA_LETRAS.jpeg"
    },
    FACULTAD_ECONOMIA: {
        name: "Facultad de Economía",
        institution: "Universidad Nacional Autónoma de México",
        type: "Facultad",
        contacto: {
            telefono: "+52 55 5622 2182",
            email: "contacto@economia.unam.mx",
            sitioWeb: "https://www.economia.unam.mx"
        },
        descripcion: "La Facultad de Economía, formando profesionales con una visión crítica y comprometida con el desarrollo económico y social de México.",
        carreras: [
            "Economía",
            "Maestría en Economía",
            "Doctorado en Economía",
            "Especialidades en Economía Aplicada"
        ],
        address: "Ciudad Universitaria, Circuito Interior s/n, Coyoacán, 04510 Ciudad de México, CDMX",
        coordinates: {lat: 19.3276, lng: -99.1810},
        infraestructura: [
            "Laboratorios de análisis económico",
            "Biblioteca especializada",
            "Centros de investigación económica",
            "Aulas multimedia",
            "Salas de simulación económica"
        ],
        imagen: "../imagenes/FACULTAD_ECONOMIA.jpeg"
    },
    FACULTAD_CONTADURIA_ADMINISTRACION: {
        name: "Facultad de Contaduría y Administración",
        institution: "Universidad Nacional Autónoma de México",
        type: "Facultad",
        contacto: {
            telefono: "+52 55 5622 4350",
            email: "contacto@fca.unam.mx",
            sitioWeb: "https://www.fca.unam.mx"
        },
        descripcion: "La Facultad de Contaduría y Administración, formando líderes empresariales con un enfoque ético y estratégico.",
        carreras: [
            "Contaduría",
            "Administración",
            "Informática",
            "Maestría en Administración",
            "Doctorado en Ciencias de la Administración"
        ],
        address: "Ciudad Universitaria, Circuito Interior s/n, Coyoacán, 04510 Ciudad de México, CDMX",
        coordinates: {lat: 19.3290, lng: -99.1820},
        infraestructura: [
            "Laboratorios de gestión empresarial",
            "Centro de emprendimiento",
            "Biblioteca especializada",
            "Aulas de simulación empresarial",
            "Centros de investigación"
        ],
        imagen: "../imagenes/FACULTAD_CONTADURIA_ADMINISTRACION.jpeg"
    },
    FACULTAD_ARQUITECTURA: {
        name: "Facultad de Arquitectura",
        institution: "Universidad Nacional Autónoma de México",
        type: "Facultad",
        contacto: {
            telefono: "+52 55 5622 4332",
            email: "contacto@arquitectura.unam.mx",
            sitioWeb: "https://www.arquitectura.unam.mx"
        },
        descripcion: "La Facultad de Arquitectura, formando profesionales creativos e innovadores en diseño, urbanismo y conservación del patrimonio.",
        carreras: [
            "Arquitectura",
            "Urbanismo",
            "Diseño Industrial",
            "Maestría en Arquitectura",
            "Doctorado en Arquitectura"
        ],
        address: "Ciudad Universitaria, Circuito Interior s/n, Coyoacán, 04510 Ciudad de México, CDMX",
        coordinates: {lat: 19.3295, lng: -99.1840},
        infraestructura: [
            "Talleres de diseño",
            "Laboratorios de modelado",
            "Biblioteca especializada",
            "Galerías de exposición",
            "Estudios de diseño digital"
        ],
        imagen: "../imagenes/FACULTAD_ARQUITECTURA.jpeg"
    },
    FACULTAD_PSICOLOGIA: {
        name: "Facultad de Psicología",
        institution: "Universidad Nacional Autónoma de México",
        type: "Facultad",
        contacto: {
            telefono: "+52 55 5622 2272",
            email: "contacto@psicologia.unam.mx",
            sitioWeb: "https://www.psicologia.unam.mx"
        },
        descripcion: "La Facultad de Psicología, formando profesionales comprometidos con el bienestar mental y el desarrollo humano.",
        carreras: [
            "Psicología",
            "Maestría en Psicología",
            "Doctorado en Psicología",
            "Especialidades Clínicas",
            "Psicología Educativa"
        ],
        address: "Ciudad Universitaria, Circuito Interior s/n, Coyoacán, 04510 Ciudad de México, CDMX",
        coordinates: {lat: 19.3288, lng: -99.1805},
        infraestructura: [
            "Clínicas de atención psicológica",
            "Laboratorios de investigación",
            "Biblioteca especializada",
            "Centros de evaluación psicológica",
            "Aulas de simulación clínica"
        ],
        imagen: "../imagenes/FACULTAD_PSICOLOGIA.jpeg"
    },
    FACULTAD_ODONTOLOGIA: {
        name: "Facultad de Odontología",
        institution: "Universidad Nacional Autónoma de México",
        type: "Facultad",
        contacto: {
            telefono: "+52 55 5622 2060",
            email: "contacto@odontologia.unam.mx",
            sitioWeb: "https://www.odontologia.unam.mx"
        },
        descripcion: "La Facultad de Odontología, formando profesionales de la salud bucal con un enfoque integral y humanista.",
        carreras: [
            "Cirujano Dentista",
            "Maestría en Odontología",
            "Especialidades Odontológicas",
            "Doctorado en Odontología"
        ],
        address: "Ciudad Universitaria, Circuito Interior s/n, Coyoacán, 04510 Ciudad de México, CDMX",
        coordinates: {lat: 19.3298, lng: -99.1815},
        infraestructura: [
            "Clínicas dentales",
            "Laboratorios de práctica",
            "Biblioteca especializada",
            "Centros de investigación odontológica",
            "Aulas de simulación clínica"
        ],
        imagen: "../imagenes/FACULTAD_ODONTOLOGIA.jpeg"
    },
    FACULTAD_VETERINARIA_ZOOTECNIA: {
        name: "Facultad de Medicina Veterinaria y Zootecnia",
        institution: "Universidad Nacional Autónoma de México",
        type: "Facultad",
        contacto: {
            telefono: "+52 55 5622 5929",
            email: "contacto@fmvz.unam.mx",
            sitioWeb: "https://www.fmvz.unam.mx"
        },
        descripcion: "La Facultad de Medicina Veterinaria y Zootecnia, formando profesionales líderes en el cuidado animal, salud pública y producción pecuaria.",
        carreras: [
            "Médico Veterinario Zootecnista",
            "Maestría en Ciencias Veterinarias",
            "Doctorado en Ciencias Veterinarias",
            "Especialidades Veterinarias"
        ],
        address: "Ciudad Universitaria, Circuito Interior s/n, Coyoacán, 04510 Ciudad de México, CDMX",
        coordinates: {lat: 19.3305, lng: -99.1825},
        infraestructura: [
            "Hospitales veterinarios",
            "Granjas experimentales",
            "Laboratorios de investigación",
            "Biblioteca especializada",
            "Clínicas de atención animal"
        ],
        imagen: "../imagenes/FACULTAD_VETERINARIA_ZOOTECNIA.jpeg"
    },
    FACULTAD_CIENCIAS_POLITICAS_SOCIALES: {
        name: "Facultad de Ciencias Políticas y Sociales",
        institution: "Universidad Nacional Autónoma de México",
        type: "Facultad",
        contacto: {
            telefono: "+52 55 5622 4209",
            email: "contacto@politicas.unam.mx",
            sitioWeb: "https://www.politicas.unam.mx"
        },
        descripcion: "La Facultad de Ciencias Políticas y Sociales, formando profesionales comprometidos con el análisis social y político de México y el mundo.",
        carreras: [
            "Ciencia Política",
            "Relaciones Internacionales",
            "Comunicación",
            "Sociología",
            "Maestría en Ciencias Políticas",
            "Doctorado en Ciencias Políticas"
        ],
        address: "Ciudad Universitaria, Circuito Mario de la Cueva s/n, Coyoacán, 04510 Ciudad de México, CDMX",
        coordinates: {lat: 19.3280, lng: -99.1850},
        infraestructura: [
            "Laboratorios de investigación social",
            "Estudios de comunicación",
            "Biblioteca especializada",
            "Aulas multimedia",
            "Centros de análisis político"
        ],
        imagen: "../imagenes/FACULTAD_CIENCIAS_POLITICAS_SOCIALES.jpeg"
    },
    FACULTAD_ARTES_DISEÑO: {
        name: "Facultad de Artes y Diseño",
        institution: "Universidad Nacional Autónoma de México",
        type: "Facultad",
        contacto: {
            telefono: "+52 55 5622 6865",
            email: "contacto@artes.unam.mx",
            sitioWeb: "https://www.artes.unam.mx"
        },
        descripcion: "La Facultad de Artes y Diseño, formando creativos innovadores con un compromiso social y artístico.",
        carreras: [
            "Artes Visuales",
            "Diseño Gráfico",
            "Diseño Industrial",
            "Maestría en Artes",
            "Doctorado en Artes"
        ],
        address: "Ciudad Universitaria, Circuito Exterior s/n, Coyoacán, 04510 Ciudad de México, CDMX",
        coordinates: {lat: 19.3260, lng: -99.1775},
        infraestructura: [
            "Talleres de arte",
            "Estudios de diseño",
            "Galerías de exposición",
            "Laboratorios digitales",
            "Biblioteca especializada"
        ],
        imagen: "../imagenes/FACULTAD_ARTE_DISEÑO.jpeg"
                                    },
                                    
    FACULTAD_MUSICA: {
        name: "Facultad de Música",
        institution: "Universidad Nacional Autónoma de México",
        type: "Facultad",
        contacto: {
            telefono: "+52 55 5622 6855",
            email: "contacto@musica.unam.mx",
            sitioWeb: "https://www.musica.unam.mx"
        },
        descripcion: "La Facultad de Música de la UNAM, centro de excelencia en formación musical, investigación y creación artística, con un compromiso histórico con la cultura musical mexicana e internacional.",
        carreras: [
            "Instrumentista",
            "Canto",
            "Composición",
            "Dirección Orquestal",
            "Musicología",
            "Educación Musical"
        ],
        address: "Insurgentes Sur 3000, Ciudad Universitaria, 04510 Ciudad de México, CDMX",
        coordinates: {lat: 19.3265, lng: -99.1860},
        infraestructura: [
            "Auditorios especializados",
            "Estudios de grabación",
            "Biblioteca musical",
            "Salas de práctica individual",
            "Espacios de concierto"
        ],
        imagen: "../imagenes/FACULTAD_MUSICA.jpeg"
    },
    FES_ACATLAN: {
        name: "FES Acatlán",
        institution: "Universidad Nacional Autónoma de México",
        type: "Facultad de Estudios Superiores",
        contacto: {
            telefono: "+52 55 5623 1500",
            email: "contacto@acatlan.unam.mx",
            sitioWeb: "https://www.acatlan.unam.mx"
        },
        descripcion: "Facultad de Estudios Superiores Acatlán, campus multidisciplinario que ofrece una formación integral con programas académicos de alta calidad en diversas áreas del conocimiento.",
        carreras: [
            "Derecho",
            "Economía",
            "Administración",
            "Contaduría",
            "Relaciones Internacionales",
            "Informática",
            "Matemáticas Aplicadas"
        ],
        address: "Avenida Alcantarilla s/n, Santa Cruz Acatlán, 53150 Naucalpan de Juárez, Estado de México",
        coordinates: {lat: 19.4729, lng: -99.2351},
        infraestructura: [
            "Bibliotecas especializadas",
            "Laboratorios de cómputo",
            "Centros de investigación",
            "Aulas multimedia",
            "Espacios deportivos"
        ],
        imagen: "../imagenes/FES_ACATLAN.jpeg"
    },
    FES_ARAGON: {
        name: "FES Aragón",
        institution: "Universidad Nacional Autónoma de México",
        type: "Facultad de Estudios Superiores",
        contacto: {
            telefono: "+52 55 5623 0600",
            email: "contacto@aragon.unam.mx",
            sitioWeb: "https://www.aragon.unam.mx"
        },
        descripcion: "Facultad de Estudios Superiores Aragón, campus comprometido con la formación de profesionales altamente capacitados en diversas disciplinas con un enfoque innovador y social.",
        carreras: [
            "Ingeniería Civil",
            "Ingeniería Mecánica",
            "Ingeniería Eléctrica",
            "Arquitectura",
            "Diseño Industrial",
            "Planificación para el Desarrollo"
        ],
        address: "Avenida Rancho Seco s/n, Valle de Aragón 3ra Sección, 57500 Nezahualcóyotl, Estado de México",
        coordinates: {lat: 19.4095, lng: -98.9614},
        infraestructura: [
            "Talleres especializados",
            "Laboratorios de ingeniería",
            "Biblioteca técnica",
            "Centros de investigación",
            "Aulas de diseño"
        ],
        imagen: "../imagenes/FES_ARAGON.jpeg"
    },
    FES_CUAUTITLAN: {
        name: "FES Cuautitlán",
        institution: "Universidad Nacional Autónoma de México",
        type: "Facultad de Estudios Superiores",
        contacto: {
            telefono: "+52 55 5623 2200",
            email: "contacto@cuautitlan.unam.mx",
            sitioWeb: "https://www.cuautitlan.unam.mx"
        },
        descripcion: "Facultad de Estudios Superiores Cuautitlán, campus multidisciplinario con programas académicos de vanguardia en ciencias agropecuarias, químicas e industriales.",
        carreras: [
            "Ingeniería Agrícola",
            "Ingeniería Química",
            "Química Farmacéutico Biológica",
            "Medicina Veterinaria y Zootecnia",
            "Ingeniería en Alimentos"
        ],
        address: "Campo 1, Av. 1ro de Mayo s/n, Santa María las Torres, 54700 Cuautitlán Izcalli, Estado de México",
        coordinates: {lat: 19.6794, lng: -99.2102},
        infraestructura: [
            "Laboratorios especializados",
            "Granjas experimentales",
            "Biblioteca científica",
            "Centros de investigación",
            "Clínicas veterinarias"
        ],
        imagen: "../imagenes/FES_CUAUTITLAN.jpeg"
    },
    FES_ZARAGOZA: {
        name: "FES Zaragoza",
        institution: "Universidad Nacional Autónoma de México",
        type: "Facultad de Estudios Superiores",
        contacto: {
            telefono: "+52 55 5623 0600",
            email: "contacto@zaragoza.unam.mx",
            sitioWeb: "https://www.zaragoza.unam.mx"
        },
        descripcion: "Facultad de Estudios Superiores Zaragoza, enfocada en la formación de profesionales de la salud con un compromiso social y científico.",
        carreras: [
            "Médico Cirujano",
            "Cirujano Dentista",
            "Psicología",
            "Biología",
            "Enfermería"
        ],
        address: "Batalla 5 de Mayo s/n, Ejército de Oriente, 09230 Ciudad de México, CDMX",
        coordinates: {lat: 19.3974, lng: -99.0540},
        infraestructura: [
            "Clínicas de atención médica",
            "Laboratorios de investigación",
            "Biblioteca especializada",
            "Centros de simulación clínica",
            "Espacios de práctica profesional"
        ],
        imagen: "../imagenes/FES_ZARAGOZA.jpeg"
    },
    FES_IZTACALA: {
        name: "FES Iztacala",
        institution: "Universidad Nacional Autónoma de México",
        type: "Facultad de Estudios Superiores",
        contacto: {
            telefono: "+52 55 5623 1200",
            email: "contacto@iztacala.unam.mx",
            sitioWeb: "https://www.iztacala.unam.mx"
        },
        descripcion: "Facultad de Estudios Superiores Iztacala, campus líder en ciencias de la salud con un enfoque interdisciplinario e innovador.",
        carreras: [
            "Médico Cirujano",
            "Cirujano Dentista",
            "Psicología",
            "Optometría",
            "Enfermería",
            "Biología"
        ],
        address: "Av. de los Barrios 1, Los Reyes Ixtacala, 54090 Tlalnepantla de Baz, Estado de México",
        coordinates: {lat: 19.5324, lng: -99.2102},
        infraestructura: [
            "Hospitales de práctica",
            "Laboratorios de investigación",
            "Biblioteca científica",
            "Clínicas especializadas",
            "Centros de simulación médica"
        ],
        imagen: "../imagenes/FES_IZTACALA.jpeg"
    },

    TRABAJO_SOCIAL: {
        name: "Escuela Nacional de Trabajo Social",
        institution: "Universidad Nacional Autónoma de México",
        type: "Escuela Nacional",
        contacto: {
            telefono: "+52 55 5622 3500",
            email: "contacto@ents.unam.mx",
            sitioWeb: "https://www.ents.unam.mx"
        },
        descripcion: "Formadora de profesionales del Trabajo Social comprometidos con el desarrollo social, la justicia y el bienestar de las comunidades, con un enfoque crítico e interdisciplinario.",
        carreras: [
            "Trabajo Social",
            "Maestría en Trabajo Social",
            "Especialización en Intervención Social",
            "Doctorado en Trabajo Social"
        ],
        address: "Ciudad Universitaria, Circuito Mario de la Cueva s/n, 04510 Ciudad de México, CDMX",
        coordinates: {lat: 19.3280, lng: -99.1850},
        infraestructura: [
            "Aulas de intervención social",
            "Laboratorios de investigación",
            "Biblioteca especializada",
            "Centros de práctica comunitaria",
            "Espacios de vinculación social"
        ],
        imagen: "../imagenes/TRABAJO_SOCIAL.jpeg"
    },
    ENFERMERIA_OBSTETRICIA: {
        name: "Escuela Nacional de Enfermería y Obstetricia",
        institution: "Universidad Nacional Autónoma de México",
        type: "Escuela Nacional",
        contacto: {
            telefono: "+52 55 5622 2801",
            email: "contacto@eneo.unam.mx",
            sitioWeb: "https://www.eneo.unam.mx"
        },
        descripcion: "Institución líder en la formación de profesionales de enfermería con un enfoque humanista, científico y de vanguardia en el cuidado de la salud.",
        carreras: [
            "Enfermería",
            "Obstetricia",
            "Maestría en Enfermería",
            "Doctorado en Enfermería",
            "Especialidades en Enfermería"
        ],
        address: "Ciudad Universitaria, Circuito Interior s/n, 04510 Ciudad de México, CDMX",
        coordinates: {lat: 19.3295, lng: -99.1815},
        infraestructura: [
            "Simuladores clínicos",
            "Laboratorios de práctica",
            "Biblioteca especializada",
            "Clínicas de atención",
            "Centros de investigación en salud"
        ],
        imagen: "../imagenes/ENFERMERIA_OBSTETRICIA.jpeg"
    },
    ENES_LEON: {
        name: "ENES Unidad León, Gto",
        institution: "Universidad Nacional Autónoma de México",
        type: "Escuela Nacional de Estudios Superiores",
        contacto: {
            telefono: "+52 477 773 8600",
            email: "contacto@enes.leon.unam.mx",
            sitioWeb: "https://www.enes.leon.unam.mx"
        },
        descripcion: "Campus multidisciplinario enfocado en la formación de profesionales comprometidos con el desarrollo sostenible y la innovación regional.",
        carreras: [
            "Ingeniería Biomédica",
            "Ingeniería en Sistemas Biomédicos",
            "Desarrollo Territorial",
            "Fisioterapia",
            "Nutrición"
        ],
        address: "Blvd. UNAM 2011, Predio El Saucillo, 37680 León, Guanajuato",
        coordinates: {lat: 21.1438, lng: -101.6885},
        infraestructura: [
            "Laboratorios de investigación",
            "Clínicas de práctica",
            "Biblioteca moderna",
            "Espacios interdisciplinarios",
            "Centros de innovación"
        ],
        imagen: "../imagenes/ENES_LEON.jpeg"
    },
    ENES_MORELIA: {
        name: "ENES Unidad Morelia, Mich",
        institution: "Universidad Nacional Autónoma de México",
        type: "Escuela Nacional de Estudios Superiores",
        contacto: {
            telefono: "+52 443 322 3500",
            email: "contacto@enes.morelia.unam.mx",
            sitioWeb: "https://www.enes.morelia.unam.mx"
        },
        descripcion: "Campus dedicado a la formación interdisciplinaria con énfasis en estudios regionales, sostenibilidad y desarrollo científico.",
        carreras: [
            "Estudios Latinoamericanos",
            "Ciencias Ambientales",
            "Geofísica",
            "Literatura Intercultural",
            "Ciencias de la Tierra"
        ],
        address: "Antiguo Camino a Vista Bella 8, Col. Exhacienda de Vista Bella, 58190 Morelia, Michoacán",
        coordinates: {lat: 19.6702, lng: -101.2096},
        infraestructura: [
            "Laboratorios especializados",
            "Bibliotecas interdisciplinarias",
            "Espacios de investigación",
            "Centros de estudios regionales",
            "Áreas de trabajo colaborativo"
        ],
        imagen: "../imagenes/ENES_MORELIA.jpeg"
    },
    ENES_JURIQUILLA: {
        name: "ENES Juriquilla, Qro",
        institution: "Universidad Nacional Autónoma de México",
        type: "Escuela Nacional de Estudios Superiores",
        contacto: {
            telefono: "+52 442 211 7800",
            email: "contacto@enes.juriquilla.unam.mx",
            sitioWeb: "https://www.enes.juriquilla.unam.mx"
        },
        descripcion: "Campus enfocado en la formación de profesionales en ciencias e ingeniería con un enfoque de innovación y desarrollo tecnológico.",
        carreras: [
            "Ingeniería en Nanotecnología",
            "Matemáticas Aplicadas",
            "Ciencias Genómicas",
            "Tecnología",
            "Ciencias Computacionales"
        ],
        address: "Anillo Vial II, Km 21.5, El Marqués, 76246 Querétaro, Qro.",
        coordinates: {lat: 20.6668, lng: -100.4422},
        infraestructura: [
            "Laboratorios de alta tecnología",
            "Centros de investigación",
            "Biblioteca especializada",
            "Espacios de innovación",
            "Laboratorios interdisciplinarios"
        ],
        imagen: "../imagenes/ENES_JURIQUILLA.jpeg"
    },
    ENES_YUCATAN: {
        name: "ENES Unidad Mérida, Yuc",
        institution: "Universidad Nacional Autónoma de México",
        type: "Escuela Nacional de Estudios Superiores",
        contacto: {
            telefono: "+52 999 942 3200",
            email: "contacto@enes.merida.unam.mx",
            sitioWeb: "https://www.enes.merida.unam.mx"
        },
        descripcion: "Campus dedicado a la formación de profesionales con énfasis en el desarrollo sostenible, la preservación cultural y la innovación regional.",
        carreras: [
            "Desarrollo Sustentable",
            "Ciencias de la Tierra",
            "Matemáticas Aplicadas",
            "Estudios Mesoamericanos",
            "Gestión Cultural"
        ],
        address: "Carretera Mérida-Tetiz Km 4.5, Mérida, 97302 Yucatán",
        coordinates: {lat: 20.9675, lng: -89.6248},
        infraestructura: [
            "Laboratorios especializados",
            "Centros de investigación regional",
            "Biblioteca interdisciplinaria",
            "Espacios de preservación cultural",
            "Áreas de desarrollo sostenible"
        ],
        imagen: "../imagenes/ENES_YUCATAN.jpeg"
    },
    INST_BIOTECNOLOGIA: {
        name: "Instituto de Biotecnología",
        institution: "Universidad Nacional Autónoma de México",
        type: "Instituto de Investigación",
        contacto: {
            telefono: "+52 777 329 1700",
            email: "contacto@ibt.unam.mx",
            sitioWeb: "https://www.ibt.unam.mx"
        },
        descripcion: "Centro de excelencia en investigación biotecnológica, dedicado al desarrollo científico de vanguardia y la formación de investigadores de alto nivel.",
        carreras: [
            "Posgrado en Ciencias Biomédicas",
            "Maestría en Biotecnología",
            "Doctorado en Biotecnología",
            "Investigación Científica"
        ],
        address: "Universidad Nacional Autónoma de México, Campus Cuernavaca, 62210 Cuernavaca, Morelos",
        coordinates: {lat: 18.9508, lng: -99.2279},
        infraestructura: [
            "Laboratorios de investigación de alta tecnología",
            "Centros de investigación genómica",
            "Biblioteca especializada",
            "Espacios de desarrollo científico",
            "Laboratorios de biotecnología avanzada"
        ],
        imagen: "../imagenes/INST_BIOTECNOLOGIA.jpeg"
    },
    LENGUAS_TRADUCCION: {
        name: "Escuela Nacional de Lenguas, Lingüística y Traducción",
        institution: "Universidad Nacional Autónoma de México",
        type: "Escuela Nacional",
        contacto: {
            telefono: "+52 55 5622 1908",
            email: "contacto@enallt.unam.mx",
            sitioWeb: "https://www.enallt.unam.mx"
        },
        descripcion: "Centro de excelencia en enseñanza de lenguas, lingüística y traducción, formando profesionales multilingües con competencias interculturales.",
        carreras: [
            "Lenguas y Literaturas Modernas",
            "Traducción",
            "Lingüística Aplicada",
            "Maestría en Traducción",
            "Doctorado en Lingüística"
        ],
        address: "Ciudad Universitaria, Circuito Interior s/n, 04510 Ciudad de México, CDMX",
        coordinates: {lat: 19.3285, lng: -99.1842},
        infraestructura: [
            "Laboratorios de idiomas",
            "Bibliotecas multilingües",
            "Centros de traducción",
            "Aulas multimedia",
            "Espacios de práctica intercultural"
        ],
        imagen: "../imagenes/LENGUAS_TRADUCCION.jpeg"
    },
    UAM_AZCAPOTZALCO: {
        name: "UAM Azcapotzalco",
        institution: "Universidad Autónoma Metropolitana",
        type: "Unidad Académica",
        contacto: {
            telefono: "+52 55 5318 9000",
            email: "contacto@azc.uam.mx",
            sitioWeb: "https://www.azc.uam.mx"
        },
        descripcion: "Unidad académica de la Universidad Autónoma Metropolitana que ofrece una formación integral en diversas disciplinas, con un enfoque innovador y comprometido con el desarrollo social.",
        carreras: [
            "Ingeniería Industrial",
            "Arquitectura",
            "Diseño",
            "Ciencias Básicas",
            "Ingeniería Electrónica",
            "Administración"
        ],
        address: "Av. San Pablo 180, Azcapotzalco, 02200 Ciudad de México, CDMX",
        coordinates: {lat: 19.4839, lng: -99.1830},
        infraestructura: [
            "Laboratorios especializados",
            "Talleres de diseño",
            "Biblioteca moderna",
            "Centros de investigación",
            "Espacios de innovación tecnológica"
        ],
        imagen: "../imagenes/UAM_AZCAPOTZALCO.jpeg"
    },
    
    UAM_IZTAPALAPA: {
        name: "UAM Iztapalapa",
        institution: "Universidad Autónoma Metropolitana",
        type: "Unidad Académica",
        contacto: {
            telefono: "+52 55 5804 4700",
            email: "contacto@iztapalapa.uam.mx",
            sitioWeb: "https://www.iztapalapa.uam.mx"
        },
        descripcion: "Unidad académica de la UAM reconocida por su excelencia en investigación científica, con un enfoque interdisciplinario y compromiso social.",
        carreras: [
            "Biología",
            "Química",
            "Física",
            "Matemáticas",
            "Computación",
            "Ingeniería Ambiental",
            "Hidrobiología"
        ],
        address: "San Rafael Atlixco 186, Col. Vicentina, 09340 Ciudad de México, CDMX",
        coordinates: {lat: 19.3883, lng: -99.1181},
        infraestructura: [
            "Laboratorios de investigación especializados",
            "Invernaderos",
            "Biblioteca científica",
            "Centros de investigación interdisciplinaria",
            "Espacios de experimentación"
        ],
        imagen: "../imagenes/UAM_IZTAPALAPA.jpeg"
    },
    UAM_XOCHIMILCO: {
        name: "UAM Xochimilco",
        institution: "Universidad Autónoma Metropolitana",
        type: "Unidad Académica",
        contacto: {
            telefono: "+52 55 5483 7000",
            email: "contacto@xochimilco.uam.mx",
            sitioWeb: "https://www.xochimilco.uam.mx"
        },
        descripcion: "Unidad académica con un modelo educativo innovador, enfocada en la formación integral y el desarrollo social con un enfoque interdisciplinario.",
        carreras: [
            "Medicina",
            "Veterinaria",
            "Psicología",
            "Trabajo Social",
            "Enfermería",
            "Nutrición",
            "Producción Agrícola"
        ],
        address: "Calzada del Hueso 1100, Col. Villa Quietud, 04960 Ciudad de México, CDMX",
        coordinates: {lat: 19.3189, lng: -99.1030},
        infraestructura: [
            "Clínicas de atención comunitaria",
            "Granjas experimentales",
            "Laboratorios especializados",
            "Biblioteca interdisciplinaria",
            "Espacios de práctica profesional"
        ],
        imagen: "../imagenes/UAM_XOCHIMILCO.jpeg"
    },
    UAM_LERMA: {
        name: "UAM Lerma",
        institution: "Universidad Autónoma Metropolitana",
        type: "Unidad Académica",
        contacto: {
            telefono: "+52 728 282 4700",
            email: "contacto@lerma.uam.mx",
            sitioWeb: "https://www.lerma.uam.mx"
        },
        descripcion: "Campus enfocado en la innovación tecnológica y el desarrollo científico, con un modelo educativo orientado a la investigación y el emprendimiento.",
        carreras: [
            "Ingeniería en Computación",
            "Matemáticas Aplicadas",
            "Procesos Industriales",
            "Tecnologías y Sistemas de Información",
            "Ciencias Ambientales"
        ],
        address: "Av. de las Garzas 10, Col. El Panteón, 52005 Lerma de Villada, Estado de México",
        coordinates: {lat: 19.2873, lng: -99.5086},
        infraestructura: [
            "Laboratorios de alta tecnología",
            "Centros de innovación",
            "Biblioteca digital",
            "Espacios de emprendimiento",
            "Laboratorios interdisciplinarios"
        ],
        imagen: "../imagenes/UAM_LERMA.jpeg"
    },
    UAM_CUAJIMALPA: {
        name: "UAM Cuajimalpa",
        institution: "Universidad Autónoma Metropolitana",
        type: "Unidad Académica",
        contacto: {
            telefono: "+52 55 5814 6500",
            email: "contacto@cuajimalpa.uam.mx",
            sitioWeb: "https://www.cuajimalpa.uam.mx"
        },
        descripcion: "Unidad académica con un modelo educativo innovador, centrado en la interdisciplinariedad y el desarrollo de soluciones creativas para problemas contemporáneos.",
        carreras: [
            "Diseño",
            "Computación",
            "Matemáticas Aplicadas",
            "Estudios Humanísticos",
            "Ciencias de la Comunicación",
            "Gestión de Tecnologías"
        ],
        address: "Av. Vasco de Quiroga 4871, Col. Santa Fe Piro Progresista, 05348 Ciudad de México, CDMX",
        coordinates: {lat: 19.3541, lng: -99.2708},
        infraestructura: [
            "Laboratorios de diseño",
            "Centros de investigación tecnológica",
            "Biblioteca multimedia",
            "Espacios de colaboración interdisciplinaria",
            "Estudios de innovación"
        ],
        imagen: "../imagenes/UAM_CUAJIMALPA.jpeg"
    }
};
                                function hideSidebar() {
                                    const sidebar = document.getElementById('detailsSidebar');
                                    sidebar.classList.add('hidden');
                                }

                                function showSchoolDetails(schoolId) {
                                    const school = schoolsData[schoolId];
                                    if (!school)
                                        return;
                                    const sidebar = document.getElementById('detailsSidebar');
                                    const title = document.getElementById('detailsTitle');
                                    const generalInfo = document.getElementById('generalInfo');
                                    const locationInfo = document.getElementById('locationInfo');
                                    const schoolImage = document.getElementById('schoolImage');
                                    sidebar.classList.add('hidden');
                                    setTimeout(() => {
                                        title.textContent = school.name;
                                        generalInfo.innerHTML = `
            <p><strong>Institución:</strong> ${school.institution}</p>
            <p><strong>Tipo:</strong> ${school.type}</p>
            <p><strong>Teléfono:</strong> ${school.contacto.telefono}</p>
            <p><strong>Email:</strong> ${school.contacto.email}</p>
            <p><strong>Sitio Web:</strong> <a href="${school.contacto.sitioWeb}" target="_blank">${school.contacto.sitioWeb}</a></p>
            <p class="mt-3"><strong>Descripción:</strong></p>
            <p>${school.descripcion}</p>
            <p class="mt-3"><strong>Carreras:</strong></p>
<ul class="details-list">
    <c:forEach items="${school.carreras}" var="carrera">
        <li>${carrera}</li>
    </c:forEach>
</ul>
        `;
                                        schoolImage.src = school.imagen;
                                        schoolImage.alt = school.name;
                                        locationInfo.innerHTML = `
            <p><strong>Dirección:</strong> ${school.address}</p>
            <p><strong>Coordenadas:</strong> ${school.coordinates.lat}, ${school.coordinates.lng}</p>
            <div class="mt-3">
                <strong>Infraestructura:</strong>
<ul class="details-list">
    <c:forEach items="${school.infraestructura}" var="item">
        <li>${item}</li>
    </c:forEach>
</ul>
            </div>
        `;
                                        sidebar.classList.remove('hidden');
                                    }, 300);
                                }


                                const closeBtn = document.getElementById('closeSidebar');
                                if (closeBtn) {
                                    closeBtn.addEventListener('click', hideSidebar);
                                }

                                const schoolItems = document.querySelectorAll('.school-item');
                                schoolItems.forEach(item => {
                                    item.addEventListener('click', () => {
                                        const schoolId = item.getAttribute('data-school');
                                        showSchoolDetails(schoolId);
                                    });
                                });
                                var map = new maplibregl.Map({
                                    container: 'map',
                                    style: 'https://api.maptiler.com/maps/basic-v2/style.json?key=aqfBtw7FHLNM8yx5GhkF',
                                    center: [-99.1332, 19.4326],
                                    zoom: 12
                                });
                                map.addControl(new maplibregl.NavigationControl());
                                function cargarMapa(lat, lng, nombre, detalles) {
                                    const offset = window.innerWidth > 768 ? 0.005 : 0;
                                    map.setCenter([lng + offset, lat]);
                                    map.setZoom(15);
                                    if (window.currentMarker) {
                                        window.currentMarker.remove();
                                    }

                                    window.currentMarker = new maplibregl.Marker({color: "red"})
                                            .setLngLat([lng, lat])
                                            .addTo(map);
                                }



                                function toggleList(listId) {
                                    var list = document.getElementById(listId);
                                    list.style.display = list.style.display === 'none' || list.style.display === '' ? 'block' : 'none';
                                }

                                function toggleSearch() {
                                    toggleList('cecyt-list');
                                }

                                function toggleSpecialties() {
                                    toggleList('specialty-list');
                                }

                                function toggleInstituciones() {
                                    toggleList('instituciones-list');
                                }

                                function toggleTipo() {
                                    toggleList('tipo-list');
                                }

                                function toggleIPN() {
                                    toggleList('ipn-cecyt-list');
                                }

                                function togglefisico() {
                                    toggleList('fisicolist');
                                }

                                function togglebiologicas() {
                                    toggleList('biologicaslist');
                                }

                                function togglesociales() {
                                    toggleList('socialeslist');
                                }

                                function toggleUNAM() {
                                    toggleList('unam-list');
                                }

                                function toggleUAM() {
                                    toggleList('uam-list');
                                }

                                const geocoder = new MapboxGeocoder({
                                    accessToken: mapboxgl.accessToken,
                                    mapboxgl: map
                                });
                                map.addControl(geocoder);
                                const especialidades = [

                                ];
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
            const specialtyToggle = document.querySelector('.specialty-toggle');
                    const specialtyList = document.querySelector('.specialty-list');
                    const active = document.querySelector('.active');
                    const arrow = specialtyToggle.querySelector('.arrow');
        </script>
        <script>
                    document.addEventListener('DOMContentLoaded', function() {
                    const searchInput = document.getElementById('searchInput');
                            const searchResults = document.getElementById('searchResults');
                            const sidebar = document.getElementById('detailsSidebar');
                            const closeBtn = document.getElementById('closeSidebar');
                            function hideSidebar() {
                            sidebar.classList.add('hidden');
                            }

                    function showSchoolDetails(school) {
                    const title = document.getElementById('detailsTitle');
                            const generalInfo = document.getElementById('generalInfo');
                            const locationInfo = document.getElementById('locationInfo');
                            const schoolImage = document.getElementById('schoolImage');
                            sidebar.classList.add('hidden');
                            setTimeout(() => {
                            title.textContent = school.name || 'Nombre no disponible';
                                    // Construir el HTML usando concatenación tradicional
                                    var generalInfoHTML = '';
                                    if (school.institution) {
                            generalInfoHTML += '<p><strong>Institución:</strong> ' + school.institution + '</p>';
                            }
                            if (school.type) {
                            generalInfoHTML += '<p><strong>Tipo:</strong> ' + school.type + '</p>';
                            }
                            if (school.contacto) {
                            if (school.contacto.telefono) {
                            generalInfoHTML += '<p><strong>Teléfono:</strong> ' + school.contacto.telefono + '</p>';
                            }
                            if (school.contacto.email) {
                            generalInfoHTML += '<p><strong>Email:</strong> ' + school.contacto.email + '</p>';
                            }
                            if (school.contacto.sitioWeb) {
                            generalInfoHTML += '<p><strong>Sitio Web:</strong> <a href="' + school.contacto.sitioWeb + '" target="_blank">' + school.contacto.sitioWeb + '</a></p>';
                            }
                            }
                            if (school.descripcion) {
                            generalInfoHTML += '<p class="mt-3"><strong>Descripción:</strong></p>';
                                    generalInfoHTML += '<p>' + school.descripcion + '</p>';
                            }

                            // Manejar carreras
                            if (school.carreras && school.carreras.length > 0) {
                            generalInfoHTML += '<p class="mt-3"><strong>Carreras:</strong></p><ul class="details-list">';
                                    for (let i = 0; i < school.carreras.length; i++) {
                            generalInfoHTML += '<li>' + school.carreras[i] + '</li>';
                            }
                            generalInfoHTML += '</ul>';
                            }

                            generalInfo.innerHTML = generalInfoHTML;
                                    // Manejar imagen
                                    if (school.imagen) {
                            schoolImage.src = school.imagen;
                                    schoolImage.alt = school.name;
                                    schoolImage.style.display = 'block';
                            } else {
                            schoolImage.style.display = 'none';
                            }

                            // Manejar ubicación
                            var locationInfoHTML = '';
                                    if (school.address) {
                            locationInfoHTML += '<p><strong>Dirección:</strong> ' + school.address + '</p>';
                            }
                            if (school.coordinates && school.coordinates.lat && school.coordinates.lng) {
                            locationInfoHTML += '<p><strong>Coordenadas:</strong> ' + school.coordinates.lat + ', ' + school.coordinates.lng + '</p>';
                            }
                            if (school.infraestructura && school.infraestructura.length > 0) {
                            locationInfoHTML += '<div class="mt-3"><strong>Infraestructura:</strong><ul class="details-list">';
                                    for (let i = 0; i < school.infraestructura.length; i++) {
                            locationInfoHTML += '<li>' + school.infraestructura[i] + '</li>';
                            }
                            locationInfoHTML += '</ul></div>';
                            }
                            locationInfo.innerHTML = locationInfoHTML;
                                    sidebar.classList.remove('hidden');
                            }, 300);
                    }

                    // El resto del código se mantiene igual...
                    searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase().trim();
                            if (searchTerm === '') {
                    searchResults.style.display = 'none';
                            return;
                    }

                    const filteredEscuelas = Object.entries(schoolsData).filter(([key, school]) => {
                    return (
                            (school.name && school.name.toLowerCase().includes(searchTerm)) ||
                            (school.institution && school.institution.toLowerCase().includes(searchTerm)) ||
                            (school.type && school.type.toLowerCase().includes(searchTerm)) ||
                            (school.carreras && school.carreras.some(carrera =>
                                    carrera.toLowerCase().includes(searchTerm)
                                    )) ||
                            (school.descripcion && school.descripcion.toLowerCase().includes(searchTerm))
                            );
                    });
                            searchResults.innerHTML = '';
                            filteredEscuelas.forEach(([key, school]) => {
                            const div = document.createElement('div');
                                    div.textContent = school.name || 'Escuela sin nombre';
                                    div.className = 'search-result-item';
                                    div.style.cursor = 'pointer';
                                    div.onclick = () => {
                            if (school.coordinates) {
                            cargarMapa(
                                    school.coordinates.lat,
                                    school.coordinates.lng,
                                    school.name,
                            {
                            description: school.descripcion || '',
                                    contact: school.contacto || {},
                                    careers: school.carreras || []
                            }
                            );
                            }
                            showSchoolDetails(school);
                                    searchResults.style.display = 'none';
                                    searchInput.value = school.name;
                            };
                                    searchResults.appendChild(div);
                            });
                            searchResults.style.display = filteredEscuelas.length > 0 ? 'block' : 'none';
                    });
                            document.addEventListener('click', function(e) {
                            if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
                            searchResults.style.display = 'none';
                            }
                            });
                            if (closeBtn) {
                    closeBtn.addEventListener('click', hideSidebar);
                    }

                    const schoolItems = document.querySelectorAll('.school-item');
                            schoolItems.forEach(item => {
                            item.addEventListener('click', () => {
                            const schoolId = item.getAttribute('data-school');
                                    const school = schoolsData[schoolId];
                                    if (school) {
                            showSchoolDetails(school);
                            }
                            });
                            });
                            });
        </script>
  
    </body>
</html>

