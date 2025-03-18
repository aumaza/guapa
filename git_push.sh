#!/bin/bash


clear
fecha=`date +%d-%m-%Y`
echo "==============================================================="
echo "Push modificaciones"
echo "Por favor ingrese el commit para este push"
echo "==============================================================="
read commit
clear
echo "==============================================================="
echo "Ramas existentes en el repositorio"
echo "==============================================================="
git branch -r
echo "==============================================================="
echo "Tipea a que rama desea enviar el commit"
echo "==============================================================="
read branch


if [ -z "$commit" ]; then
    echo "Debe ingresar el commit..."
else
    git add *
    git commit -m "$commit [ "$date" ]"
    git push -u origin "$branch"
fi
