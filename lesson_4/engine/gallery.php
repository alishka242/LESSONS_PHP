<?php

function getGallery()
{
    $scanPhotoMin = scandir("img/small");
    $arrPhotos = [];

    foreach ($scanPhotoMin as $numbPhoto) {

        if ($numbPhoto !== '.' && $numbPhoto !== '..') {
            $arrPhotos[] = $numbPhoto;
        }
    }
    return $arrPhotos;
}