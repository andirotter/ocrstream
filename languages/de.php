<?php
#
# German Language File for the ResourceSpace plugin ocrstream
#
$lang['ocrstream_title'] = 'OCR Stream';
$lang['ocrstream_intro']= 'OCR Stream Plugin Konfiguration';
$lang['ocrstream_language_select'] = 'Standardsprache für Texterkennung <br> (nur installierte Sprachen werden angezeigt)';
$lang['tesseract_path_info'] = 'Pfad zu tesseract-ocr:';
$lang['ocr_single_resource'] = 'Texterkennung durchführen';
$lang['ocr_start'] = 'Starte OCR';
$lang['tesseract_path_input'] = '<p style="color:red"><b> Tesseract-ocr nicht gefunden, bitte geben Sie den Pfad an:</b></p>';
$lang['tesseract_old_version_info'] = 'Bitte aktualisieren Sie Tesseract mindestens auf Version 3.03 für die beste Performance und erweiterte Funktionalität.';
$lang['ocr_input_formats'] = 'Erlaubte Dateitypen:';
$lang['ocr_psm'] = 'Tesseract page segmentation mode';
$lang['ocr_ftype_1'] = 'Feld in welches der extrahierte Text geschrieben werden soll:';
$lang['ocr_min_density'] = 'Mindestauflösung des Bildes für Texterkennung (dpi/ppi)';
$lang['ocr_max_density'] = 'Maximalauflösung des Bildes für Texterkennung (dpi/ppi)';
$lang['ocr_max_density_help'] = 'Bilder mit einer höheren Auflösung durchlaufen einen Bearbeitungsprozess vor der Texterkennung.';
$lang["ocr_language_select"] = 'Sprache für Texterkennung';
$lang["ocr_parameter_select"] = 'Parameter 1';
$lang["ocr_error_1"] = 'Fehler: Keine gültige Resourcen ID!';
$lang["ocr_error_2"] = 'Fehler: Für den Dateityp dieser Resource ist Texterkennung nicht erlaubt.';
$lang["ocr_error_3"] = 'Fehler: Bildauflösung (dpi/ppi) zu niedrig für Texterkennung.';
$lang["ocr_error_4"] = 'Fehler: Falscher Resourcentyp. Nur für den Resourcentyp Dokument ist die Texterkennung erlaubt.';
$lang['im_processing_header'] = 'Bildbearbeitungseinstellungen';
$lang['im_processing_help'] = 'Bei einigen Resourcen muss ein zusätzlicher Bildbearbeitungsprozess durchgeführt werden, bevor die Texterkennung erfolgen kann. <br> Es wird eine temporäre Bilddatei erzeugt, die Originaldatei wird nicht verändert. <br> Die Einstellungen für den Prozess können hier angepasst werden.';
$lang['im_preset_density'] = 'Auflösung (-density [dpi])';
$lang['im_preset_density_help'] = "Legt die Auflösung des temporären Bildes fest, auf welches die Texterkennung angewendet wird. <br> Kleinere Werte können den Rechenprozess beschleunigen, führen aber zu schlechteren Ergebnissen.";
$lang['im_preset_geometry'] = 'Bildgröße (-geometry [px])';
$lang['im_preset_geometry_help'] = "Legt die maximale Breite des temporären Bildes fest. <br> Sehr große Werte können den Rechenprozess verlangsamen.";
$lang['im_preset_quality'] = 'Qualität (-quality [Wert])';
$lang['im_preset_quality_help'] = "Legt das zlib Kompressionslevel und den Filtertyp für das PNG Format fest. <br> Wertebereich 0-100, Standard PNG Qualität ist 75. Größere Werte bedeuten bessere Ergebnisse auf Kosten der Rechenzeit.";
$lang['im_preset_deskew'] = 'Begradigen (-deskew [%])';
$lang['im_preset_deskew_help'] = 'Begradigt schiefe Scans. Funktioniert schlecht bei einem Winkel > 5%. <br> Ein Schwellenwert von 40% funktioniert für die meisten Bilder.';
$lang['im_preset_sharpen_r'] = 'Adaptives Scharfzeichen Radius <br> (-adaptive-sharpen [radius]x[sigma])';
$lang['im_preset_sharpen_r_help'] = 'Legt den Radius für den verwendeten Gauss-Filter fest.';
$lang['im_preset_sharpen_s'] = 'Adaptives Scharfzeichen Sigma <br> (-adaptive-sharpen [radius]x[sigma])';
$lang['im_preset_sharpen_s_help'] = 'Legt die Standardabweichung für den verwendeten Gauss-Filter fest. Standard ist 1.';
$lang["im_preset_select"] = 'Bildbearbeitung';
?>
