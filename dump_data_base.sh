#!/bin/bash

clear
echo "========================================================================="
echo "Vamos a realizar un back-up de la base de datos como primer paso..."
echo "========================================================================="
echo "Seleccione el HOST desde cual desea realizar el procedimiento..."
echo "========================================================================="
echo "1 - slackzone.ddns.net"
echo "2 - localhost"
echo "========================================================================="
read option

fecha=`date +%d-%m-%Y`
archivo="sqls/dumps/guapa-$fecha.sql"

if [[ $option -eq 1 ]]; then
mysqldump --user=root --password=slack142 --host=slackzone.ddns.net guapa > $archivo

cd sqls/dumps/

    if [[ -f $archivo ]]; then
        clear
        echo "========================================================================="
        echo "Archivo generado con exito $archivo"
        echo "========================================================================="
        cd ../../

    else
        clear
        echo "========================================================================="
        echo "Hubo un problema al intentar realizar el backup"
        echo "========================================================================="
        cd ../../
    fi

elif [[ $option -eq 2 ]]; then
mysqldump --user=root --password=slack142 --host=localhost guapa > $archivo
cd sqls/dumps/

    if [[ -f $archivo ]]; then
        clear
        echo "========================================================================="
        echo "Archivo generado con exito $archivo"
        echo "========================================================================="
        cd ../../

    else
        clear
        echo "========================================================================="
        echo "Hubo un problema al intentar realizar el backup"
        echo "========================================================================="
        cd ../../
    fi

else
clear
echo "========================================================================="
echo "Debe seleccionar una opcion válida [ 1 o 2 ]"
echo "========================================================================="
fi



