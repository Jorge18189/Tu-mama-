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
                                            email: "direccion_esime@ipn.mx",
                                            sitioWeb: "https://www.esimez.ipn.mx"
                                        },
                                        descripcion: "La ESIME Zacatenco es una institución dedicada a la formación de ingenieros en áreas como mecánica, eléctrica, comunicaciones, sistemas automotrices y fotónica, promoviendo innovación en ingeniería aplicada.",
                                        carreras: [
                                            "Ingeniería Civil",
                                            "Ingeniería Eléctrica",
                                            "Ingeniería en Comunicaciones y Electrónica",
                                            "Ingeniería en Control y Automatización",
                                            "Ingeniería en Sistemas Automotrices",
                                            "Ingeniería Fotónica"
                                        ],
                                        address: "Unidad Profesional, Av. Luis Enrique Erro, Adolfo López Mateos S/N, Zacatenco, Gustavo A. Madero, 07700 Ciudad de México",
                                        coordinates: {lat: 19.5041, lng: -99.1464},
                                        infraestructura: [
                                            "Laboratorios de ingeniería eléctrica y mecánica",
                                            "Centro de Innovación Tecnológica",
                                            "Aulas con tecnología multimedia"
                                        ],
                                        imagen: "../imagenes/ESIME_ZACATENCO.jpeg"
                                    },
                                    ESIQUIE: {
                                        name: "ESIQIE Escuela Superior de Ingeniería Química e Industrias Extractivas",
                                        institution: "Instituto Politécnico Nacional",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46010",
                                            email: "direccion_esiqie@ipn.mx",
                                            sitioWeb: "https://www.esiqie.ipn.mx"
                                        },
                                        descripcion: "La ESIQIE es líder en ingeniería química, ofreciendo formación avanzada en procesos industriales y química petrolera con un enfoque en investigación e innovación.",
                                        carreras: [
                                            "Ingeniería Química Industrial",
                                            "Ingeniería Química Petrolera"
                                        ],
                                        address: "Av Instituto Politécnico Nacional, Lindavista, Gustavo A. Madero, 07700 Ciudad de México",
                                        coordinates: {lat: 19.504825, lng: -99.146518},
                                        infraestructura: [
                                            "Laboratorios de química avanzada",
                                            "Centro de investigación en ingeniería química",
                                            "Biblioteca especializada"
                                        ],
                                        imagen: "../imagenes/ESIQUIE.jpeg"
                                    },
                                    ESIA_ZACATENCO: {
                                        name: "ESIA Escuela Superior de Ingeniería y Arquitectura Zacatenco",
                                        institution: "Instituto Politécnico Nacional",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46020",
                                            email: "direccion_esiaz@ipn.mx",
                                            sitioWeb: "https://www.esiaz.ipn.mx"
                                        },
                                        descripcion: "La ESIA Zacatenco es una de las principales instituciones en México para la formación en arquitectura e ingeniería civil, enfocada en la sostenibilidad y el desarrollo urbano.",
                                        carreras: [
                                            "Ingeniería Civil",
                                            "Ingeniería Topográfica y Geodésica",
                                            "Arquitectura"
                                        ],
                                        address: "Av. Juan de Dios Bátiz S/N, Colonia Adolfo López Mateos, Gustavo A. Madero, 07738 Ciudad de México",
                                        coordinates: {lat: 19.505342, lng: -99.146768},
                                        infraestructura: [
                                            "Laboratorios de topografía y geodesia",
                                            "Talleres de arquitectura",
                                            "Biblioteca especializada"
                                        ],
                                        imagen: "../imagenes/ESIA_ZACATENCO.jpeg"
                                    },
                                    UPIICSA: {
                                        name: "UPIICSA Unidad Profesional Interdisciplinaria de Ingeniería y Ciencias Sociales y Administrativas",
                                        institution: "Instituto Politécnico Nacional",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46100",
                                            email: "direccion_upiicsa@ipn.mx",
                                            sitioWeb: "https://www.upiicsa.ipn.mx"
                                        },
                                        descripcion: "UPIICSA ofrece programas interdisciplinarios en ingeniería y administración, con un enfoque en resolver problemas en áreas técnicas y sociales.",
                                        carreras: [
                                            "Ingeniería en Informática",
                                            "Ingeniería Industrial",
                                            "Licenciatura en Ciencias de la Informática",
                                            "Licenciatura en Administración Industrial"
                                        ],
                                        address: "Av. Té 950, Granjas México, Iztacalco, 08400 Ciudad de México",
                                        coordinates: {lat: 19.395833, lng: -99.091667},
                                        infraestructura: [
                                            "Laboratorios de informática",
                                            "Salas de cómputo",
                                            "Biblioteca de ciencias administrativas"
                                        ],
                                        imagen: "../imagenes/UPIICSA.jpeg"
                                    },
                                    ESFM: {
                                        name: "ESFM Escuela Superior de Física y Matemáticas",
                                        institution: "Instituto Politécnico Nacional",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46030",
                                            email: "direccion_esfm@ipn.mx",
                                            sitioWeb: "https://www.esfm.ipn.mx"
                                        },
                                        descripcion: "La ESFM es reconocida por su excelencia académica en física y matemáticas, formando profesionistas e investigadores altamente capacitados en estas áreas.",
                                        carreras: [
                                            "Licenciatura en Física",
                                            "Licenciatura en Matemáticas",
                                            "Licenciatura en Matemáticas Aplicadas y Computación"
                                        ],
                                        address: "Avenida Instituto Politécnico Nacional s/n Edificio 9 Unidad Profesional “Adolfo López Mateos” Col. San Pedro Zacatenco, Gustavo A. Madero, 07700 Ciudad de México",
                                        coordinates: {lat: 19.504155, lng: -99.146765},
                                        infraestructura: [
                                            "Laboratorios de física avanzada",
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
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/ESCA_TEPEPAN.jpeg"
                                    },
                                    ESCA_SANTO_TOMAS: {
                                        name: "ESCA Escuela Superior de Comercio y Administración - Santo Tomás",
                                        institution: "Instituto Politécnico Nacional",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/ESCA_SANTO_TOMAS.jpeg"
                                    },
                                    ENCB_SANTO_TOMAS: {
                                        name: "ENCB Escuela Nacional de Ciencias Biológicas - Santo Tomás",
                                        institution: "Instituto Politécnico Nacional",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/ENCB_SANTO_TOMAS.jpeg"
                                    },
                                    ESE: {
                                        name: "ESE Escuela Superior de Enfermería",
                                        institution: "Instituto Politécnico Nacional",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/ESE.jpeg"
                                    },
                                    ESM: {
                                        name: "ESM Escuela Superior de Medicina",
                                        institution: "Instituto Politécnico Nacional",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/ESM.jpeg"
                                    },
                                    ESIT: {
                                        name: "ESIT Escuela Superior de Ingeniería Textil",
                                        institution: "Instituto Politécnico Nacional",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/ESIT.jpeg"
                                    },
                                    UPIITA: {
                                        name: "UPIITA Unidad Profesional Interdisciplinaria en Ingeniería y Tecnologías Avanzadas",
                                        institution: "Instituto Politécnico Nacional",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/UPIITA.jpg"
                                    },
                                    ESCOM: {
                                        name: "ESCOM Escuela Superior de Cómputo",
                                        institution: "Instituto Politécnico Nacional",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/escom.jpg"
                                    },
                                    ESIME_CULHUACAN: {
                                        name: "ESIME Escuela Superior de Ingeniería Mecánica y Eléctrica - Culhuacán",
                                        institution: "Escuela Superior de Ingeniería Mecánica y Eléctrica - Culhuacán",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "55-55-55-55-01",
                                            sitioWeb: "https://www.esimeculhuacan.ipn.mx"
                                        },
                                        descripcion: "Formación en ingeniería mecánica y eléctrica.",
                                        carreras: [
                                            "Ingeniería Eléctrica",
                                            "Ingeniería Mecánica",
                                            "Ingeniería Electrónica"
                                        ],
                                        address: "Av. Sta. Ana 1000, San Francisco Culhuacan, Culhuacan CTM V, Coyoacán, 04440 Ciudad de México, CDMX",
                                        coordinates: {lat: 19.361420, lng: -99.073226},
                                        infraestructura: [
                                            "Laboratorios especializados",
                                            "Biblioteca",
                                            "Áreas de estudio"
                                        ],
                                        imagen: "../imagenes/ESIME_CULHUACAN.jpeg"
                                    },
                                    ESIME_AZCAPOTZALCO: {
                                        name: "ESIME Escuela Superior de Ingeniería Mecánica y Eléctrica - Azcapotzalco",
                                        institution: "Escuela Superior de Ingeniería Mecánica y Eléctrica - Azcapotzalco",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "55-55-55-55-02",
                                            sitioWeb: "https://www.esimeazcapotzalco.ipn.mx"
                                        },
                                        descripcion: "Educación en ingeniería mecánica y eléctrica.",
                                        carreras: [
                                            "Ingeniería Eléctrica",
                                            "Ingeniería Mecánica",
                                            "Ingeniería Electrónica"
                                        ],
                                        address: "Av. de las Granjas 682, Santa Catarina, Azcapotzalco, 02550 Ciudad de México, CDMX",
                                        coordinates: {lat: 19.490278, lng: -99.186944},
                                        infraestructura: [
                                            "Salas de cómputo",
                                            "Laboratorios de ingeniería",
                                            "Áreas deportivas"
                                        ],
                                        imagen: "../imagenes/ESIME_AZCAPOTZALCO.jpeg"
                                    },
                                    ESIME_TICOMAN: {
                                        name: "ESIME Escuela Superior de Ingeniería Mecánica y Eléctrica - Ticomán",
                                        institution: "Escuela Superior de Ingeniería Mecánica y Eléctrica - Ticomán",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "55-55-55-55-03",
                                            sitioWeb: "https://www.esimeticoman.ipn.mx"
                                        },
                                        descripcion: "Carreras en ingeniería mecánica y eléctrica.",
                                        carreras: [
                                            "Ingeniería Eléctrica",
                                            "Ingeniería Mecánica",
                                            "Ingeniería Electrónica"
                                        ],
                                        address: "Calz. Ticomán 600, La Purísima Ticoman, Gustavo A. Madero, 07340 Ciudad de México, CDMX",
                                        coordinates: {lat: 19.511944, lng: -99.129722},
                                        infraestructura: [
                                            "Centro de investigación",
                                            "Laboratorios de prácticas",
                                            "Salas de estudio"
                                        ],
                                        imagen: "../imagenes/ESIME_TICOMAN.jpeg"
                                    },
                                    ESIA_TICOMAN: {
                                        name: "ESIA Escuela Superior de Ingeniería y Arquitectura - Ticomán",
                                        institution: "Escuela Superior de Ingeniería y Arquitectura - Ticomán",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "55-55-55-55-04",
                                            sitioWeb: "https://www.esia.ipn.mx"
                                        },
                                        descripcion: "Educación en ingeniería y arquitectura.",
                                        carreras: [
                                            "Ingeniería Civil",
                                            "Ingeniería Geofísica",
                                            "Arquitectura"
                                        ],
                                        address: "Calz. Ticomán 55, La Laguna Ticoman, Gustavo A. Madero, 07340 Ciudad de México, CDMX",
                                        coordinates: {lat: 19.511944, lng: -99.129722},
                                        infraestructura: [
                                            "Laboratorios de ingeniería",
                                            "Centro de simulación",
                                            "Salones de dibujo"
                                        ],
                                        imagen: "../imagenes/ESIA_TICOMAN.jpeg"
                                    },
                                    ESIA_TECAMACHALCO: {
                                        name: "ESIA Escuela Superior de Ingeniería y Arquitectura - Tecamachalco",
                                        institution: "Escuela Superior de Ingeniería y Arquitectura - Tecamachalco",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "55-55-55-55-05",
                                            sitioWeb: "https://www.esiatic.ipn.mx"
                                        },
                                        descripcion: "Formación en arquitectura e ingeniería.",
                                        carreras: [
                                            "Arquitectura",
                                            "Ingeniería Civil",
                                            "Ingeniería Topográfica"
                                        ],
                                        address: "Av. Fuente de Los Leones 28, Lomas de Tecamachalco, 53950 Naucalpan de Juárez, Méx.",
                                        coordinates: {lat: 19.403889, lng: -99.248056},
                                        infraestructura: [
                                            "Laboratorios de construcción",
                                            "Áreas de modelado",
                                            "Salas de computación avanzada"
                                        ],
                                        imagen: "../imagenes/ESIA_TECAMACHALCO.jpeg"
                                    },
                                    UPIIG_GUANAJUATO: {
                                        name: "UPIIG_GUANAJUATO",
                                        institution: "Instituto Politécnico Nacional",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/UPIIG_GUANAJUATO.jpeg"
                                    },
                                    UPIBI: {
                                        name: "UPIBI",
                                        institution: "Instituto Politécnico Nacional",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/UPIBI.jpeg"
                                    },
                                    UPIIZ_ZACATECAS: {
                                        name: "UPIIZ_ZACATECAS",
                                        institution: "Instituto Politécnico Nacional",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/UPIIZ_ZACATECAS.jpeg"
                                    },
                                    UPIIP_PALENQUE: {
                                        name: "UPIIP_PALENQUE",
                                        institution: "Instituto Politécnico Nacional",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/UPIIP_PALENQUE.jpeg"
                                    },
                                    UPIIC_COAHUILA: {
                                        name: "UPIIC_COAHUILA",
                                        institution: "Instituto Politécnico Nacional",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/UPIIC_COAHUILA.jpeg"
                                    },
                                    UPIIT_TLAXCALA: {
                                        name: "UPIIT_TLAXCALA",
                                        institution: "Instituto Politécnico Nacional",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/UPIIC_TLAXCALA.jpeg"
                                    },
                                    UPIEM: {
                                        name: "UPIEM",
                                        institution: "Instituto Politécnico Nacional",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/UPIEM.jpeg"
                                    },
                                    UPIIH_HIDALGO: {
                                        name: "UPIIH_HIDALGO",
                                        institution: "Instituto Politécnico Nacional",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/UPIIH_HIDALGO.jpeg"
                                    },
                                    CICS_MILPA_ALTA: {
                                        name: "CICS_MILPA_ALTA",
                                        institution: "Instituto Politécnico Nacional",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/CICS_MILPA_ALTA.jpeg"
                                    },
                                    ESEO: {
                                        name: "ESEO",
                                        institution: "Instituto Politécnico Nacional",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/ESEO.jpeg"
                                    },
                                    CICS_SANTO_TOMAS: {
                                        name: "CICS_SANTO_TOMAS",
                                        institution: "Instituto Politécnico Nacional",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/CICS_SANTO_TOMAS.jpeg"
                                    },
                                    ENMyH: {
                                        name: "ENMyH",
                                        institution: "Instituto Politécnico Nacional",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/ENMyH.jpeg"
                                    },
                                    ENBA: {
                                        name: "ENBA",
                                        institution: "Instituto Politécnico Nacional",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/ENBA.jpeg"
                                    },
                                    EST: {
                                        name: "EST",
                                        institution: "Instituto Politécnico Nacional",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/EST.jpeg"
                                    },
                                    FACULTAD_INGENIERIA: {
                                        name: "Facultad de Ingeniería",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/FACULTAD_INGENIERIA.jpeg"
                                    },
                                    FACULTAD_QUIMICA: {
                                        name: "Facultad de Química",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/FACULTAD_QUIMICA.jpeg"
                                    },
                                    FACULTAD_MEDICINA: {
                                        name: "Facultad de Medicina",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/FACULTAD_MEDICINA.jpeg"
                                    },
                                    FACULTAD_CIENCIAS: {
                                        name: "Facultad de Ciencias",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/FACULTAD_CIENCIAS.jpeg"
                                    },
                                    FACULTAD_DERECHO: {
                                        name: "Facultad de Derecho",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/FACULTAD_DERECHO.jpeg"
                                    },
                                    FACULTAD_FILOSOFIA_LETRAS: {
                                        name: "Facultad de Filosofía y Letras",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/FACULTAD_FILOSOFIA_LETRAS.jpeg"
                                    },
                                    FACULTAD_ECONOMIA: {
                                        name: "Facultad de Economía",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/FACULTAD_ECONOMIA.jpeg"
                                    },
                                    FACULTAD_CONTADURIA_ADMINISTRACION: {
                                        name: "Facultad de Contaduría y Administración",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/FACULTAD_CONTADURIA_ADMINISTRACION.jpeg"
                                    },
                                    FACULTAD_ARQUITECTURA: {
                                        name: "Facultad de Arquitectura",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/FACULTAD_ARQUITECTURA.jpeg"
                                    },
                                    FACULTAD_PSICOLOGIA: {
                                        name: "Facultad de Psicología",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/FACULTAD_PSICOLOGIA.jpeg"
                                    },
                                    FACULTAD_ODONTOLOGIA: {
                                        name: "Facultad de Odontología",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/FACULTAD_ODONTOLOGIA.jpeg"
                                    },
                                    FACULTAD_VETERINARIA_ZOOTECNIA: {
                                        name: "Facultad de Medicina Veterinaria y Zootecnia",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/FACULTAD_VETERINARIA_ZOOTECNIA.jpeg"
                                    },
                                    FACULTAD_CIENCIAS_POLITICAS_SOCIALES: {
                                        name: "Facultad de Ciencias Políticas y Sociales",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/FACULTAD_CIENCIAS_POLITICAS_SOCIALES.jpeg"
                                    },
                                    FACULTAD_ARTES_DISEÑO: {
                                        name: "Facultad de Artes y Diseño",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/FACULTAD_ARTE_DISEÑO.jpeg"
                                    },
                                    FACULTAD_MUSICA: {
                                        name: "Facultad de Música",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/FACULTAD_MUSICA.jpeg"
                                    },
                                    FES_ACATLAN: {
                                        name: "FES Acatlán",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/FES_ACATLAN.jpeg"
                                    },
                                    FES_ARAGON: {
                                        name: "FES Aragón",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/FES_ARAGON.jpeg"
                                    },
                                    FES_CUAUTITLAN: {
                                        name: "FES Cuautitlán",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/FES_CUAUTITLAN.jpeg"
                                    },
                                    FES_ZARAGOZA: {
                                        name: "FES Zaragoza",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/FES_ZARAGOZA.jpeg"
                                    },
                                    FES_IZTACALA: {
                                        name: "FES Iztacala",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/FES_IZTACALA.jpeg"
                                    },
                                    TRABAJO_SOCIAL: {
                                        name: "Escuela Nacional de Trabajo Social",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/TRABAJO_SOCIAL.jpeg"
                                    },
                                    ENFERMERIA_OBSTETRICIA: {
                                        name: "Escuela Nacional de Enfermería y Obstetricia",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/ENFERMERIA_OBSTETRICIA.jpeg"
                                    },
                                    ENES_LEON: {
                                        name: "ENES Unidad Leon, Gto",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/ENES_LEON.jpeg"
                                    },
                                    ENES_MORELIA: {
                                        name: "ENES Unidad Morelia, Mich",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/ENES_MORELIA.jpeg"
                                    },
                                    ENES_JURIQUILLA: {
                                        name: "ENES Juriquilla, Qro",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/ENES_JURIQUILLA.jpeg"
                                    },
                                    ENES_YUCATAN: {
                                        name: "ENES Unidad Merida, Yuc",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/ENES_YUCATAN.jpeg"
                                    },
                                    INST_BIOTECNOLOGIA: {
                                        name: "Instituto de Biotecnología",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/INST_BIOTECNOLOGIA.jpeg"
                                    },
                                    LENGUAS_TRADUCCION: {
                                        name: "Escuela Nacional de Lenguas Lingüística y Traducción",
                                        institution: "Universidad Nacional Autónoma de México",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/LENGUAS_TRADUCCION.jpeg"
                                    },
                                    UAM_AZCAPOTZALCO: {
                                        name: "UAM Azcapotzalco",
                                        institution: "Universidad Autónoma Metropolitana",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/UAM_AZCAPOTZALCO.jpeg"
                                    },
                                    UAM_IZTAPALAPA: {
                                        name: "UAM Iztapalapa",
                                        institution: "Universidad Autónoma Metropolitana",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/UAM_IZTAPALAPA.jpeg"
                                    },
                                    UAM_XOCHIMILCO: {
                                        name: "UAM Xochimilco",
                                        institution: "Universidad Autónoma Metropolitana",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/UAM_XOCHIMILCO.jpeg"
                                    },
                                    UAM_LERMA: {
                                        name: "UAM Lerma",
                                        institution: "Universidad Autónoma Metropolitana",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
                                        ],
                                        imagen: "../imagenes/UAM_LERMA.jpeg"
                                    },
                                    UAM_CUAJIMALPA: {
                                        name: "UAM Cuajimalpa",
                                        institution: "Universidad Autónoma Metropolitana",
                                        type: "Universidad Pública",
                                        contacto: {
                                            telefono: "+52 55 5729 6000, Extensión 46188",
                                            email: "direccion_escom@ipn.mx",
                                            sitioWeb: "https://www.escom.ipn.mx"
                                        },
                                        descripcion: "La Escuela Superior de Cómputo (ESCOM), fundada en 1993, es una institución líder en México dedicada a la formación de profesionistas en áreas como ingeniería de software, inteligencia artificial, ciencia de datos y redes de comunicación.",
                                        carreras: [
                                            "Ingeniería en Sistemas Computacionales",
                                            "Ingeniería en Inteligencia Artificial",
                                            "Licenciatura en Ciencia de Datos"
                                        ],
                                        address: "Avenida Juan de Dios Bátiz S/N, Colonia Lindavista, Ciudad de México",
                                        coordinates: {lat: 19.504, lng: -99.146},
                                        infraestructura: [
                                            "Laboratorios especializados en computación",
                                            "Laboratorios de inteligencia artificial y redes",
                                            "Biblioteca moderna",
                                            "Aulas multimedia"
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

