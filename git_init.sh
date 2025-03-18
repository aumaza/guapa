#!/bin/bash
fecha=`date +%d-%m-%Y`
echo "# guapa" >> README.md
git init
git add README.md
git commit -m "init git repo $fecha"
git branch -M master
git remote add origin https://github.com/aumaza/guapa.git
git push -u origin master
                
