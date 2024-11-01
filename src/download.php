<?php
if (isset($_GET['arq'])) {
    $arq = $_GET['arq'];
    // Verifica qual arquivo o usuário quer baixar
    if ($arq == 0) {
        $file = '../utils/slide.pptx';
        if (file_exists($file)) {
            header('Content-Type: application/vnd.openxmlformats-officedocument.presentationml.presentation');
            header('Content-Disposition: attachment; filename="' . basename($file) . '"');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        } else {
            echo "Arquivo não encontrado.";
        }
    } else if ($arq == 1) {
        $file = '../utils/infoeste.zip';
        if (file_exists($file)) {
            header('Content-Type: application/zip');
            header('Content-Disposition: attachment; filename="' . basename($file) . '"');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        } else {
            echo "Arquivo não encontrado.";
        }
    } else {
        echo "Parâmetro inválido.";
    }
} else {
    echo "Nenhum parâmetro fornecido.";
}
