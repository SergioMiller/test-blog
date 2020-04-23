#!/bin/bash

version=2019.3
evalKeyFileName=PhpStorm193.evaluation.key

cd ~/.PhpStorm$version
rm config/eval/$evalKeyFileName
sed -i '/evlsprt/d' config/options/other.xml
cd ~/.java/.userPrefs/jetbrains
rm -rf phpstorm

exit 0
